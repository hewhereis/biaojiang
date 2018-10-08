<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10/010
 * Time: 16:50
 */

namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\OrdersModel;
use app\index\model\OfferModel;
use app\index\model\ReplaceModel;

class Replace extends  Controller{

    public  function  replace(){
        header("Content-Type: text/html;charset=utf-8");
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $sid=2;
        $cid=3;

        $slist = Db::name('service')->field('name')->where("id='{$sid}'")->find();//获取当前服务类型名称
        $clist = Db::name('commodity')->field('name,id,c_id')->where("id='{$cid}'")->find();//获取当前商品二类名称
        $gsid=$clist['id'];
        $ylist = Db::name('commodity')->field('c_id')->where("id='{$cid}'")->find();
        $yid=$ylist['c_id'];
        $rlist = Db::name('category')->field('name,id')->where('find_in_set('.$sid.',s_id)')->where('id','in',$yid)->find();
        $csid=$rlist['id'];
        $lists = Db::name('category')->field('name,id')->where('id','not in',$csid)->where('find_in_set('.$sid.',s_id)')->select();
        $listss = Db::name('category')->field('name,id')->where('find_in_set('.$sid.',s_id)')->select();
        $carr=Db::name("commodity")->field("id,name")->where('find_in_set('.$csid.',c_id)')->where('id','not in',$gsid)->select(); //获取商品二类
        $brand=Db::name("brand_list")->select(); //品牌
        $sname=$slist['name'];
        $glist=Db::name("goods")->field("id,name")->where("y_id='{$gsid}'")->select(); //获取商品三类

        $sname=$slist['name'];
        $ds_loca['uid']=$uid;
        $ds_loca['default']=1;
        $loaction = Db::name('client_loaction')->where($ds_loca)->find();//获取当前客户地址管理


        $this->assign('sname',$sname);
        $this->assign('clist',$clist);
        $this->assign('rlist',$rlist);
        $this->assign('comm',$carr);
        $this->assign('glist',$glist);
        $this->assign('lists',$lists);
        $this->assign('listss',$listss);
        $this->assign('brand',$brand);
        $this->assign('loaction',$loaction);
    return $this->fetch('replace');
}

 public  function  replace_add(){
     $uid=session('id');
     $ds_where['receive_id']=$uid;
     $ds_where['status']='0';
     $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
     $this->assign('carr',$carr);

     $uid = input('post.uid');


     if(empty($uid)){
         return json(array('code'=>-1,'msg'=>'请先登录'));
     }
     if(request()->isAjax()){
            $param=input('post.');
         $param['uid'] = $uid;
//         var_dump($uid);
//         die;
//

            $article=new ReplaceModel();
            $flag=$article->insertReplace($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
 }


    public  function  gjmjilt_single($order_number){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        $order_number=$order_number;
        $order = Db::name('orders')->field('contact_name,full_location,start_time')->where('order_number',$order_number)->find();
        $list = Db::name('replace')->where('order_number',$order_number)->field('brand,id')->select();
        $this->assign('cate1',$order_number.'category');
        $this->assign('cate2',$order_number.'commodity');
        $this->assign('order_number',$order_number);
        $this->assign('order',$order);
        $this->assign('list',$list);
        $this->assign('uid',$uid);
         return  $this->fetch('gjmjilt_single');
    }
    /**
     * 客户基本信息
     */
    public function gjmrejection(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        if(request()->isAjax()){
            $order_number = input('post.number');
            //钱
            $rate=explode(',',input('cc'));
            array_pop($rate);
            //ID
            $ids=explode(',',input('bb'));
            array_pop($ids);
            $data['id']=$ids;
            $data['budget']=$rate;
            $keys = array_keys($data);
            $count1 = count($keys);
            $count2 = count($data[$keys[0]]);
            for ($i=0; $i < $count2; $i++) {
                for ($j=0; $j < $count1; $j++) {
                    $new_arr[$i][$keys[$j]] = $data[$keys[$j]][$i];
                }
            }
            ;
            $modules = input('post.modules');//招募留言
            $price = input('post.price'); //判断招标是否显示预算价
            foreach ($new_arr as $k=>$v){
                if($price ){
                    $order = Db::name('replace')->update(['id' => $v['id'],'budget'=>$v['budget'],'tend'=>1,'comment'=>$modules]);
                }else{
                    $order = Db::name('replace')->update(['id' => $v['id'],'budget'=>$v['budget'],'tend'=>0,'comment'=>$modules]);
                }
            }
            if($order || $order==0){
                $arr = Db::name('orders')->where('order_number',$order_number)->update(['step_number'=>3,'status'=>1,'master_status'=>1,'master_status'=>1]);
                return json(array('code'=>200,'msg'=>'正在为您找师傅'));
            }else{
                return json(array('code'=>0,'msg'=>'找师傅遇到一点小问题哦'));
            }
        }
    }
      /**
       * 留言配单页面
       */
       public function gjmmessage_pairing($order_number){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

         $order_number=$order_number;
         $order = Db::name('orders')->where('order_number',$order_number)->field('contact_name,full_location,start_time')->find();
         $orders= Db::name('replace')->where('order_number',$order_number)->field('comment')->find();
         $list = Db::name('replace')->where('order_number',$order_number)->field('brand,tend,budget,id')->select();
         $rob=Db::name("orders")->field('rob_num')->where('order_number',$order_number)->find();
         //判断登陆进来的是师傅还是客户
        $uid = session('id');
        $result = Db::name('users')->where('id='.$uid)->field('type')->find();
        $cate = array(); //声明一个空数组
           
        $total=null;  //声明一个空变量
        foreach($list as $l){
            $b['brand'] = $l['brand'];
            $b['tend'] = $l['tend'];
            $b['budget'] = $l['budget'];
            $b['id'] = $l['id'];
            $cate[]=$b;
            if($l['tend']==1){
                $total+= $l['budget'];
            }else{
                $total = '待定';
            }
        }
        //查询师傅和客户对订单的留言
        $where['m.order_number'] =$order_number;
        $where['m.status'] = 1;
        $message = Db::name('users')
            ->alias('u')
            ->join('message m','u.id = m.uid')
            ->where($where)
            ->select();
        $this->assign('total',$total);
        $this->assign('cate',$cate);
        $this->assign('order_number',$order_number);
        $this->assign('order',$order);
        $this->assign('orders',$orders);
        $this->assign('message',$message);
        $this->assign('list',$list);
         $this->assign('result',$result);
        $this->assign('uid',$uid);
         $this->assign('rob_num',$rob);
       return $this->fetch('gjmmessage_pairing');
    }

     /**
     * 客户下单  师傅收到消息
     */
    public function mess(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        $worder_id = Db::name('users')->where('type',2)->field('id')->select();
        $param = input('post.');
        foreach($worder_id as $vv){
            $param['receive_id'] = $vv['id'];
            $arr = Db('message_reminder')->insert($param);
        }
    }

        /**
     * 单个故障详情
     */
    public  function one($order_number){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        $id=$order_number;
        $data = Db::name('replace')->where('id',$id)->find();
        $this->assign('data',$data);
        return view('onner');
    }



    /**
     * 师傅抢单
     */
    public function gjmgrab($ornumber){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;
        //查找发送订单者ID
        $owner_id = Db::name('orders')->where('order_number',$order_number)->field('owner_id')->find();  
        $order =Db::name('orders')->where('order_number',$order_number)->field('contact_name,full_location,start_time')->find();
        $list = Db::name('replace')->where('order_number',$order_number)->field('brand,tend,budget,id')->select();
        $cate = array(); //声明一个空数组
         foreach($list as $l){
            $b['brand'] = $l['brand'];
            $b['tend'] = $l['tend'];
            $b['budget'] = $l['budget'];
            $b['id'] = $l['id'];
            $cate[]=$b;
        }
        $this->assign('cate',$cate);
        $this->assign('order',$order);
        $this->assign('order_number',$order_number);
        $this->assign('owner_id',$owner_id['owner_id']);
        return view('gjmgrab');
    }


      /**
     * 师傅投标
     */
    public function tenders(){
    
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        //判断师傅是不是第一次抢单
        $param=input('post.');
        $uid=$param['uid'];
        $number=$param['order_number'];
        $where['worker_id']=$uid;
        $where['order_number']=$number;
        $list=Db::name("offer_total")->field('is_rob')->where($where)->find();
        $worker_id = Db::name('orders')->where('order_number',$number)->value('worker_id');
        if($worker_id==0 || $worker_id==session('id')){
            if($list['is_rob']==0 && $worker_id!=session('id')){
                if(request()->isAjax()){
                    $param = input('post.');
                    $order = new OfferModel();
                    $flag = $order->tender($param,$uid);
                    $total['worker_id'] = session('id');
                    $total['amount_engineer'] = $param['total'];
                    $total['order_number'] = $param['order_number'];
                    //查询发票税率
                    $rate = Db::name('config')->where('id',5)->field('value')->find();
                    //查询出师傅的平台服务费用
                    $res = Db::name('orders')->where('order_number',$total['order_number'])->field('platform_service,g_platform_service')->find();
                    //判断师傅是否缴纳保证金
                    $gets = Db::name('users_worker')->where('uid',$param['uid'])->field('guarantee')->find();
                    if(!empty($gets['guarantee'])){
                        $total['totals'] = $total['amount_engineer']*(1+$res['g_platform_service']+$rate['value']);
                    }else{
                        $total['totals'] = $total['amount_engineer']*(1+$res['platform_service']+$rate['value']);
                    }
                    $result = Db::name('offer_total')->insertGetId($total);
                    $data['work_step_service'] =1;
                    $data['work_step_number'] = 1;
                    $data['master_status'] = 2;
                    $order_number=$param['order_number'];
                    $rob=Db::name("orders")->field('rob_num')->where('order_number',$order_number)->find();
                    $rob_num=$rob['rob_num'];
                    $map['rob_num']=$rob_num+1;
                    $maps['is_rob']='1';
                    Db::name("orders")->where('order_number',$order_number)->update($map);
                    Db::name("offer_total")->where('order_number',$order_number)->update($maps);
                    $arr = Db::name('orders')->where('order_number',$param['order_number'])->update($data);
                    if($arr==0 || $arr){
                        return json(['code' => 200,'msg' =>'抢单成功']);
                    }else{
                        return json(['code' => 0,  'msg' =>'-1']);
                    }
                }
            }else{
                return json(array('code'=>0,'msg'=>'请勿重复抢单1！'));
            }
        }else{
            return json(array('code'=>0,'msg'=>'来晚一步，订单已经被别的师傅抢掉了！'));
        }

    }


    /**
     * 客户选师傅页面
     */
    public function calibrates($ornumber){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;
        $order = Db::name('orders')->where('order_number',$order_number)->field('contact_name,full_location,start_time')->find();
        $list = Db::name('replace')->where('order_number',$order_number)->field('brand,tender,budget,id')->select();
        $cate = array(); //声明一个空数组
        $total=null;  //声明一个空变量
        foreach($list as $l){
            $b['brand']=$l['brand'];
            $b['id'] = $l['id'];
            $b['budget'] = $l['budget'];
           
            $cate[]=$b;
            $total+= $l['budget'];
        }
        $evaluate = Db::name('offer_total')
            ->alias('o')
            ->join('users_worker u','u.uid = o.worker_id')
            ->where('o.order_number',$order_number)
            ->select();
        $this->assign('cate',$cate);
        $this->assign('total',$total);
        $this->assign('list',$list);
        $this->assign('order',$order);
        $this->assign('order_number',$order_number);
        $this->assign('evaluate',$evaluate);
        return view('calibrate');
    }

    /**
     * 客户选择师傅
     */
    public function gjmselects(){
        $uid=session('id');
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
        $offer = Db::name('offer')->where($where)->field('tender_cost')->select();
        $id = Db::name('replace')->where('order_number',$order_number)->field('id')->select();
        foreach($id as $k=>$ids){
            $offer[$k]['id'] = $ids['id'];
        }
        foreach($offer as $v){
            $arr =  Db::name('replace')->update(['id' => $v['id'],'tender_cost'=>$v['tender_cost'],'worker_id'=>$result]);
        }
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

        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    /**
     * 客户结算
     */
   public function settlements($ornumber,$url){
        header("Content-type:text/html;charset=utf-8");
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;
        $order = Db::name('orders')->where('order_number',$order_number)->field('contact_name,full_location,start_time')->find();
        $list = Db::name('replace')->where('order_number',$order_number)->field('brand,tender_cost,id')->select();
        //查询客户选择的师傅
        $where['is_invitation'] = 1;
        $where['order_number']=$order_number;
        $result = Db::name('orders')->where($where)->find();
        $wid = Db::name('orders')->where($where)->field('worker_id')->find();
        // 客户支付的价格,师傅收费+平台服务费+税费
        $wheres['order_number'] = $order_number;
        $wheres['worker_id'] =  $wid['worker_id'];
         //查询发票税率
        $rate = Db::name('config')->where('id',5)->field('value')->find();
        //查询出师傅的平台服务费用
        $res = Db::name('orders')->where('order_number',$order_number)->field('platform_service,g_platform_service')->find();
        //判断师傅是否缴纳保证金
        $gets = Db::name('users_worker')->where('uid',$wid['worker_id'])->field('guarantee')->find();
        $total = Db::name('offer_total')->where($wheres)->field('totals')->find();
        $cate = array(); //声明一个空数组
        foreach($list as $l){
          if(!empty($gets['guarantee'])){
              $b['tender_cost'] = $l['tender_cost']*(1+$res['g_platform_service']+$rate['value']);
          }else{
              $b['tender_cost'] = $l['tender_cost']*(1+$res['platform_service']+$rate['value']);
          }
            $b['id'] = $l['id'];
            $b['brand'] = $l['brand'];
            $cate[]=$b;
        }
        $worker_id = Db::name('replace')->where('order_number',$order_number)->field('worker_id')->find();
        $cha=Db::name('offer')->field('bj_offer.*,bj_replace.brand')->join('bj_replace','bj_replace.order_number=bj_offer.order_number','LEFT')->where('bj_offer.order_number',$order_number)->where('bj_offer.worker_id',$worker_id['worker_id'])->group('bj_offer.id')->select();
        $this->assign('cate',$cate);
        $this->assign('list',$list);
        $this->assign('order',$order);
        $this->assign('orders_id',$order_number );
        $this->assign('result',$result);
        $this->assign('total',$total['totals']);
        $this->assign('cha',$cha);
        $this->assign('order_number',$order_number);
        return view('settlements');
    }


    public function order_manage_client(){ 
            
            $uid=session('id');
            $ds_url=\think\Config::get('view_replace_str');
            
            if(empty($uid)){
                    $this->redirect($ds_url['__PUBLIC__'].'auth');
                }   
            $user = Db::name('users')->field('type')->where('id',$uid)->find();//获取当前登录者的账号类型       
            if($user['type']==2){
                $this->redirect($ds_url['__PUBLIC__'].'orders/master');//跳转师傅订单管理页面
            }
            
            $key = input('key');
            $map = [];
            $where['bj_orders.owner_id']=$uid;
            $where['bj_orders.is_del']=0;
            if($key&&$key!=="")
            {
                $map['bj_orders.order_number|bj_orders.full_location|bj_orders.location_ext|bj_orders.status'] = ['like',"%" . $key . "%"];   
                
                
            }       
            $Nowpage = input('get.page') ? input('get.page'):1;
            $limits = '5';// 获取总条数
            $count = Db::name('orders')->where($map)->where($where)->count();//计算总页面
            $allpage = intval(ceil($count / $limits));
            $user = new OrderclientModel();
            $lists = $user->getOrderWhere($map, $Nowpage, $limits,$uid);
             
            $this->assign('Nowpage', $Nowpage); //当前页
            $this->assign('allpage', $allpage); //总页数 
            $this->assign('val', $key);
            if(input('get.page'))
            {
                return json($lists);
            }
             
             
            
            return $this->fetch('order_manage_client');
    }

    /**
     * 客户需要支付的总费用
     */
    public function gjmtotal(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $data['order_number'] = input('post.number');
        $data['total_price'] = input('post.total');
        $list = Db::name('pay_price')->insertGetId($data);
        if($list){
            return json(array('code'=>200,'msg'=>''));
        }else{
            return json(array('code'=>0,'msg'=>''));
        }
    }

    /**
     * [coaming_master_presentation description]
     * @param  [type] $order_number [description]
     * @return [type]               [description]
     *更幻灯片师傅确认报告
     */
    public function replace_master_presentation($order_number){
        $uid=session('id');
        $ds_url=\think\Config::get('view_replace_str');
        if(empty($uid)){
        $this->redirect($ds_url['__PUBLIC__'].'auth');
        }
      header("Content-Type: text/html;charset=utf-8");
      $uid=session('id');
      $ds_where['receive_id']=$uid;
      $ds_where['status']='0';
      $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
      $this->assign('carr',$carr);

      $order_number = $order_number;
      $field='o.contact_name,o.location_ext,o.full_location,o.contact_phone,u.real_name,u.phone';
      $order = Db::name('orders')->alias('o')->field($field)->join('users u','u.id=o.worker_id')->where('o.order_number='.$order_number)->find();
      $list=Db::name('replace_report')->where('order_number',$order_number)->find();
      $lists=Db::name('replace_report')->where('order_number',$order_number)->select();
      
      if( empty($list['is_ok'])){
          $count=count($lists);
          $is_ok=0;
        }else{
          $count=0;
          $is_ok=$list['is_ok'];
        }
      $this->assign('order',$order);
      $this->assign('order_number',$order_number);
      $this->assign('list',$list);
      $this->assign('count',$count);
      $this->assign('is_ok',$is_ok);
      $this->assign('lists',$lists);
      return $this->fetch('replacer_master_presentation');
    }
     /**
      * [replace_ajaxpresentation description]
      * @return [type] [description]
      * 师傅施工报告ajaxForm
      */
    public function replace_ajaxpresentation(){
        $worker_id = session('id');
        $param = input('post.');
        //判断是否提交确认码
        if(array_key_exists('querenma',$param)){
            if($param['querenma']=='' || !preg_match("/^[0-9]{6}$/",$param['querenma'])){
                return json(['code'=>0,'data'=>'','msg'=>'请填写正确的确认码!']);
            }
            $querenma = Db::name('orders')->where('order_number',$param['order_number'])->value('querenma');
            if(md5($querenma) !== md5($param['querenma'])){
                return json(['code'=>0,'data'=>'','msg'=>'确认码不正确!']);
            }
            $ds_list=Db::name("orders")->field('step_type')->where('order_number',$param['order_number'])->find();
            if($ds_list['step_type']=='6'){
                     $ds_maps['work_step_number']='6';
                     Db::name("orders")->where('order_number',$param['order_number'])->update($ds_maps);
            }else{
                    $ds_maps['work_step_number']='9';
                    Db::name("orders")->where('order_number',$param['order_number'])->update($ds_maps);
            }
        }
        //给客户发送消息
        $owner_id=Db::name("orders")->field('owner_id')->where('order_number',$param['order_number'])->find();
        $map['message_type']='1';
        $map['source_id']=$worker_id;
        $map['receive_id']=$owner_id['owner_id'];
        $map['content']='师傅已经上传了更换幻灯片报告,点击查看';
        $map['link']=$param['link'];
        $map['status']='0';
        $map['sending_time']=date("Y-m-d H:i:s");
        Db::name('message_reminder')->insert($map);

        
        $list = Db::name('replace_report')->where('order_number', $param['order_number'])->select();
        if(empty($list)){//师傅第一次进来
            
            $data['img3'] = $param['img3'];
            $data['img4'] = $param['img4'];
            $data['img5'] = $param['img5'];
            $data['order_number']= $param['order_number'];
            $data['worker_id'] = $worker_id;
             foreach ($param['img1'] as $key => $value) {
                $data['img1']=$param['img1'][$key];
                $data['img2']=$param['img2'][$key];
                $data['texts']=$param['text'][$key];
                $info=  Db::name('replace_report')->insertGetId($data);
            }
            //改变客户的步骤
            $step = Db::name('orders')->where('order_number',$param['order_number'])->field('step_type')->find();
            if($step['step_type']==6){
               $maps['step_number']='8';
               $maps['status']='4';
            }else if($step['step_type']==7){
               $maps['step_number']='8';
               $maps['status']='4';
            }
            Db::name("orders")->where('order_number',$param['order_number'])->update($maps);
            if(false === $info){             
              return ['code' => 0, 'data' => '', 'msg' => '-1'];
            }else{
              return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
            }
        }else{//师傅不是第一次进来
            //先删除数据表数据，在把提交过来的额加入;
            Db::name('replace_report')->where('order_number',$param['order_number'])->delete();
            $data['img3'] = $param['img3'];
            $data['img4'] = $param['img4'];
            $data['img5'] = $param['img5'];
            $data['order_number']= $param['order_number'];
            $data['worker_id'] = $worker_id;
             foreach ($param['img1'] as $key => $value) {
                $data['img1']=$param['img1'][$key];
                $data['img2']=$param['img2'][$key];
                $data['texts']=$param['text'][$key];
                $info=  Db::name('replace_report')->insertGetId($data);
            }
            if(false === $info){             
              return ['code' => 0, 'data' => '', 'msg' => '-1'];
            }else{
              return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
            }
        }
        
    }
    /**
    * [survey_customer_presentation description]
    * @order_number  订单号
    * @return [type]               [description]
    * 客户更换幻灯片报告页面
    */
    public function replace_customer_presentation($order_number){
        $uid=session('id');
        $ds_url=\think\Config::get('view_replace_str');
        if(empty($uid)){
        $this->redirect($ds_url['__PUBLIC__'].'auth');
        }
        header("Content-Type: text/html;charset=utf-8");
          $uid=session('id');
          $ds_where['receive_id']=$uid;
          $ds_where['status']='0';
          $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
          $this->assign('carr',$carr);
         
          $order_number = $order_number;
          $field='o.contact_name,o.location_ext,o.full_location,o.contact_phone,u.real_name,u.phone';
          $order = Db::name('orders')->alias('o')->field($field)->join('users u','u.id=o.worker_id')->where('o.order_number='.$order_number)->find();
          $list=Db::name('replace_report')->where('order_number',$order_number)->find();
          $lists = Db::name('replace_report')->where('order_number',$order_number)->select();

          $this->assign('order',$order);
          $this->assign('order_number',$order_number);
          $this->assign('list',$list);
          $this->assign('lists',$lists);
        return $this->fetch('replacer_customer_presentation');
    }
     /**
     * [ajax_survey_feedback description]
     * @return [type] [description]
     * 客户反馈幻灯片ajax
     */
   public function ajax_replace_feedback(){ 
        $uname=session('ds_username');
        $uid=session('id');
        $order_number=input('order_number');
        $text=input('text');
        $link = input('link');
        $list=Db::name("replace_report")->where('order_number',$order_number)->find();

        //给师傅发信息
        $map['message_type']='1';
        $map['source_id']=$uid;
        $map['receive_id']=$list['worker_id'];
        $map['content']='订单号:'.$order_number.',用户:'.$uname.'<br/>发来更换幻灯片反馈内容:'.$text;
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

   /*
  *更换幻灯片师傅确认码AJAX
  */
  
      public function replace_confirmma($order_number){
         $order_number = input('order_number');
         $querenma = input('querenma');
         $field='querenma';
         $order = Db::name('orders')->field($field)->where('order_number='.$order_number)->find();
         if($order['querenma']==$querenma){
             $step = Db::name('orders')->where('order_number',$order_number)->field('step_type')->find();
                if($step['step_type']==6){
                   $data['work_step_number']='6';
                }else if($step['step_type']==7){
                  $data['work_step_number']='9';
                }
                $data['end_time'] = time();
            Db::name("orders")->where('order_number',$order_number)->update($data);
            return ['code' => 200, 'data' => '', 'msg' => 'ok'];
         }else{
           return ['code' => 0, 'data' => '', 'msg' => '确认码错误'];
         }
       }

}