<?php
/**
 * Created by PhpStorm.
 * User: bingsen
 * Date: 2017/7/26/026
 * Time: 16:07
 */
namespace app\index\controller;
use app\admin\controller\User;
use think\Controller;
use think\Config;
use app\index\model\Users;
use app\index\model\ReselectModel;
use app\index\model\OfferModel;
use think\Db;

class Cqueryprice extends Base
{
    public function index($ornumber,$wid)
    {
      $order_number= $ornumber;
      $worker_id = $wid;
        //得到交易双方的id(师傅和客户)。
        $userid= input('masterid');
        $customerid  = input('customerid');
        $orderid = input('orderid');
        $useridimageurl=Config::get('view_replace_str.__IMG__').Users::getimageurl($userid);
        $customerimageurl=Config::get('view_replace_str.__IMG__').Users::getimageurl($customerid);

         //查询数据表有没有需要的普通师傅个数
        $num = Db::name('orders')->where('order_number',$order_number)->field('num')->find();
		
		    $order = Db::name('orders')
           ->alias('o')
           ->join('orders_maintain a','o.order_number=a.order_number')
           ->where('o.order_number='.$order_number)
           ->field('o.owner_id,o.owner_name,o.full_location,o.start_time,a.brand')
           ->find();


        $time=   date('Y-m-d H:i:s', $order['start_time']);
        $this->assign('time',$time);
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

            $userinfo = Db::name('users')->where('id='.$worker_id)->field('username,type,img')->find();

             if(empty($userinfo['img'])){
                $this->assign('useridimageurl',"__PUBLIC__static/index/images/moren.jpg");
            }else{
                $this->assign('useridimageurl',"__DsQINiu__".$userinfo["img"]);
            }
            
            $this->assign('usertype',"2");
            $this->assign('userid',$worker_id);
            $this->assign('username',$userinfo["username"]);
            $customerinfo = Db::name('users')->where('id='.$order["owner_id"])->field('img')->find();

            if(empty($customerinfo['img'])){
                $this->assign('customerimageurl',"__PUBLIC__static/index/images/moren.jpg");
            }else{
               $this->assign('customerimageurl',"__DsQINiu__".$customerinfo["img"]);
            }
            
           // $this->assign('customerimageurl',"__DsQINiu__".$customerinfo["img"]);
            $price = Db::name('orders')->where('order_number',$order_number)->field('pay')->find();
        		$this->assign('order_number',$order_number);
        		$this->assign('worker_id',$worker_id);
        		$this->assign('order',$order);
        		$this->assign('cate',$cate);
            $this->assign('cate1',$order_number.'category');
            $this->assign('cate2',$order_number.'commodity');
		        $this->assign('num',$num);
            $this->assign('price',$price);
		        $this->assign('owner_id',$order["owner_id"]);
            $this->assign('owner_name',$order["owner_name"]);
            return $this->fetch("index");
    }
    
	   public function send(){
       $usermsg = input('post.usermsg');
       if($usermsg=='信息全面，确定可以承接，请直接下单。'|| $usermsg==1){
          $order_number = input('post.order_number');
          $worker_id = input('post.worker_id');
          //师傅是否确定时间
          $gettime = input('post.gettime');
          //师傅确定的施工时间
          $project_time = strtotime(input('post.project_time'));
          //价格
          $rate=explode(',',input('rate'));
          array_pop($rate);
          //ID
          $ids=explode(',',input('ids'));
          array_pop($ids);
          $data['id']=$ids;
          $data['tender_cost']=$rate;
            $keys = array_keys($data);          
            $count1 = count($keys);
            $count2 = count($data[$keys[0]]);        
            for ($i=0; $i < $count2; $i++) {
               for ($j=0; $j < $count1; $j++) {
                    $new_arr[$i][$keys[$j]] = $data[$keys[$j]][$i];        
                }           
            }; 
          $money=null; 
          foreach ($new_arr as $k=>$v){
          $money+= $v['tender_cost'];
          $arr = Db::name('orders_maintain')->update(['id' => $v['id'],'tender_cost'=>$v['tender_cost'],'worker_id'=>$worker_id]);  
           }  
          if($arr || $arr==0){
          //查询发票税率
          $rates = Db::name('config')->where('id',5)->field('value')->find();
          $list = Db::name('orders_maintain')->where('order_number',$order_number)->field('tender_cost')->select();
         //查看师傅是否缴纳保证金
          $gets = Db::name('users_worker')->where('uid',$worker_id)->field('guarantee')->find();
          if(!empty($gets['guarantee'])){
             $platform_services = Db::name('config')->where('id',4)->field('value')->find();//交完保证金的平台服务费
            foreach ($list as $key => $val) {
            $aa[$key] = $val['tender_cost']*(1+$rates['value']+$platform_services['value']);
             }
          }else{
             $platform_service = Db::name('config')->where('id',3)->field('value')->find();//没交保证金的平台服务费
            foreach ($list as $key => $val) {
            $aa[$key] = $val['tender_cost']*(1+$rates['value']+$platform_service['value']);
             }
          }
          $bb=null;
          foreach ($aa as $k => $v) {
           $cc['order_number'][$k] = $order_number;
           $cc['tender_cost'][$k] = $v;
           $bb+=$v;
          }
          //师傅提交过来的价钱还有时间加入师傅报价表
          $info = new OfferModel();
          $flag = $info->send($cc,$worker_id,$bb,$money,$order_number,$gettime,$project_time);
            return json(array('code'=>200,'msg'=>'','aa'=>$aa,'bb'=>$bb));
          }else{
            return json(array('code'=>0,'msg'=>'更改价格失败'));
         }
      }else{
        return json(array('code'=>400,'msg'=>'','aa'=>null,'bb'=>''));
    }
   
  }
   /**
    * 需要普通师傅个数
    */
    public function number(){
      $order_number = input('post.order_number');
      $num = input('post.num');
      $data = Db::name('orders')->where('order_number',$order_number)->update(['num'=>$num]);
      if($data || $data==0){
        return json(array('code'=>200,'msg'=>''));
      }else{
        return json(array('code'=>0,'msg'=>''));
      }
    }
    /**
     * 挑选主任师傅
     */
    public function choose($ornumber,$wid){
         $uid = session('id');//当前登陆者ID
         $order_number = $ornumber ;
         $worker_id = $wid;
         //定义一个变量
         $data = 'choose';
         if($worker_id==0){
           $this->assign('worker_id','');
         }else{
           $this->assign('worker_id',$worker_id);
         }
         $this->assign('order_number',$order_number);
         $this->assign('data',$data);
         $this->assign('uid',$uid);
         return view('choose_director_master');
    }
	
	/**
     * 点击咨询师傅修改步骤
     */
  public function status(){
      $order_number = input('post.number');
      $worker_id = input('post.job_number');
      $data['step_number']= 3;
      $data['work_step_number'] = 1;
      $data['worker_id'] = $worker_id;
      $datas['worker_id'] = $worker_id;
      $list = Db::name('orders_maintain')->where('order_number',$order_number)->update($datas); 
        $arr = Db::name('orders')->where('order_number',$order_number)->update($data); 
      if($arr || $arr==0){
        return json(array('code'=>200,'mag'=>''));
      }else{
        return json(array('code'=>0,'mag'=>''));
      }
    }
    /**
     * 点击添加普通师傅，修改步数
     */
     public function change_number(){
      $order_number = input('post.order_number');
       $data['step_number']= 4;
        $arr = Db::name('orders')->where('order_number',$order_number)->update($data);
          if($arr || $arr==0){
        return json(array('code'=>200,'mag'=>''));
      }else{
        return json(array('code'=>0,'mag'=>''));
      }
    }
    /**
     * 验证师傅ID
     */
    public function verification(){
         $job_number = input('post.job_number');
         $arr = Db::name('users')->where('id='.$job_number)->select();         
         if($arr){
             return json(array('code'=>200,'msg'=>'师傅工号正确,请咨询师傅'));
         }else{
             return json(array('code'=>0,'msg'=>'师傅工号不存在'));
         }
    }
     /**
         * 师傅筛选
         */
        public function master_filter($ornumber,$cid,$sid){
            $keyw=8;
            $param['brand_cate']=input('get.brand_cate');
            $param['brand_list']=input('get.brand_list');
            $param['service_id']=input('get.service_id');
            $param['skill_id']=input('get.skill_id');
            $param['service_province']=input('get.service_province');
            $param['service_city']=input('get.service_city');
            $param['pt_id']=input('get.pt_id');
            $param['start_time']=input('get.start_time');
            $param['end_time']=input('get.end_time');
            $order_number = $ornumber;
            $cid = $cid;
            $sid = $sid;
            //查询品牌分类表
            $brand_cate = Db::name('brand_cate')->field('id,name')->select();
            $min = Db::name('brand_cate')->min('id'); //数据表最小值  前台判断
            //查询服务类型
            $service = Db::name('service')->field('id,name')->select();
            //查询师傅技能
            $skill = Db::name('skills')->field('id,skill')->select();
            //查询平台登记
            $users_worker = Db::name('grabfe')->select();
            //查询师傅信息
            $where["s.type"]="2";
            $where["s.status"]="1";
			      $where["s.is_sign"]="1";
            if(empty($param['brand_list']) && empty($param['service_id']) && empty($param['skill_id']) && empty($param['service_province']) && empty($param['pt_id'])){
                $order = Db::name('users_worker')->alias('u')->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where("s.type","2")->where($where)->select();
                $num = Db::name('users_worker')->alias('u')->join('users s','u.uid=s.id')->where("s.type","2")->where($where)->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->count();
                foreach ($order as $k => $v) {
                    $p[$k] = Db::name('skills')->field('skill')->where('id','in',$v['work_skill'])->select();
                    if($p[$k]){
                        $s = '';
                        foreach ($p[$k] as $key => $value) {
                            $s =$s.' '.$value['skill'];
                            $order[$k]['work_skill']=$s;
                        }
                    }
                }
                foreach ($order as $k=> $v) {
                    $q[$k] = Db::name('service')->where('id','in',$v['service_type_id'])->field('name')->select();
                    if($q[$k]){
                        $a = '';
                        foreach ($q[$k] as $key => $value) {
                            //var_dump($value);
                            $a =$a.' '.$value['name'];
                            $order[$k]['service_type_id']=$a;
                        }
                    }
                }
            }
            $num_ber=number_format($num/$keyw);
            $this->assign('order_number',$order_number);
            $this->assign('cid',$cid);
            $this->assign('sid',$sid);
            $this->assign('brand_cate',$brand_cate);
            $this->assign('min',$min);
            $this->assign('service',$service);
            $this->assign('skill',$skill);
            $this->assign('users_worker',$users_worker);
            $this->assign('order',$order);
            $this->assign('num',$num);
            $this->assign('num_ber',$num_ber);
            return  view('install_master_filter');
        }
        //分页查询
        public function master_filterk($ornumber,$cid,$sid){
            $keyw=8;
            $param['brand_list']=input('get.brand_list');
            $param['service_id']=input('get.service_id');
            $param['skill_id']=input('get.skill_id');
            $curr=input('get.curr');
            $param['service_province']=input('get.service_province');
            $param['service_city']=input('get.service_city');
            $param['pt_id']=input('get.pt_id');
            $where["s.type"]="2";
            $where["s.status"]="1";
			      $where["s.is_sign"]="1";
            //查询师傅信息
            if(empty($param['brand_list']) && empty($param['service_id']) && empty($param['skill_id']) && empty($param['service_province']) && empty($param['pt_id'])){
                $order = Db::name('users_worker')->alias('u')->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where($where)->select();
                $num = Db::name('users_worker')->alias('u')->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where($where)->count();
                foreach ($order as $k => $v) {
                    $p[$k] = Db::name('skills')->field('skill')->where('id','in',$v['work_skill'])->select();
                    if($p[$k]){
                        $s = '';
                        foreach ($p[$k] as $key => $value) {
                            $s =$s.' '.$value['skill'];
                            $order[$k]['work_skill']=$s;
                        }
                    }
                }
                foreach ($order as $k=> $v) {
                    $q[$k] = Db::name('service')->where('id','in',$v['service_type_id'])->field('name')->select();
                    if($q[$k]){
                        $a = '';
                        foreach ($q[$k] as $key => $value) {
                            //var_dump($value);
                            $a =$a.' '.$value['name'];
                            $order[$k]['service_type_id']=$a;
                        }
                    }
                }
                $msg=1;
            }else{
                if($param['service_id']){
                    $va=$param['service_id'];
                    $where["u.service_type_id"]=["like","%$va%"];
                }
                if( $param['skill_id']){
                    $va=$param['skill_id'];
                    $where["u.work_skill"]=["like","%$va%"];
                }
                if( $param['brand_list']){
                    $va=$param['brand_list'];
                    $where["u.brand"]=["like","%$va%"];
                }
                if($param['pt_id']){
                    $where["u.platform_level"]=$param['pt_id'];
                }
                if($param['service_province']){
                    $where["s.province"]=$param['service_province'];
                }
                if($param['service_city']){
                    $where["s.city"]=$param['service_city'];
                }
                $msg=1;
                $order=Db::name("users_worker")->alias("u")->join("users s","u.uid=s.id")->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where($where)->select();
                if(empty($order)){
                    $msg=2;
                    $where=array();
                    $where["s.type"]="2";
                    $where["s.status"]="1";
					          $where["s.is_sign"]="1";
                    $order=Db::name("users_worker")->alias("u")->join("users s","u.uid=s.id")->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where('u.is_tui',"1")->where($where)->select();
					if(empty($order)){
					  $msg=3;
					}
                }
                foreach ($order as $k => $v) {
                    $p[$k] = Db::name('skills')->field('skill')->where('id','in',$v['work_skill'])->select();
                    if($p[$k]){
                        $s = '';
                        foreach ($p[$k] as $key => $value) {
                            $s =$s.' '.$value['skill'];
                            $order[$k]['work_skill']=$s;
                        }
                    }
                }
                foreach ($order as $k=> $v) {
                    $q[$k] = Db::name('service')->where('id','in',$v['service_type_id'])->field('name')->select();
                    if($q[$k]){
                        $a = '';
                        foreach ($q[$k] as $key => $value) {
                            //var_dump($value);
                            $a =$a.' '.$value['name'];
                            $order[$k]['service_type_id']=$a;
                        }
                    }
                }
            }
            $data=["order"=>$order,'msg'=>$msg,"num"=>0];
            return json($data);
        }
    //    搜索
        public function master_filterknam(){
            $ina=input("get.order");
            $where["s.type"]="2";
            $where["s.status"]="1";
			      $where["s.is_sign"]="1";
            if($ina){
                $msg=1;
                $order=Db::name("users_worker")->alias("u")->join("users s","u.uid=s.id")->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where("u.uid",$ina)->where("s.is_sign",1)->select();
                if(empty($order)){
                    $order=Db::name("users_worker")->alias("u")->join("users s","u.uid=s.id")->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where("u.real_name",'like',"%$ina%")->where($where)->select();
                    if(empty($order)){
                        $msg=2;
                        $order=Db::name("users_worker")->alias("u")->join("users s","u.uid=s.id")->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where('u.is_tui',"1")->where($where)->select();
						if(empty($order)){
							$msg=3;
						}
                    }
                }
            }
            foreach ($order as $k => $v) {
                $p[$k] = Db::name('skills')->field('skill')->where('id','in',$v['work_skill'])->select();
                if($p[$k]){
                    $s = '';
                    foreach ($p[$k] as $key => $value) {
                        $s =$s.' '.$value['skill'];
                        $order[$k]['work_skill']=$s;
                    }
                }
            }
            foreach ($order as $k=> $v) {
                $q[$k] = Db::name('service')->where('id','in',$v['service_type_id'])->field('name')->select();
                if($q[$k]){
                    $a = '';
                    foreach ($q[$k] as $key => $value) {
                        //var_dump($value);
                        $a =$a.' '.$value['name'];
                        $order[$k]['service_type_id']=$a;
                    }
                }
            }
            $data=["order"=>$order,'msg'=>$msg,"num"=>0];
            return json($data);

        }
    /**
     * 二级分类
     */
    public function cate(){
        $cate = input('post.id');
        $lists = Db::name('brand_list')->where('find_in_set('.$cate.',c_id)')->field('brand,id')->select(); 
        if($lists){
            return json(array('code'=>200,'lists'=>$lists));
        }else{
             return json(array('code'=>0,'lists'=>$lists));
        }
    }
    /**
     * 查找师傅
     * [find_master description]
     * @return [type] [description]
     */
    public function master_information($ornumber,$cid,$wid){
    $wid = $wid;
    $order_number = $ornumber;
    $cid = $cid;
    $where['o.uid'] = $wid;
    $master = Db::name('users')->alias('u')->join('users_worker o','u.id = o.uid')->where($where)->find();
    //查询师傅的综合评分
    $total_core=null;
    $core = Db::name('order_comments')->where('adopt_id',$wid)->field('work_quality,work_speed,service_attitude')->select();
    //师傅接单收到评价的个数
    $num = Db::name('order_comments')->where('adopt_id',$wid)->count();
    foreach ($core as  $val){
      $total_core+=$val['work_quality']+$val['work_speed']+$val['service_attitude'];
    }
    
    if(!empty($num)){
         $master['score'] =round($total_core/$num,2);
      }else{
         $master['score']="";
      }
    //查询师傅服务类别
    $service =Db::name('service')->where('id',$master['service_type_id'])->field('name')->find();
    //查询师傅服务品牌
    $brand = Db::name('reume')->where('worker_id',$wid)->field('brand')->find();
    $brand_list = Db::name('brand_list')->where('id',$brand['brand'])->field('brand')->find();
   //查看师傅完工后的照片
    $after_id = Db::name('master_report')->where('worker_id',$wid)->order('id desc')->limit(6)->select();
    if($after_id){
      foreach ($after_id as $key => $vo) {
       $img[$key]['afterpics'] = Db::name('imgs')->where('id',$vo['afterpics'])->find();
       $img[$key]['itemname'] = $vo['itemname'];
        $this->assign('img',$img);
       } 
    }else{
      $this->assign('img','');
    }
    //查找对师傅的评价
    $comments = Db::name('order_comments')->where('adopt_id',$wid)->order('create_time desc')->select();
    //查找已经交易完成的订单
    $order = Db::name('orders')->where('status',7)->field('owner_name,service_type_id,end_time')->select();
    foreach ($order as $key => $val) {
      $order[$key]['owner_name'] = mb_substr($val['owner_name'],0,1);
      $order[$key]['service_type_id'] = Db::name('service')->where('id',$val['service_type_id'])->value('name');
      $order[$key]['end_time'] = formatTime($val['end_time']);
    }
    //查找全部评论数
    $all = Db::name('order_comments')->where('adopt_id',$wid)->count();
    //查找好评数量
    $good =  Db::name('order_comments')->where('adopt_id='.$wid. '&& master_manifestation=1')->count();
    //查找中评数量
    $secondary =  Db::name('order_comments')->where('adopt_id='.$wid. '&& master_manifestation=0')->count();
    //查找差评数量
    $bad =  Db::name('order_comments')->where('adopt_id='.$wid. '&& master_manifestation=-1')->count();
    $this->assign('wid',$wid);
    $this->assign('order_number',$order_number);
    $this->assign('cid',$cid);
    $this->assign('master',$master);
    $this->assign('service',$service);
    $this->assign('brand_list',$brand_list);
    $this->assign('comments',$comments);
    $this->assign('order',$order);
    $this->assign('all',$all);
    $this->assign('good',$good);
    $this->assign('secondary',$secondary);
    $this->assign('bad',$bad);
    return view('he_master_of_information');   
  }
  
    /**
     * 师傅好评
     */
    public function praise(){
      $worker_id = input('post.worker_id');
      $where['adopt_id'] = $worker_id;
      $where['master_manifestation'] =1;
      $praise = Db::name('order_comments')->where($where)->order('create_time desc')->select();
      if($praise){
         return json(array('code'=>200,'praise'=>$praise));
      }else{
          return json(array('code'=>0,'praise'=>''));
      }
    }

     /**
      * 师傅中评
      */
     public function secondary(){
      $worker_id = input('post.worker_id');

      $where['adopt_id'] = $worker_id;
      $where['master_manifestation'] =0;
      $praise = Db::name('order_comments')->where($where)->order('create_time desc')->select();

      if($praise){
         return json(array('code'=>200,'praise'=>$praise));
      }else{
          return json(array('code'=>0,'praise'=>''));
      }
     }

      /**
      * 师傅差评
      */
     public function bad(){
      $worker_id = input('post.worker_id');
      $where['adopt_id'] = $worker_id;
      $where['master_manifestation'] =-1;
      $praise = Db::name('order_comments')->where($where)->order('create_time desc')->select();
      if($praise){
         return json(array('code'=>200,'praise'=>$praise));
      }else{
          return json(array('code'=>0,'praise'=>''));
      }
     }

   /**
      * 全部
      */
     public function all(){
      $worker_id = input('post.worker_id');
      $praise = Db::name('order_comments')->where('adopt_id',$worker_id)->order('create_time desc')->select();
      if($praise){
          return json(array('code'=>200,'praise'=>$praise));
      }else{
          return json(array('code'=>0,'praise'=>''));
       }
     }

      /**
      * 全部
      */
     public function defaults(){
      $worker_id = input('post.worker_id');
      $praise = Db::name('order_comments')->where('adopt_id',$worker_id)->order('create_time desc')->select();
      if($praise){
          return json(array('code'=>200,'praise'=>$praise));
      }else{
          return json(array('code'=>0,'praise'=>''));
       }
     }







  /**
   * 默认品牌分类
   */
  public function default_master(){  
      $min = Db::name('brand_cate')->min('id'); 
      $arr =  Db::name('brand_list')->where('find_in_set('.$min.',c_id)')->field('brand,id')->select(); 
        if($arr){
            return json(array('code'=>200,'arr'=>$arr));
        }else{
            return json(array('code'=>0,'arr'=>''));
        }
  }
  /**
   * 客户咨询主任师傅
   */
  public function director_master($ornumber,$wid){
        //订单号
        $order_number=$ornumber;
        //师傅id
        $worker_id =$wid;
        //客户登陆id
        $uid = session('id');
        $order = Db::name('orders')->where('order_number='.$order_number)->field('owner_id,owner_name,full_location,start_time')->find();
        //查看数据报价表有没有该订单号的值
        $offer = Db::name('offer')->where('order_number',$order_number)->select();
        if(empty($offer)){
          $list =Db::name('orders_maintain')->where('order_number',$order_number)->field('l1_category_id,l2_category_id,id')->select();
        }else{
          $list =Db::name('orders_maintain')
              ->alias('o')
              ->join('offer m','o.order_number=m.order_number')
              ->field('o.l1_category_id,o.l2_category_id,o.id,m.tender_cost,m.id as m_id')
              ->where('o.order_number',$order_number)
              ->group('m.id')
             // ->group('o.id')
              ->select();
         
        }  
        //查看是否勾选时间
        $gettime = Db::name('offer_total')->where('order_number',$order_number)->field('gettime')->find();
        $cate = array();//声明一个空变量
        $b = null;
        foreach($list as $l){   
            if(!empty($offer)){
              $b['tender_cost'] = $l['tender_cost'];
            }        
            $one = Db::name('category')->where('id','in',$l['l1_category_id'])->select();
            $two = Db::name('commodity')->where('id','in',$l['l2_category_id'])->select(); 
            $b['id'] = $l['id'];
            // if(!empty($offer)){
            //   $b['tender_cost'] = $l['tender_cost'];
            // }  
            foreach($one as $k=>$a){
                $b[$order_number.'category'] = $a['name'];                
            }
            foreach($two as $k=>$a){
                $b[$order_number.'commodity'] = $a['name'];                
            }
            $cate[]=$b;       
        } 
        $time=   date('Y-m-d H:i:s', $order['start_time']);
        $total = Db::name('offer_total')->where('order_number',$order_number)->field('totals')->find();
        //查询是否上交咨询费
        $price = Db::name('orders')->where('order_number',$order_number)->field('pay,owner_id')->find();
        $this->assign('order_number',$order_number);
        $this->assign('worker_id',$worker_id);
        $this->assign('order',$order);  
        $this->assign('cate',$cate);
        $this->assign('cate1',$order_number.'category');
        $this->assign('cate2',$order_number.'commodity');
        $this->assign('total',$total['totals']);
        $this->assign('price',$price);
        $this->assign('uid',$uid);
        $this->assign('time',$time);
        $this->assign('offer',$offer);
        $this->assign('gettime',$gettime['gettime']);

        $userinfo = Db::name('users')->where('id='.$price["owner_id"])->field('username,type,img')->find();
        if(empty($userinfo['img'])){
            $this->assign('useridimageurl',"__PUBLIC__static/index/images/moren.jpg");
        }else{
          $this->assign('useridimageurl',"__DsQINiu__".$userinfo["img"]);
        }

        


        $this->assign('usertype',"1");

        $this->assign('userid',$price["owner_id"]);

        $this->assign('username',$userinfo["username"]);
        $this->assign('owner_id',$order["owner_id"]);
        $this->assign('owner_name',$order["owner_name"]);
        $workersinfo = Db::name('users')->where('id='.$worker_id)->field('img')->find();    
         if(empty($workersinfo['img'])){
            $this->assign('useridimageurl',"__PUBLIC__static/index/images/moren.jpg");
        }else{
          $this->assign('customerimageurl',"__DsQINiu__".$workersinfo["img"]);
        }
        

      return $this->fetch('client_consult_director_master');
  }
   /**
   * 咨询费用加入数据表
   */
   public function consults(){
        $order_number = input('post.number');
        $data['consult_price'] = input('post.total');
        $list = Db::name('pay_price')->where('order_number',$order_number)->find();
        if(!empty($list)){
          $result = Db::name('pay_price')->where('order_number',$order_number)->update($data);
        }else{
          $data['order_number'] = input('post.number');
          $result = Db::name('pay_price')->insertGetId($data);
        }
       if($result || $result==0){ 
          return json(array('code'=>200,'msg'=>''));
       }else{
           return json(array('code'=>0,'msg'=>''));
       }
   }
   /**
    * 点击重选主任师傅
    */
   public function reselect(){
    $order_number = input('post.order_number');
    $data = new ReselectModel();
    $flag = $data->reselects($order_number);
    return json(['code' => $flag['code'], 'number' => $flag['number']]); 
   }

  /**
   * 咨询付费
   */
  public function pay($ornumber,$wid){
         $wid = $wid;
         $order_number = $ornumber;
         $where['o.uid'] = $wid;
         $master = Db::name('users')->alias('u')->join('users_worker o','u.id = o.uid')->where($where)->find();
         //查询师傅的综合评分
          $total_core=null;
          $core = Db::name('order_comments')->where('adopt_id',$wid)->field('work_quality,work_speed,service_attitude')->select();
          //师傅接单收到评价的个数
          $num = Db::name('order_comments')->where('adopt_id',$wid)->count();
          foreach ($core as  $val){
            $total_core+=$val['work_quality']+$val['work_speed']+$val['service_attitude'];
          }
          
          if(!empty($num)){
               $master['score'] =round($total_core/$num,2);
            }else{
               $master['score']="";
            }
         //查询师傅服务类别
         $service =Db::name('service')->where('id',$master['service_type_id'])->field('name')->find();
         //查询师傅服务品牌
         $brand = Db::name('reume')->where('worker_id',$wid)->field('brand')->find();
         $brand_list = Db::name('brand_list')->where('id',$brand['brand'])->field('brand')->find();
         //查询咨询费用
         $price = Db::name('orders')->where('order_number',$order_number)->field('amount_consulting')->find();
         $this->assign('wid',$wid);
         $this->assign('order_number',$order_number);
         $this->assign('master',$master);
         $this->assign('service',$service);
         $this->assign('brand_list',$brand_list);
        $this->assign('price',$price['amount_consulting']);
        return view('consult_pay');
  }
  /**
   * 选择普通师傅
   */
  public function common_master($ornumber,$wid){
    $order_number = $ornumber;
    //声明一个变量，跳转页面；
    $wid = $wid;
    //客户登陆的id
    $uid = session('id');
    if($wid==0){
      $this->assign('wid','');
    }else{
      $this->assign('wid',$wid);
    }
    $data = 'common_master';
    $arr = Db::name('commodity') ->field('id,name')->select();
     $res = Db::name('users')
    ->alias('u')->join('common_master c','c.worker_id=u.id')
    ->where('c.order_number',$order_number)->select();
    //查询需要普通师傅的个数
    $result = Db::name('orders_maintain')->where('order_number',$order_number)->field('num')->find();
    $this->assign('arr',$arr);
    $this->assign('order_number',$order_number);
    $this->assign('data',$data);
    $this->assign('res',$res);
    $this->assign('result',$result);
    $this->assign('uid',$uid);
    return $this->fetch('select_common_master');
  }
/**
 * 客户选择师傅的工号
 */
  public function choose_id(){
     $data['worker_id'] = input('post.ids');
     $data['order_number'] = input('post.number');
     $sid = input('post.sid');
     $cid = input('post.cid');
      if($sid==   0){ 
          if($cid=="common_master"){
            $order = Db::name('common_master')->insertGetId($data);
            if($order){
             return json(array('code'=>200,'msg'=>""));
          }else{
            return json(array('code'=>0,'msg'=>""));
            }
         }else if($cid =="choose"){
          return json(array('code'=>200,'msg'=>""));
        }
      }else{
        if($cid=="common_master"){
         $id= Db::name('common_master')->where('order_number='.$data['order_number'].'&&  worker_id='.$sid)->field('id')->find();
         $order = Db::name('common_master')->where('id='.$id['id'])->update($data);
            if($order){
             return json(array('code'=>200,'msg'=>""));
          }else{
            return json(array('code'=>0,'msg'=>""));
            }
        }else if($cid =="choose"){
           return json(array('code'=>200,'msg'=>""));
        }
      }

     } 
	  /**
      * 选择师傅信息
      */
     public function num(){
        $id = input('post.ids');
        $data['order_number'] = input('post.order_number');
        $data['worker_id'] = input('post.worker_id');
        $data ['working_hours'] = input('post.hours');
        $data['cost'] = input('post.expense');
        $data['skill'] = input('post.skill');
        $data['estate'] = 1;
        $result = Db::name('common_master')->where('id='.$id)->update($data);

        if($result || $result==0){       
          return json(array('code'=>200,'msg'=>''));
        }else{
           return json(array('code'=>0,'msg'=>''));
        }
       
     }
      /**
      * 咨询下单客户选择师傅
      */
   public function consult_confirm(){
    //师傅报价

     $price=explode(',',input('post.aa'));
      array_pop($price);
     $order_number = input('post.order_number');
     $worker_id = input('post.worker_id');
      $zongJia = input('post.zongjia1');
     //根据订单号查出维修附表的id
     $ids = Db::name('orders_maintain')->where('order_number',$order_number)->field('id')->select();
     $total=null;
     foreach ($ids as $key => $id) {
       $c_id[$key] = $id['id'];
     }
      $data['id']=$c_id;
      $data['tender_cost']=$price;
      
        $keys = array_keys($data);          
        $count1 = count($keys);
        $count2 = count($data[$keys[0]]);        
        for ($i=0; $i < $count2; $i++) {
           for ($j=0; $j < $count1; $j++) {
                $new_arr[$i][$keys[$j]] = $data[$keys[$j]][$i];        
            }           
        };
   foreach ($new_arr as  $v) {
     $order = Db::name('orders_maintain')->update(['id' => $v['id']]); //'tender_cost'=>$v['tender_cost']
     $total+=$v['tender_cost'];
   }
   $lists['amount_engineer'] = $zongJia;
   $lists['totals'] = $total;
   $lists['worker_id'] = $worker_id;
   $lists['order_number'] = $order_number;
   $list = Db::name('offer_total')->insert($lists);
   $orders = Db::name('orders')->where('order_number',$order_number)->update(['amount_engineer'=>$total,'is_invitation'=>1,'worker_id'=>$worker_id,'master_status'=>2,'status'=>2,'step_number'=>5,'work_step_number'=>4]);
     if($orders || $orders==0){
      return json(array('code'=>200,'msg'=>''));
     }else{
      return json(array('code'=>0,'msg'=>''));
     }
   }

   public function Ghint(){
    return $this->fetch();
   }

}
