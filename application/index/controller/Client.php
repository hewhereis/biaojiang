<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\ClientModel;


class Client extends Base{

	public function index(){

	}

	public function client_affirm_accomplish($order_number){
		$orderNumber = $order_number;
		$report = Db::name('master_report')->where('order_number',$orderNumber)->select();//查到维修表里面的数据
		if($report){
		$doorpics = Db::name('imgs')->field('image')->where('id',$report[0]['doorpics'])->find();//查找门头照片
		$signrecvpics = Db::name('imgs')->field('image')->where('id',$report[0]['signrecvpics'])->find();//查找维修签收单照片
		$overviewpics = explode(',',$report[0]['overviewpics']);
		$overviewpics = Db::name('imgs')->field('image')->where('id','in',$overviewpics)->select();//查找装柜全景照片
		$beforeAfterDetials = [];
		foreach($report as $k => $v){
			$beforeAfterDetials[$k]['before'] = Db::name('imgs')->field('image')->where('id',$v['beforepics'])->find();
			$beforeAfterDetials[$k]['after'] = Db::name('imgs')->field('image')->where('id',$v['afterpics'])->find();
			$beforeAfterDetials[$k]['detials'] = $v['detials'];

		}

			if($report[0]['user_sign']!=''){
			$report[0]['user_sign'] = Db::name('signature')->where('id',$report[0]['user_sign'])->value('image');

			}
			if($report[0]['master_sign']!=''){
				$report[0]['master_sign'] = Db::name('signature')->where('id',$report[0]['master_sign'])->value('image'); 
			}


		$this->assign('report',$report);//维修表里面的数据

		$this->assign('doorpics',$doorpics);//查找门头照片
		$this->assign('signrecvpics',$signrecvpics);//查找维修签收单照片
		$this->assign('overviewpics',$overviewpics);//查找装柜全景照片
		$this->assign('info',$beforeAfterDetials);//查找装柜全景照片

		return $this->fetch();
	}else{
		echo '师傅还没上传';
	}
		
	}

	public function update_client_affirm_accomplish($order_number){
		if(request()->isAjax()){
			$orderNumber = $order_number;
			$param = input('post.');
			$row = Db::name('master_report')->where('order_number',$orderNumber)->setField($param);
			$step = Db::name('orders')->where('order_number',$orderNumber)->field('step_type,service_type_id')->find();
			if($row){
	          if($step['service_type_id']==2){//维修
                    if($step['step_type']==1){   
					$map['step_number']='9';
					$map['status']='5';
				    Db::name('orders')->where('order_number',$orderNumber)->update($map);	
	                }else if($step['step_type']==2){
		            $map['status'] = 5;
					$map['step_number'] =9; 
				    Db::name('orders')->where('order_number',$orderNumber)->update($map);
	                }
				}elseif($step['service_type_id']==1){//安装
                    if($step['step_type']==3){   
					$map['step_number']='9';
					$map['status']='5';
				    Db::name('orders')->where('order_number',$orderNumber)->update($map);	
	                }else if($step['step_type']==4){
		            $map['status'] = 5;
					$map['step_number'] =9; 
				    Db::name('orders')->where('order_number',$orderNumber)->update($map);
	                }
				}elseif($step['service_type_id']==5){//更换幻灯片
                    if($step['step_type']==6){   
					$map['step_number']='9';
					$map['status']='5';
				    Db::name('orders')->where('order_number',$orderNumber)->update($map);	
	                }else if($step['step_type']==7){
		            $map['status'] = 5;
					$map['step_number'] =9; 
				    Db::name('orders')->where('order_number',$orderNumber)->update($map);
	                }
				}elseif($step['service_type_id']==6){//围板搭建
                    if($step['step_type']==8){   
					$map['step_number']='9';
					$map['status']='5';
				    Db::name('orders')->where('order_number',$orderNumber)->update($map);	
	                }else if($step['step_type']==9){
		            $map['status'] = 5;
					$map['step_number'] =9; 
				    Db::name('orders')->where('order_number',$orderNumber)->update($map);
	                }
				}
               return json(['code' => 200, 'data' =>$orderNumber, 'msg' => '保存成功']);
			}else{
               return json(['code' => 200, 'data' =>$orderNumber, 'msg' => '报错']);

			}
		}else{
               return json(['code' => 200, 'data' => '', 'msg' => '']);
		}
	}

//问题反馈
	public function issue_feedback($order_number){
		// if(session('type')!=1){
		// 	exit;
		// }
		$source = Db::name('orders')->where('order_number',$order_number)->value('owner_id');
		$receive = Db::name('orders')->where('order_number',$order_number)->value('worker_id');
		
		$this->assign('orderNumber',$order_number);
		$this->assign('source',$source);
		$this->assign('receive',$receive);
		return $this->fetch();
	}
//添加问题反馈
	public function issueAdd(){
		if(request()->isAjax()){
			$param = input('post.');
			$param['text'] = htmlspecialchars($param['text']);
			$param['uid'] = session('id');
			$param['create_time'] = time();
			$flag = Db::name('issue_feedback')->insert($param);
			if($flag){
				return json(['code'=>'200','data'=>'','msg'=>'提交成功！']);
			}else{
				// return json(['code'=>'200','data'=>'','msg'=>'提交成功！']);
				exit;
			}
		}else{
			exit;
		}
	}
}