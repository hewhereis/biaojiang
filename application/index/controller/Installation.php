<?php
namespace app\index\controller;
use tests\thinkphp\library\think\config\driver\jsonTest;
use think\Controller;
use app\Common\model\Commodity;
use think\Db;
use app\index\model\OrdersInstall;
class Installation extends Controller
{
    public function _initialize()
    {
        parent::_initialize();
    }

    // 安装首页
    public function index()
    {
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $this->page_title = '安装订单';
        $this->assign('page_title', $this->page_title);
        return $this->fetch();
    }

    // 发布需求
     public function publish()
    {
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        if (strtolower(request()->method()) == 'post') {



        } else {
            $this->page_title = '发布订单';
            $brand=Db::name("brand_list")->select();
            $this->assign('brand',$brand);
            $this->assign('page_title', $this->page_title);
            $this->assign('categories', Commodity::getCommodityByPid(1));
            $this->assign('commodities',Commodity::getCommodity());
            $this->assign('goods',Commodity::goods());

            $uid=session('id');
            $ds_loca['uid']=$uid;
            $ds_loca['default']=1;
            $loaction = Db::name('client_loaction')->where($ds_loca)->find();//获取当前客户地址管理
            $this->assign('loaction',$loaction);
            return $this->fetch();
        }
    }
//    商品二类
    public function twostclass(){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $id=$_GET['bigname'];
        $carr=Db::name("commodity")->field("id,name")->where('find_in_set('.$id.',c_id)')->select(); //获取商品二类
        echo json_encode($carr);
    }
    public  function threestclass(){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $id=$_GET['bigname'];

        $carr=Db::name("commodity")->field("id,name")->where('find_in_set('.$id.',y_id)')->select(); //获取商品二类故障详情
        echo json_encode($carr);
    }
    public  function threedefault(){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $id=$_GET['bigname'];
        $carr=Db::name("goods")->field("id,name")->where('find_in_set('.$id.',y_id)')->select(); //三级联动故障默认
        echo json_encode($carr);
    }
//   安装 故障详情下单 判断月结客户
    public function placeorder(){

        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
      //声明一个空数组
        $arr=array();
        $arr['id']=null;
        $installation=input('post.');
        $uid=input("post.uid");
        if(empty($uid)){
            return json(array('code'=>-1,'msg'=>'请先登录'));
        }else{
            $arr['order_id']=$uid;
        }

        $param=$installation["installation"];
        if(!empty($param['monthly_service'])){
            if($param['monthly_service']==1){
                $pwd=$param['yue'];
                $user = Db::name('users_partner');
                $list = $user->where('uid='.$uid)->select();
                if(empty($list)){
                    return ['code' => 0, 'data' => '', 'msg' => '你还不是月结客户'];
                }else{
                    $where['monthly_service_password']=$pwd;
                    $where['uid']=$uid;
                    $lists = $user->where($where)->select();
                    if(empty($lists)){
                        return ['code' =>3, 'data' => '', 'msg' => '月结密码错误'];
                    }
                }
            }
        }
    
         //判断当前用户有没有默认地址
      $address=Db::name('client_loaction')->field('default')->where('uid',$uid)->find();
      if(empty($address)){
        $add_where['uid']=$uid;
        $add_where['name']=$param['contact_name'];
        $add_where['province']=$param['location_ext'];
        $add_where['city']=$param['location_exta'];
        $add_where['district']=$param['location_extb'];
        $add_where['location']=$param['location_extc'];
        $add_where['default']=1;
        $add_where['phone']=$param['contact_phone'];
        Db::name('client_loaction')->insertGetId($add_where);
      }
       foreach($param as $key => $value) {
            $arr[$key]=$value;
       }
        $stime=date('YmdHis',time());
        $rand=rand(1,99999);
        $order_number=$stime."".$rand;
        $arr['order_number']=$order_number;
        $arr['created_at']=time();
        $arr['updated_at']=time();
        $arr['service_type_id']=1;
        $arr['status']=0;
        $arr['storefront'] = $installation['storefront'];
        $arr= Db::name('orders_install')->insertGetId($arr);
        $a= Db('orders_install')->where('id',$arr)->value("order_number");
        $step_type=input("post.step_type");
    if(!empty($arr)){
        $data=["code"=>1,"msg"=>"下单成功","src"=> $a,"step_type"=>$step_type];
    }else{
        $data=["code"=>2,"msg"=>"下单失败"];
    }

    //声明一个空数组
    $list=array();
        $ds_step = input('post.ds_step');
        $judge = input('post.judge');
        $list['order_number']=$order_number;
        $list['owner_id']=$uid;
        $list['service_type_id']=1;
        $list['l1_category_id'] = $param['category']; 
        $list['work_step_service'] = $ds_step;
        $list['step_type'] = $ds_step;
        $list['judge'] = $judge;
        $uname=input('post.uname');
        $list['owner_name']=$uname;
        $list['full_location']=$param['location_ext'].$param['location_exta'].$param['location_extb'];
        $list['location_ext']=$param['location_extc'];
        $list['contact_name']=$param['contact_name'];
        $list['contact_phone']=$param['contact_phone'];
        $list['step_number']=2;
        $list['work_sign']=0;
        $list['is_bomb']=$installation['hedan'];
        $list['start_time']=strtotime($param['start_at']);
        $list['create_time']=time();
        $arr= Db::name('orders')->insertGetId($list);
        return json($data);
  }
//        安装 甩单配师傅 初始化变量
   public function install_jilt_single($id){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
       
       //声明一个空数组
       $arr=array();
       $data= Db('orders')->where('order_number',$id)->find();
       $arr["contact_name"]=$data["contact_name"];
       $arr["location_extc"]=$data["full_location"];
       $arr["start_at"]=$data["start_time"];
       $datas= db('orders_install')->where('order_number',$id)->find();
       $co1=Db('category')->where('id', $datas["category"])->find();
       $co2=Db('commodity')->where('id', $datas['commodity'])->find();
       $co3=Db('goods')->where('id', $datas["commoditys"])->find();
       $this->assign('cate',$arr["contact_name"]);
       $this->assign('cate1', $arr["location_extc"]);
       $this->assign('cate2',$arr["start_at"]);
       $this->assign('co1',$co1["name"]);
       $this->assign('co2',$co2["name"]);
       $this->assign('co3',$co3["name"]);
       $this->assign('id',$id);
       $this->assign('ids',$datas["id"]);
       $this->assign('order_id',$datas["order_id"]);
       $this->assign('uid',$uid);
      return view("install_jilt_single");
   }
//  安装 甩单配师傅 更行数据
  public function install_rejection(){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

       $order_number = input('post.');

       $data=$order_number["installation"];
       $data['updated_at']=time();
	   $data['tender']=$order_number['yincang'];
       $info['step_number']=3;
       $info['status']=1;
       $info['master_status']=1;
	   
       $info = Db::name('orders')->where('order_number',$data['order_number'])->update($info);
       $data=Db::table('bj_orders_install')->update($data);
       if($data){
           return json(array('code'=>200,'msg'=>'正在为您找师傅'));
       }else if($data==0){
           return json(array('code'=>1,'msg'=>'请重新修改参数'));
       }else{
           return json(array('code'=>0,'msg'=>'找师傅出现点问题'));
       }
   }
    //留言配单
    public function install_message_pairing($order_num){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $list= Db('orders_install')->where('order_number',$order_num)->find();
        $data= Db('orders')->where('order_number',$order_num)->find();
        $uid = session('id');
        $result = Db::name('users')->where('id='.$uid)->field('type')->find();
        $co1=Db('category')->where('id', $list["category"])->find();
        $co2=Db('commodity')->where('id', $list['commodity'])->find();
        $co3=Db('goods')->where('id', $list["commoditys"])->find();
        $rob=Db::name("orders")->field('rob_num')->where('order_number',$order_num)->find();
        $this->assign('order_number',$order_num);
        $this->assign('contact_name',$data["contact_name"]);
        $this->assign('location_extc', $data["full_location"]);
        $this->assign('start_at',$data["start_time"]);
        $this->assign('comments',$list["comments"]);
        $this->assign('budget',$list["budget"]);
        $this->assign('commodity',$co1["name"]);
        $this->assign('commodityss',$co2["name"]);
        $this->assign('commoditys',$co3["name"]);
		$this->assign('list',$list);
        $this->assign('result',$result);
        $this->assign('rob_num',$rob);
        //查询师傅和客户对订单的留言
        $where['m.order_number'] =$order_num;
        $where['m.status'] = 1;
        $message = Db::name('users')
            ->alias('u')
            ->join('message m','u.id = m.uid')
            ->where($where)
            ->select();
            $this->assign('message',$message);
        return view("install_message_pairing");
    }

    /**
     * 改变维修主表状态
     */
    public function install_change_status(){
         $uid=session('id');//获取先前登陆者ID
         $ds_where['receive_id']=$uid;
         $ds_where['status']='0';
         $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
         $this->assign('carr',$carr);

         $order_number = input('post.number');
         $where['owner_id']=$uid;
         $where['order_number']=$order_number;
         $cha=Db::name("orders")->field('worker_id')->where($where)->find();
         if($cha['worker_id']==0){
                $ds_where['receive_id']=$uid;
                $ds_where['status']='0';
                $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
                $this->assign('carr',$carr);
                $order = Db::name('orders')->where('order_number',$order_number)->update(['step_number'=>4]);
                if($order || $order==0){
                    return json(array('code'=>200,'msg'=>''));
                }else{
                    return json(array('code'=>0,'msg'=>''));
                }
         }else{
            return json(array('code'=>0,'msg'=>'不能重复选择师傅'));
         } 
    }

    /**
     * 单个故障详情
     */

    public function install_order($order_num){

        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        $a= db('orders_install')->where('order_number',$order_num)->find();
        $this->assign('a',$a);
        $co1=db('category')->where('id', $a["category"])->find();
        $co2=db('commodity')->where('id', $a['commodity'])->find();
        $co3=db('goods')->where('id', $a["commoditys"])->find();
        $this->assign('co1',$co1["name"]);
        $this->assign('co2',$co2["name"]);
        $this->assign('co3',$co3["name"]);
        return view("install_order");
    }
    /**
     * 安装师傅抢单页面
     */
    public function install_grab($ornumber){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;
        //查出下单者ID
        $owner_id = Db::name('orders')->where('order_number',$order_number)->field('owner_id')->find();  
        $data= Db('orders')->where('order_number',$order_number)->find();
        $list= Db('orders_install')->where('order_number',$order_number)->find();
        $co1=Db('category')->where('id', $list["category"])->find();
        $co2=Db('commodity')->where('id', $list['commodity'])->find();
        $co3=Db('goods')->where('id', $list["commoditys"])->find();
        $this->assign('contact_name',$data["contact_name"]);
        $this->assign('location_extc', $data["full_location"]);
        $this->assign('start_at',$data["start_time"]);
        $this->assign('commodity',$co1["name"]);
        $this->assign('commodityss',$co2["name"]);
        $this->assign('commoditys',$co3["name"]);
        $this->assign('order_number',$order_number);
        $this->assign('uid',$uid);
        $this->assign('owner_id',$owner_id['owner_id']);
        return view('install_grab_order');
    }
    /**
     * 客户选师傅页面
     */
    public function install_order_calibrate($ornumber){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;
        $data = Db::name('orders')->where('order_number='.$order_number)->field('contact_name,full_location,start_time')->find();
        $list= Db('orders_install')->where('order_number',$order_number)->find();
        $co1=Db('category')->where('id', $list["category"])->find();
        $co2=Db('commodity')->where('id', $list['commodity'])->find();
        $co3=Db('goods')->where('id', $list["commoditys"])->find();
        $this->assign('contact_name',$data["contact_name"]);
        $this->assign('location_extc', $data["full_location"]);
        $this->assign('start_at',$data["start_time"]);
        $this->assign('co1',$co1["name"]);
        $this->assign('co2',$co2["name"]);
        $this->assign('co3',$co3["name"]);
        $this->assign('budget',$list["budget"]);
        //选择单子的师傅个人信息
        $evaluate = Db::name('offer_total')
            ->alias('o')
            ->join('users_worker u','u.uid = o.worker_id')
            ->where('o.order_number',$order_number)
            ->select(); 
               
        $this->assign('a',$data);
        $this->assign('aa',$list);
        $this->assign('order_number',$order_number);
        $this->assign('evaluate',$evaluate);
        return view('install_order_calibrate');
    }
    /**
     * 客户选择师傅
     */
    public function install_selected(){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

       $order_number = input('post.number');
        //接受选择师傅的ID
       $result = input('post.samm');
       $link =input('post.link');
       $where['worker_id'] = $result;
       $where['order_number'] = $order_number;
       $offer = Db::name('offer')->where($where)->field('tender_cost')->find();
       //更新安装附表的项目价钱
       $arr =  Db::name('orders_install')->where('order_number',$order_number)->update(['tender_cost'=>$offer['tender_cost'],'worker_id'=>$result]);
       //客户选择师傅后，更新orders表字段。
       $offer_total = Db::name('offer_total')->where($where)->field('amount_engineer')->find();
           $datas =([
            'amount_engineer'=>$offer_total['amount_engineer'],
            'is_invitation'=>1,'worker_id'=>$result,'status'=>2,
            'step_number'=>5,'master_status'=>2
           ]);  
        $lists = Db::name('orders')->where('order_number',$order_number)->update($datas);
        if($lists || $lists==0){
            $data['message_type'] = 2;
            $data['source_id'] = $uid;
            $data['receive_id'] = $result;
            $data['content'] = "你抢的订单已被客户选择，请前往查看";
            $data['link'] = $link ;
            $data['sending_time'] = date('Y-m-d H:i:s',time());
            Db::name('message_reminder')->insert($data);
            return json(array('code'=>200,'msg'=>'选择师傅成功'));
        }else{
            return json(array('code'=>0,'msg'=>'选择师傅出现一点问题哦,请重新选择'));
        }
    }
    /**
     * 客户结算
     */
    public function install_settlement($ornumber){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;
        $data= Db('orders')->where('order_number',$order_number)->find(); 
        $list= Db('orders_install')->where('order_number',$order_number)->find();
        $co1=Db('category')->where('id', $list["category"])->find();
        $co2=Db('commodity')->where('id', $list['commodity'])->find();
        $co3=Db('goods')->where('id', $list["commoditys"])->find();
        //查询客户选择的师傅
        $where['is_invitation'] = 1;
        $where['order_number']=$order_number;
        $result = Db::name('orders')->where($where)->find();
        $wid = Db::name('orders')->where($where)->field('worker_id')->find();
        // 客户支付的价格,师傅收费+平台服务费+税费
        $wheres['order_number'] = $order_number;
        $wheres['worker_id'] =  $wid['worker_id'];
        //  //查询发票税率
        // $rate = Db::name('config')->where('id',5)->field('value')->find();
        // //查询出师傅的平台服务费用
        // $res = Db::name('orders')->where('order_number',$order_number)->field('platform_service,g_platform_service')->find();
        // //判断师傅是否缴纳保证金
        // $gets = Db::name('users_worker')->where('uid',$wid['worker_id'])->field('guarantee')->find();
        $total = Db::name('offer_total')->where($wheres)->field('totals')->find();
        $this->assign('contact_name',$data["contact_name"]);
        $this->assign('location_extc', $data["full_location"]);
        $this->assign('start_at',$data["start_time"]);
        $this->assign('co1',$co1["name"]);
        $this->assign('co2',$co2["name"]);
        $this->assign('co3',$co3["name"]);
        $this->assign('budget',$list["budget"]);
        $this->assign('order_number',$order_number);
        $this->assign('result',$result);
        $this->assign('total',$total['totals']);
      return view('install_settlement_page');
    }
    //客户核单报告页面
 public function kehuqurenbiao($order_number){
        $uid=session('id');
        $ds_url=\think\Config::get('view_replace_str');
        if(empty($uid)){
        $this->redirect($ds_url['__PUBLIC__'].'auth');
        }

        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $order=$order_number;
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $ken= Db::name('install_tupian')->where('order_number',$order)->select();
        $kens= Db::name('install_tupian')->where('order_number',$order)->find();
        $field='o.contact_name,o.location_ext,o.full_location,o.contact_phone,u.real_name,u.phone';
         $orders = Db::name('orders')->alias('o')->field($field)->join('users u','u.id=o.worker_id')->where('o.order_number='.$order)->find();
        $this->assign('ken',$ken);
        $this->assign('orders',$orders);
        $this->assign('kens',$kens);
        $this->assign('carr',$carr);
        $this->assign('order',$order);
      return view('kehuqurenbiao');
    }
//师傅核单报告页面
 public function shifuqurenbiao($order_number){
        $uid=session('id');
        $ds_url=\think\Config::get('view_replace_str');
        if(empty($uid)){
        $this->redirect($ds_url['__PUBLIC__'].'auth');
        }
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $order=$order_number;
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $ken= Db::name('install_tupian')->where('order_number',$order)->select();
        $kens= Db::name('install_tupian')->where('order_number',$order)->find();
        if( empty($kens['is_ok'])){
          $count=count($ken);
          $is_ok=0;
        }else{
          $count=0;
          $is_ok=$kens['is_ok'];
        }
        
        $field='o.contact_name,o.location_ext,o.full_location,o.contact_phone,u.real_name,u.phone';
         $orders = Db::name('orders')->alias('o')->field($field)->join('users u','u.id=o.worker_id')->where('o.order_number='.$order)->find();
          $this->assign('count',$count);
         $this->assign('orders',$orders);
        $this->assign('carr',$carr);
        $this->assign('ken',$ken);
        
         $this->assign('is_ok',$is_ok);
        $this->assign('kens',$kens);
         $this->assign('order',$order);
      return view('shifuqurenbiao');
}
//安装师傅提交核单报告
 public function install_img_send(){
    $request = input('post.');
    $nu=null;
    $order=$request['order_number'];
   
    if($request["is_ok"]==1){
         $order_number = $order;
         $querenma = $request['querenma'];
         $field='querenma';
         $order = Db::name('orders')->field($field)->where('order_number='.$order_number)->find();
         if($order['querenma']==$querenma){
             $step = Db::name('orders')->where('order_number',$order_number)->field('step_type')->find();
                if($step['step_type']==3){
                   $data['work_step_number']='6';
                }else if($step['step_type']==4){
                  $data['work_step_number']='9';
                }
                $data['end_time'] = time();
            Db::name("orders")->where('order_number',$order_number)->update($data);

            return ['code' => 200, 'data' => '', 'msg' => 'ok'];
         }else{

           return ['code' => 201, 'data' => '', 'msg' => '确认码错误'];
         }
       
    }
    
    $ken= Db::name('install_tupian')->where('order_number',$order)->select();
    if(!empty($ken)){
      
     $success= Db::name('install_tupian')->where('order_number',$order)->delete();
     if($success){
      $data['order_number']=$request['order_number'];
     $data['img3']=$request['img3'];
      $data['img4']=$request['img4'];
     $data['img5']=$request['img5'];
      $data['img6']=$request['img6'];

      $data['woker_id']=session("id");
      $data['text']=$request['text'];
      foreach ($request['img1'] as $key => $value) {
            $data['img1']=$request['img1'][$key];
            $data['img2']=$request['img2'][$key];
            $data['text']=$request['text'][$key];
          $nu=  Db::name('install_tupian')->insertGetId($data);
        }

        
     }
    }else{
        $step = Db::name('orders')->where('order_number',$order)->field('step_type')->find();
                if($step['step_type']==3){
                   $datas['step_number']='8';
                }else if($step['step_type']==4){
                  $datas['step_number']='8';
                }
                 $datas['end_time'] = time();
            Db::name("orders")->where('order_number',$order)->update($datas);
        $data['order_number']=$request['order_number'];
        $data['img3']=$request['img3'];
        $data['img4']=$request['img4'];
        $data['img5']=$request['img5'];
        $data['img6']=$request['img6'];
     
      $data['woker_id']=session("id");
      $data['text']=$request['text'];
      foreach ($request['img1'] as $key => $value) {
            $data['img1']=$request['img1'][$key];
            $data['img2']=$request['img2'][$key];
            $data['text']=$request['text'][$key];
           $nu= Db::name('install_tupian')->insertGetId($data);
        }
    }
    

   if(!empty($nu)){
          $map['message_type']='1';
          $map['source_id']=session("id");
          $owner_id=Db::name("orders")->field('owner_id')->where('order_number',$order)->find();
          $map['receive_id']=$owner_id['owner_id'];
          $map['content']='师傅已经上传了安装报告,点击查看';
          $map['link']=$request['link'];
          $map['status']='0';
          $map['sending_time']=date("Y-m-d H:i:s");
          Db::name('message_reminder')->insert($map);
        
          return json(array('code'=>200,'msg'=>'提交成功'));

        }

    

  }
  

 /*
判断师傅是否抢单
*/
    public function install_ajax_me_q(){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        
        $param=input('post.');
        $uid=$param['uid'];
        $number=$param['number'];
        $worker_id = Db::name('orders')->where('order_number',$number)->value('worker_id');
        if($worker_id===0 || $worker_id==session('id')){
            if($worker_id!=session('id')){
                $where['worker_id']=$uid;
                $where['order_number']=$number;
                $list=Db::name("offer_total")->field('is_rob')->where($where)->find();
                if($list['is_rob']==0){
                    return json(array('code'=>200,'msg'=>''));
                }else{
                   return json(array('code'=>0,'msg'=>'请勿重复抢单！')); 
                }
            }
            else{
                return json(array('code'=>0,'msg'=>'请勿重复抢单！'));
            }
        }else{
            return json(array('code'=>0,'msg'=>'来晚一步，订单已经被别的师傅抢掉了！'));
        }

    }

 /**
     * [ajax_survey_feedback description]
     * @return [type] [description]
     * 客户反馈安装ajax
     */
   public function ajaxs_replace_feedback(){ 
        $uname=session('ds_username');
        $uid=session('id');
        $order_number=input('order_number');
        $text=input('text');
        $link = input('link');
        $list=Db::name("install_tupian")->where('order_number',$order_number)->find();

        //给师傅发信息
        $map['message_type']='1';
        $map['source_id']=$uid;
        $map['receive_id']=$list['woker_id'];
        $map['content']='订单号:'.$order_number.',用户:'.$uname.'<br/>发来安装反馈内容:'.$text;
        $map['link'] = $link;
        $map['status']='0';
        $map['sending_time']=date("Y-m-d H:i:s");
        $result=Db::name('message_reminder')->insert($map);
        if(false === $result){             
            return ['code' => 0, 'data' => '', 'msg' => '-1'];
        }else{
            return ['code' => 200, 'data' => '', 'msg' => '你的反馈内容已发送给师傅~'];
         }
    }


   
}