<?php
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://bj-wang.com All rights reserved.
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | Author: <@bj-wang.com>
// +----------------------------------------------------------------------
namespace app\index\controller;
use app\admin\controller\User;
use think\Controller;
use think\Config;
use app\index\model\Users;
use app\index\model\ReplacerReselectModel;
use app\index\model\OfferModel;
use think\Db;
class Replacer extends Base{
    /**
     * [touching description]
     * @orderIds  订单号
     * @time 2017-11-07
     * 更换幻灯片核单报告
     */
    public function touching($orderIds){
        $orderids = $orderIds;  //接收传入进来的订单号
        // 在订单主表找到该订单是否需要核单报告
        $is_bomb= Db::name('orders')->where('order_number',$orderids)->value('is_bomb');
        if($is_bomb == 1){
            $p = null;
            $list = Db::name('touching_report')->where('order_number',$orderids)->select();
            if($list){
                $where = ['order_number'=>$orderids]; // 设置查找条件
                $tou = Db::name('replace')->where($where)->select(); // 找出数据
                foreach ($tou as $k1 => $v1) {
                    $tou[$k1]['service_type_id_name'] = Db::name('service')->where('id',$tou[$k1]['service_type_id'])->value('name'); // 找出对应的名称
                    $tou[$k1]['l1_category_name'] = $tou[0]['brand'];
                }
                foreach($list as $key=>$val){
                    $tou[$key]['content'] = $val['content'];
                    $tou[$key]['imagesids'] = $val['imagesids'];
                    $tou[$key]['signature_id'] = $val['signature_id'];
                }
                $p = 1;
            }else{
                $where = ['order_number'=>$orderids]; // 设置查找条件
                $tou = Db::name('replace')->where($where)->select(); // 找出数据
                foreach ($tou as $k => $v) {
                    $tou[$k]['service_type_id_name'] = Db::name('service')->where('id',$tou[$k]['service_type_id'])->value('name'); // 找出对应的名称
                    $tou[$k]['l1_category_name'] = $tou[0]['brand'];
                }
            }
        }else{
            exit;
        }
        $owner_id = Db::name('orders')->where('order_number',$orderIds)->value('owner_id');
        $this->assign('p',$p);
        $this->assign('ordernumber',$orderIds);
        $this->assign('owner_id',$owner_id);
        $this->assign('tou',$tou);
        return view('touching');
    }
    /**
     * [uplatetouching description]
     * @order_number  订单号
     * @time 2017-11-07
     * 编辑更换幻灯片的核单报告
     */
    public function uplatetouching($order_number){
        $orderNumber = $order_number;
        $is_bomb= Db::name('orders')->where('order_number',$orderNumber)->value('is_bomb');
        if($is_bomb == 1){
            $where = ['order_number'=>$orderNumber]; // 设置查找条件
            $tou = Db::name('replace')->where($where)->select(); // 找出数据
            foreach ($tou as $k => $v) {
                $tou[$k1]['service_type_id_name'] = Db::name('service')->where('id',$tou[$k1]['service_type_id'])->value('name'); // 找出对应的名称
                $tou[$k1]['l1_category_name'] = $tou[0]['brand'];
            }
        }else{
            $this->success('index/index');
            return ;
        }
        $list = Db::name('touching_report')->where('order_number',$orderNumber)->select();
        foreach($list as $key=>$value){
            $list[$key]['imagesids'] = explode(',',$list[$key]['imagesids']);
            foreach ($list[$key]['imagesids'] as $k => $v) {
                $list[$key]['imagesids'][$k]=Db::name('imgs')->where('id',$v)->value('image');
            }
        }
        foreach ($tou as $x => $y) {
            $list[$x]['l1_category_name'] = $y['l1_category_name'];
            $list[$x]['l2_category_name'] = $y['l2_category_name'];
        }
        $this->assign('list',$list);
        return $this->fetch();
    }
     /**
      * [client_touching description]
      * @order_number 订单号 
      * @time 2017-11-07
      * 客户看到师傅填写的更换幻灯片的核单报告
      */
    public function client_touching($order_number){
        $l = Db::name('touching_report')->where('order_number',$order_number)->select();
        if($l){
            $orderNumber = $order_number;
            $is_bomb= Db::name('orders')->where('order_number',$orderNumber)->value('is_bomb');
            if($is_bomb == 1){
                $where = ['order_number'=>$orderNumber]; // 设置查找条件
                $tou = Db::name('replace')->where($where)->select(); // 找出数据
                foreach ($tou as $k1 => $v) {
                    $tou[$k1]['service_type_id_name'] = Db::name('service')->where('id',$tou[$k1]['service_type_id'])->value('name'); // 找出对应的名称
                    $tou[$k1]['l1_category_name'] = $tou[0]['brand'];
                }
            }else{
                $this->success('index/index');
                return ;
            }
            $list = Db::name('touching_report')->where('order_number',$orderNumber)->select();
            foreach ($tou as $x => $y) {
                $list[$x]['l1_category_name'] = $y['l1_category_name'];
            }
            $this->assign('list',$list);
            $this->assign('imgurl',Db::name('signature')->where('id',$list[0]['user_signature_id'])->where('order_number',$list[0]['order_number'])->value('image'));
            return $this->fetch();
        }else{
            echo "师傅还没提交";
        }
    }
    /**
     * 挑选主任师傅
     */
    public function choose($ornumber,$wid){
        $order_number = $ornumber ;
        $worker_id = $wid;
        //定义一个变量
        $data = 'gjmchoose_wid';
        if($worker_id==0){
            $this->assign('worker_id','');
        }else{
            $this->assign('worker_id',$worker_id);
        }
        $this->assign('order_number',$order_number);
        $this->assign('data',$data);
        return view('install_choose_director_master');
    }
    /**
     * 客户咨询主任师傅
     */
    public function install_director_master($ornumber,$wid){
          //订单号
        $order_number=$ornumber;
        //师傅id
        $worker_id =$wid;
        //客户登陆id
        $uid = session('id');
        $order = Db::name('orders')->where('order_number='.$order_number)->field('owner_id,owner_name,full_location,start_time')->find();
        //查看数据报价表有没有该订单号的值
        $offer = Db::name('offer')->where('order_number',$order_number)->select();
        if(empty($offer)){
          $list =Db::name('replace')->where('order_number',$order_number)->field('brand,id')->select();
        }else{
          $list =Db::name('replace')
              ->alias('o')
              ->join('offer m','o.order_number=m.order_number')
              ->field('o.brand,o.id,m.tender_cost,m.id as m_id')
              ->where('o.order_number',$order_number)
              ->group('m.id')
              ->select();
        }  
        //查看是否勾选时间
        $gettime = Db::name('offer_total')->where('order_number',$order_number)->field('gettime')->find();
        $cate = array();//声明一个空变量
        $b = null;
        foreach($list as $l){           
            if(!empty($offer)){
              $b['tender_cost'] = $l['tender_cost'];
            } 
            $b['brand'] =$l['brand'];  
            $b['id'] = $l['id'];
            
            $cate[]=$b;       
        } 
        $time=   date('Y-m-d H:i:s', $order['start_time']);
        $total = Db::name('offer_total')->where('order_number',$order_number)->field('totals')->find();
        //查询是否上交咨询费
        $price = Db::name('orders')->where('order_number',$order_number)->field('pay,owner_id')->find();
        $this->assign('order_number',$order_number);
        $this->assign('worker_id',$worker_id);
        $this->assign('order',$order);  
        $this->assign('cate',$cate);
        $this->assign('cate1',$order_number.'category');
        $this->assign('cate2',$order_number.'commodity');
        $this->assign('total',$total['totals']);
        $this->assign('price',$price);
        $this->assign('uid',$uid);
        $this->assign('time',$time);
        $this->assign('offer',$offer);
        $this->assign('gettime',$gettime['gettime']);
        $userinfo = Db::name('users')->where('id='.$price["owner_id"])->field('username,type,img')->find();
         if(empty($userinfo['img'])){//聊天默认头像
           $this->assign('useridimageurl',"__PUBLIC__static/index/images/moren.jpg");
        }else{
           $this->assign('useridimageurl',"__DsQINiu__".$userinfo["img"]);
        }
        $this->assign('usertype',"1");
        $this->assign('userid',$price["owner_id"]);
        $this->assign('username',$userinfo["username"]);
        $this->assign('owner_id',$order["owner_id"]);
        $this->assign('owner_name',$order["owner_name"]);
        $workersinfo = Db::name('users')->where('id='.$worker_id)->field('img')->find();
        if(empty($workersinfo['img'])){//聊天默认头像
           $this->assign('customerimageurl',"__PUBLIC__static/index/images/moren.jpg");
        }else{
           $this->assign('customerimageurl',"__DsQINiu__".$workersinfo["img"]);
        }    
      return $this->fetch('install_client_consult_director_master');
    }
    /**
     * 主任师傅应答客户页面
     */
    public function install_index($ornumber,$wid){
        $order_number= $ornumber;
        $worker_id = $wid;
        //得到交易双方的id(师傅和客户)。
        $userid= input('masterid');
        $customerid  = input('customerid');
        $orderid = input('orderid');
        $useridimageurl=Config::get('view_replace_str.__IMG__').Users::getimageurl($userid);
        $customerimageurl=Config::get('view_replace_str.__IMG__').Users::getimageurl($customerid);
        //查询数据表有没有需要的普通师傅个数
        $num = Db::name('orders')->where('order_number',$order_number)->field('num')->find();
        $order = Db::name('orders')
            ->alias('o')
            ->join('replace a','o.order_number=a.order_number')
            ->where('o.order_number='.$order_number)
            ->field('o.owner_id,o.owner_name,o.full_location,o.start_time,a.brand')
            ->find();
        $time=   date('Y-m-d H:i:s', $order['start_time']);
        $this->assign('time',$time);
        $list = Db::name('replace')->where('order_number='.$order_number)->field('brand,id')->select();
        $cate = array();
        foreach($list as $l){
          $b['id'] = $l['id'];
          $b['brand']=$l['brand'];
          $cate[]=$b;
        }
        $userinfo = Db::name('users')->where('id='.$worker_id)->field('username,type,img')->find();
        if(empty($userinfo['img'])){//聊天默认头像
           $this->assign('useridimageurl',"__PUBLIC__static/index/images/moren.jpg");
        }else{
           $this->assign('useridimageurl',"__DsQINiu__".$userinfo["img"]);
        }           
        $this->assign('usertype',"2");
        $this->assign('userid',$worker_id);
        $this->assign('username',$userinfo["username"]);
        $customerinfo = Db::name('users')->where('id='.$order["owner_id"])->field('img')->find();
        if(empty($customerinfo['img'])){//聊天默认头像
           $this->assign('customerimageurl',"__PUBLIC__static/index/images/moren.jpg");
        }else{
          $this->assign('customerimageurl',"__DsQINiu__".$customerinfo["img"]);
        }    
        $price = Db::name('orders')->where('order_number',$order_number)->field('pay')->find();
        $this->assign('order_number',$order_number);
        $this->assign('worker_id',$worker_id);
        $this->assign('order',$order);
        $this->assign('cate',$cate);
        $this->assign('num',$num);
        $this->assign('price',$price);
        $this->assign('owner_id',$order["owner_id"]);
        $this->assign('owner_name',$order["owner_name"]);
        return view('install_index');
    }
    /**
     * 点击重新选择主任师傅
     */
    public function install_reselect(){
        $order_number = input('post.order_number');
        $data = new ReplacerReselectModel();
        $flag = $data->reselects($order_number);
        return json(['code' => $flag['code'], 'number' => $flag['number']]);
    }
    /**
     * 师傅客户聊天 点击发送按钮
     */
    public function install_send(){
        $usermsg = input('post.usermsg');
       if($usermsg=='信息全面，确定可以承接，请直接下单。'||$usermsg==1){
                  $order_number = input('post.order_number');
                  $worker_id = input('post.worker_id');
                  //师傅是否确定时间
                  $gettime = input('post.gettime');
                  //师傅确定的施工时间
                  $project_time = strtotime(input('post.project_time'));
                    //价格
                    $rate=explode(',',input('rate'));
                    array_pop($rate);
                    //ID
                    $ids=explode(',',input('ids'));
                    array_pop($ids);
                    $data['id']=$ids;
                    $data['tender_cost']=$rate;
                    $keys = array_keys($data);          
                    $count1 = count($keys);
                    $count2 = count($data[$keys[0]]);        
                    for ($i=0; $i < $count2; $i++) {
                        for ($j=0; $j < $count1; $j++) {
                              $new_arr[$i][$keys[$j]] = $data[$keys[$j]][$i];        
                        }           
                    }; 
                    $money=null; 
                    foreach ($new_arr as $k=>$v){
                    $money+= $v['tender_cost'];
                    $arr = Db::name('replace')->update(['id' => $v['id'],'tender_cost'=>$v['tender_cost'],'worker_id'=>$worker_id]);  
                    }  
                    if($arr || $arr==0){
                    //查询发票税率
                    $rates = Db::name('config')->where('id',5)->field('value')->find();
                    $list = Db::name('replace')->where('order_number',$order_number)->field('tender_cost')->select();
                    //查看师傅是否缴纳保证金
                    $gets = Db::name('users_worker')->where('uid',$worker_id)->field('guarantee')->find();
                    if(!empty($gets['guarantee'])){
                       $platform_services = Db::name('config')->where('id',4)->field('value')->find();//交完保证金的平台服务费
                    foreach ($list as $key => $val) {
                    $aa[$key] = $val['tender_cost']*(1+$rates['value']+$platform_services['value']);
                       }
                    }else{
                       $platform_service = Db::name('config')->where('id',3)->field('value')->find();//没交保证金的平台服务费
                    foreach ($list as $key => $val) {
                    $aa[$key] = $val['tender_cost']*(1+$rates['value']+$platform_service['value']);
                       }
                    }
                    $bb=null;
                    foreach ($aa as $k => $v) {
                    $cc['order_number'][$k] = $order_number;
                    $cc['tender_cost'][$k] = $v;
                    $bb+=$v;
                    }
                  //师傅提交过来的价钱还有时间加入师傅报价表
                  $info = new OfferModel();
                  $flag = $info->send($cc,$worker_id,$bb,$money,$order_number,$gettime,$project_time);
            return json(array('code'=>200,'msg'=>'','aa'=>$aa,'bb'=>$bb));
          }else{
            return json(array('code'=>0,'msg'=>'更改价格失败'));
         }
      }else{
        return json(array('code'=>400,'msg'=>'','aa'=>null,'bb'=>''));
    }
   
  }
    /**
     * 客户提交订单
     */
    public function install_consult_confirm(){
        //师傅报价
        $price=input('post.zongjia1');
        $order_number = input('post.order_number');
        $worker_id = input('post.worker_id');
        $zongJia = input('post.zongjia1');
        $order = Db::name('replace  ')->where('order_number',$order_number)->update(['tender_cost' => $price]);
        $total=$price;
        $orders = Db::name('orders')->where('order_number',$order_number)->update(['amount_engineer'=>$total,'is_invitation'=>1,'worker_id'=>$worker_id,'master_status'=>2,'status'=>2,'step_number'=>5,'work_step_number'=>4]);
        if($orders || $orders==0){
            return json(array('code'=>200,'msg'=>''));
        }else{
            return json(array('code'=>0,'msg'=>''));
        }
    }
    /**
     * 需要普通师傅个数
     */
    public function install_number(){
        $order_number = input('post.order_number');
        $num = input('post.num');
        $data = Db::name('orders')->where('order_number',$order_number)->update(['num'=>$num]);
        if($data || $data==0){
            return json(array('code'=>200,'msg'=>''));
        }else{
            return json(array('code'=>0,'msg'=>''));
        }
    }

}