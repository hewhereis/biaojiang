<?php
// +----------------------------------------------------------------------
// | 	//标匠评论表
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://bj-wang.com All rights reserved.
// +----------------------------------------------------------------------
// |
// +----------------------------------------------------------------------
// | Author: <@bj-wang.com>
// +----------------------------------------------------------------------1
namespace app\index\controller;
use think\Controller;
use think\Db;

use app\index\model\CommentsModel;
use app\Common\model\GetModel;
use app\Common\model\Set;

class Comments extends Base{

	//主任师傅评论客户页面
	public function master_evaluate($order_number){
		$owner_id = GetModel::getOrderClient($order_number);//获取订单内订单创建者id
		$owner_idname = GetModel::getUser($owner_id,'real_name');//获取订单内订单创建者名称
		$this->assign('ordernumber',$order_number);
		$id = GetModel::getSessionId();//获取当前用户的ID
		$worker_idname = GetModel::getUser($id,'real_name');//获取评论者名称
		$worker_id = GetModel::getOrderMasterId($order_number);//获取订单内主任师傅id
		$status = GetModel::getOrdersMasterStatus($order_number);
		$this->assign('owner_id',$owner_id);
		$comments =	new CommentsModel();
		if($id != $worker_id){

			if($status==5 || $status==6){
				$masterstatus = GetModel::getOrderGeneralMasterCommentStatus($order_number,$id,$worker_id);
				if($masterstatus==0){
					if(request()->isAjax()){
						$param = input('post.');
						$p =json_decode($param['arr']);
						foreach ($p as $key => $value) {
							$input[$key]['comments'] = $value->comments;
							$input[$key]['master_manifestation'] = $value->owner;
							$input[$key]['owner_id'] = $owner_id;
							$input[$key]['uid'] = $id;
							$input[$key]['order_id'] = $order_number;
							$input[$key]['username'] = $worker_idname;
							
						}
						$input[0]['adopt_id'] = $worker_id;//评论主任师傅
						$input[1]['adopt_id'] = $owner_id;

						$flag = $comments->CommentsAddAll($input);

						if($flag){
														// ->where('d_worker_id',$worker_id)
							// ->where('worker_id',$id)
							// ->where('state',1)
							// ->where('estate',1)
							$where=[
								'order_number'=>$order_number,
								'd_worker_id'=>$worker_id,
								'worker_id'=>$id,
								'state'=>1,
								'status'=>1
								];
							 $q = Set::setOrderGeneralMasterCommentStatus($where);
							//$q =Db::name('Common_master')->where($where)->setField('comment_status',1);
							var_dump($q);
							return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
						}
					}
					return $this->fetch('master_evaluate2');
				}else{
					echo '已评论';
					exit;
				}
			}
		}

		switch ($status) {
			case 1:
				echo 1;
			break;
			case 2:
				echo 2;
			break;
			case 3:
				echo 3;
			break;
			case 4:
				echo 4;
			break;
			case 5:
				//判断当前师傅是否是主任师傅
				if($id == $worker_id){	

					//找出当前订单的所有普通师傅
					$masterList = GetModel::getGeneralMaster($order_number,$id);
					if(empty($masterList)){

					}else{
						foreach ($masterList as $key => $value) {
							$masterList[$key]['workername'] = GetModel::getUser($value['worker_id'],'real_name');
						}	
					}

					if(request()->isAjax()){

						
						$last =count($masterList);
						
						$masterList[$last]['worker_id'] = $owner_id;
						$masterList[$last]['workername'] = $owner_idname;
						$param = input('post.');
						$p =json_decode($param['arr']);
						
						foreach ($masterList as $k => $v) {
							$s = 'worker_id'.$v['worker_id'];
							$input[$k]['master_manifestation'] = $p[$k]->$s; 
							$input[$k]['adopt_id'] =$v['worker_id']; 
							$input[$k]['uid'] =$id; 
							$input[$k]['owner_id'] =$owner_id; 
							$input[$k]['username'] =$worker_idname; 
							$input[$k]['order_id'] =$order_number; 
							$input[$k]['comments'] =htmlspecialchars($p[$k]->comments); 
							
						}
						// var_dump($input);
						$flag = $comments->CommentsAddAll($input);
						if($flag){
							Db::name('orders')->where('order_number',$order_number)->where('worker_id',$id)->where('owner_id',$owner_id)->setField('master_status',7);
							return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
						}
					}

					$this->assign('masterlist',$masterList);
					$this->assign('masterlist1',json_encode($masterList));
					return $this->fetch();
					
				}else{
						
					exit;
				}
			break;
			case 6:
				echo 6;
			break;
			case 7:
				echo 7;
			break;
			case 8:
				echo 8;
			break;
			case 0:
				echo 0;
			break;
			default:
				echo "不存在！";
			break;
		}
	}

	//客户评价师傅页面
	public function client_evaluate($order_number){
		$id = GetModel::getSessionId();//获取当前用户的ID
		$status = GetModel::getOrdersStatus($order_number);
		switch ($status) {
			case 1:
				echo 1;
			break;
			case 2:
				echo 2;
			break;
			case 3:
				echo 3;
			break;
			case 4:
				echo 4;
			break;
			case 5:
				$worker_id = GetModel::getOrdersMaster($order_number); //获取该订单的主任师傅id
				$workerName = GetModel::getUser($worker_id,'real_name');//获取该订单的主任师傅的真是名称
				$this->assign('name',$workerName);//
				$this->assign('orders',$order_number);//
				if(request()->isAjax()){
					$param = input('post.');
					$param['comments'] =htmlspecialchars($param['comments']); //转义留言内容
					$param['order_id'] =$order_number; //订单号
					$param['uid'] =$id; //评论人的ID
					$param['owner_id'] =$id; //订单创建人的id
					$param['adopt_id'] =$worker_id; //被评论人的id
					$param['username'] =$workerName; //被评论人的名称
					$comments =	new CommentsModel();
					$flag = $comments->CommentsAdd($param);
					if($flag){
						Db::name('orders')->where('order_number',$order_number)->where('worker_id',$worker_id)->where('owner_id',$id)->setField('status',7);
						return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
					}
						return json(['code'=>'200','data'=>'6','msg'=>'出错了！']);
				}
				return $this->fetch();
			break;
			case 6:
				echo 6;
			break;
			case 7:
				echo 7;
			break;
			case 8:
				echo 8;
			break;
			case 0:
				echo 0;
			break;
			default:
				echo "不存在！";
			break;
		}
		exit;
		
	}

	public function client_evaluate_add(){

		if(request()->isAjax()){
			var_dump(input());
		}

	}


}