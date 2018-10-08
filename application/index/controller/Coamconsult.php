<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Config;
use app\index\model\Users;
use app\index\model\CoamingReselectModel;
use app\index\model\OfferModel;
class Coamconsult extends Base
{
	/**
	 * [choose_coaming description]
	 * @param  [type] $ornumber [description]
	 * @param  [type] $wid      [description]
	 * @return [type]           [description]
	 * 点击挑选主任师傅页面
	 */
	public function choose_coaming($ornumber,$wid){
         $uid = session('id');//当前登陆者ID
		     $order_number = $ornumber ;
         $worker_id = $wid;
         //定义一个变量
         $data = 'choose_coaming';
         if($worker_id==0){
           $this->assign('worker_id','');
         }else{
           $this->assign('worker_id',$worker_id);
         }
         $this->assign('order_number',$order_number);
         $this->assign('data',$data);
         $this->assign('uid',$uid);
		return view('coaming_choose_director_master');
	}
	/**
	 * [coaming_director_master description]
	 * @return [type] [description]
	 * 客户咨询主任师傅页面
	 */
	public function coaming_director_master($ornumber,$wid){
		//订单号
        $order_number=$ornumber;
        //师傅id
        $worker_id =$wid;
        //客户登陆id
        $uid = session('id');
        //查询orders表中的地址 时间等；
        $order = Db::name('orders')->where('order_number='.$order_number)->field('owner_id,owner_name,full_location,start_time')->find();
        //查看数据报价表有没有该订单号的值
        $offer = Db::name('offer')->where('order_number',$order_number)->select();
        if(empty($offer)){
           //判断是围板还是搭建
           $coaming= Db('orders_coaming')->where('order_number',$order_number)->field('constructdate,dismantledate')->find();
           if($coaming['constructdate'] && $coaming['dismantledate']){//围板搭建和拆除
              $name = '围板搭建和拆除';
              $this->assign('coaming',$name);
           }else if($coaming['constructdate']){
              $name = '围板搭建';
              $this->assign('coaming',$name);
           }else if($coaming['dismantledate']){
               $name = '围板拆除';
              $this->assign('coaming',$name);
           }
        }else{
           $coaming =Db::name('orders_coaming')
                    ->alias('o')
                    ->join('offer m','o.order_number=m.order_number')
                    ->field('o.constructdate,o.dismantledate,o.id,m.tender_cost')
                    ->where('o.order_number',$order_number)
                    ->find();
           if($coaming['constructdate'] && $coaming['dismantledate']){//围板搭建和拆除
              $name = '围板搭建和拆除';
              $this->assign('coaming',$name);
              $this->assign('tender_cost',$coaming['tender_cost']);
           }else if($coaming['constructdate']){
              $name = '围板搭建';
              $this->assign('coaming',$name);
              $this->assign('tender_cost',$coaming['tender_cost']);
           }else if($coaming['dismantledate']){
               $name = '围板拆除';
              $this->assign('coaming',$name);
              $this->assign('tender_cost',$coaming['tender_cost']);
           }        
        }
        //查看是否勾选时间
        $gettime = Db::name('offer_total')->where('order_number',$order_number)->field('gettime')->find();
        $time = date('Y-m-d H:i:s', $order['start_time']);
        $total = Db::name('offer_total')->where('order_number',$order_number)->field('totals')->find();  
       //查询是否上交咨询费
        $price = Db::name('orders')->where('order_number',$order_number)->field('pay,owner_id')->find();
        //聊天
        $userinfo = Db::name('users')->where('id='.$price["owner_id"])->field('username,type,img')->find();
        if(empty($userinfo['img'])){//聊天默认头像
                $this->assign('useridimageurl',"__PUBLIC__static/index/images/moren.jpg");
        }else{
                $this->assign('useridimageurl',"__DsQINiu__".$userinfo["img"]);
        }
        $this->assign('order_number',$order_number);
        $this->assign('worker_id',$worker_id);
        $this->assign('uid',$uid);
        $this->assign('time',$time);
        $this->assign('price',$price);
        $this->assign('offer',$offer);
        $this->assign('total',$total);
        $this->assign('userid',$price["owner_id"]);
        $this->assign('owner_id',$order["owner_id"]);
        $this->assign('owner_name',$order["owner_name"]);
       
        $this->assign('usertype',"1");
        $this->assign('username',$userinfo["username"]);
        $workersinfo = Db::name('users')->where('id='.$worker_id)->field('img')->find();  
        if(empty($workersinfo['img'])){//聊天默认头像
             $this->assign('customerimageurl',"__PUBLIC__static/index/images/moren.jpg");
        }else{
             $this->assign('customerimageurl',"__DsQINiu__".$workersinfo["img"]);
        }   
        $this->assign('gettime',$gettime['gettime']);
       return view('coaming_client_consult_director_master');
	}
	/**
	 * 主任师傅应答客户页面
	 */
	public function coaming_index($ornumber,$wid){
	    $order_number = $ornumber;
        $worker_id = $wid;
        $userid= input('masterid');
        $customerid  = input('customerid');
        $orderid = input('orderid');
        $useridimageurl=Config::get('view_replace_str.__IMG__').Users::getimageurl($userid);
        $customerimageurl=Config::get('view_replace_str.__IMG__').Users::getimageurl($customerid);
        //查询数据表有没有需要的普通师傅个数
        $num = Db::name('orders')->where('order_number',$order_number)->field('num')->find();
        $order = Db::name('orders')
           ->alias('o')
           ->join('orders_coaming a','o.order_number=a.order_number')
           ->where('o.order_number='.$order_number)
           ->field('o.owner_id,o.owner_name,o.full_location,o.start_time,a.brand')
           ->find();
            //判断是围板还是搭建
       $coaming= Db('orders_coaming')->where('order_number',$order_number)->field('constructdate,dismantledate')->find();
       if($coaming['constructdate'] && $coaming['dismantledate']){//围板搭建和拆除
          $name = '围板搭建和拆除';
          $this->assign('coaming',$name);
       }else if($coaming['constructdate']){
          $name = '围板搭建';
          $this->assign('coaming',$name);
       }else if($coaming['dismantledate']){
           $name = '围板拆除';
          $this->assign('coaming',$name);
       }
       $time=   date('Y-m-d H:i:s', $order['start_time']);
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
	      $this->assign('num',$num);
        $this->assign('price',$price);
	      $this->assign('owner_id',$order["owner_id"]);
        $this->assign('owner_name',$order["owner_name"]);
        $this->assign('time',$time);
		return view('coaming_index');
	}
	/**
     * 点击重新选择主任师傅
     */
    public function coaming_reselect(){
    	$order_number = input('post.order_number');
	    $data = new CoamingReselectModel();
	    $flag = $data->coaming_reselect($order_number);
	    return json(['code' => $flag['code'], 'number' => $flag['number']]);
    }
     /**
     * 客户提交订单
     */
    public function coaming_consult_confirm(){
    	//师傅报价
	    $price=input('post.money');
	    $order_number = input('post.order_number');
	    $worker_id = input('post.worker_id');
	    $zongJia = input('post.zongjia1');
	    $order = Db::name('orders_coaming')->where('order_number',$order_number)->update(['tender_cost' => $price]); 
	    $total=$price;
	    $lists['amount_engineer'] = $zongJia;
	    $lists['totals'] = $total;
	    $lists['worker_id'] = $worker_id;
	    $lists['order_number'] = $order_number;
	    $list = Db::name('offer_total')->insert($lists);
	    $orders = Db::name('orders')->where('order_number',$order_number)->update(['amount_engineer'=>$total,'is_invitation'=>1,'worker_id'=>$worker_id,'master_status'=>2,'status'=>2,'step_number'=>5,'work_step_number'=>4]);
      if($orders || $orders==0){
         return json(array('code'=>200,'msg'=>''));
      }else{
         return json(array('code'=>0,'msg'=>''));
      }
    }
     /**
     * 师傅客户聊天 点击发送按钮
     */
    public function coaming_send(){
      $usermsg = input('post.usermsg');
      if($usermsg=='信息全面，确定可以承接，请直接下单。'$usermsg==1){
            $order_number = input('post.order_number');
            $worker_id = input('post.worker_id');
            //师傅是否确定时间
            $gettime = input('post.gettime');
            //师傅确定的施工时间
            $project_time = strtotime(input('post.project_time'));
            //师傅对项目报的价格
            $rate=input('post.rate');
            $money =  $rate;
            $arr = Db::name('orders_coaming')->where('order_number',$order_number)->update(['tender_cost'=>$rate,'worker_id'=>$worker_id]);  
            if($arr || $arr==0){
            //查询发票税率
            $rates = Db::name('config')->where('id',5)->field('value')->find();
            $list = Db::name('orders_coaming')->where('order_number',$order_number)->field('tender_cost')->select();
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
	    * 需要普通师傅个数
	    */
     public function coaming_number(){
    	
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