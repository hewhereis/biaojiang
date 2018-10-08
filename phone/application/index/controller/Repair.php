<?php
namespace app\index\controller;
use app\index\model\RepairModel;
use think\Controller;
use think\Db;
class Repair extends Base
{
   /**
    * 维修下单页面
    * @time 2017-11-09;
    */
    public function repair_order(){
    $type=session('type');
    $ds_url=\think\Config::get('view_replace_str');
    if($type==2){
      $this->redirect($ds_url['__PUBLIC__'].'masterhome');//跳转师傅订单管理页面
    } 
      $api = new Api();
      //品牌表
      $brand = $api->brand();
      //商品大类
      $category = $api->category();
      //商品小类
      $commodity = $api->commodity();
      //故障概况
      $goods = $api->goods();
      $this->assign('brand',json_encode($brand));
      $this->assign('category',json_encode($category));
      $this->assign('commodity',json_encode($commodity));
      $this->assign('goods',json_encode($goods));
      return view('page');
    }
   
    /**
     * 维修下单信息显示页面
     * 
     */
    public function repair_information(){
      return view('index');
    }
    /**
     * 下单客户信息
     */
    public function customer_information(){
      $uid = session('id');
      $where['default']=1;
      $where['uid'] = $uid;
      $list = Db::name('client_loaction')->where($where)->find();
      $lists=array('name'=>'','phone'=>'','address_area'=>'','address'=>'');
      if(!empty($list)){
         $list['address_area'] = $list['province'].' '.$list['city'].' '.$list['district'];
         $list['address'] = $list['location'];
         $list['uid'] = $uid;
         $this->assign('list',json_encode($list));
      }else{
         $lists['uid'] = $uid;
         $this->assign('list',json_encode($lists));
      }
      return view('kehuxingxi');
    }
    /**
     * 维修下单
     * @direct_order 直接下单
     * @time 2017-11-11
     */
    public function direct_order(){
      $uid = session('id');
      $username = session('ds_username');
      //判断是咨询下单还是直接下单
      $i = input('post.i');

      $yue = input('post.yue');
        $pwd = input('post.pwd');
        if($yue==1){
//
         $res=   Db::name("users_partner")->where('uid',$uid)->find();
         if(empty($res)){
             $data=['code'=>201,"msg"=>"你还不是月结客户"];

             return json($data);
         }else{
             if($res['status']==0){
                 $data=['code'=>202,"msg"=>"月结客户还未通过"];
                 return json($data);
             }else if($res['status']==1){
                 $res=   Db::name("users_partner")->where('monthly_service_password',$pwd)->find();
                 if(empty($res)){
                     $data=['code'=>202,"msg"=>"月结密码错误"];
                     return json($data);
                 }else{
                     $data=['code'=>202,"msg"=>"月结密码正确"];
                 }
             }else if($res['status']==2){
                 $data=['code'=>202,"msg"=>"月结客户未通过"];
                 return json($data);
             }
         }
        }else{
          $data=['code'=>204,"msg"=>"没有勾选申请月结"];
        }
      $param = input();
      //传过来的对象转化成数组
      $josn_dui=$param['data'][0];
      $josn_object="[".$josn_dui."]";
      $array = json_decode($josn_object, true); 
      //传过来的个人信息
      $array_info = $param['data'][1];
      $array_info['uid'] = $uid;
      $array_info['username'] = $username;
      $list = new RepairModel();
      $info = $list->direct_order($array,$array_info,$i);
      return json(['code'=>$info['code'],'msg'=>$info['msg'],'order_number'=>$info['order_number'],"data"=>$data]);
    }
    /**
     * 甩单配师傅
     * @direct_order 直接下单
     * @time 2017-11-11
     */
    public function customer_rejection($order_number){
       //查询客户的详细信息
      $order = RepairModel::master_info($order_number);
      $order['start_time'] = date('Y-m-d H:i',$order['start_time']);
      //查询客户下单项目的信息
      $list = RepairModel::project($order_number);
      $this->assign('order_number',$order_number);
      $this->assign('order',json_encode($order));
      $this->assign('list',json_encode($list));
      return view('suaidanpeishifu');
    }
    /**
     * 客户投标价加入ajax
     * 
     */
    public function getmoney(){
      $param = input('post.');
   
      $getmoney = new RepairModel();
      $getmoney = $getmoney->getmoney($param);
      //发送消息
       $worder_id = Db::name('users')->where('type',2)->field('id')->select();
       $info['message_type'] = 2;
       $info['source_id'] = session('id');
       $info['content'] = '有客户发布订单，请点击查看';
       $info['link'] = $param['link'];
       $info['status'] = '0';
       $info['sending_time'] = date("Y-m-d H:i:s");
      foreach($worder_id as $vv){
            $info['receive_id'] = $vv['id'];
            $arr = Db('message_reminder')->insert($info);
        }
      return json(['code'=>$getmoney['code'],'msg'=>$getmoney['msg']]);
    }

    /**
     * 客户留言配单页面
     */
    public function message_list($order_number){
      //查询客户的详细信息
      $order = RepairModel::master_info($order_number);
      $order['start_time'] = date('Y-m-d H:i',$order['start_time']);
      //查询客户下单项目的信息
      $list = RepairModel::project($order_number);
      $comments = $list[0][0]['comments'];
      //查阅读量
      $rob_num = Db::name('orders')->where('order_number',$order_number)->field('rob_num')->find();
      $this->assign('order_number',$order_number);
      $this->assign('order',json_encode($order));
      $this->assign('list',json_encode($list[0]));
      $this->assign('total',$list[1]);
      $this->assign('comments',$comments);
      $this->assign('rob_num',$rob_num['rob_num']);
      return view('message_list');
    }
    /**
     * [change_status description]
     * 客户点击选择师傅按钮前，改变数据表的客户的步骤
     * @return [type] [description]
     */
    public function change_status(){
       $uid=session('id');
       $order_number = input('post.order_number');
       $where['owner_id']=$uid;
       $where['order_number']=$order_number;
       $cha=Db::name("orders")->field('worker_id')->where($where)->find();
       if($cha['worker_id']==0){
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
    * @order_number 订单号
    * 客户选择师傅
    */
   public function select_master($order_number){
      //查询客户的详细信息
      $order = RepairModel::master_info($order_number);
      //查询客户下单项目的信息
      $list = RepairModel::project($order_number);
      //该订单抢单的师傅 
      $grabmaster = RepairModel::grabmaster($order_number);  
      $this->assign('order_number',$order_number);
      $this->assign('order',$order);
      $this->assign('list',json_encode($list[0]));
      $this->assign('total',$list[1]);
      $this->assign('master',json_encode($grabmaster));
      return view('dingdandingbiao');
   }
   /**
    * 选定师傅AJAX
    */
   public function confirm_master(){
       $param = input();
       $data['worker_id'] = $param['worker_id'];
       $data['amount_engineer'] = $param['totals'];
       $data['is_invitation'] = 1;
       $data['status'] = 2;
       $data['step_number'] = 5;
       $data['work_step_number'] = 1;
       $data['master_status'] = 2;
       $result = Db::name('orders')->where('order_number',$param['order_number'])->update($data);
       if(!empty($result) || $result==0){
          return json(['code'=>200,'msg'=>'选择师傅成功']);
       }else{
          return json(['code'=>0,'msg'=>'选择师傅出现一点问题']);
       }
   }
   /**
    * 客户结算页面
    */
   public function settlement($order_number){
    //查询客户的详细信息
    $order = RepairModel::master_info($order_number);
    $order['start_time'] = date('Y-m-d H:i',$order['start_time']);
    //项目详情
    $project_detail =  RepairModel::project_detail($order_number);
    $totals = Db::name('offer_total')->where('order_number',$order_number)->value('totals');
 
    $this->assign('order_number',$order_number);
    $this->assign('order',json_encode($order));
    $this->assign('project_detail',json_encode($project_detail));
    $this->assign('totals',$totals);
    return view('settlement');
   }
   /**
    * 客户追加项目页面
    */
   public function additional($order_number){
      $this->assign('order_number',$order_number);
      return view('kehu_zhuijiaxiangmu');
   }
   /**
    * 师傅确定客户追加项目页面
    */
   public function que_additonal($order_number){
      $list = Db::name('orders')->where('order_number',$order_number)->field('ampunt_addition,amput_content')->find();
      $this->assign('list',json_encode($list));
      $this->assign('order_number',$order_number);
      return view('shifu_zhuijiaxiangmu');
   }

   public function que_additonal_ajax(){
      $order_number = input('post.order_number');
       $info['message_type'] = 2;
       $info['source_id'] = Db::name('orders')->where('order_number',$order_number)->value('worker_id');
       $info['content'] = '师傅已确定您的追加项目，请点击查看';
       $info['receive_id'] = Db::name('orders')->where('order_number',$order_number)->value('owner_id');
       $info['link'] = input('post.link');
       $info['status'] = '0';
       $info['sending_time'] = date("Y-m-d H:i:s");
       $list = Db::name('message_reminder')->insert($info);
       if($list){
        return json(['code'=>200,'msg'=>'提交成功']);
       }else{
        return json(['code'=>0,'msg'=>'系统错误']);
       }

   }
}