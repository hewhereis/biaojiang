<?php
  
  namespace  app\index\controller;
 
use think\Controller;
use think\Db;
use app\index\model\PersonalcenterModel;
use  app\index\controller\Api;
  
  class  Personalcenter  extends  Base{

  /*
    考试中心 
   */
    
   public  function  index(){
        
       $id=session('id');
       // $id='36';
       $master_info=Db::name('users') ->where('id',$id)->value('img');//获取师傅头像
       $times=Db::name('exam_record')->where('uid',$id)->count();//师傅考试次数   
       $correct_time=Db::name('exam_record')->where('uid',$id)->where('exam_score','>','60')->count();//师傅参加考试及格的次数
  	   $average=@floor($correct_time/$times*100); //考试通过率
       $rule=Db::name('users_worker')->where('uid',$id)->field('platform_level')->find();//师傅平台等级
       $this->assign('average',$average); 
       $this->assign('rule',$rule['platform_level']);  
       $this->assign('headerImg',$master_info);
       $this->assign('num',$times);
       $this->assign('id',$id);

   	  return  $this->fetch('examcenter');
   }


   /*
    选择考试项目
    */
   public function  choice(){

   	//考题配置
   	$examConfig = config('examConfig');

   	$examlist =  Db::name('exam_tags')->where('id','not in',$examConfig)->select();
   	// var_dump($examlist[0]);
   	// die;

   	foreach($examlist as $key=>$val){
   		$examlist[$key]['lists'] = Db::name('exam_group')->where('tags_id',$val['id'])->field('id,group_title')->select();
   	
   	}
   	$this->assign('list',json_encode($examlist));

    

   	return $this->fetch('examselect');
   }

   /*
    进行考试
    */
   public  function  proceed_exam($examGroupId){
        $id=session('id');
        // $id=36;
        /*
         求出第一条题目的信息
         */
        $addwhere=['uid'=>$id,'exam_group_id'=>input('examGroupId'),'create_time'=>time()];
        $examRecordId=Db::name('exam_record')->insertGetId($addwhere);
        $exam=Db::name('exam_group')->where('id',$examGroupId)->find();
   
        $examids=explode(',',$exam['exam_ids']);//列出题目id
        array_pop($examids);
        sort($examids); //排序

        $exam['count']=count($examids);//计算个数
        $counts=$exam['count'];
       
        // $firstExam=Db::name('exam')->where('id',$examids[1])->find();//找到第一题

        $this->assign('examids',json_encode($examids));
        $this->assign('examfirst',json_encode($examids[0]));
        $this->assign('examGroupId',json_encode($examGroupId));
        $this->assign('examRecordId',json_encode($examRecordId)); 
   
   	  return $this->fetch('examing');
   } 

    /*
      题目提交
     */
   public function examination_submit(){
   		$correct = [1,2,3,4];
   		$param = input();
   		if(!$param){
   			return json(['msg'=>''],404);
   		}
   		if(!$param['examids'] || !is_numeric($param['examids']+0) || !($param['examids']+0)>0 ){
   			return json(['msg'=>''],404);
   		}
   		if(!in_array(($param['correct']+0),$correct)){
   			return json(['msg'=>''],404);
   		}
   		$res = $param['correct']+0;
   		$result = Db::name('exam')->where('id',$param['examids'])->value('correct');
   		$s=[$res,$result];
   		if($result === $res){
   			return json(['code'=>200,'data'=>$s,'msg'=>'回答正确'],200);
   		}else{
   			return json(['code'=>400,'data'=>$s,'msg'=>'回答错误'],200);
   		}
   		exit;
        

   }

   public function getExam($ids){
   	$ids = input('ids');
   	if(!$ids || ($ids+0)<=0){
   		return json(['code'=>200,'data'=>'','msg'=>'没有！'],400);
   	}
   	$examWhere=[
   		'id'=>$ids,
   		'status'=>1
   	];
   	$examinfo = Db::name('exam')->where($examWhere)->field('id,question,option1,option2,option3,option4')->find();
   	if($examinfo){
   		return json(['code'=>200,'data'=>$examinfo,'msg'=>'请求成功'],200);
   	}else{
   		return json(['code'=>10000,'data'=>'','msg'=>'没有！'],400);
   	}
  }


  /*
   交卷
   */
   public function  assignment(){
   	 $count=input('post.');
 
   	 $examListCount= count($count['examListCount']);
   	 $examRight=$count['examRight'];
   	 $examRecordId=$count['examRecordId'];

   	 $scort=@floor($examRight/$examListCount*100);//求出分数
   	
     if($scort>=0 || $scort<=100){
        $flag=Db::name('exam_record')->where('id',$examRecordId)->update(['exam_score'=>$scort]);
        if($flag){
        	 return json(['code'=>200,'data'=>$scort,'msg'=>'交卷成功']);
        }else{
        	 return json(['code'=>0,'data'=>$scort,'msg'=>'交卷成功']);
        }
     }   
   	

   	
   }


  /*
     师傅得分情况
   */
   public function score(){
    $id=session('id');
   	// $id=36;
   	$score=Db::name('exam_record')->where('uid',$id)->field('exam_score')->order('id desc')->find();
    $name=Db::name('users_worker')->where('uid',$id)->field('real_name')->find();

    $this->assign('name',$name['real_name']);
    $this->assign('score',$score['exam_score']);
 
   	return  $this ->fetch('assignment');
   } 


//客户个人中心
  public function customer_home(){
    $uid=session('id');
    $type=session('type');
    $ds_url=\think\Config::get('view_replace_str');
    if($type==2){
      $this->redirect($ds_url['__PUBLIC__'].'master_home');//跳转师傅订单管理页面
    }
    $core = new PersonalcenterModel();

    $this->assign('customer',$core->customer_home($uid,$type));
    return view('personalcenter/customer_home');
  }
  //个人资料页面
  public function cus_information(){
    $uid=session('id'); $type=session('type');
    $core = new PersonalcenterModel();
        $api=new Api();
        $type=session('type');
        $work_skillw= $api->service_type_ids();
        $this->assign('work_skillw',json_encode($work_skillw));
        $this->assign('type',$type);
    $this->assign('customer',json_encode($core->customer_home($uid,$type)));
    return view('personalcenter/cus_information');
  }
  //个人昵称页面
  public function nickname(){
    $uid=session('id');
     $type=session('type');
    $core = new PersonalcenterModel();
    
    $this->assign('customer',$core->customer_home($uid,$type));
    return view('personalcenter/nickname');
  }

    //修改昵称
  public function nickname_ajax(){
    $uid=session('id');
    $username=input('username');
    
    $list=Db::name('users')->where('id',$uid)->setField('username',$username);
    if($list){
        session('ds_username',null);
            session('ds_username',$username);
      return ['code' => 200,  'msg' => '修改成功'];
    }else{
      return ['code' => 0,  'msg' => '新的昵称不能和旧昵称相同'];
    }
    
    
    
  }
  //个人手机号页面
  public function modifyphone(){
    $uid=session('id');
    return view('personalcenter/modifyphone');
    
    
  }
  //个人手机号修改ajax
  public function modifyphone_ajax(){
    $uid=session('id');
    
    $params=input();
    $phone=$params['phone'];
    $captcha=$params['captcha'];
    
    if(!is_numeric($captcha)){
      return ['code' => 0, 'data' => '', 'msg' => '验证码输入错误'];
    }
    
    $user = Db::name('sms_captcha_log');
        $list = $user->where('phone',$phone)->field('captcha')->order('id desc')->limit(1)->find();
        if($captcha==$list['captcha']){
        $list=Db::name('users')->where('id',$uid)->setField('phone',$phone);
        if($list){
          return ['code' => 200,  'msg' => '修改成功'];
        }else{
          return ['code' => 0,  'msg' => '新的手机号不能和旧手机号相同'];
        }
      
    }else{
      return ['code' => 0, 'data' => '', 'msg' => '验证码输入错误'];
    }
    
    
  }
//  个人头像修改
 public function head(){
     $uid=session('id');
     $params=input();
     $img=$params['img'];
         $list=Db::name('users')->where('id',$uid)->setField('img',$img);

     if($list){
         return json(['code' => 200,  'msg' => '修改成功']);
     }else{
         return json(['code' => 400,  'msg' => '修改失败']) ;
     }
 }
    //  个人服务类型修改
    public function head1(){
        $uid=session('id');
        $params=input("post.");
        $service_type_id=$params['service_type_id'];
        $list=Db::name('users_worker')->where('uid',$uid)->update(['service_type_id'=>$service_type_id]);
        if($list){
            return json(['code' => 200,  'msg' => '修改成功']);
        }else{
            return json(['code' => 400,  'msg' => '修改失败']) ;
        }
    }
    //  个人服务类型修改
    public function head2(){
        $uid=session('id');
        $params=input("post.");
        $sex=$params['sex'];
        $list=Db::name('users')->where('id',$uid)->update(['sex'=>$sex]);
        if($list){
            return json(['code' => 200,  'msg' => '修改成功']);
        }else{
            return json(['code' => 400,  'msg' => '修改失败']) ;
        }
    }
  /**
     *修改所在地区
     */
  public function head3(){
      $uid = session('id');
        $param=input("post.");
        $data['province'] = $param['dizhi'][0];
        $data['city'] = $param['dizhi'][1];
        $data['town'] = $param['dizhi'][2];
        $list=Db::name('users')->where('id',$uid)->update($data);
        if(empty($list)){
            return json(['code' => 400,  'msg' => '修改地址失败']) ;
        }else{
            return json(['code' => 200,  'msg' => '修改地址成功']);
        }
    }
    /**
     *密码管理页面
     */
    public function pwd(){
      return view('pwd');
    }
    /**
     * 修改登录密码
     */
    public function login_pwd(){
        return view('xiugaimima');
    }
    /***
     * 修改登录密码AJAX
     */
    public function login_pwd_ajax(){
        $param = input();
        $uid = session('id');
        //获取数据表原来的密码
        $getPwd = Db::name('users')->where('id',$uid)->field('password')->find();
        if($getPwd['password']==md5($param['old_pwd'])){
            $data['password'] = md5($param['new_pwd']);
            $list = Db::name('users')->where('id',$uid)->update($data);
            if($list || $list==0){
                return json(['code'=>200,'msg'=>'修改密码成功']);
            }else{
                return json(['code'=>0,'msg'=>'修改密码出现一点小问题']);
            }
        }else{
            return json(['code'=>0,'msg'=>'原密码输入错误']);
        }
    }
    /**
     * 修改支付密码页面
     */
    public function pay_pwd(){
        $uid = session('id');
        $phone = Db::name('users')->where('id',$uid)->field('phone')->find();
        $this->assign('phone',$phone['phone']);
        return view('zhifumima');
    }
    /**
     * 提交过来的验证码
     */
    public function chapt(){
       $param = input();
       $captcha = Db::name('sms_captcha_log')->where('phone',$param['phone'])->field('captcha')->order('id desc')->find();
       if($param['yanzheng']==$captcha['captcha']){
           return json(['code'=>200,'msg'=>'']);
       }else{
           return json(['code'=>0,'msg'=>'验证码输入错误']);
       }
    }


   
}  
