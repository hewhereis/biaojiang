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
            $this->assign('useridimageurl',"__PUBLIC__public/uploads/images/".$userinfo["img"]);
            $this->assign('usertype',"2");
            $this->assign('userid',$worker_id);
            $this->assign('username',$userinfo["username"]);
            $customerinfo = Db::name('users')->where('id='.$order["owner_id"])->field('img')->find();
            $this->assign('customerimageurl',"__PUBLIC__public/uploads/images/".$customerinfo["img"]);
            $this->assign('customerimageurl',"__PUBLIC__public/uploads/images/".$customerinfo["img"]);
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
		$order_number = input('post.order_number');
		$worker_id = input('post.worker_id');
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
		foreach ($new_arr as $k=>$v){
			$arr = Db::name('orders_maintain')->update(['id' => $v['id'],'tender_cost'=>$v['tender_cost'],'worker_id'=>$worker_id]);  
		}
        if(!empty($arr)){
			return json(array('code'=>200,'msg'=>''));
		}else{
			return json(array('code'=>0,'msg'=>'更改价格失败'));
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
         return view('choose_director_master');
    }
	
	/**
     * 点击咨询师傅修改步骤
     */
    public function status(){
      $order_number = input('post.number');
      $worker_id = input('post.job_number');
      $gets = Db::name('users_worker')->where('uid',$worker_id)->field('guarantee')->find();
      if($gets){
          $data['step_number']= 3;
          $data['work_step_service'] =2;
          $data['work_step_number'] = 1;
          $data['worker_id'] = $worker_id;
          $data['platform_service'] = 0.12;
      }else{
          $data['step_number']= 3;
          $data['work_step_service'] =2;
          $data['work_step_number'] = 1;
          $data['worker_id'] = $worker_id;
      }
      $datas = $worker_id;
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
        if(empty($param['brand_list']) && empty($param['service_id']) && empty($param['skill_id']) && empty($param['service_province']) && empty($param['pt_id'])){


            $order = Db::name('users_worker')->alias('u')->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->page('1',$keyw)->select();

            $num = Db::name('users_worker')->alias('u')->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->count();
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
        }else{
            // if($param['brand_cate']!=''){
            //   $where['bj_brand_cate.name']=$param['brand_cate'];
            // }
            if($param['brand_list']!=''){
                $where['bj_reume.brand']=$param['brand_list'];
            }

            if ($param['service_id']!='') {
                $where['bj_users_worker.service_type_id']=$param['service_id'];
            }

            if ($param['skill_id']!='') {
                $where['bj_reume.skill']=$param['skill_id'];
            }
            if ($param['service_province']!='') {
                $where['bj_users.service_province']=$param['service_province'];
            }
            if ($param['service_city']!='') {
                $where['bj_users.service_city']=$param['service_city'];
            }
            if ($param['pt_id']!='') {
                $where['bj_users_worker.platform_level']=$param['pt_id'];
            }
            if ($param['start_time']!='') {
                $where['bj_orders.end_time']<$param['start_time'];
            }
            if ($param['end_time']!='') {
                $where['bj_orders.order_time']>$param['end_time'];
            }
            $order = Db::name('users_worker')->alias('u')
                ->join('users s','u.uid=s.id')
                ->join('reume r','u.uid=r.worker_id')
                //->join('orders o','u.uid=o.worker_id')
                ->group('r.worker_id')
                ->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,r.skill')->where($where)->page('1',$keyw)->select();

            $num = Db::name('users_worker')->alias('u')
                ->join('users s','u.uid=s.id')
                ->join('reume r','u.uid=r.worker_id')
                //->join('orders o','u.uid=o.worker_id')
                ->group('r.worker_id')
                ->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,r.skill')->where($where)->count();
            foreach ($order as $k=> $v) {
                $order[$k]['skill'] = Db::name('skills')->where('id',$v['skill'])->value('skill');
            }
            foreach ($order as $k=> $v) {
                $order[$k]['service_type_id'] = Db::name('service')->where('id',$v['service_type_id'])->value('name');
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
//
        $ke=8;
        $param['brand_cate']=input('get.brand_cate');
        $param['brand_list']=input('get.brand_list');
        $param['service_id']=input('get.service_id');
        $param['skill_id']=input('get.skill_id');
        $curr=input('get.curr');
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
        $users_worker = Db::name('users_worker')->field('id,platform_level')->select();
        //查询师傅信息
        if(empty($param['brand_list']) && empty($param['service_id']) && empty($param['skill_id']) && empty($param['service_province']) && empty($param['pt_id'])){

            $order = Db::name('users_worker')->alias('u')->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->page($curr,$ke)->select();

            $num = Db::name('users_worker')->alias('u')->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->count();
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
        }else{
            // if($param['brand_cate']!=''){
            //   $where['bj_brand_cate.name']=$param['brand_cate'];
            // }
            $order=null;
            $where=null;
            if($param['brand_list']!=''){
                $where['bj_reume.brand']=$param['brand_list'];
            }

            if ($param['service_id']!='') {
                $order = Db::name('users_worker')->alias('u')
                    ->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where('find_in_set('.$param['service_id'].',service_type_id)')->page($curr,$ke)->select();

                $num = Db::name('users_worker')->alias('u')
                    ->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where('find_in_set('.$param['service_id'].',service_type_id)')->count();

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

            if ($param['skill_id']!='') {
                $order = Db::name('users_worker')->alias('u')
                    ->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')-> where('find_in_set('.$param['skill_id'].',work_skill)')->page($curr,$ke)->select();


                $num = Db::name('users_worker')->alias('u')
                    ->join('users s','u.uid=s.id')->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,u.work_skill')->where('find_in_set('.$param['skill_id'].',work_skill)')->count();

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
            if ($param['service_province']!='') {
                $where['bj_users.service_province']=$param['service_province'];
            }
            if ($param['service_city']!='') {
                $where['bj_users.service_city']=$param['service_city'];
            }
            if ($param['pt_id']!='') {
                $where['bj_users_worker.platform_level']=$param['pt_id'];
            }
            if ($param['start_time']!='') {
                $where['bj_orders.end_time']<$param['start_time'];
            }
            if ($param['end_time']!='') {
                $where['bj_orders.order_time']>$param['end_time'];
            }

            if(!$order){
                $order = Db::name('users_worker')->alias('u')
                    ->join('users s','u.uid=s.id')
                    ->join('reume r','u.uid=r.worker_id')
                    //->join('orders o','u.uid=o.worker_id')
                    ->group('r.worker_id')
                    ->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,r.skill')->where($where)->page($curr,$ke)->select();
                $num = Db::name('users_worker')->alias('u')
                    ->join('users s','u.uid=s.id')
                    ->join('reume r','u.uid=r.worker_id')
                    //->join('orders o','u.uid=o.worker_id')
                    ->group('r.worker_id')
                    ->field('u.platform_level,u.wage,u.uid,u.real_name,u.service_type_id,s.img,r.skill')->where($where)->count();
                foreach ($order as $k=> $v) {
                    $order[$k]['work_skill'] = Db::name('skills')->where('id',$v['skill'])->value('skill');
                }
                foreach ($order as $k=> $v) {
                    $order[$k]['service_type_id'] = Db::name('service')->where('id',$v['service_type_id'])->value('name');
                }
            }

        }
//        $num = Db::name('users')->where('type',2)->count();
        $datas=["order_number"=>$order_number,"cid",$cid,'sid'=>$sid,"brand_cate"=>$brand_cate,"min"=>$min,"service",$service,"skill"=>$skill,"users_worker"=>$users_worker,"order"=>$order,"num"=>number_format($num/$ke)];

        return json($datas);
    }
//    搜索
    public function master_filterknam(){
        $ina=input("get.order");
        $sjon=array();
        if(!empty($ina)){
            $where['uid'] = array('like','%'.$ina.'%');//封装模糊查询 赋值到数组
            $test = Db::name('users_worker')->where($where)->select();
            var_dump($test);
            die;
            if(!empty($test)){
                $i=0;
                foreach ($test as $k=> $v) {
                    $q[$k] = Db::name('service')->where('id','in',$v['service_type_id'])->field('name')->select();
                    if($q[$k]){
                        $a = '';
                        foreach ($q[$k] as $key => $value) {
                            //var_dump($value);
                            $a =$a.' '.$value['name'];
                            $test[$k]['service_type_id']=$a;
                        }
                    }
                }
                foreach ($test as $key => $value){
                    $id=$value["service_type_id"];
                    $m['service_type_id']=$id;
                    $sjon[$i]['gongh']=$test[$key]['uid'];
                    $sjon[$i]['username']=$test[$key]['real_name'];
//                    $sjon[$i]['img']=$test[$key]['img'];
                    $testq = Db::name('users_worker')->where($m)->select();

                    if(!empty($testq)){
                        $mb['id']=$testq[0]['service_type_id'];
                        $sjon[$i]['platform_level']=$testq[0]['platform_level'];
                        $sjon[$i]['wage']=$testq[0]['wage'];
                        $testl = Db::name('service')->where($mb)->select();
                        if(!empty($testl)){
                            $sjon[$i]['bj']=$testl[0]['name'];
                        }

                    }
                    $ma['worker_id']=$id;
                    $testqam = Db::name('reume')->where($ma)->select();

                    if(!empty($testqam)){
                        $kill=$testqam[0]['skill'];

                        if(!empty($kill)){

                            $ascm['id']=$kill;
                            $testqamas = Db::name('skills')->where($ascm)->select();
                            $sjon[$i]['leixin']=$testqamas[0]['skill'];

                        }
                    }
                    $i++;
//
//
//
                }
            }
            if(empty($test)){
                $where=array();
                $where['skill'] = array('like','%'.$ina.'%');
                $test = Db::name('skills')->where($where)->select();

                if(!empty($test)){
                    $id=$test[0]['id'];
                    $we['skill']=$id;
                    $testk = Db::name('reume')->where($we)->select();
                    $i=0;
                    foreach ($testk as $key => $value){
                        $order=$value['worker_id'];
                        $ser=$value['service_type_id'];
                        $testlase = Db::name('service')->where($ser)->select();
                        $whereb['id']=$order;
                        $am=Db::name('users')->where($whereb)->select();
                        $sjon[$i]['leixin']=$test[0]['skill'];
                        $sjon[$i]['gongh']=$am[0]['id'];
                        $sjon[$i]['username']=$am[0]['username'];
                        $sjon[$i]['img']=$am[0]['img'];
                        $order_number['uid']=$am[0]['id'];
                        $testlase = Db::name('users_worker')->where($order_number)->select();
                        if(!empty($testlase)){

                            $service_type_id['id']=$testlase[0]['service_type_id'];
                            $testlasea = Db::name('service')->where($service_type_id)->select();
                            $sjon[$i]['bj']= $testlasea[0]['name'];
                            $sjon[$i]['platform_level']=$testlase[0]['platform_level'];
                            $sjon[$i]['wage']=$testlase[0]['wage'];
                        }


                        $i++;

                    }
                }
                if(empty($test)){
                    $where=array();
                    $where['name'] = array('like','%'.$ina.'%');
                    $test = Db::name('service')->where($where)->select();
                    if(!empty($test)){
                        $id=$test[0]['id'];
                        $we=array();
                        $we['service_type_id']=$id;

                        $testk = Db::name('users_worker')->where($we)->select();
                        $testka=array();
                        $i=0;
                        foreach ($testk as $key => $value){
                            $order=$value['uid'];
                            $whereb['id']=$order;
                            $sjon[$i]['bj']=$test[0]['name'];

                            $sjon[$i]['gongh']=$testk[$key]['id'];
                            $sjon[$i]['wage']=$testk[$key]['wage'];

                            $am=Db::name('users')->where($whereb)->select();
                            $sjon[$i]['username']=$am[0]['username'];
                            $kill=$am[0]['id'];
                            $msa['worker_id']=$kill;
                            $testqam = Db::name('reume')->where($msa)->select();
                            if(!empty($testqam)){
                                $keaad['id']=$testqam[0]['skill'];
                                $tests = Db::name('skills')->where($keaad)->select();
                                $sjon[$i]['leixin']=$tests[0]['skill'];
                            }
                            $sjon[$i]['img']=$am[0]['img'];
                            $sjon[$i]['platform_level']=$testk[$key]['platform_level'];
                            $i++;
                        }
                    }
                }
            }
            return json($sjon);
        }else{

        }

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
    //查询师傅服务类别
    $service =Db::name('service')->where('id',$master['service_type_id'])->field('name')->find();
    //查询师傅服务品牌
    $brand = Db::name('reume')->where('worker_id',$wid)->field('brand')->find();
    $brand_list = Db::name('brand_list')->where('id',$brand['brand'])->field('brand')->find();
   //查看师傅完工后的照片
    $after_id = Db::name('master_report')->where('worker_id',$wid)->order('id desc')->limit(6)->select();
    $img = Db::name('imgs')->where('id','in',$after_id)->field('image')->select();
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
    $this->assign('img',$img);
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
        $list = Db::name('orders_maintain')->where('order_number='.$order_number)->field('l1_category_id,l2_category_id,id,tender_cost')->select(); 
        $cate = array();//声明一个空变量
        $total = null;  //声明一个空变量
        $b = null;
        foreach($list as $l){           
            $one = Db::name('category')->where('id','in',$l['l1_category_id'])->select();
            $two = Db::name('commodity')->where('id','in',$l['l2_category_id'])->select(); 
            $b['id'] = $l['id'];
            $b['tender_cost'] = $l['tender_cost'];
            foreach($one as $k=>$a){
                $b[$order_number.'category'] = $a['name'];                
            }
            foreach($two as $k=>$a){
                $b[$order_number.'commodity'] = $a['name'];                
            }
            $cate[]=$b;
            $total+= $l['tender_cost'];         
        } 
        $time=   date('Y-m-d H:i:s', $order['start_time']);

        //查询是否上交咨询费
       $price = Db::name('orders')->where('order_number',$order_number)->field('pay,owner_id')->find();
        
        $this->assign('order_number',$order_number);
        $this->assign('worker_id',$worker_id);
        $this->assign('order',$order);  
        $this->assign('cate',$cate);
        $this->assign('cate1',$order_number.'category');
        $this->assign('cate2',$order_number.'commodity');
        $this->assign('total',$total);
        $this->assign('price',$price);
        $this->assign('uid',$uid);
        $this->assign('time',$time);
      $userinfo = Db::name('users')->where('id='.$price["owner_id"])->field('username,type,img')->find();

      $this->assign('useridimageurl',"__PUBLIC__public/uploads/images/".$userinfo["img"]);
      $this->assign('usertype',"1");
      $this->assign('userid',$price["owner_id"]);
      $this->assign('username',$userinfo["username"]);
	  $this->assign('owner_id',$order["owner_id"]);
      $this->assign('owner_name',$order["owner_name"]);
      $workersinfo = Db::name('users')->where('id='.$worker_id)->field('img')->find();    
      $this->assign('customerimageurl',"__PUBLIC__public/uploads/images/".$userinfo["img"]);
      return $this->fetch('client_consult_director_master');
  }
   /**
   * 咨询费用加入数据表
   */
   public function consults(){
        $data['order_number'] = input('post.number');
         $data['consult_price'] = input('post.total');
         $list = Db::name('pay_price')->insertGetId($data);
         if($list){ 
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
     $order = Db::name('orders_maintain')->update(['id' => $v['id'],'tender_cost'=>$v['tender_cost']]); 
     $total+=$v['tender_cost'];
   }
   $gets = Db::name('users_worker')->where('uid',$worker_id)->field('guarantee')->find();
   if($gets){
     $arr['amount_engineer'] = $total;
     $arr['is_invitation'] = 1;
     $arr['worker_id'] = $worker_id;
     $arr['master_status'] = 2;
     $arr['status'] = 2;
     $arr['step_number'] = 5;
     $arr['work_step_number'] = 4;
     $arr['platform_service'] = 0.12;
   }else{
     $arr['amount_engineer'] = $total;
     $arr['is_invitation'] = 1;
     $arr['worker_id'] = $worker_id;
     $arr['master_status'] = 2;
     $arr['status'] = 2;
     $arr['step_number'] = 5;
     $arr['work_step_number'] = 4;
   }
   $orders = Db::name('orders')->where('order_number',$order_number)->update($arr);
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
