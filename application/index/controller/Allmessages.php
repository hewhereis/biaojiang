<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\AllmessagesModel;
use app\index\model\AuthModel;
class Allmessages extends Base
{
	/*
	*消息首页
	*2017-8-17
	*xwf
	*/
	public function index(){ 
			
			$uid=session('id');
			$ds_where['receive_id']=$uid;
			$ds_where['message_type']='1';
			$ds_where['status']='0';
			$system=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者系统未读消息
			$ds_wheres['receive_id']=$uid;
			$ds_wheres['message_type']='2';
			$ds_wheres['status']='0';
			$order=Db::name("message_reminder")->where($ds_wheres)->count();//统计当前登录者订单未读消息
			$this->assign('system',$system);
			$this->assign('order',$order);	
			return $this->fetch('index');
	}
	/*
	*系统消息
	*2017-8-17
	*xwf
	*/
	public function system_messages(){ 
	
			$uid=session('id');
			$key = input('key');
			$map = [];
			$ds_where['receive_id']=$uid;
			$ds_where['message_type']='1';	
			if($key&&$key!=="")
			{
				$map['content'] = ['like',"%" . $key . "%"];  
						
				}       
			$Nowpage  = input('get.page') ? input('get.page'):1;
			$limits   = '5';// 获取总条数
			$count    = Db::name('message_reminder')->where($map)->where($ds_where)->count();//计算总页面
			$allpage  = intval(ceil($count / $limits));
			$user     = new AllmessagesModel();
			$lists    = $user->getOrderWhere($map, $Nowpage, $limits,$uid);	 
			$this->assign('Nowpage', $Nowpage); //当前页
			$this->assign('allpage', $allpage); //总页数 
			$this->assign('val', $key);
			
			if(input('get.page'))
			{
				return json($lists);
			} 
			

			return $this->fetch('system_messages');
	}
	
	/*
	*订单消息
	*2017-8-17
	*xwf
	*/
	public function order_messages(){ 
			
			$uid=session('id');
			$key = input('key');
			$map = [];
			$ds_where['receive_id']=$uid;
			$ds_where['message_type']='2';				
			if($key&&$key!=="")
			{
				$map['content'] = ['like',"%" . $key . "%"];  
						
				}       
			$Nowpage  = input('get.page') ? input('get.page'):1;
			$limits   = '5';// 获取总条数
			$count    = Db::name('message_reminder')->where($map)->where($ds_where)->count();//计算总页面
			$allpage  = intval(ceil($count / $limits));
			$user     = new AllmessagesModel();
			$lists    = $user->getOrderWheres($map, $Nowpage, $limits,$uid);

            $master     = new AuthModel();
			$is_master   = $master->is_auth($uid);
			
			$this->assign('Nowpage', $Nowpage); //当前页
			$this->assign('allpage', $allpage); //总页数 
			$this->assign('val', $key);
			$this->assign('is_master', $is_master);
			if(input('get.page'))
			{
				return json($lists);
			} 

			return $this->fetch('order_messages');
	}
	/*
	*判断消息点击变已读
	*2017-8-17
	*xwf
	*/
	public function read_messages(){ 
	
				$param = input('post.');
				$id = input('post.id');
				$map['status']=1;
				$where['id']=$id;
				$lists=Db::name("message_reminder")->where($where)->update($map);
				if(!empty($lists)){
					return ['code' => 200, 'data' => '', 'msg' => ''];				 
				}else{
					return ['code' => 0, 'data' => '', 'msg' => ''];
						
				}
			
	}
	/*
	*消息删除
	*2017-8-17
	*xwf
	*/
	public function del_messages()
    {
        $id   = input('param.id');
        $ad   = new AllmessagesModel();
        $flag = $ad->delSer($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
	

	
}
