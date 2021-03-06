<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
use app\index\model\MasterModel;
class Master extends Base
{     
      /**
       * 师傅首页
       */
    public function index()
    {  
      $category = Db::name('category')->select();
      $this->assign('category',$category);  
		return view('master_home');
    }
    /**
     * 师傅首页默认订单
     */
    public function orders(){
        $data = Db::name('orders')->select();
       if($data){
          return json(array('code'=>200,'order'=>$data));
       }else{
          return json(array('code'=>0,'order'=>''));
       }
    }
    /**
     * 师傅实名认证
     */
    public function approve(){ 
      
        return view('master_approve');
    }
    /**
     * 师傅认证时，未审核
     */
    public function review(){
        return view('master_review');
    }
    /**
     * 师傅实名认证提交信息
     */
    public function master_approve(){
             $data['real_name'] = input('post.real_name');          
             $data['cert_id'] = input('post.cert_id');
             $data['credit_card'] = input('post.credit_card');
             $data['credit_card_phone'] = input('post.credit_card_phone');
             $data['id_front'] = input('post.id_front');
             $data['id_reverse'] = input('post.id_reverse');
             $data['id_hand'] = input('post.id_hand');      
             $data['review_status'] = 1;      
             $data['uid'] = session('id');
             $datas['real_name'] = input('post.real_name');  
             $wid = session('id');
             $list = Db::name('users_worker')->where('uid='.$wid)->select();  
              $arr = Db::name('users')->where('id',$wid)->update($datas);         
             if(empty($list)){
                 $result = Db::name('users_worker')->insertGetId($data);
                 if($result){
                     return json(array('code'=>200,'msg'=>'认证提交成功,请等待审核'));
                 }else{
                     return json(array('code'=>0,'msg'=>'认证提交失败,请重新提交'));
                 } 
             }else{
                 $result = Db::name('users_worker')->where('uid='.$wid)->update($data);
                 if($result){
                     return json(array('code'=>200,'msg'=>'认证更新成功,请等待审核'));
                 }else{
                     return json(array('code'=>0,'msg'=>'认证更新失败,请重新提交'));
                 }
             }
            
    }
  
    /**
     * 师傅和客户沟通后确定的施工时间
     */
   public function contact_customer($onumber){
        $wid = session('id');
        $order_number = $onumber;
        $data = Db::name('orders')->where('order_number',$order_number)->field('contact_phone,owner_id')->find();   
        $this->assign('data',$data);
        $this->assign('order_number',$order_number);
        $this->assign('wid',$wid);
        $this->assign('cid',$data['owner_id']);
        return view('contact_customer');
    }
    /**
     * 师傅和客户沟通后确定的施工时间
     */
   public function hours(){
        $order_number = input('post.order_number');
        //查找主任师傅需要几个帮手
        $num = Db::name('orders')->where('order_number',$order_number)->value('num');
         //查找帮手同意几个
         $where['order_number'] = $order_number;
         $where['status'] = 1;
         $number = Db::name('common_master')->where($where)->count();
         if($num>$number){
            return json(array('code'=>100,'msg'=>'帮手还没有找齐'));
         }
         //判断有没有和客户商量加入过施工时间
          $t = Db::name('orders')->where('order_number',$order_number)->value('order_time');
           if($t){
              return json(array('code'=>0,'msg'=>'你已和客户确定过时间，请勿重新填写'));
            }
        $hours = strtotime(input('post.hours'));
		$buzhou=Db::name('orders')->field('work_step_service')->where('order_number',$order_number)->find();
		if($buzhou['work_step_service']==1){
			$map['work_step_service']='1';
			$map['work_step_number']='3';
			$map['order_time']=$hours;
			$order=Db::name('orders')->where('order_number',$order_number)->update($map);
		}else if($buzhou['work_step_service']==2){
			 $map['work_step_service']='2';
			 $map['work_step_number']='6';
			 $map['order_time']=$hours;
			 $order=Db::name('orders')->where('order_number',$order_number)->update($map);
		}	 
		$wheres['a.order_number']=$order_number;
		$join = [
			['bj_users','bj_users.id = a.worker_id','LEFT'],
			['bj_service','bj_service.id = a.service_type_id','LEFT'],
			['bj_category','bj_category.id = a.l1_category_id','LEFT'],
		];
		$field='a.contact_phone,bj_service.name as b_name,bj_category.name as c_name,bj_users.real_name as d_name,a.worker_id as ids';
		$list=Db::name('orders_maintain')->alias('a')->field($field)->join($join)->where($wheres)->find();
	
		
		$word_name=$list['d_name'];
	    $w_one=mb_substr($word_name,0,1,'utf-8');
		
	    $u_phone=$list['contact_phone'];
	    $u_service=$list['b_name'];
	    $u_goos=$list['c_name'];
	    $w_name=$w_one;
	    $u_time=input('post.hours');
	    $w_ids=$list['ids'];
		$captcha = rand(110001, 988889);//随机码
	    $aa=ds_short_sms($u_phone,$u_service,$u_goos,$w_name,$u_time,$w_ids,$captcha);
	      Db::name('orders')->where('order_number',$order_number)->update(['querenma'=>$captcha]);
        if($order){
          return json(array('code'=>200,'msg'=>'时间已确定，请准时工作'));
       }else{
           return json(array('code'=>0,'msg'=>'填写时间出现了点问题，请重新添加'));
        }
    }
    /**
     * 客户电话打不通的原因
     */
    public function reason(){
        $worker_id = session('id');
        $order_number = input('post.order_number');
        $reason = input('post.reason');
        //查出师傅的电话号码
        $m_phones = Db::name('users')->where('id',$worker_id)->field('phone')->find();
        $m_phone =  $m_phones['phone'];
        $list = Db::name('orders')->where('order_number',$order_number)->field('contact_phone')->find();
        $phone = $list['contact_phone'];
        $bb = re_short_sms($phone,$m_phone);
        $order =Db::name('orders')->where('order_number',$order_number)->update(['reason'=>$reason]);
       if($order || $order==0){
          return json(array('code'=>200,'msg'=>'原因提交成功，马上通知客户'));
       }else{
           return json(array('code'=>0,'msg'=>'原因提交出现了点问题，请重新提交'));
       }
    }
    /**
     * 师傅维修确认页面
     */
    public function master_maintenance_report($order_number){
            $order_number = $order_number;
            $order = Db::name('orders')->alias('o')->join('users u','o.worker_id=u.id')->where('o.order_number='.$order_number)->find();
            $orders= Db::name('master_report')->where('order_number',$order_number)->select();
            $typename = Db::name('service')->where('id',$order['service_type_id'])->value('name');
            $typename1 = Db::name('orders_maintain')->field('l1_category_id,l2_category_id')->where('order_number',$order_number)->find();
            $typename2 = Db::name('commodity')->where('id',$typename1['l2_category_id'])->value('name');
            $typename3 = Db::name('category')->where('id',$typename1['l1_category_id'])->value('name');

            $order['contact_name'] = '';
            $order['itemname'] = '';
            $order['company'] = '';
            $order['finish_time'] = time();
            $order['master_phone'] = '';
            $order['address'] ='';
            $order['doorpics'] ='';
            $order['signrecvpics'] ='';
            $order['overviewpics']='';
            $order['doorpicsids']='';
            $order['signrecvpicsids']='';
            $order['overviewpicsids']='';
			$order['worker_id']='';
            $beforeAfter[0]['beforepics']='';
            $beforeAfter[0]['detials']='';
            $beforeAfter[0]['beforepicsids']='';
            $beforeAfter[0]['afterpics']='';
            $beforeAfter[0]['afterpicsids']='';
            // var_dump($order);
            $order['itemname'] = $typename.'-'.$typename3.'-'.$typename2;
        if($orders){
            $order['contact_name'] = $orders[0]['contactofcus'];
            $order['itemname'] = $orders[0]['itemname'];
            $order['company'] = $orders[0]['company'];
            $order['finish_time'] = $orders[0]['finish_time'];
            $order['master_phone'] = $orders[0]['master_phone'];
            $order['address'] =$order['full_location'].$order['location_ext'];
            $order['doorpicsids']=$orders[0]['doorpics'];
            $order['signrecvpicsids']=$orders[0]['signrecvpics'];
            $order['overviewpicsids']=$orders[0]['overviewpics'];
			$order['worker_id']=session('id');
            $order['doorpics'] ='__PATH__'.Db::name('imgs')->where('id',$orders[0]['doorpics'])->value('image');//门头照片
            $order['signrecvpics'] ='__PATH__'.Db::name('imgs')->where('id',$orders[0]['signrecvpics'])->value('image');//门头照片
            $order['overviewpics'] ='__PATH__'.Db::name('imgs')->where('id',$orders[0]['overviewpics'])->value('image');//装柜
            foreach($orders as $k => $v){
                $beforeAfter[$k]['beforepics'] = Db::name('imgs')->where('id',$v['beforepics'])->value('image'); 
                $beforeAfter[$k]['detials'] = $orders[$k]['detials'];
                $beforeAfter[$k]['beforepicsids'] = $v['beforepics'];
            }
            foreach($orders as $k => $v){
                $beforeAfter[$k]['afterpics'] = Db::name('imgs')->where('id',$v['afterpics'])->value('image'); 
                $beforeAfter[$k]['afterpicsids'] = $v['afterpics'];
            }
        }
            
        $report =  Db::name('master_report')->alias('m')->join('signature s','m.user_sign=s.id')->field('s.image')->where('m.order_number',$order_number)->find();
        $masterimg =  Db::name('master_report')->alias('m')->join('signature s','m.master_sign=s.id')->field('s.image')->where('m.order_number',$order_number)->find();
    
       $this->assign('report',$report);
       $this->assign('masterimg',$masterimg);
       $this->assign('order',$order);
       $this->assign('beforeAfter',$beforeAfter);
       $this->assign('order_number',$order_number);
       $owner_id = Db::name('orders')->where('order_number',$order_number)->value('owner_id');
       $this->assign('owner_id',$owner_id);
       
       $this->assign('order_number',$order_number);
       return view('master_maintenance_report');
    }
    /**
     * 师傅维修确认页面图片上传
     */
    public function img(){
        $url = input('post.aa');
        $data = Db::name('imgs')->insertGetId(['image'=>$url]);
        if($data){
            return json(array('code'=>200,'datas'=>$data));
        }else{
             return json(array('code'=>0,'msg'=>'上传图片失败哦'));
        }
    }
    /**
     * 师傅维修确认页面信息加入
     */
    public function add(){

        $param = input('post.');
        
        $list = Db::name('master_report')->where('order_number',$param['order_number'])->select();
        if($list){
            if(array_key_exists('querenma',$param)){
                if($param['querenma']=='' || !preg_match("/^[0-9]{6}$/",$param['querenma'])){
                    return json(['code'=>0,'data'=>'','msg'=>'请填写正确的确认码!']);
                }

                $querenma = Db::name('orders')->where('order_number',$param['order_number'])->value('querenma');
                if(md5($querenma) !== md5($param['querenma'])){
                    return json(['code'=>0,'data'=>'','msg'=>'确认码不正确!']);
                }
            }

            foreach($param['dimg'] as $k => $v){
                $list[$k]['beforepics'] =$v;
                $list[$k]['finish_time'] = strtotime(input('post.end_time'));
                $list[$k]['itemname'] = input('post.project_name');
                $list[$k]['contactofcus'] = input('post.store_contact');
                $list[$k]['master_sign'] = input('post.qianming');
                $list[$k]['address'] = input('post.project_address');
                $list[$k]['contactofcus'] = input('post.phone_number_of_the_contact');
                $list[$k]['company'] = input('post.construction_company');
                $list[$k]['master'] = input('post.Construction_of_the_teacher');
                $list[$k]['master_people'] = input('post.Construction_contact');
                $list[$k]['master_phone'] = input('post.construction_contact_number');
                $list[$k]['doorpics'] = input('post.img0');
                $list[$k]['signrecvpics'] = input('post.img1');
                $list[$k]['overviewpics'] = input('post.img2');
                $list[$k]['master_sign'] =  $list[$k]['user_sign'];
            }

            foreach ($param['eimg'] as $kk => $vv){
                $list[$k]['afterpics'] =$vv;
            }
            foreach ($param['details'] as $kkk => $vvv){
                $list[$k]['detials'] =$vvv;
            }
            foreach ($list as $key => $value) {

                $flag = Db::name('master_report')->where('id',$value['id'])->update($value);

            }
			$clientQm =Db::name('master_report')->where('order_number',$param['order_number'])->value('user_sign');//客户签字？
            if($flag && $clientQm){
                if($clientQm){
					     $step = Db::name('orders')->where('order_number',$param['order_number'])->field('step_type')->find();
						 $where['order_number'] = $param['order_number'];
						 if($step['step_type']==1){   
						    $map['step_type']='1';
							$map['step_number']='9';
							$map['work_step_service']='1';
							$map['work_step_number']='6';
							$map['status']='5';
							$map['master_status']='5';
						  Db::name('orders')->where($where)->update($map);	
						 
						 }else if($step['step_type']==2){
						    $map['step_type']='2';
							$map['step_number']='9';
							$map['work_step_service']='2';
							$map['work_step_number']='9';
							$map['status']='5';
							$map['master_status']='5';
						 Db::name('orders')->where($where)->update($map);		
						 }
               return json(['code' => 200, 'data' => '', 'msg' => '保存成功']);
                }
              return json(['code' => 200, 'data' => '', 'msg' => '提交成功,没有任何修改']);
            }
            return json(['code' => 200, 'data' => '', 'msg' => '提交成功,没有任何修改']);
			
        }else{
            $end_time = strtotime(input('post.end_time'));
            $order_number = input('post.order_number');
            $order = new MasterModel();
            $arr = Db::name('orders')->where('order_number',$order_number)->update(['end_time'=>$end_time]);
            $param['worker_id'] = session('id');
            $param['create_time'] = time();
            $flag = $order->add_report($param);
            if($flag){
				    $step = Db::name('orders')->where('order_number',$param['order_number'])->field('step_type')->find();
						 $where['order_number'] = $param['order_number'];
						 if($step['step_type']==1){   
						    $map['step_type']='1';
							$map['step_number']='8';
							$map['status']='4';
						  Db::name('orders')->where($where)->update($map);	
						 }else if($step['step_type']==2){
						    $map['step_type']='2';
							$map['step_number']='8';
							$map['status']='4';
						 Db::name('orders')->where($where)->update($map);		
						 }			
               return json(['code' => 200, 'data' => $flag['data'], 'msg' => $flag['msg']]);
            }
        }
        
    }
   
   
     /**
     * 客户邀请师傅，师傅确认页面
     */
      public function confirm_order($ornumber,$uid){
        $order_number = $ornumber;
        $uid = $uid;
        $worker_id = session('id');
        $data = Db::name('orders')->alias('o')->join('common_master c','o.order_number = c.order_number')
        ->join('orders_maintain m','o.order_number=m.order_number')
        ->where('o.order_number',$order_number)->find();
       //项目名称
        $list = Db::name('orders_maintain')->where('order_number='.$order_number)->field('l1_category_id,l2_category_id,id')->select();
        $cate = array();
        foreach($list as $l){           
            $one = Db::name('category')->where('id','in',$l['l1_category_id'])->select();
            $two = Db::name('commodity')->where('id','in',$l['l2_category_id'])->select(); 
            $b['id'] = $l['id'];
            foreach($one as $k=>$a){
                $b[$order_number.'category'] = $a['name'];
            }
            foreach($two as $k=>$a){
                $b[$order_number.'commodity'] = $a['name'];
            }
            $cate[]=$b;
        }
        //查找所需帮手的信息
        $where['order_number'] = $order_number;
        $where['worker_id'] = $worker_id;
        $informat = Db::name('common_master')->where($where)->find();
        $informat['skill'] = Db::name('skills')->where('id',$informat['skill'])->value('skill');
        //查找主任师傅需要几个普通师傅
        $num = Db::name('orders')->where('order_number',$order_number)->field('num')->value('num');
        //查找有几个师傅同意
        $where['order_number'] = $order_number;
        $where['status'] =1;
        $number = Db::name('common_master')->where($where)->count();
      
        $this->assign('data',$data);
        $this->assign('order_number',$order_number);
        $this->assign('uid',$uid);
        $this->assign('worker_id',$worker_id);
        $this->assign("num",$num);
        $this->assign("number",$number);
        $this->assign('cate',$cate);
        $this->assign('cate1',$order_number.'category');
        $this->assign('cate2',$order_number.'commodity');
        $this->assign('informat',$informat);
        
        return $this->fetch('ordinary_master_orders');
    }
	
     /**
      * [information description]
      * @return [type] [description]
      * 师傅的个人信息加入
      */     
    public function information(){
        $service = Db::name('service')->field('id,name')->select();
        //品牌表
        $brand = Db::name('brand_list')->field('id,brand')->select();
        $skills = Db::name('skills')->field('id,skill')->select();

        $this->assign('service',$service);
        $this->assign('brand',$brand);
        $this->assign('skills',$skills);
        return view('information_registration'); 
    }
    /**
     * 接受过来服务类型的ID
     */
    public function service(){
        $id=input('bigname');  
        $carr=Db::name("category")->field("id,name")->where('find_in_set('.$id.',s_id)')->select(); //获取商品二类 
        echo json_encode($carr); 
    }
    /**
     * 三级分类
     */
    public function commodity(){
         $id=input('bigname');        
        $carr=Db::name("commodity")->field("id,name")->where('find_in_set('.$id.',c_id)')->select(); //获取商品二类 
        echo json_encode($carr); 
    }
    public function category(){
        $id=input('bigname'); 
     
        $carr=Db::name("commodity")->field("id,name")->where('find_in_set('.$id.',c_id)')->select(); //获取商品二类 
        echo json_encode($carr);
    }
    /**
     * 提交过来的师傅的个人信息
     */
    public function submit_information(){
        $param = input('post.');
        if(empty($param['services'])){
                 return json(array('code'=>-1,'msg'=>'至少选择一个服务类别'));
           }
        if(empty($param['s_time'])){
                 return json(array('code'=>-1,'msg'=>'至少选择一个技能'));
           }
        $wid = session('id');
        $data['nickname']=$param['nikname'];
        $data['province'] = $param['province'];
        $data['city'] = $param['city'];
        $data['town'] = $param['town'];
        $data['service_province'] = $param['service_province'];
        $data['service_city'] = $param['service_city'];
        $data['img'] = $param['img'];
        $users = Db::name('users')->where('id',$wid)->update($data);
        $arr['service_type_id'] =implode(',',$param['services']);
        $arr['work_skill'] = implode(',',$param['s_id']);
        $arr['service_time'] =$param['s_time'];
        $arr['staff_num'] = $param['peopleNumber'];
        $arr['truck_situation'] = $param['huoche'];
       
        $users_worker = Db::name('users_worker')->where('uid',$wid)->update($arr);
        $result['worker_id'] = $wid;
        $result['entry_name'] = $param['pro_name'];
        $result['company'] = $param['company']; 
        foreach ($param['start_time'] as $key => $val) {
             $result['project_start_time'][$key]=strtotime($val);
        }
         foreach ($param['end_time'] as $key => $v) {
             $result['project_end_time'][$key]=strtotime($v);
        }
        $result['brand'] = $param['brand'];
        $result['service_type_id'] = $param['servicess'];
        $result['skill'] = $param['skill'];
        unset($result['worker_id']);
        $keys = array_keys($result);          
        $count1 = count($keys);
        $count2 = count($result[$keys[0]]);        
        for ($i=0; $i < $count2; $i++) {
            for ($j=0; $j < $count1; $j++) {
                $new_arr[$i][$keys[$j]] = $result[$keys[$j]][$i];        
            }
            $new_arr[$i]['worker_id'] = $wid;
        }
       foreach ($new_arr as  $value) {
           $reume = Db::name('reume')->insertGetId($value);
       }        
        if($users || $users==0){
           if($users_worker || $users_worker==0){
                if($reume || $reume==0){
                    return json(array('code'=>200,'msg'=>'个人信息登记成功'));
                }else{
                    return json(array('code'=>0,'msg'=>'个人信息登记失败'));
                }
           }else{
              return json(array('code'=>0,'msg'=>'个人信息登记失败'));
           }
        }else{
           return json(array('code'=>0,'msg'=>'个人信息登记失败'));
        }
    }
	/**
     * 普通师傅同意主任师傅的邀请
     */
    public function confirms(){
        $where['order_number'] = input('post.order_number');
        $where['worker_id'] = input('post.worker_id');
     
       $arr = Db::name('common_master')->where($where)->update(['status'=>1]);
       if($arr || $arr==0){
        return json(array('code'=>200,'msg'=>'接单成功'));
       }else{
        return json(array('code'=>0,'msg'=>'接单失败'));
       }
    }

    /**
     * 普通师傅拒绝主任师傅的邀请
     */
    public function refuse(){
        $where['order_number'] = input('post.order_number');
        $where['worker_id'] = input('post.worker_id');
       $arr = Db::name('common_master')->where($where)->update(['status'=>2]);
       if($arr || $arr==0){
        return json(array('code'=>200,'msg'=>'你拒绝了师傅的邀请'));
       }else{
        return json(array('code'=>0,'msg'=>'拒绝失败'));
       }
    }
}