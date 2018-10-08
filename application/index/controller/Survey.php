<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\SurveyModel;
class Survey extends Controller
{
	/*
	*勘测首页
	*/
	public function index(){ 
		header("Content-Type: text/html;charset=utf-8");
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
		
		$brand=Db::name("brand_list")->select(); //品牌
		$goods=Db::name('category')->field('name')->where('find_in_set(4,s_id)')->select();//商品类型
		
		$ds_loca['uid']=$uid;
		$ds_loca['default']=1;
		$loaction = Db::name('client_loaction')->where($ds_loca)->find();//获取当前客户地址管理
		
		$this->assign('loaction',$loaction);
		$this->assign('brand',$brand);
		$this->assign('goods',$goods);
		return $this->fetch('index');
	}
	
	/*
	*勘测客户下单操作
	*/ 
	public function ajax_survery(){ 
		$param = input('post.');
        $uid = input('post.uid');

        if(empty($uid)){
            return json(array('code'=>-1,'msg'=>'请先登录'));
        }
		
        if(request()->isAjax()){
            $survey = new SurveyModel();
            $flag = $survey->survey_ajax($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

	}
	
	/*
	*勘测客户付款页面
	*/ 
	public function survey_payment($order_number){ 
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
			
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
	
		$uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
		$join = [
				['offer_total s','s.order_number = a.order_number','LEFT']
			];
		$where['a.order_number']=$order_number;
		
		$list=Db::name("orders_survey")->alias('a')->field('a.*,s.totals')->join($join)->where($where)->select();
		

		$this->assign('list',$list);
		$this->assign('order_number',$order_number);
		return $this->fetch('survey_payment');

	}
	/*
	*勘测师傅接单页面
	*/ 
	public function ds_scrvey_masterorder($order_number){ 
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
		$uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
		
		
		$join = [
				['bj_survey_invitation_record s','s.order_number = a.order_number','LEFT']
			];
		$where['a.order_number']=$order_number;
		$where['s.worker_id']=$uid;
		$list=Db::name("orders_survey")->alias('a')->field('a.*,s.price')->join($join)->where($where)->select();
		
		
	
		$this->assign('list',$list);
		$this->assign('order_number',$order_number);
		
		return $this->fetch('affirm_order_form');

	}
	/*
	*勘测师傅确认接单ajax
	*/ 
	public function ajax_survey_masterok(){ 
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
			
		$uid=session('id');
		$order_number=input('order_number');
		$price=input('price');
		
		
		$list=Db::name("orders")->field('worker_id,owner_id')->where('order_number',$order_number)->find();
		
		
		
		
		if($list['worker_id']==$uid){
			return ['code' => 0, 'data' => '', 'msg' => '您已接单,不要重复接单'];
		}
		
		if($list['worker_id']!=0){
			return ['code' => 0, 'data' => '', 'msg' => '来晚一步,订单已经被别的师傅接单咯~'];
		}
		
			$map['message_type']='1';
			$map['source_id']='0';
			$map['receive_id']=$list['owner_id'];
			$map['content']='您的订单已被平台估价,点击付款';
			$map['link']=input('link');
			$map['status']='0';
			$map['sending_time']=date("Y-m-d H:i:s");
			Db::name('message_reminder')->insert($map);
			
		    $rate=Db::name('config')->where('id',5)->find();
			$maps['worker_id']=$uid;
			$maps['order_number']=$order_number;
			$maps['is_rob']='1';
			$maps['totals']=$price+($price*$rate['value'])+($price*0.15);
			$maps['amount_engineer']=$price;
			Db::name('offer_total')->insert($maps);
	
		$data['worker_id']=$uid;
		$data['step_number']='2';
		$data['work_step_number']='1';
		$data['master_status']='2';
		$data['status']='2';
		$modify=Db::name("orders")->where('order_number',$order_number)->update($data);
		if($modify){
			return ['code' => 200, 'data' => '', 'msg' => '接单成功~'];
		}else{
			return ['code' => 0, 'data' => '', 'msg' => '-1'];
		}
		

	}
	/*
	*勘测提交之后页面
	*/
	public function ds_release_task(){ 
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
		$uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
		
		return $this->fetch('release_task');
	}
	/*
	*师傅勘测手稿页面
	*/
	public function survey_manuscript($order_number){ 
	$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
		$uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
		
		 $this->assign('order_number',$order_number);
		return $this->fetch('survey_manuscript');
	}
	
	/*
	*师傅勘测手稿ajax
	*/
	public function ajax_survey_manuscript(){ 
	
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
			
		$uid=session('id');
		$order_number=input('order_number');
		$link=input('link');
		$img=input('img');
		$owner_id=Db::name("orders")->field('owner_id')->where('order_number',$order_number)->find();
		
		//给客户发送消息
		$map['message_type']='2';
		$map['source_id']=$uid;
		$map['receive_id']=$owner_id['owner_id'];
		$map['content']='师傅已经上传了勘测手稿,点击查看';
		$map['link']=$link;
		$map['status']='0';
		$map['sending_time']=date("Y-m-d H:i:s");
		Db::name('message_reminder')->insert($map);
		
		
		
		$carr=Db::name("survey_manuscript")->where('order_number',$order_number)->select();
	
		if(empty($carr)){
			
			$data['order_number']=$order_number;
			$data['img']=$img;
			$data['work_id']=$uid;
			$ds_data['step_number']=5;
			
            $result = Db::name('survey_manuscript')->insert($data);
			          Db::name("orders")->where('order_number',$order_number)->update($ds_data);
            if(false === $result){             
                return ['code' => 0, 'data' => '', 'msg' => '-1'];
            }else{
                return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
            }
			
			
		}else{
			
			$data['img']=$img;
			$data['work_id']=$uid;
			$ds_data['step_number']=5;
            $result = Db::name('survey_manuscript')->where('order_number',$order_number)->update($data);
			          Db::name("orders")->where('order_number',$order_number)->update($ds_data);

            if(false === $result){             
                return ['code' => 0, 'data' => '', 'msg' => '-1'];
            }else{
                return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
            }
		}

		
	}
	/*
	*客户勘测手稿页面
	*/
	public function customer_survey_manuscript($order_number){ 
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
		
		$uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
		
		
		$list=Db::name("survey_manuscript")->where('order_number',$order_number)->find();
		
		$this->assign('order_number',$order_number);
		$this->assign('list',$list);
		return $this->fetch('customer_survey_manuscript');
	}
	/*
	*客户勘测反馈ajax
	*/
	public function ajax_survey_feedback(){ 
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
	
		$uname=session('ds_username');
		$uid=session('id');
		$order_number=input('order_number');
		$text=input('text');
		$list=Db::name("survey_manuscript")->where('order_number',$order_number)->find();
		
		
		//给师傅发信息
		$map['message_type']='1';
		$map['source_id']=$uid;
		$map['receive_id']=$list['work_id'];
		$map['content']='订单号:'.$order_number.',用户:'.$uname.'<br/>发来勘测反馈内容:'.$text;
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
	*客户勘测确认ajax
	*/
	public function ajax_survey_confirm(){ 
	
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
	
		$order_number=input('order_number');
		$link=input('link');
		$list=Db::name("survey_manuscript")->where('order_number',$order_number)->find();
		
		
		//给师傅发信息
		$map['message_type']='1';
		$map['source_id']='0';
		$map['receive_id']=$list['work_id'];
		$map['content']='您的勘测手稿客户已确认,点击查看';
		$map['status']='0';
		$map['link']=$link;
		$map['sending_time']=date("Y-m-d H:i:s");
		Db::name('message_reminder')->insert($map);
		$ds_data['work_step_number']=5;
		$is_data['is_ok']='1';
		$result=Db::name("orders")->where('order_number',$order_number)->update($ds_data);
				Db::name("survey_manuscript")->where('order_number',$order_number)->update($is_data);
		if(false === $result){             
                return ['code' => 0, 'data' => '', 'msg' => '-1'];
            }else{
                return ['code' => 200, 'data' => '', 'msg' => 'OK~'];
            }
	}
	
	/*
	*勘测施工师傅报告页面
	*/
	public function survey_master_presentation($order_number){
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
			$uid=session('id');
			$field='o.contact_name,o.location_ext,o.full_location,o.contact_phone,u.real_name';
            $order = Db::name('orders')->alias('o')->field($field)->join('users u','u.id=o.worker_id')->where('o.order_number='.$order_number)->find();
			$list=Db::name('survey_presentation')->where('order_number',$order_number)->find();
			$this->assign('order',$order);
			$this->assign('order_number',$order_number);
			$this->assign('list',$list);
		return $this->fetch('survey_master_presentation');
		
	}
	/*
	*勘测施工师傅报告ajax
	*/
	public function survey_ajaxpresentation(){ 
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
	
			$uid=session('id');
		    $order_number = input('order_number');
			$img1 = input('img1');
			$img2 = input('img2');
			$img3 = input('img3');
			$link = input('link');
			$owner_id=Db::name("orders")->field('owner_id')->where('order_number',$order_number)->find();
			
			//给客户发送消息
			$map['message_type']='2';
			$map['source_id']=$uid;
			$map['receive_id']=$owner_id['owner_id'];
			$map['content']='师傅已经上传了勘测报告,点击查看';
			$map['link']=$link;
			$map['status']='0';
			$map['sending_time']=date("Y-m-d H:i:s");
			Db::name('message_reminder')->insert($map);
			
			
			$list=Db::name('survey_presentation')->where('order_number',$order_number)->find();
			if(empty($list)){
				$data['order_number']=$order_number;
				$data['work_id']=$uid;
				$data['img1']=$img1;
				$data['img2']=$img2;
				$data['img3']=$img3;
				$ds_data['step_number']='6';
				
				$result = Db::name('survey_presentation')->insert($data);
						  Db::name("orders")->where('order_number',$order_number)->update($ds_data);
				if(false === $result){             
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}else{
					return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
				}
			}else{
				$data['work_id']=$uid;
				$data['img1']=$img1;
				$data['img2']=$img2;
				$data['img3']=$img3;
				$ds_data['step_number']='6';
				
				$result = Db::name('survey_presentation')->where('order_number',$order_number)->update($data);
						  Db::name("orders")->where('order_number',$order_number)->update($ds_data);
				if(false === $result){             
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}else{
					return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
				}
			}
			
		
		
	}
	/*
	*勘测客户施工报告页面
	*/
	
	public function survey_customer_presentation($order_number){
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
		
		 $order_number = input('order_number');
		 $field='o.contact_name,o.location_ext,o.full_location,o.contact_phone';
         $order = Db::name('orders')->alias('o')->field($field)->where('o.order_number='.$order_number)->find();
		 
		 
		 $list=Db::name('survey_presentation')->where('order_number',$order_number)->find();
		 
		 $work_name=Db::name('users')->field('real_name')->where('id',$list['work_id'])->find();
		 
		 $this->assign('order',$order);
		 $this->assign('order_number',$order_number);
		 $this->assign('list',$list);
		 $this->assign('work_name',$work_name);
		 return $this->fetch('survey_customer_presentation');
	}
	
	/*
	*勘测师傅确认码AJAX
	*/
	
	public function survey_confirmma($order_number){
		$uid=session('id');
		$ds_url=\think\Config::get('view_replace_str');
		if(empty($uid)){
				$this->redirect($ds_url['__PUBLIC__'].'auth');
			}
		
		 $order_number = input('order_number');
		 $querenma = input('querenma');
		 $field='querenma';
         $order = Db::name('orders')->field($field)->where('order_number='.$order_number)->find();
			
		 if($order['querenma']==$querenma){
				
				$data['work_step_number']='6';
				$data['end_time']=time();
	
				Db::name("orders")->where('order_number',$order_number)->update($data);
			 
			 return ['code' => 200, 'data' => '', 'msg' => 'ok'];
		 }else{
			 return ['code' => 0, 'data' => '', 'msg' => '确认码错误'];
		 }
	}
	

	
	
	
}
