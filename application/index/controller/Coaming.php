<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\CoamingModel;
class Coaming extends Controller
{

    public function _initialize()
    {
        parent::_initialize();
    }
    public function coaming_construct_dismantle()
    {
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
         //查找品牌
        $brand=Db::name("brand_list")->select();
        $this->assign('brand',$brand);
        $this->page_title = '围板搭建/拆除订单创建';
        $this->assign('page_title', $this->page_title);
        $ds_loca['uid']=$uid;
        $ds_loca['default']=1;
        $loaction = Db::name('client_loaction')->where($ds_loca)->find();//获取当前客户地址管理
        $this->assign('loaction',$loaction);
        return $this->fetch();
    }

    //围板搭建下单提交action。
    public function coaming_submit(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $param = input('post.');
        $param['uid']=session('id');
        $info = new CoamingModel();
        $flag = $info->addCoaming($param);
        return json(['code'=>$flag['code'],'msg'=>$flag['msg']]);
    }  

  //安装 甩单配师傅 初始化变量
   public function coaming_jilt_single($order_number){ 
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
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
       //查找订单详细信息(时间,地址,姓名)
       $orders = Db::name('orders')->where('order_number',$order_number)->field('full_location,contact_name,start_time')->find();
       $this->assign('order_number',$order_number);
       $this->assign('uid',$uid);
       $this->assign('orders',$orders);
      return  $this->fetch("coaming_jilt_single");
   }
    /**
     * [addBuget description]
     * 客户招募师傅页面
     */
   public function addBuget(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

       $param = input('post.');


       $info = new CoamingModel();
       $flag = $info->addBuget($param);
       return json(['code'=>$flag['code'],'msg'=>$flag['msg']]); 
   }
    /**
     * [coaming_message_pairing description]
     * @param  [type] $order_number [description]
     * @return [type]               [description]
     * 留言配单
     */
    public function coaming_message_pairing($order_number){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        
       
        $order_number = $order_number;
         //查找订单详细信息(时间,地址,姓名)
        $orders = Db::name('orders')->where('order_number',$order_number)->field('full_location,contact_name,start_time')->find();
         //判断是围板还是搭建
       $coaming= Db('orders_coaming')->where('order_number',$order_number)->field('constructdate,dismantledate,comments,budget,tender')->find();
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
       //该项目有多少个师傅抢单
       $rob=Db::name("orders")->field('rob_num')->where('order_number',$order_number)->find();
       //判断是师傅还是客户登陆
       $result = Db::name('users')->where('id='.$uid)->field('type')->find();
        //查询师傅和客户对订单的留言
        $where['m.order_number'] =$order_number;
        $where['m.status'] = 1;
        $message = Db::name('users')
            ->alias('u')
            ->join('message m','u.id = m.uid')
            ->where($where)
            ->select();
         $this->assign('message',$message);
         $this->assign('result',$result);
         $this->assign('order_number',$order_number);
         $this->assign('budget',$coaming);
         $this->assign('orders',$orders);
         $this->assign('rob_num',$rob);
        return view("coaming_message_pairing");
    }
    /**
     * 师傅投标页面
     */
    public function coaming_grab($order_number){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

      $order_number = $order_number;
      
      //查出下单者ID,时间,地址,姓名
      $orders = Db::name('orders')->where('order_number',$order_number)->field('owner_id,full_location,contact_name,start_time')->find();  
       //判断是围板还是搭建
       $coaming= Db('orders_coaming')->where('order_number',$order_number)->field('constructdate,dismantledate,comments,budget')->find();
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
      $this->assign('order_number',$order_number);
      $this->assign('orders',$orders);
      $this->assign('uid',$uid);
      return view('coaming_grab_order');
    }
     /**
     * 改变维修主表状态
     */
    public function coaming_change_status(){
          $uid=session('id');//获取先前登陆者ID
          $ds_where['receive_id']=$uid;
          $ds_where['status']='0';
          $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
          $this->assign('carr',$carr);

         $order_number = input('post.number');
         $where['owner_id']=$uid;
         $where['order_number']=$order_number;
         $cha=Db::name("orders")->field('worker_id')->where($where)->find();
         if($cha['worker_id']==0){
                $ds_where['receive_id']=$uid;
                $ds_where['status']='0';
                $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
                $this->assign('carr',$carr);
                $order = Db::name('orders')->where('order_number',$order_number)->update(['step_number'=>4]);
                if($order || $order==0){
                    return json(array('code'=>200,'msg'=>''));
                }else{
                    return json(array('code'=>0,'msg'=>''));
                }
         }else{
            return json(array('code'=>0,'msg'=>'不能重复选择师傅'));
         } 
    }

     //    故障详情

    public function install_order($order_num){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $a= db('orders_install')->where('order_number',$order_num)->find();
       $this->assign('a',$a);
        $co1=db('category')->where('id', $a["category"])->find();
        $co2=db('commodity')->where('id', $a['commodity'])->find();
        $co3=db('goods')->where('id', $a["commoditys"])->find();
        $this->assign('co1',$co1["name"]);
        $this->assign('co2',$co2["name"]);
        $this->assign('co3',$co3["name"]);
        return view("install_order");
    }
    /**
     * 客户选师傅页面
     */
    public function coaming_order_calibrate($order_number){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$order_number;
        //查出下单者ID,时间,地址,姓名
        $orders = Db::name('orders')->where('order_number',$order_number)->field('full_location,contact_name,start_time')->find();
        //判断是围板还是搭建
       $coaming= Db('orders_coaming')->where('order_number',$order_number)->field('constructdate,dismantledate,comments,budget')->find();
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
       //选择单子的师傅个人信息
        $evaluate = Db::name('offer_total')
            ->alias('o')
            ->join('users_worker u','u.uid = o.worker_id')
            ->where('o.order_number',$order_number)
            ->select(); 
        $this->assign('order_number',$order_number);
        $this->assign('orders',$orders);
        $this->assign('budget',$coaming);
        $this->assign('evaluate',$evaluate);
        return view('coaming_order_calibrate');
    }

    /**
     * 客户选择师傅
     */
    public function coaming_selected(){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

       $order_number = input('post.number');
        //接受选择师傅的ID
       $result = input('post.samm');
       $link =input('post.link');
       $where['worker_id'] = $result;
       $where['order_number'] = $order_number;
       $offer = Db::name('offer')->where($where)->field('tender_cost')->find();
       //更新安装附表的项目价钱
       $arr =  Db::name('orders_coaming')->where('order_number',$order_number)->update(['tender_cost'=>$offer['tender_cost'],'worker_id'=>$result]);
       //客户选择师傅后，更新orders表字段。
       $offer_total = Db::name('offer_total')->where($where)->field('amount_engineer')->find();
           $datas =([
            'amount_engineer'=>$offer_total['amount_engineer'],
            'is_invitation'=>1,'worker_id'=>$result,'status'=>2,
            'step_number'=>5,'master_status'=>2
           ]);  
        $lists = Db::name('orders')->where('order_number',$order_number)->update($datas);
        if($lists || $lists==0){
            $data['message_type'] = 2;
            $data['source_id'] = $uid;
            $data['receive_id'] = $result;
            $data['content'] = "你抢的订单已被客户选择，请前往查看";
            $data['link'] = $link ;
            $data['sending_time'] = date('Y-m-d H:i:s',time());
            Db::name('message_reminder')->insert($data);
            return json(array('code'=>200,'msg'=>'选择师傅成功'));
        }else{
            return json(array('code'=>0,'msg'=>'选择师傅出现一点问题哦,请重新选择'));
        }
    }
    /**
     * [coaming_settlement description]
     * @param  [type] $order_number [description]
     * @return [type]               [description]
     * 客户点击付款页面
     */
     public function coaming_settlement($order_number){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number = $order_number;
        //查出下单者ID,时间,地址,姓名
        $orders = Db::name('orders')->where('order_number',$order_number)->field('full_location,contact_name,start_time,step_type')->find();
        //判断是围板还是搭建
       $coaming= Db('orders_coaming')->where('order_number',$order_number)->field('constructdate,dismantledate,comments,budget')->find();
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
       //查询客户选择的师傅
        $where['is_invitation'] = 1;
        $where['order_number']=$order_number;
        $wid = Db::name('orders')->where($where)->field('worker_id')->find();
        $wheres['order_number'] = $order_number;
        $wheres['worker_id'] =  $wid['worker_id'];
        $total = Db::name('offer_total')->where($wheres)->field('totals')->find();
        $result = Db::name('orders')->where($where)->find();
        $this->assign('order_number',$order_number);
        $this->assign('orders',$orders);
        $this->assign('total',$total['totals']);
        $this->assign('result',$result);
        $this->assign('budget',$coaming);
        return view('coaming_settlement_page');
     }
     /**
      * 判断师傅是否抢单
      */
     public function coaming_ajax_me_q(){
        $uid=session('id');//获取先前登陆者ID
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $param=input('post.');
        $uid=$param['uid'];
        $number=$param['number'];
        $worker_id = Db::name('orders')->where('order_number',$number)->value('worker_id');
        if($worker_id===0 || $worker_id==session('id')){
            if($worker_id!=session('id')){
                $where['worker_id']=$uid;
                $where['order_number']=$number;
                $list=Db::name("offer_total")->field('is_rob')->where($where)->find();
                if($list['is_rob']==0){
                    return json(array('code'=>200,'msg'=>''));
                }else{
                   return json(array('code'=>0,'msg'=>'请勿重复抢单！')); 
                }
            }
            else{
                return json(array('code'=>0,'msg'=>'请勿重复抢单！'));
            }
        }else{
            return json(array('code'=>0,'msg'=>'来晚一步，订单已经被别的师傅抢掉了！'));
        }

    }
    /**
     * [coaming_detail description]
     * @param  [type] $order_number [description]
     * @return [type]               [description]
     * 围板搭建故障详情
     */
    public function coaming_detail($order_number){
      $uid=session('id');//获取先前登陆者ID
      $ds_where['receive_id']=$uid;
      $ds_where['status']='0';
      $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
      $this->assign('carr',$carr);
        
      $order_number = $order_number;
      $coaming = Db::name('orders_coaming')->where('order_number',$order_number)->find();
      $this->assign('coaming',$coaming);
       return view('coaming_details');
    }
    /**
     * [coaming_master_presentation description]
     * @param  [type] $order_number [description]
     * @return [type]               [description]
     * 围板搭建施工师傅报告页面
     */
    public function coaming_master_presentation($order_number){
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
      $field='o.contact_name,o.location_ext,o.full_location,o.contact_phone,u.real_name,u.phone';
      $order = Db::name('orders')->alias('o')->field($field)->join('users u','u.id=o.worker_id')->where('o.order_number='.$order_number)->find();
      $list=Db::name('coaming_report')->where('order_number',$order_number)->find();
      $info=Db::name('orders_coaming')->where('order_number',$order_number)->find();
      $this->assign('order',$order);
      $this->assign('order_number',$order_number);
      $this->assign('list',$list);
      $this->assign('info',$info);
      return $this->fetch('coaming_master_presentation');
    }
    /**
     * [survey_ajaxpresentation description]
     * @return [type] [description]
     * 围板搭建施工师傅报告ajax
     */
    public function coaming_ajaxpresentation(){ 
      $uid=session('id');
      $order_number = input('order_number');
      $img1 = input('img1');
      $img2 = input('img2');
      $link = input('link');
      $owner_id=Db::name("orders")->field('owner_id')->where('order_number',$order_number)->find();
      
      //给客户发送消息
      $map['message_type']='1';
      $map['source_id']=$uid;
      $map['receive_id']=$owner_id['owner_id'];
      $map['content']='师傅已经上传了围板搭建报告,点击查看';
      $map['link']=$link;
      $map['status']='0';
      $map['sending_time']=date("Y-m-d H:i:s");
      Db::name('message_reminder')->insert($map);
     
      $list=Db::name('coaming_report')->where('order_number',$order_number)->find();
      $clientQm =Db::name('coaming_report')->where('order_number',$order_number)->value('user_sign');//客户签字？
      if(empty($list)){
        $data['order_number']=$order_number;
        $data['worker_id']=$uid;
        $data['img1']=$img1;
        $data['img2']=$img2;
        $step = Db::name('orders')->where('order_number',$order_number)->field('step_type')->find();
        if($step['step_type']==8){
           $maps['step_number']='8';
           $maps['status']='4';
        }else if($step['step_type']==9){
           $maps['step_number']='8';
           $maps['status']='4';
        }
        $result = Db::name('coaming_report')->insert($data);
        Db::name("orders")->where('order_number',$order_number)->update($maps);
        if(false === $result){             
          return ['code' => 0, 'data' => '', 'msg' => '-1'];
        }else{
          return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
        }
      }else{
         
            $data['worker_id']=$uid;
            $data['img1']=$img1;
            $data['img2']=$img2;
           
            
            $result = Db::name('coaming_report')->where('order_number',$order_number)->update($data);
                
            if(false === $result){             
              return ['code' => 0, 'data' => '', 'msg' => '-1'];
            }else{
              return ['code' => 200, 'data' => '', 'msg' => '上传成功'];
            }
       
        
      }
   } 
   /**
    * [survey_customer_presentation description]
    * @param  [type] $order_number [description]
    * @return [type]               [description]
    * 客户围板搭建报告页面
    */
     public function coaming_customer_presentation($order_number){
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
      $field='o.contact_name,o.location_ext,o.full_location,o.contact_phone,u.real_name,u.phone';
      $order = Db::name('orders')->alias('o')->field($field)->join('users u','u.id=o.worker_id')->where('o.order_number='.$order_number)->find();
      $list=Db::name('coaming_report')->where('order_number',$order_number)->find();
      $work_name=Db::name('users')->field('real_name')->where('id',$list['worker_id'])->find();
      $info=Db::name('orders_coaming')->where('order_number',$order_number)->find();
      $this->assign('order',$order);
      $this->assign('order_number',$order_number);
      $this->assign('list',$list);
      $this->assign('info',$info);
      $this->assign('work_name',$work_name);
      return $this->fetch('coaming_customer_presentation');
  }
    /**
     * [ajax_survey_feedback description]
     * @return [type] [description]
     * 客户反馈围板搭建ajax
     */
   public function ajax_coaming_feedback(){ 
        $uid=session('id');
        $ds_url=\think\Config::get('view_replace_str');
        if(empty($uid)){
          $this->redirect($ds_url['__PUBLIC__'].'auth');
        }

        $uname=session('ds_username');
        $uid=session('id');
        $order_number=input('order_number');
        $text=input('text');
        $link = input('link');
        $list=Db::name("coaming_report")->where('order_number',$order_number)->find();

        //给师傅发信息
        $map['message_type']='1';
        $map['source_id']=$uid;
        $map['receive_id']=$list['worker_id'];
        $map['content']='订单号:'.$order_number.',用户:'.$uname.'<br/>发来围板搭建反馈内容:'.$text;
        $map['link'] = $link;
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
  *围板搭建师傅确认码AJAX
  */
  
  public function coaming_confirmma($order_number){
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
         $step = Db::name('orders')->where('order_number',$order_number)->field('step_type')->find();
            if($step['step_type']==8){
               $data['work_step_number']='6';
            }else if($step['step_type']==9){
              $data['work_step_number']='9';
            }
             $data['end_time'] = time();
        Db::name("orders")->where('order_number',$order_number)->update($data);
        return ['code' => 200, 'data' => '', 'msg' => 'ok'];
     }else{
       return ['code' => 0, 'data' => '', 'msg' => '确认码错误'];
     }
   }
}