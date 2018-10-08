<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Personal extends Base
{
	  //客户个人中心
	  public function client_home(){
		
		
		return view('client_home');
	  }
	  //客户首页
	   public function ds_client_home(){
		   
			$uid=session('id');
			$where['bj_orders.owner_id']=$uid;
			$where['bj_orders.is_del']=0;
			$join = [
				['bj_users','bj_users.id = bj_orders.worker_id','LEFT'],
				['bj_service','bj_service.id = bj_orders.service_type_id','LEFT'],
				['bj_orders_maintain','bj_orders_maintain.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_install','bj_orders_install.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_coaming','bj_orders_coaming.order_number = bj_orders.order_number','LEFT'],
			    ['bj_replace','bj_replace.order_number = bj_orders.order_number','LEFT'],
				['bj_orders_survey','bj_orders_survey.order_number = bj_orders.order_number','LEFT']
				
			];
			$field='bj_orders.*,bj_users.real_name as uname,bj_service.name as sname,bj_orders_maintain.brand as m_brand,bj_orders_maintain.photo_store as m_img,bj_orders_maintain.budget as b_budget,bj_orders_install.storefront as ins_img,bj_orders_install.brand as ins_brand,bj_orders_install.budget as ins_budget,bj_orders_coaming.imgstore as coam_img,bj_orders_coaming.brand as coam_brand,bj_orders_coaming.budget as coam_budget,bj_replace.photo_store as g_photo_store,bj_replace.budget as g_budget,bj_orders_survey.photo as sur_img';
			$list=Db::name("orders")->field($field)->join($join)->where($where)->group('bj_orders.id desc')->find();
			$this->assign('list', $list);
				
			return view('ds_client_home');
	  }
	  //师傅个人中心
	  public function client_home_s(){
			$uid=session('id');
			$examine=Db::name("users_worker")->field('review_status')->where('uid',$uid)->find();
			$this->assign('examine', $examine);
			return view('client_home_s');
	  }
	  
	  //师傅个人首页
	  public function ds_work_home(){
		  
		$param=input();
		
		// print_r($param);
		  
		   if(empty($param['pid'])){
			 
				$uid=session('id');
				$wheres['work_del']='0';
				$wheres['worker_id']='0';
				$wheres['judge']='1';						
				$Nowpage  = input('get.page') ? input('get.page'):1;
				$limits   = '5';// 获取总条数
				$count    = Db::name('orders')->where($wheres)->count();//计算总页面
				$allpage  = intval(ceil($count / $limits));
				
				$where['a.work_del']=0;
				$where['a.worker_id']='0';
				$where['judge']='1';
				   $join = [
					['bj_users b','b.id = a.owner_id','LEFT'],
					['bj_service c','c.id = a.service_type_id','LEFT'],
					['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
					['bj_orders_install e','e.order_number = a.order_number','LEFT'],
					['bj_offer_total f','f.order_number = a.order_number','LEFT'],
					['bj_orders_coaming m','m.order_number = a.order_number','LEFT'],
					['bj_replace g','g.order_number =a.order_number','LEFT'] 
					
				];
				$field='a.*,b.real_name as uname,c.name as sname,d.brand as m_brand,d.photo_store as m_img,d.budget as d_budget,f.is_rob as f_is_rob,d.id as d_id,e.storefront as e_img,e.brand as e_brand,e.order_number as e_id,m.imgstore as ms_img,m.brand as m_brand,m.order_number as m_id,g.id as g_id,g.budget as g_budget,g.photo_store as g_photo_store';

				$list=Db::name("orders")->alias('a')->field($field)->join($join)->where($where)->where('a.service_type_id','NOTIN','4')->page($Nowpage, $limits)->group('a.id desc')->select();
				
				$this->assign('Nowpage', $Nowpage); //当前页
				$this->assign('allpage', $allpage); //总页数 
			
		
				if(input('get.page')){
					return json($list);
				} 
		   }else{
			  
				$sid=$param['pid'];
				$uid=session('id');
				$wheres['worker_id']=$uid;
				$wheres['work_del']=0;
				$wheres['worker_id']='0';
				$wheres['service_type_id']=$sid;	
				$wheres['judge']='1';
				$Nowpage  = input('get.page') ? input('get.page'):1;
				$limits   = '5';// 获取总条数
				$count    = Db::name('orders')->where($wheres)->count();//计算总页面
				$allpage  = intval(ceil($count / $limits));
				
				
				$wherez['a.work_del']=0;
				$wherez['a.worker_id']='0';
				$wherez['a.service_type_id']=$sid;
				$wherez['judge']='1';
				
			    $join = [
				['bj_users b','b.id = a.owner_id','LEFT'],
				['bj_service c','c.id = a.service_type_id','LEFT'],
				['bj_orders_maintain d','d.order_number = a.order_number','LEFT'],
				['bj_orders_install e','e.order_number = a.order_number','LEFT'],
				['bj_offer_total f','f.order_number = a.order_number','LEFT'],
				['bj_orders_coaming m','m.order_number = a.order_number','LEFT'],
				['bj_replace g','g.order_number =a.order_number','LEFT'] 
				
			];
				$field='a.*,b.real_name as uname,c.name as sname,d.brand as m_brand,d.photo_store as m_img,d.budget as d_budget,d.id as d_id,f.is_rob as f_is_rob,e.storefront as e_img,e.brand as e_brand,e.order_number as e_id,m.imgstore as ms_img,m.brand as m_brand,m.order_number as m_id,g.id as g_id,g.budget as g_budget,g.photo_store as g_photo_store';
				$list=Db::name("orders")->alias('a')->field($field)->join($join)->where($wherez)->page($Nowpage, $limits)->group('a.id desc')->select();
				$this->assign('Nowpage', $Nowpage); //当前页
				$this->assign('allpage', $allpage); //总页数 
				$this->assign('pid', $sid);
	
				if(input('get.page')){
					return json($list);
				} 
		   }
		
	 
	
		  
		 
			return view('ds_work_home');
	  }
	//师傅基本资料
	  public  function work_basics(){
		 
			$uid=session('id');
			$where['bj_users.id']=$uid;
			$where['bj_users.status']=1;
			$join = [
				['bj_users_worker','bj_users_worker.uid = bj_users.id','LEFT'],
				['bj_service','bj_service.id = bj_users_worker.service_type_id','LEFT'],
				['bj_commodity','bj_commodity.id = bj_users_worker.l2_category_id','LEFT'],
				['bj_skills','bj_skills.id = bj_users_worker.work_skill','LEFT']
			
			];
			$field='bj_users.id as uid,bj_users.username as uname,bj_users_worker.real_name as urname,bj_users.phone as uphone,bj_users.img as uimg,bj_users.province as uprovince,bj_users.city as ucity,
			bj_users.town as utown,bj_users.service_province as userv,bj_users.service_city as userc,bj_users_worker.guarantee as w_guar,bj_users_worker.comprehensive as w_com,
			bj_users_worker.credit_score as w_cred,bj_users_worker.technical_level as w_tech,bj_users_worker.service_introduction as w_jieshao,bj_service.name as sname,bj_commodity.name as cname,
			bj_users_worker.service_time as w_time,bj_users_worker.service_endtime as w_endtime,bj_users_worker.staff_num as w_num,bj_users_worker.truck_situation as truck,bj_users_worker.review_status as w_rev';
			
	        //综合评分
			$total_core=null;
			$core = Db::name('order_comments')->where('adopt_id',$uid)->field('work_quality,work_speed,service_attitude')->select();
			//师傅接单收到评价的个数
			$num = Db::name('order_comments')->where('adopt_id',$uid)->count();
			foreach ($core as  $val){
				$total_core+=$val['work_quality']+$val['work_speed']+$val['service_attitude'];
			}
			
			$list=Db::name("users")->field($field)->join($join)->where($where)->find();
			if(!empty($num)){
              $list['score'] =round($total_core/$num,2);
			}else{
				 $list['score']="";
			}
			
			//师傅技能
			$map['bj_users_worker.uid']=$uid;
			$data = Db::name("users_worker")->field('uid,work_skill')->where($map)->select();
		
		
			if(empty($data[0]['work_skill'])){
				
				//获取服务类别all
				$ser = Db::name("service")->select();
				$listz=Db::name('users_worker')->where('uid', $uid)->find();
				$s_id=explode(',',$listz['service_type_id']);
				//获取师傅技能all
				$ski = Db::name("skills")->select();
				$listl=Db::name('users_worker')->where('uid', $uid)->find();
				$c_id=explode(',',$listl['work_skill']);
				
				$this->assign('list', $list);
				$this->assign('ser', $ser);
				$this->assign('ski', $ski);
				$this->assign('s_id',$s_id);
				$this->assign('c_id',$c_id);
				return view('basics');
			
			}else{
				
				foreach($data as &$val){
				$val['skills'] = Db::name('skills')->field('skill')->where('id','in',$val['work_skill'])->select();
				}
				foreach($data[0]['skills']  as $k => $v)
				{
					$arr[]=$v;
				}
				
				//师傅服务项目
				$maps['bj_users_worker.uid']=$uid;
				$datas = Db::name("users_worker")->field('uid,service_type_id')->where($maps)->select();
			
				foreach($datas as &$val){
				$val['server'] = Db::name('service')->field('name')->where('id','in',$val['service_type_id'])->select();
				}
				foreach($datas[0]['server']  as $k => $v)
				{
					$arrs[]=$v;
				}
				
				//获取服务类别all
				$ser = Db::name("service")->select();
				$listz=Db::name('users_worker')->where('uid', $uid)->find();
				$s_id=explode(',',$listz['service_type_id']);
				
				//获取师傅技能all
				$ski = Db::name("skills")->select();
				$listl=Db::name('users_worker')->where('uid', $uid)->find();
				$c_id=explode(',',$listl['work_skill']);
				//获取师傅工程简历
                            $project=Db::name("reume")->where("worker_id",$uid)->select();
                            foreach ($project as $k => $v) {
                                $p[$k] = Db::name('skills')->field('skill')->where('id',$v['skill'])->select();
                                if($p[$k]){
                                    $s = '';
                                    foreach ($p[$k] as $key => $value) {
                                        $s =$s.' '.$value['skill'];
                                        $project[$k]['skill']=$s;
                                    }
                                }
                            }
                            foreach ($project as $k=> $v) {
                                $q[$k] = Db::name('brand_list')->where('id',$v['brand'])->field('brand')->select();
                                if($q[$k]){
                                    $a = '';
                                    foreach ($q[$k] as $key => $value) {
                                        //var_dump($value);
                                        $a =$a.' '.$value['brand'];
                                        $project[$k]['brand']=$a;
                                    }
                                }
                            }
                             foreach ($project as $k=> $v) {
                                            $q[$k] = Db::name('service')->where('id',$v['service_type_id'])->field('name')->select();
                                            if($q[$k]){
                                                $a = '';
                                                foreach ($q[$k] as $key => $value) {
                                                    //var_dump($value);
                                                    $a =$a.' '.$value['name'];
                                                    $project[$k]['service_type_id']=$a;
                                                }
                                            }
                                        }
				$this->assign('list', $list);
				$this->assign('skill', $arr);
				$this->assign('server', $arrs);
				$this->assign('ser', $ser);
				$this->assign('ski', $ski);
				$this->assign('s_id',$s_id);
				$this->assign('c_id',$c_id);
				$this->assign('project',$project);
				return view('basics');
			}
			
		
		 
	  }
	  //师傅基本资料修改
	 public function ajax_mase_modify(){
			$uid=session('id');
			$param = input('post.');	
			if(empty($param['s_id'])){
				
				 return json(array('code'=>-1,'msg'=>'至少选择一个服务类别'));
			 }
			if(empty($param['c_id'])){
				
				 return json(array('code'=>-1,'msg'=>'至少选择一个师傅技能'));
			 }
			$uid=session('id');
			$param = input('post.');
			$s_id=$param['s_id'];
			$c_id=$param['c_id'];
			$cha=implode(',',$s_id);
			$chas=implode(',',$c_id);
			$data['bj_users.username']=$param['uname'];

			session('ds_username',null);
			session('ds_username',$param['uname']);
			$data['bj_users.real_name']=$param['ranme'];
			$data['bj_users.province']=$param['province10'];
			$data['bj_users.city']=$param['city10'];
			$data['bj_users.town']=$param['district10'];
			$data['bj_users.service_province']=$param['location_ext'];
			$data['bj_users.service_city']=$param['location_ext1'];
			$data['bj_users_worker.real_name']=$param['ranme'];
			$data['bj_users_worker.service_introduction']=$param['fuwujs'];
			$data['bj_users_worker.service_time']=$param['fuwusj'];
			$data['bj_users_worker.staff_num']=$param['ygrs'];
			$data['bj_users_worker.truck_situation']=$param['huoche'];
			$data['bj_users_worker.service_type_id']=$cha;
			$data['bj_users_worker.work_skill']=$chas;
			
			$join = [
				['bj_users_worker','bj_users_worker.uid = bj_users.id','LEFT'],
				['bj_service','bj_service.id = bj_users_worker.service_type_id','LEFT'],
				['bj_commodity','bj_commodity.id = bj_users_worker.l2_category_id','LEFT'],
				['bj_skills','bj_skills.id = bj_users_worker.work_skill','LEFT']
			
			];
			
			$result = Db::name('users')->join($join)->where('bj_users.id='.$uid)->update($data);
			 if($result||$result==0){
				 return json(array('code'=>200,'msg'=>'OK'));
			 }else{
				 return json(array('code'=>0,'msg'=>'-1'));
			 }
			
	  }
	  //师傅头像显示页面
	  public function mase_headportrait(){
		  	$uid=session('id');
			$where['bj_users.id']=$uid;
			$where['bj_users.status']=1;
			
			$field='bj_users.img as uimg';
			$list=Db::name("users")->field($field)->where($where)->find();
			$this->assign('list', $list);
		  return view();
	  }
	   //师傅头像修改
	  public function ajax_mase_headportrait(){
		  	$uid=session('id');
			$param = input('post.');
			$img=$param['photo'];
			$img=str_replace("\\","/",$img);
			$where['bj_users.id']=$uid;
			$where['bj_users.status']=1;
			$data['img']=$img;
			
			$list=Db::name("users")->where($where)->update($data);
			if($list||$list==0){
				 return json(array('code'=>200,'msg'=>'OK'));
			 }else{
				 return json(array('code'=>0,'msg'=>'请选择一张图片'));
			 }
			
		 
	  }
	  
	    //客户基本资料
	  public  function client_basics(){
		  
			$uid=session('id');
			$where['bj_users.id']=$uid;
			$where['bj_users.status']=1;
			$list=Db::name("users")->field('*')->where($where)->find();
			$this->assign('list', $list);
			
			return view('clent_basics');
	  }
	  //客户资料修改
	  public function ajax_client_modify(){
		  	$uid=session('id');
			$param = input('post.');
			$where['bj_users.id']=$uid;
			$where['bj_users.status']=1;
			$data['username']=$param['uname'];
			$data['real_name']=$param['ranme'];
			$data['province']=$param['province10'];
			$data['city']=$param['city10'];
			$data['town']=$param['district10'];
			$data['location']=$param['location'];
			
			$list=Db::name("users")->where($where)->update($data);
			if($list||$list==0){
				session('ds_username',null);
	    	    session('ds_username',$data['username']);
				 return json(array('code'=>200,'msg'=>'OK'));
			 }else{
				 return json(array('code'=>0,'msg'=>'-1'));
			 }
			
		 
	  }
	 public function ajax_message(){
		  $uid=session('id');
		
		  $examine=Db::name("users_worker")->field('review_status')->where('uid',$uid)->find();
		  if($examine['review_status']==0){
			  return ['code' => 0, 'data' => '', 'msg' => '您还未认证或者认证未通过'];
		  }else if($examine['review_status']==1){
			  return ['code' => 1, 'data' => '', 'msg' => '您的认证正在审核,请等待'];
		  }else if($examine['review_status']==2){
			  return ['code' => 200, 'data' => '', 'msg' => 'OK'];
		  }else if($examine['review_status']==3){
			  return ['code' => 0, 'data' => '', 'msg' => '认证未通过'];
			  
		  }
	  }
	 
	public function ajax_dspan(){
	    $param=input('post.');
		$uid=$param['uid'];
		$number=$param['order_number'];
		$where['worker_id']=$uid;
		$where['order_number']=$number;
		$examine=Db::name("offer_total")->field('is_rob')->where($where)->find();
	
	    if($examine['is_rob']==1){

			return ['code' => 200, 'data' => '', 'msg' => 'OK'];							 
			}else{		
			return ['code' => 0, 'data' => '', 'msg' => '-1'];
						
		}
	  }
	  
	  
	  
	  
	  
	  
	   public function apply_monthly_statement(){

	   	
	    return view("apply_monthly_statement");
    }
	  
	 //    添加工程简历
    public function tianjiagongcheng($order,$on){
    $skill= Db::name('skills')->field('id,skill')->select();
    $service= Db::name('service')->field('name,id')->select();
    $brand= Db::name('brand_list')->field('id,brand')->select();
       if($on==1){
           //获取师傅工程简历
           $project=Db::name("reume")->where("id",$order)->select();
           $project=$project[0];
           $this->assign('order', $order);
           $this->assign('skill', $skill);
           $this->assign('service', $service);
           $this->assign('brand', $brand);
           $this->assign('on', $on);
           $this->assign('project', $project);
           return view("tianjiagongcheng");
       }else{

           $this->assign('order', $order);
           $this->assign('skill', $skill);
           $this->assign('service', $service);
           $this->assign('brand', $brand);
           $this->assign('on', $on);
           return view("tianjiagongchengs");
       }
}
//添加工程简历
    public function addtianjiagongcheng($order,$on){
        $map=array();
        $map['entry_name']=input("get.entry_name");
        $map['company']=input("get.company");
        $map['project_start_time']=strtotime(input("get.project_start_time"));
        $map['project_end_time']=strtotime(input("get.project_end_time"));
        $map['brand']=input("get.brand");
        $map['service_type_id']=input("get.service_type_id");
        $map['skill']=input("get.skill");

    if($on==1){
        Db::name('reume')->where("id",$order)->update($map);
        $data=['code'=>200,"msg"=>"保存成功"];
        return json($data);
    }else{
        $map['worker_id']=$order;
        Db::name('reume')->insert($map);
        $data=['code'=>200,"msg"=>"添加成功"];
        return json($data);
    }
    }
//    删除工程简历
    public function removetianjiagongcheng(){
        $order=input("get.order");
      $ord = Db::name('reume')->where('id',$order)->delete();
      if($ord){
          $data=["code"=>200,"msg"=>"删除成功"];
      }else{
          $data=["code"=>300,"msg"=>"删除失败"];
      }
      return json($data);
    }

//地址管理

	public function  del_address(){
	
		 $id = input('param.id');
		
		Db::name('client_loaction')->where('id',$id)->delete();
		return ['code' => 1, 'data' => '', 'msg' => '删除成功'];
		
	} 
    public function client_location(){
		$uid = session('id');
		$type = Db::name('users')->where('id',$uid)->value('type');
		if(intval($type) === 1){
			$location = Db::name('client_loaction')->where('uid',$uid)->order('default','desc')->select();
			$this->assign('location',$location);
			return $this->fetch();
		}else{
			exit;
		}
    }
	
	public function client_location_default(){
		$uid = session('id');
		if(request()->isAjax()){
			$type = Db::name('users')->where('id',$uid)->value('type');
			if(intval($type) === 1){
				$id=input('id');
				$where = ['default'=>1,'uid'=>$uid];
				$wheres = ['id'=>$id,'uid'=>$uid];
				$lid = Db::name('client_loaction')->where($where)->value('id');
				if($lid != $id){
					Db::name('client_loaction')->where($where)->update(['default'=>0]);
					$fn = Db::name('client_loaction')->where($wheres)->update(['default'=>1]);
					if($fn){
						return json(['code'=>'200','data'=>'','msg'=>'设置成功！']);
					}else{
						return json(['code'=>'200','data'=>'','msg'=>'系统繁忙！']);
					}
				}else{
					return json(['code'=>'200','data'=>'','msg'=>'设置成功！']);
				}
				
			}else{
				exit;
			}
		}else{
			exit;
		}
    } 

   	public function editlocation($id){
   		$uid = session('id');
   		$where=['id'=>$id,'uid'=>$uid];
   		$list = Db::name('client_loaction')->where($where)->find();
   		$this->assign('list',$list);
   		return $this->fetch();
   	} 
   	public function updatelocation(){
   		$uid = session('id');
   		$param = input();
   		$id= $param['id'];
   		unset($param['id']);
   		$where=['id'=>$id,'uid'=>$uid];
   		$flag = Db::name('client_loaction')->where($where)->update($param);
   		if($flag){
			return json(['code'=>'200','data'=>'','msg'=>'修改成功！']);
   		}else{
			return json(['code'=>'200','data'=>'','msg'=>'修改成功，没有任何修改！']);
   		}
   	}
	public function addlocation(){
			if(request()->isAjax()){
				$param = input();
				$param['uid'] = session('id');
				$param['default'] = 1;
				
				$count=Db::name('client_loaction')->where('uid',$param['uid'])->count();
				if($count>=5){
					return json(['code'=>'0','data'=>'','msg'=>'地址最多只能有5个哦！']);
				}
				
				Db::name('client_loaction')->where('uid',$param['uid'])->update(['default' => '0']);
				
				$flag = Db::name('client_loaction')->insert($param);
				if($flag){
					return json(['code'=>'200','data'=>'','msg'=>'新增成功！']);
				}else{
					return json(['code'=>'0','data'=>'','msg'=>'新增失败！']);
				}
			}
			return $this->fetch();
	}
	public function pingjiaguanli(){

    
       return $this->fetch('pingjiaguanli');
    }
}