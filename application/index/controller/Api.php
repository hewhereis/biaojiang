<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\ApiModel;
use app\index\model\ApiorderModel;
use app\index\model\ApimessageModel;
class Api extends Base{
    public function uploadImage(){
        /**
         * 接受提交过来的数据
         * @var unknown
         */
        $time = time();
        $file_data = input('post.file_data');       
        $folder_id = input('post.folder_id');
        $file_id = input('post.file_id');
        $types=input('post.type'); 
        $api = new ApiModel();       
        $folder_name_array = $api-> get_folder_name();
         // 目录参数只允许这几种
         if( !array_key_exists($folder_id, $folder_name_array) ){
             return json(array('code' => '0', 'msg' => '文件目录不对'));
            return FALSE;
         }
        // 文件夹名
        $folder_name = $folder_name_array[$folder_id];
         if (!isset($file_data) || !$file_data) {
             return json(array('code' => '0', 'msg' => '文件不存在'));
             return FALSE;
         }
        // 上传目录路径                    
         $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/';       
         $response = json(array('code' => '0', 'msg' =>''));
        // 匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file_data, $result)) {
            // 文件类型
            $type = $result[2];
            
            // 判断文件类型是否符合要求
            if(!in_array($type, ['jpg','jpeg','gif','png']))
            {
                return json(array('code' => '0', 'msg' => '文件格式不对'));
                return false;             
            }
            //检查是否有该文件夹，如果没有就创建，并给予权限
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777);
            }
            // 文件名                                                                                           
            $file_name = 'biaojiang'.session("id").$types.'_'.md5($time.'f'.$file_id) . ".{$type}";
            // 完整路径
            $full_path = $upload_path . $file_name ;               
            $image_uri = 'uploads/'.$folder_name .'/'. $file_name;                 
            // 上传文件                                
            if (file_put_contents($full_path,base64_decode(str_replace($result[1], '', $file_data))))  {
                // 上传成功
                return json(array('code' => '200', 'msg' => '上传成功','image_uri' => $image_uri));
            } else {
                // 错误信息
                return json(array('code' => '0', 'msg' => '上传失败'));    
            }
        }
    
    }


    //图片上传功能  --- 核单类的
    public function uploadImg(){
        /**
         * 接受提交过来的数据
         * @var unknown
         */
        $time = time();
        $file_data = input('post.file_data');   
        $folder_id = input('post.folder_id');
        $file_id = input('post.file_id');
        $types=input('post.type');
        $api = new ApiModel();       
        $folder_name_array = $api-> get_folder_name();
         // 目录参数只允许这几种
         if( !array_key_exists($folder_id, $folder_name_array) ){
             return json(array('code' => '0', 'msg' => '文件目录不对'));
            return FALSE;
         }
         
        // 文件夹名
        $folder_name = $folder_name_array[$folder_id];
         if (!isset($file_data) || !$file_data) {
             return json(array('code' => '0', 'msg' => '文件不存在'));
             return FALSE;
         }

        // 上传目录路径                    
         $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name;       
         $response = json(array('code' => '0', 'msg' =>''));

        // 匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file_data, $result)) {
            // 文件类型
            $type = $result[2];
            
            // 判断文件类型是否符合要求
            if(!in_array($type, ['jpg','jpeg','gif','png']))
            {
                return json(array('code' => '0', 'msg' => '文件格式不对'));
                return false;             
            }
            //检查是否有该文件夹，如果没有就创建，并给予权限

            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777);
            }

            $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/'.date('Ymd',$time).'/';
                if(!file_exists($upload_path)){
                    mkdir($upload_path, 0777);
                }
            // 文件名                                                                                    
            $file_name = 'biaojiang'.session("id").$types.'_'.md5($time.'f'.$file_id) . ".{$type}";
            // 完整路径
            $full_path = $upload_path . $file_name ;               
            $image_url = 'uploads/'.$folder_name .'/'.date('Ymd',$time).'/'. $file_name;     
            // 上传文件                                
            if (file_put_contents($full_path,base64_decode(str_replace($result[1], '', $file_data))))  {
                // 上传成功
                $ids = Db::name('imgs')->insertGetId(['image'=>$image_url]);
                if($ids){
                    return json(array('code' => '200', 'msg' => '上传成功','ids' => $ids));
                }
                return json(array('code' => '0', 'msg' => '上传失败'));    
            } else {
                // 错误信息
                return json(array('code' => '0', 'msg' => '上传失败'));    
            }
        }
    
    }

    //图片上传功能  --- 签名的
    public function signature(){
        /**
         * 接受提交过来的数据
         * @var unknown
         */

        $time = time();
        $file_data = input('post.file_data');   
        $folder_id = input('post.folder_id');
        $file_id = input('post.file_id');
        $types=input('post.type'); 
        $api = new ApiModel();       
        $folder_name_array = $api-> get_folder_name();
         // 目录参数只允许这几种
         if( !array_key_exists($folder_id, $folder_name_array) ){
             return json(array('code' => '0', 'msg' => '文件目录不对'));
            return FALSE;
         }
       
        // 文件夹名
        $folder_name = $folder_name_array[$folder_id];
         if (!isset($file_data) || !$file_data) {
             return json(array('code' => '0', 'msg' => '文件不存在'));
             return FALSE;
         }

        // 上传目录路径                    
         $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/';

         $response = json(array('code' => '0', 'msg' =>''));
        // 匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file_data, $result)) {
            // 文件类型
            $type = $result[2];
            
            // 判断文件类型是否符合要求
            if(!in_array($type, ['jpg','jpeg','gif','png']))
            {
                return json(array('code' => '0', 'msg' => '文件格式不对'));
                return false;             
            }
            //检查是否有该文件夹，如果没有就创建，并给予权限
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777);

            }
            $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/'.date('Ymd',$time).'/';
                if(!file_exists($upload_path)){
                    mkdir($upload_path, 0777);
                }
            //文件名                                                                                    
            $file_name = 'biaojiang'.session("id").$types.'_'.md5($time.'f'.$file_id) . ".{$type}";
            
            // 完整路径
            $full_path = $upload_path . $file_name ;               
            $image_url = 'uploads/'.$folder_name .'/'.date('Ymd',$time).'/'. $file_name;  
                          
            // 上传文件                                
            if (file_put_contents($full_path,base64_decode(str_replace($result[1], '', $file_data))))  {
                // 上传成功
                $ids = Db::name('signature')->insertGetId(['image'=>$image_url,'order_number'=>$file_id]);
                if($ids){
                    return json(array('code' => '200', 'msg' => '上传成功','ids' => $ids));
                }
                return json(array('code' => '0', 'msg' => '上传失败'));    
            } else {
                // 错误信息
                return json(array('code' => '0', 'msg' => '上传失败'));    
            }
        }
    
    }
    //图片上传功能  --- 勘测签名的
    public function survey_signature(){
        /**
         * 接受提交过来的数据
         * @var unknown
         */
	


        $time = time();
        $file_data = input('post.file_data');   
        $folder_id = input('post.folder_id');
        $file_id = input('post.file_id');
        $types=input('post.type'); 
		$links=input('post.links'); 
        $api = new ApiModel();       
        $folder_name_array = $api-> get_folder_name();
         // 目录参数只允许这几种
         if( !array_key_exists($folder_id, $folder_name_array) ){
             return json(array('code' => '0', 'msg' => '文件目录不对'));
            return FALSE;
         }
       
        // 文件夹名
        $folder_name = $folder_name_array[$folder_id];
         if (!isset($file_data) || !$file_data) {
             return json(array('code' => '0', 'msg' => '文件不存在'));
             return FALSE;
         }

        // 上传目录路径                    
         $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/';

         $response = json(array('code' => '0', 'msg' =>''));
        // 匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file_data, $result)) {
            // 文件类型
            $type = $result[2];
            
            // 判断文件类型是否符合要求
            if(!in_array($type, ['jpg','jpeg','gif','png']))
            {
                return json(array('code' => '0', 'msg' => '文件格式不对'));
                return false;             
            }
            //检查是否有该文件夹，如果没有就创建，并给予权限
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777);

            }
            $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/'.date('Ymd',$time).'/';
                if(!file_exists($upload_path)){
                    mkdir($upload_path, 0777);
                }
            //文件名                                                                                    
            $file_name = 'biaojiang'.session("id").$types.'_'.md5($time.'f'.$file_id) . ".{$type}";
            
            // 完整路径
            $full_path = $upload_path . $file_name ;               
            $image_url = 'uploads/'.$folder_name .'/'.date('Ymd',$time).'/'. $file_name;  
                          
            // 上传文件                                
            if (file_put_contents($full_path,base64_decode(str_replace($result[1], '', $file_data))))  {
                // 上传成功
				
				//给客户发送消息
				$owner_id=Db::name("orders")->field('worker_id')->where('order_number',$file_id)->find();
				$map['message_type']='1';
				$map['source_id']='0';
				$map['receive_id']=$owner_id['worker_id'];
				$map['content']='客户已确认了勘测报告表,点击查看';
				$map['link']=$links;
				$map['status']='0';
				$map['sending_time']=date("Y-m-d H:i:s");
				Db::name('message_reminder')->insert($map);
				
				
			
				$ds_data['user_sign']=$image_url;
				$ds_data['is_ok']='1';
				
				$data['step_number']='7';
				$data['work_step_number']='5';
				$data['status']='5';
				
				
				$result=Db::name("survey_presentation")->where('order_number',$file_id)->update($ds_data);
						Db::name("orders")->where('order_number',$file_id)->update($data);
				if(false === $result){             
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}else{
					return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
				}
                   
            } else {
                // 错误信息
                return json(array('code' => '0', 'msg' => '上传失败'));    
            }
        }
    
    }
	
	public function repairOrders($onumber){
		$api = new ApiorderModel();
		$repair_array = $api->repair_orders($onumber);
		if(empty($repair_array)){
			return json(array('code' => '0', 'msg' => '订单编号不存在'));  
		}else{
			return json(array('code' => '200', 'rorders' => $repair_array));
		}
	}
	/*
	*type:消息类型：1系统消息2订单消息
	*sid:消息来源对应userid
	*rid:接收人对应userid
	*content:发送的内容
	*time:发送的时间
	*/
	public function message(){
		$param = input();
		$api = new ApimessageModel();
		$flag = $api->new_message($param);
		return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
	}
	public function message_refresh(){
		$uid=session('id');
		$where['receive_id']=$uid;
		$where['status']='0';
		$carr=Db::name("message_reminder")->where($where)->count();//统计当前登录者未读消息
		echo json_encode($carr);	
	}
    //判断是微信登陆还是PC端登陆
      
      
    function is_weixin() { 
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) { 
        return true; 
       } 
      return false; 
     }


     //判断是否考试和平台等级
    public function goExamOrDie(){
        $id = session('id');//获取当前用户id
        $EcordWhere = ['uid'=>$id,'exam_score'=>['>=',60]];
        $examEcord = Db::name('exam_record')->where($EcordWhere)->count();//计算考试通过的次数
        $platform_level = Db::name('users_worker')->where('uid',$id)->value('platform_level');
        if($platform_level<=2){
            if($examEcord==0){
                return json(['code'=>1,'data'=>'','msg'=>'']);
            }else{
                $examtag= \think\Config::get('examConfig');
                $list = Db::name('exam_group')->field('id')->where("tags_id",$examtag['selectTag'])->select();
                $max =  count($list);
                $i = rand(0,$max-1);
                return json(['code'=>3,'data'=>$list[$i],'msg'=>'']);
            }
        }
        return json(['code'=>2,'data'=>'','msg'=>'']);
        
    }
		  //判断当前登陆者的默认地址
    public function goUidaddress(){
        $id = session('id');//获取当前用户id
		$where['uid']=$id;
		$where['default']=1;
		$address=Db::name('client_loaction')->where($where)->find();
		echo json_encode($address);
    
        
    }
	
	  public function ds_is_sign(){
      
        $id = session('id');//获取当前用户id
		$where['id']=$id;
		$data['is_sign']='0';
		Db::name('users')->where($where)->update($data);
		
    
        
    }
    

     //图片上传功能  --- 围板搭建签名的
    public function coaming_signature(){
        /**
         * 接受提交过来的数据
         * @var unknown
         */
    


        $time = time();
        $file_data = input('post.file_data');   
        $folder_id = input('post.folder_id');
        $file_id = input('post.file_id');
        $types=input('post.type'); 
        $links=input('post.links'); 
        $api = new ApiModel();       
        $folder_name_array = $api-> get_folder_name();
         // 目录参数只允许这几种
         if( !array_key_exists($folder_id, $folder_name_array) ){
             return json(array('code' => '0', 'msg' => '文件目录不对'));
            return FALSE;
         }
        // 文件夹名
        $folder_name = $folder_name_array[$folder_id];
         if (!isset($file_data) || !$file_data) {
             return json(array('code' => '0', 'msg' => '文件不存在'));
             return FALSE;
         }
        // 上传目录路径                    
         $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/';

         $response = json(array('code' => '0', 'msg' =>''));
        // 匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file_data, $result)) {
            // 文件类型
            $type = $result[2];
            
            // 判断文件类型是否符合要求
            if(!in_array($type, ['jpg','jpeg','gif','png']))
            {
                return json(array('code' => '0', 'msg' => '文件格式不对'));
                return false;             
            }
            //检查是否有该文件夹，如果没有就创建，并给予权限
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777);
            }
            $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/'.date('Ymd',$time).'/';
                if(!file_exists($upload_path)){
                    mkdir($upload_path, 0777);
                }
            //文件名                                                                                    
            $file_name = 'biaojiang'.session("id").$types.'_'.md5($time.'f'.$file_id) . ".{$type}";
            // 完整路径
            $full_path = $upload_path . $file_name ;               
            $image_url = 'uploads/'.$folder_name .'/'.date('Ymd',$time).'/'. $file_name;  
                          
            // 上传文件                                
            if (file_put_contents($full_path,base64_decode(str_replace($result[1], '', $file_data))))  {
                // 上传成功
                
                //给客户发送消息
                $owner_id=Db::name("orders")->field('worker_id')->where('order_number',$file_id)->find();
                $map['message_type']='1';
                $map['source_id']='0';
                $map['receive_id']=$owner_id['worker_id'];
                $map['content']='客户已确认了围板搭建报告表,点击查看';
                $map['link']=$links;
                $map['status']='0';
                $map['sending_time']=date("Y-m-d H:i:s");
                Db::name('message_reminder')->insert($map);
                
                
            
                $ds_data['user_sign']=$image_url;
                $ds_data['is_ok']='1';
                $step = Db::name('orders')->where('order_number',$file_id)->field('step_type')->find();
                if($step['step_type']==8){
                   $data['step_number']='9';
                   $data['status']='5';
                }else if($step['step_type']==9){
                   $data['step_number']='9';
                   $data['status']='5';
                }
                $result=Db::name("coaming_report")->where('order_number',$file_id)->update($ds_data);
                        Db::name("orders")->where('order_number',$file_id)->update($data);
                if(false === $result){             
                    return ['code' => 0, 'data' => '', 'msg' => '-1'];
                }else{
                    return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
                }
                   
            } else {
                // 错误信息
                return json(array('code' => '0', 'msg' => '上传失败'));    
            }
        }
    
    }
   
       //图片上传功能  --- 更换幻灯片签名的
    public function replace_signature(){
        /**
         * 接受提交过来的数据
         * @var unknown
         */
        $time = time();
        $file_data = input('post.file_data');   
        $folder_id = input('post.folder_id');
        $file_id = input('post.file_id');
        $types=input('post.type'); 
        $links=input('post.links'); 
        $api = new ApiModel();       
        $folder_name_array = $api-> get_folder_name();
         // 目录参数只允许这几种
         if( !array_key_exists($folder_id, $folder_name_array) ){
             return json(array('code' => '0', 'msg' => '文件目录不对'));
            return FALSE;
         }
        // 文件夹名
        $folder_name = $folder_name_array[$folder_id];
         if (!isset($file_data) || !$file_data) {
             return json(array('code' => '0', 'msg' => '文件不存在'));
             return FALSE;
         }
        // 上传目录路径                    
         $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/';

         $response = json(array('code' => '0', 'msg' =>''));
        // 匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file_data, $result)) {
            // 文件类型
            $type = $result[2];
            
            // 判断文件类型是否符合要求
            if(!in_array($type, ['jpg','jpeg','gif','png']))
            {
                return json(array('code' => '0', 'msg' => '文件格式不对'));
                return false;             
            }
            //检查是否有该文件夹，如果没有就创建，并给予权限
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777);
            }
            $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/'.date('Ymd',$time).'/';
                if(!file_exists($upload_path)){
                    mkdir($upload_path, 0777);
                }
            //文件名                                                                                    
            $file_name = 'biaojiang'.session("id").$types.'_'.md5($time.'f'.$file_id) . ".{$type}";
            // 完整路径
            $full_path = $upload_path . $file_name ;               
            $image_url = 'uploads/'.$folder_name .'/'.date('Ymd',$time).'/'. $file_name;  
                          
            // 上传文件                                
            if (file_put_contents($full_path,base64_decode(str_replace($result[1], '', $file_data))))  {
                // 上传成功
                
                //给客户发送消息
                $owner_id=Db::name("orders")->field('worker_id')->where('order_number',$file_id)->find();
                $map['message_type']='1';
                $map['source_id']='0';
                $map['receive_id']=$owner_id['worker_id'];
                $map['content']='客户已确认了更换幻灯片报告表,点击查看';
                $map['link']=$links;
                $map['status']='0';
                $map['sending_time']=date("Y-m-d H:i:s");
                Db::name('message_reminder')->insert($map);
                
                
            
                $ds_data['user_sign']=$image_url;
                $ds_data['is_ok']='1';
                $step = Db::name('orders')->where('order_number',$file_id)->field('step_type')->find();
                if($step['step_type']==6){
                   $data['step_number']='9';
                   $data['status']='5';
                }else if($step['step_type']==7){
                   $data['step_number']='9';
                   $data['status']='5';
                }
                $result=Db::name("replace_report")->where('order_number',$file_id)->update($ds_data);
                        Db::name("orders")->where('order_number',$file_id)->update($data);
                if(false === $result){             
                    return ['code' => 0, 'data' => '', 'msg' => '-1'];
                }else{
                    return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
                }
                   
            } else {
                // 错误信息
                return json(array('code' => '0', 'msg' => '上传失败'));    
            }
        }
    
    }
    //图片上传功能  --- 安装签名的
    public function install_signature(){
        /**
         * 接受提交过来的数据
         * @var unknown
         */
        $time = time();
        $file_data = input('post.file_data');   
        $folder_id = input('post.folder_id');
        $file_id = input('post.file_id');
        $types=input('post.type'); 
        $links=input('post.links'); 
        $api = new ApiModel();       
        $folder_name_array = $api-> get_folder_name();
         // 目录参数只允许这几种
         if( !array_key_exists($folder_id, $folder_name_array) ){
             return json(array('code' => '0', 'msg' => '文件目录不对'));
            return FALSE;
         }
        // 文件夹名
        $folder_name = $folder_name_array[$folder_id];
         if (!isset($file_data) || !$file_data) {
             return json(array('code' => '0', 'msg' => '文件不存在'));
             return FALSE;
         }
        // 上传目录路径                    
         $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/';

         $response = json(array('code' => '0', 'msg' =>''));
        // 匹配出图片的格式
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $file_data, $result)) {
            // 文件类型
            $type = $result[2];
            
            // 判断文件类型是否符合要求
            if(!in_array($type, ['jpg','jpeg','gif','png']))
            {
                return json(array('code' => '0', 'msg' => '文件格式不对'));
                return false;             
            }
            //检查是否有该文件夹，如果没有就创建，并给予权限
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777);
            }
            $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/'.date('Ymd',$time).'/';
                if(!file_exists($upload_path)){
                    mkdir($upload_path, 0777);
                }
            //文件名                                                                                    
            $file_name = 'biaojiang'.session("id").$types.'_'.md5($time.'f'.$file_id) . ".{$type}";
            // 完整路径
            $full_path = $upload_path . $file_name ;               
            $image_url = 'uploads/'.$folder_name .'/'.date('Ymd',$time).'/'. $file_name;  
                          
            // 上传文件                                
            if (file_put_contents($full_path,base64_decode(str_replace($result[1], '', $file_data))))  {
                // 上传成功
                
                //给客户发送消息
                $owner_id=Db::name("orders")->field('worker_id')->where('order_number',$file_id)->find();
                $map['message_type']='1';
                $map['source_id']='0';
                $map['receive_id']=$owner_id['worker_id'];
                $map['content']='客户已确认了安装片报告表,点击查看';
                $map['link']=$links;
                $map['status']='0';
                $map['sending_time']=date("Y-m-d H:i:s");
                Db::name('message_reminder')->insert($map);
                
                
                
               
                $ds_data['img7']=$image_url;
                $ds_data['is_ok']='1';
                $step = Db::name('orders')->where('order_number',$file_id)->field('step_type')->find();
                if($step['step_type']==3){
                   $data['step_number']='9';
                   $data['status']='5';
                }else if($step['step_type']==4){
                   $data['step_number']='9';
                   $data['status']='5';
                }
                $result=Db::name("install_tupian")->where('order_number',$file_id)->update($ds_data);
                        Db::name("orders")->where('order_number',$file_id)->update($data);
                if(false === $result){             
                    return ['code' => 0, 'data' => '', 'msg' => '-1'];
                }else{
                    return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
                }
                   
            } else {
                // 错误信息
                return json(array('code' => '0', 'msg' => '上传失败'));    
            }
        }
    
    }

}