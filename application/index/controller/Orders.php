<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\OrdersModel;
use app\index\model\OfferModel;
class Orders extends Controller
{
    public function index($sid,$cid)
    {
        header("Content-Type: text/html;charset=utf-8");
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        if($sid==1){

            $this->redirect('/publish',302);

        }else if($sid==2){

            $sid=$sid;
            $cid=$cid;
            //echo $cid;


            $slist = Db::name('service')->field('name')->where("id='{$sid}'")->find();//获取当前服务类型名称
            $clist = Db::name('commodity')->field('name,id,c_id')->where("id='{$cid}'")->find();//获取当前商品二类名称
            $gsid=$clist['id'];
            $ylist = Db::name('commodity')->field('c_id')->where("id='{$cid}'")->find();
            $yid=$ylist['c_id'];
            $rlist = Db::name('category')->field('name,id')->where('find_in_set('.$sid.',s_id)')->where('id','in',$yid)->find();
            $csid=$rlist['id'];
            $lists = Db::name('category')->field('name,id')->where('id','not in',$csid)->where('find_in_set('.$sid.',s_id)')->select();
            $listss = Db::name('category')->field('name,id')->where('find_in_set('.$sid.',s_id)')->select();
            $carr=Db::name("commodity")->field("id,name")->where('find_in_set('.$csid.',c_id)')->where('id','not in',$gsid)->select(); //获取商品二类  
            $brand=Db::name("brand_list")->select(); //品牌
            $sname=$slist['name'];
            $glist=Db::name("goods")->field("id,name")->where("y_id='{$gsid}'")->select(); //获取商品三类
            $sname=$slist['name'];
			$ds_loca['uid']=$uid;
			$ds_loca['default']=1;
			$loaction = Db::name('client_loaction')->where($ds_loca)->find();//获取当前客户地址管理

            $this->assign('sname',$sname);
            $this->assign('clist',$clist);
            $this->assign('rlist',$rlist);
            $this->assign('comm',$carr);
            $this->assign('glist',$glist);
            $this->assign('lists',$lists);
            $this->assign('listss',$listss);
            $this->assign('brand',$brand);
			$this->assign('loaction',$loaction);
            return $this->fetch('repair_orders');
        }
        else if($sid==3){
            echo "品质监理待完善";
        }
        else if($sid==4){
              $this->redirect('/survey');
        }
        else if($sid==5){
             $this->redirect('/replacing_the_lamp',302);
        }
        else if($sid==6){
           $this->redirect('/coaming_construct_dismantles',302);
        }else {
              return $this->fetch('/404');
        }

    }
    public  function twostclass(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        $id=$_GET['bigname'];

        $carr=Db::name("commodity")->field("id,name")->where('find_in_set('.$id.',c_id)')->select(); //获取商品二类
        echo json_encode($carr);
    }

    public  function threestclass(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        $id=$_GET['bigname'];

        $carr=Db::name("goods")->field("id,name")->where('find_in_set('.$id.',y_id)')->select(); //获取商品二类
        echo json_encode($carr);
    }
    public  function threedefault(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $id=$_GET['bigname'];
        $carr=Db::name("goods")->field("id,name")->where('find_in_set('.$id.',y_id)')->select(); //三级联动故障默认
        echo json_encode($carr);
    }
    /**
     * 客户下单
     */
    public function placeorder(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        $param = input('post.');
        $uid = input('post.uid');


        if(empty($uid)){
            return json(array('code'=>-1,'msg'=>'请先登录'));
        }


        if(request()->isAjax()){
            $order = new OrdersModel();
            $flag = $order->ordersxd($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

    }



    /**
     * 客户基本信息
     */
    public function rejection(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        if(request()->isAjax()){
            $order_number = input('post.number');
            //钱
            $rate=explode(',',input('cc'));
            array_pop($rate);
            //ID
            $ids=explode(',',input('bb'));
            array_pop($ids);
            $data['id']=$ids;
            $data['budget']=$rate;
            $keys = array_keys($data);
            $count1 = count($keys);
            $count2 = count($data[$keys[0]]);
            for ($i=0; $i < $count2; $i++) {
                for ($j=0; $j < $count1; $j++) {
                    $new_arr[$i][$keys[$j]] = $data[$keys[$j]][$i];
                }
            }
            ;
            $modules = input('post.modules');//招募留言
            $price = input('post.price'); //判断招标是否显示预算价
            foreach ($new_arr as $k=>$v){
                if($price ){
                    $order = Db::name('orders_maintain')->update(['id' => $v['id'],'budget'=>$v['budget'],'tender'=>1,'comments'=>$modules]);
                }else{
                    $order = Db::name('orders_maintain')->update(['id' => $v['id'],'budget'=>$v['budget'],'tender'=>0,'comments'=>$modules]);
                }
            }
            if($order || $order==0){
                $arr = Db::name('orders')->where('order_number',$order_number)->update(['step_number'=>3,'status'=>1,'master_status'=>1,'master_status'=>1]);
                return json(array('code'=>200,'msg'=>'正在为您找师傅'));
            }else{
                return json(array('code'=>0,'msg'=>'找师傅遇到一点小问题哦'));
            }
        }
    }
    /**
     * 用户甩单
     */
    public function jilt_single($ornumber){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;

        $order = Db::name('orders')->field('contact_name,full_location,start_time')->where('order_number',$order_number)->find();

        $list = Db::name('orders_maintain')->where('order_number',$order_number)->field('l1_category_id,l2_category_id,id')->select();
        $uid = session('id');
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
        $this->assign('cate',$cate);
        $this->assign('cate1',$order_number.'category');
        $this->assign('cate2',$order_number.'commodity');
        $this->assign('order_number',$order_number);
        $this->assign('order',$order);
        $this->assign('uid',$uid);
        return $this->fetch('jilt_single');
    }

    /**
     * 客户下单  师傅收到消息
     */
    public function mess(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $worder_id = Db::name('users')->where('type',2)->field('id')->select();
        $param = input('post.');
        foreach($worder_id as $vv){
            $param['receive_id'] = $vv['id'];
            $arr = Db('message_reminder')->insert($param);
        }
    }


    /**
     * 留言配单
     */
    public function guestbook($ornumber){
        $uid=session('id');
        $ds_url=\think\Config::get('view_replace_str');
        if(empty($uid)){
            $this->redirect($ds_url['__PUBLIC__'].'auth');
        }
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;
        $order = Db::name('orders')->where('order_number',$order_number)->field('contact_name,full_location,start_time')->find();
        $orders = Db::name('orders_maintain')->where('order_number',$order_number)->field('comments')->find();
        $list = Db::name('orders_maintain')->where('order_number',$order_number)->field('l1_category_id,l2_category_id,tender,budget,id')->select();
        $rob=Db::name("orders")->field('rob_num')->where('order_number',$order_number)->find();
        //判断登陆进来的是师傅还是客户
        $uid = session('id');
        $result = Db::name('users')->where('id='.$uid)->field('type')->find();
        $cate = array(); //声明一个空数组
        $total=null;  //声明一个空变量
        foreach($list as $l){
            $one = Db::name('category')->where('id','in',$l['l1_category_id'])->select();
            $two = Db::name('commodity')->where('id','in',$l['l2_category_id'])->select();
            $b['tender'] = $l['tender'];
            $b['budget'] = $l['budget'];
            $b['id'] = $l['id'];
            foreach($one as $k=>$a){
                $b[$order_number.'category'] = $a['name'];
            }
            foreach($two as $k=>$a){
                $b[$order_number.'commodity'] = $a['name'];
            }
            $cate[]=$b;
            if($l['tender']==1){
                $total+= $l['budget'];
            }else{
                $total = '待定';
            }
        }

        //查询师傅和客户对订单的留言
        $where['m.order_number'] =$order_number;
        $where['m.status'] = 1;
        $message = Db::name('users')
            ->alias('u')
            ->join('message m','u.id = m.uid')
            ->where($where)
            ->select();

        $this->assign('total',$total);
        $this->assign('cate',$cate);
        $this->assign('cate1',$order_number.'category');
        $this->assign('cate2',$order_number.'commodity');
        $this->assign('order',$order);
        $this->assign('orders',$orders);
        $this->assign('order_number',$order_number);
        $this->assign('message',$message);
        $this->assign('result',$result);
        $this->assign('rob_num',$rob);
        return view('message_pairing');
    }

    /**
     * 改变维修主表状态
     */
    public function change_status(){
         $uid=session('id');
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
    /**
     * 师傅客户留言信息
     */
   public function message(){	
		$file_path = "sensitive.txt";
			if (is_file("sensitive.txt")){//判断给定文件名是否为一个正常的文件
				$filter_word = file("sensitive.txt");//把整个文件读入一个数组中
				$str=input('post.message');
				for($i=0;$i<count($filter_word);$i++){//应用For循环语句对敏感词进行判断
					 if(preg_match("/".trim($filter_word[$i])."/i",$str)){//应用正则表达式，判断传递的留言信息中是否含有敏感词
						    $uid=session('id');
							$ds_where['receive_id']=$uid;
							$ds_where['status']='0';
							$carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
							$this->assign('carr',$carr);
							$order_number = input('post.number');
							$data['uid'] = session('id');
							$data['order_number'] =$order_number;
							$data['content'] = input('post.message');
							$data['create_time'] = time();
							$result = Db::name('message')->insertGetId($data);
							if($result){
								return json(array('code'=>200,'msg'=>'留言提交成功,请等待审核'));
							}else{
								return json(array('code'=>200,'msg'=>'留言出现一点小问题,请重新留言'));
							}
					 exit;
					}
				}
			}
		
		
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        $order_number = input('post.number');
        $data['uid'] = session('id');
        $data['order_number'] =$order_number;
        $data['content'] = input('post.message');
		$data['status'] = 1;
        $data['create_time'] = time();
        $result = Db::name('message')->insertGetId($data);
        if($result){
            return json(array('code'=>200,'msg'=>'留言提交成功'));
        }else{
            return json(array('code'=>200,'msg'=>'留言出现一点小问题,请重新留言'));
        }
    }
    /**
     * 客户选师傅页面
     */
    public function calibrate($ornumber){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;
        $order = Db::name('orders')->where('order_number',$order_number)->field('contact_name,full_location,start_time')->find();
        $list = Db::name('orders_maintain')->where('order_number',$order_number)->field('l1_category_id,l2_category_id,tender,budget,id')->select();
        $cate = array(); //声明一个空数组
        $total=null;  //声明一个空变量
        foreach($list as $l){
            $one = Db::name('category')->where('id','in',$l['l1_category_id'])->select();
            $two = Db::name('commodity')->where('id','in',$l['l2_category_id'])->select();
            $b['id'] = $l['id'];
            $b['budget'] = $l['budget'];
            foreach($one as $k=>$a){
                $b[$order_number.'category'] = $a['name'];
            }
            foreach($two as $k=>$a){
                $b[$order_number.'commodity'] = $a['name'];
            }
            $cate[]=$b;
            $total+= $l['budget'];
        }
        
        $evaluate = Db::name('offer_total')
            ->alias('o')
            ->join('users_worker u','u.uid = o.worker_id')
            ->where('o.order_number',$order_number)
            ->select();
         
        $this->assign('cate',$cate);
        $this->assign('total',$total);
        $this->assign('cate1',$order_number.'category');
        $this->assign('cate2',$order_number.'commodity');
        $this->assign('order',$order);
        $this->assign('order_number',$order_number);
        $this->assign('evaluate',$evaluate);
        return view('order_calibrate');
    }
    /**
     * 师傅抢单
     */
    public function grab($ornumber){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;
        //查找发送订单者ID
        $owner_id = Db::name('orders')->where('order_number',$order_number)->field('owner_id')->find();  
        $order =Db::name('orders')->where('order_number',$order_number)->field('contact_name,full_location,start_time')->find();
        $list = Db::name('orders_maintain')->where('order_number',$order_number)->field('l1_category_id,l2_category_id,id')->select();
        $cate = array(); //声明一个空数组
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
        $this->assign('cate',$cate);
        $this->assign('cate1',$order_number.'category');
        $this->assign('cate2',$order_number.'commodity');
        $this->assign('order',$order);
        $this->assign('order_number',$order_number);
        $this->assign('owner_id',$owner_id['owner_id']);
        return view('grab_order');
    }
    /**
     * 师傅投标
     */
    public function tender(){
    
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        //判断师傅是不是第一次抢单
        $param=input('post.');
        $uid=$param['uid'];
        $number=$param['order_number'];
        $where['worker_id']=$uid;
        $where['order_number']=$number;
        $list=Db::name("offer_total")->field('is_rob')->where($where)->find();
        $worker_id = Db::name('orders')->where('order_number',$number)->value('worker_id');

        if($worker_id==0 || $worker_id==session('id')){
            if($list['is_rob']==0 && $worker_id!=session('id')){
                if(request()->isAjax()){
                    $param = input('post.');
                    $order = new OfferModel();
                    $flag = $order->tender($param,$uid);
                    $total['worker_id'] = session('id');
                    $total['amount_engineer'] = $param['total'];
                    $total['order_number'] = $param['order_number'];
                    //查询发票税率
                    $rate = Db::name('config')->where('id',5)->field('value')->find();
                    //查询出师傅的平台服务费用
                    $platform_service = Db::name('config')->where('id',3)->field('value')->find();//没交保证金的平台服务费
                    $platform_services = Db::name('config')->where('id',4)->field('value')->find();//交完保证金的平台服务费

                    //判断师傅是否缴纳保证金
                    $gets = Db::name('users_worker')->where('uid',$param['uid'])->field('guarantee')->find();
                    if(!empty($gets['guarantee'])){
                        $total['totals'] = $total['amount_engineer']*(1+$platform_services['value']+$rate['value']);
                    }else{
                        $total['totals'] = $total['amount_engineer']*(1+$platform_service['value']+$rate['value']);
                    }


                    $result = Db::name('offer_total')->insertGetId($total);
                    $data['work_step_service'] =1;
                    $data['work_step_number'] = 1;
                    $data['master_status'] = 2;

                    $order_number=$param['order_number'];
                    $rob=Db::name("orders")->field('rob_num')->where('order_number',$order_number)->find();

                    $rob_num=$rob['rob_num'];
                    $map['rob_num']=$rob_num+1;
                    $maps['is_rob']='1';
                    Db::name("orders")->where('order_number',$order_number)->update($map);
                    Db::name("offer_total")->where('order_number',$order_number)->update($maps);
                    $arr = Db::name('orders')->where('order_number',$param['order_number'])->update($data);
                    if($arr==0 || $arr){
                        return json(['code' => 200,'msg' =>'抢单成功']);
                    }else{
                        return json(['code' => 0,  'msg' =>'-1']);
                    }
                }
            }else{
                return json(array('code'=>0,'msg'=>'请勿重复抢单1！'));
            }
        }else{
            return json(array('code'=>0,'msg'=>'来晚一步，订单已经被别的师傅抢掉了！'));
        }

    }
    /**
     * 客户选择师傅
     */
    public function selects(){
        $uid=session('id');
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
        $offer = Db::name('offer')->where($where)->field('tender_cost')->select();
        $id = Db::name('orders_maintain')->where('order_number',$order_number)->field('id')->select();
        foreach($id as $k=>$ids){
            $offer[$k]['id'] = $ids['id'];
        }
        foreach($offer as $v){
            $arr =  Db::name('orders_maintain')->update(['id' => $v['id'],'tender_cost'=>$v['tender_cost'],'worker_id'=>$result]);
        }
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

        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
    /**
     * 客户结算
     */
   public function settlement($ornumber,$url){
        header("Content-type:text/html;charset=utf-8");
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number=$ornumber;
        $order = Db::name('orders')->where('order_number',$order_number)->field('contact_name,full_location,start_time')->find();
        $list = Db::name('orders_maintain')->where('order_number',$order_number)->field('l1_category_id,l2_category_id,tender_cost,id')->select();
        //查询客户选择的师傅
        $where['is_invitation'] = 1;
        $where['order_number']=$order_number;
        $result = Db::name('orders')->where($where)->find();
        $wid = Db::name('orders')->where($where)->field('worker_id')->find();
        // 客户支付的价格,师傅收费+平台服务费+税费
        $wheres['order_number'] = $order_number;
        $wheres['worker_id'] =  $wid['worker_id'];
         //查询发票税率
        $rate = Db::name('config')->where('id',5)->field('value')->find();
        //查询出师傅的平台服务费用
        $platform_service = Db::name('config')->where('id',3)->field('value')->find();//没交保证金的平台服务费
        $platform_services = Db::name('config')->where('id',4)->field('value')->find();//交完保证金的平台服务费
        //判断师傅是否缴纳保证金
        $gets = Db::name('users_worker')->where('uid',$wid['worker_id'])->field('guarantee')->find();
        $total = Db::name('offer_total')->where($wheres)->field('totals')->find();
        $cate = array(); //声明一个空数组
        foreach($list as $l){
          if(!empty($gets['guarantee'])){
              $b['tender_cost'] = $l['tender_cost']*(1+$platform_services['value']+$rate['value']);
          }else{
              $b['tender_cost'] = $l['tender_cost']*(1+$platform_service['value']+$rate['value']);
          }
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
        $this->assign('cate',$cate);
        $this->assign('cate1',$order_number.'category');
        $this->assign('cate2',$order_number.'commodity');
        $this->assign('order',$order);
        $this->assign('orders_id',$order_number );
        $this->assign('result',$result);
        $this->assign('total',$total['totals']);
        $this->assign('order_number',$order_number);
        return view('settlement_page');
    }
    /**
     * 客户需要支付的总费用
     */
    public function total(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $order_number = input('post.number');
        $data['total_price'] = input('post.total');
        $list = Db::name('pay_price')->where('order_number',$order_number)->find();
        if(!empty($list)){
            $result = Db::name('pay_price')->where('order_number', $order_number)->update($data);
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
     * 单个故障详情
     */
    public  function one($ornumber){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);

        $id=$ornumber;
        $data = Db::name('orders_maintain')->where('id',$id)->find();
         
        //商品大类
        $res1 = Db::name('category')->where('id',$data['l1_category_id'])->field('name')->find();
        //商品小类
        $res2 = Db::name('commodity')->where('id',$data['l2_category_id'])->field('name')->find();
        //故障详情
        $arr = Db::name('goods')->where('id','in',$data['trouble_tags'])->select();
       
        $this->assign('res1',$res1);
        $this->assign('res2',$res2);
        $this->assign('data',$data);
        $this->assign('arr',$arr);
        return view('one_malfunction_particulars');
    }
    /*
判断师傅是否抢单
*/
    public function ajax_me_q(){

        $param=input('post.');
        $uid=$param['uid'];
        $number=$param['number'];
        $worker_id = Db::name('orders')->where('order_number',$number)->value('worker_id');
		
	
		
		
        if($worker_id==0 || $worker_id==session('id')){
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

    //考试提示

    public function Ghint(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        return $this->fetch();
    }
    /**
    *业主协议
    */
    public function yezhuxieyi(){
        $uid=session('id');
        $ds_where['receive_id']=$uid;
        $ds_where['status']='0';
        $carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
        $this->assign('carr',$carr);
        return view('yezhuxieyi');
    }


      public function administration(){
        
        return view('administration');
    }


}
