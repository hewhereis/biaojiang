<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Purse extends Base
{
public function index(){
    //师傅ID
    $worker_id = session('id');
  //账户余额
    $balance = Db::name('users_worker')->where('uid',$worker_id )->field('balance,guarantee')->find();
    $price = $balance['balance']+$balance['guarantee'];
	$key = input('key');
	$map= [];
	if($key&&$key!=="")
	{
		$map['bj_orders.order_number'] = ['like',"%" . $key . "%"];          
	}
	
	$wheres['master_status']='5';
	$wheres['work_del']='0';
	$wheres['worker_id']=$worker_id;
	$Nowpage  = input('get.page') ? input('get.page'):1;
	$limits   = '5';// 获取总条数
	$count    = Db::name('orders')->where($wheres)->where($map)->count();//计算总页面
	

	$allpage  = intval(ceil($count / $limits));       
	$field='a.order_number,a.service_type_id,a.amount_total,a.start_time,a.end_time';
	$list=Db::name("orders")->alias('a')->field($field)->where($wheres)->where($map)->page($Nowpage, $limits)->group('a.id desc')->select();
	
	foreach($list as $k=>$v)
	{
		$list[$k]['start_time']=date('Y-m-d H:i:s',$v['start_time']);
		$list[$k]['end_time']=date('Y-m-d H:i:s',$v['end_time']);
	}  		
 
	if(input('get.page'))
	{
		return json($list);
     }
	
	$this->assign('balance',$price);
	$this->assign('guarantee',$balance['guarantee']);
	$this->assign('worker_id',$worker_id);
	$this->assign('Nowpage', $Nowpage); //当前页
	$this->assign('allpage', $allpage); //总页数 
	$this->assign('val', $key);

    return view('customer_center'); 
 }

  /**
   * 充值
   */
  public function personal_center_pay(){
    $uid = session('id');
    $this->assign('uid',$uid);
    return view('personal_center_pay');
  }
  /**
   * 充值加入数据表
   */
  public function money(){
    $data['money'] = input('post.total');
    $data['uid'] = input('post.uid');
    $data['create_time'] = time();
    $arr = Db::name('recharge')->insert($data);
    if($arr){
      return json(array('code'=>200,'msg'=>$data['create_time']));
    }else{
      return json(array('code'=>0,'msg'=>''));
    }
  }
  
  //充值扫码支付
  public function scan($uid,$t){
    $where['uid'] = $uid;
    $where['create_time'] = $t;
    $data = Db::name('recharge') ->where($where)->order('id desc')->find();
    if($data){
            $total = Db::name('recharge')->where('uid',$uid)->field('money')->order('id desc')->find();
            $qq=$total['money'];
            $service = '账户充值';
            $this->assign('qq',$qq);
            $this->assign('service',$service);
            $this->assign('uid',$uid);
            return view('scan');
     } 
  }
  //扫码充值成功后  加入数据表
  public function add_money(){
    $uid = input('post.uid');
    $data = Db::name('recharge') ->where('uid',$uid)->order('id desc')->field('money')->limit(1)->find();
    $balance = Db::name('users_worker')->where('uid',$uid )->field('balance')->find();
    $money = $data['money'] +$balance['balance'];
    $list = Db::name('users_worker')->where('uid',$uid)->update(['balance'=>$money]);
    if($list){
      return json(array('code'=>200,'msg'=>''));
    }else{
      return json(array('code'=>0,'msg'=>''));
    }
  }
  //jsapi 支付
  public function jsapi($total,$uid){
    $data = Db::name('recharge') ->where('uid',$uid)->order('id desc')->find();
    if($data){
     $total = Db::name('recharge')->where('uid',$uid)->field('money')->order('id desc')->find(); 
        $qq=$total['money'];
        $service = '账户充值';
            $this->assign('qq',$qq);
            $this->assign('service',$service);
            $this->assign('uid',$uid);
           return view('jsapi');  
    }
  }
  //  api充值成功后  加入数据表
  public function api_money(){
     $uid = input('post.uid');
     $total = input('post.total');//充值的钱数
     $balance = Db::name('users_worker')->where('uid',$uid )->field('balance')->find();
     $money = $total +$balance['balance'];
     $list = Db::name('users_worker')->where('uid',$uid)->update(['balance'=>$money]);
     if($list){
      return json(array('code'=>200,'msg'=>''));
    }else{
      return json(array('code'=>0,'msg'=>''));
    }
  }
   /**
    * 保障金页面
    */
   public function faith_deposit(){
    //查找是否交过保障金
    $uid = session('id');
    $guarantee = Db::name('users_worker')->where('uid',$uid)->value('guarantee');
    $this->assign('guarantee',$guarantee);
    return view('good_faith_deposit');
   }
   /**
    * 保障金充值页面
    */
   public function guarantee_pay(){
    $uid = session('id');
    $this->assign('uid',$uid);
    return view('guarantee_pay');
   }
   /**
    * 充值保障金
    */
   public function add_guarantee(){
        $data['guarantee'] = input('post.total');
        $data['uid'] = input('post.uid');
        $data['create_time'] = time();
        $arr = Db::name('guarantee')->insert($data);
        if($arr){
          return json(array('code'=>200,'msg'=>$data['create_time']));
        }else{
          return json(array('code'=>0,'msg'=>''));
        }
   }
   /**
    * 保障金扫码支付
    */
   public function b_scan($uid,$t){
    $where['uid'] = $uid;
    $where['create_time'] = $t;
    $data = Db::name('guarantee') ->where($where)->order('id desc')->select();
    if($data){
            $total = Db::name('guarantee')->where('uid',$uid)->field('guarantee')->order('id desc')->find();
            $qq=$total['guarantee'];
            $service = '保障金充值';
            $this->assign('qq',$qq);
            $this->assign('service',$service);
            $this->assign('uid',$uid);
             return view('b_scan');
     } 
  }
   /**
    * [adds_guarantee description]
    * @return [type] [description]
    * 更新数据表保障金
    */
  public function adds_guarantee(){
    $uid = input('post.uid');
    $data = Db::name('guarantee') ->where('uid',$uid)->order('id desc')->field('guarantee')->limit(1)->find();
    $guarantee = Db::name('users_worker')->where('uid',$uid )->field('guarantee')->find();
    $money = $data['guarantee'] +$guarantee['guarantee'];
    $list = Db::name('users_worker')->where('uid',$uid)->update(['guarantee'=>$money]);
    if($list){
      return json(array('code'=>200,'msg'=>''));
    }else{
      return json(array('code'=>0,'msg'=>''));
    }
  }

    //jsapi 保障金 充值
  public function b_jsapi($total,$uid){
    $data = Db::name('guarantee') ->where('uid',$uid)->order('id desc')->find();
    if($data){
     $total = Db::name('guarantee')->where('uid',$uid)->field('guarantee')->order('id desc')->find(); 
        $qq=$total['guarantee'];
        $service = '账户充值';
            $this->assign('qq',$qq);
            $this->assign('service',$service);
            $this->assign('uid',$uid);
       return view('b_jsapi');  
    }
  }
  //  api保障金充值成功后  加入数据表
  public function api_guarantee(){
     $uid = input('post.uid');
     $total = input('post.total');//充值的钱数
     $balance = Db::name('users_worker')->where('uid',$uid )->field('guarantee')->find();
     $money = $total +$balance['guarantee'];
     $list = Db::name('users_worker')->where('uid',$uid)->update(['guarantee'=>$money]);
     if($list){
      return json(array('code'=>200,'msg'=>''));
    }else{
      return json(array('code'=>0,'msg'=>''));
    }
  }
}

