<?php 

namespace app\index\controller;
use think\Controller;
use think\Db;
use app\Common\model\GetModel;
use app\index\model\HelpmasterModel;

class Helpmaster extends Base{
//找帮师傅
	public function helpMaster($order_number,$wid=''){
		//获取当前订单的主任师傅id
			$workerId = GetModel::getOrderMasterWorker($order_number);
		//获取当前用户id
			$id = GetModel::getSessionId();
			$data ="help_master";
			$wid = $wid ;
            $this->assign("id",$id);
		
			
		//判断当前id是否是主任师傅id
			if($id == $workerId || $workerId==0){  
				// 是
					//获取当前订单需要几个普通师傅
					$numWhere = ['order_number'=>$order_number];
					$num = Db::name('orders')->where($numWhere)->value('num');
					//查看当前是否有用户接单
					$masterListWhere = ['order_number'=>$order_number,'d_worker_id'=>$id];
					//找到技能
					$masterList = Db::name('common_master')->where($masterListWhere)->select();
					$skills = Db::name('skills')->select();
					//当前师傅的id
					$woker_id = session('id');
					//查找主任师傅需要几个普通师傅
					$num = Db::name('orders')->where($numWhere)->field('num')->value('num');
					//查找有几个师傅同意
					$where['order_number'] = $order_number;
					$where['status'] =1;
					$number = Db::name('common_master')->where($where)->count();
					
					//点击师傅工号回填
					$id = input('post.obj');
					$order_n = input('post.order_number');
                    //$where['c.worker_id'] = $id;
                    //$where['c.order_number'] = $order_n;
                    $arr =Db::name('common_master')->alias('c')
                         ->join('users u','c.worker_id = u.id')
                         ->join('users_worker w','c.worker_id = w.uid')
                         ->where('c.worker_id',$id)
                         ->where('c.order_number', $order_n)
                         ->field('c.worker_id,c.working_hours,c.skill,c.cost,c.need,u.img,w.guarantee,w.credit_score,w.technical_level,w.comprehensive')
                         ->find();
                   if(request()->isAjax()){
					return json($arr);
                   }


				    //渲染视图页面
					$this->assign("num",$num);//$num传值师傅个数
					$this->assign("skills",$skills);//$num传值技能
					$this->assign("masterlist",$masterList);//$masterList普通师傅
					$this->assign("order_number",$order_number);//$masterList普通师傅
					$this->assign("data",$data);
					$this->assign("wid",$wid);
					$this->assign("woker_id",$woker_id);
					$this->assign("num",$num);
					$this->assign("number",$number);
					$this->assign("arr",$arr);
					return $this->fetch('help_master');
			}else{
				//不是，跳回首页
				$ds_url= \think\Config::get('view_replace_str');
				$this->redirect($ds_url['__PUBLIC__'].'index');
			}
		exit;
		//获取普通师傅个数
	}

	public function getMasterInfo(){
		if(request()->isAjax()){
			$param = input('workerId');

			if(preg_match("/^\d*$/",$param)){
				$list = Db::name('users_worker')->alias('uw')->join('users u','u.id=uw.uid')->where('uw.uid',$param)->field('u.img,uw.guarantee,uw.credit_score,uw.technical_level,uw.comprehensive')->find();
				if($list){
					return json(['code'=>'100','data'=>$list]);
				}else{
					return json(['code'=>'200','data'=>'','msg'=>'您输入的工号有误！']);
				}
			}else{
				return json(['code'=>'200','data'=>'','msg'=>'格式不正确']);
			}
		}else{


		}
	}

	public function addMaster(){
		if(request()->isAjax()){

			$param = input();
			//查找需要师傅的个数
			$num = Db::name('orders')->where('order_number',$param['order_number'])->value('num');
			$where['order_number']=$param['order_number'];
			$where['status'] = 1;
			$number = Db::name('common_master')->where($where)->count();
			if($num<=$number){
				return json(['code'=>'2','data'=>'','msg'=>'你需求的师傅个数已满']);
			}
			$param['d_worker_id'] =GetModel::getSessionId();
			$param['need'] = htmlspecialchars(input('need'));
			if(preg_match("/^\d*$/",$param['worker_id'])){
				$HelpmasterModel = new HelpmasterModel();
				$flag = $HelpmasterModel->addMaster($param);
				if($flag){
					return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
				}
			}else{
					return json(['code'=>$flag['code'],'data'=>'','msg'=>$flag['msg']]);
			}
		}else{
			//不是，跳回首页
				$ds_url= \think\Config::get('view_replace_str');
				$this->redirect($ds_url['__PUBLIC__'].'index');
		}
	}

	public function delectMaster(){
		if(request()->isAjax()){
			$param = input('id');
			$p['id'] =$param;
			if(preg_match("/^\d*$/",$param)){
				$HelpmasterModel = new HelpmasterModel();
				$flag = $HelpmasterModel->delectMaster($p);
				if($flag){
					return json(['code'=>'100','data'=>'','msg'=>$flag['msg']]);
				}
			}else{
					return json(['code'=>'200','data'=>'','msg'=>'格式不正确']);
			}
		}else{
			//不是，跳回首页
				$ds_url= \think\Config::get('view_replace_str');
				$this->redirect($ds_url['__PUBLIC__'].'index');
		}
	}
	/**
	 * 安装时找帮手师傅
	 */
	public function install_help_master($order_number,$wid=''){
		//获取当前订单的主任师傅id
			$workerId = GetModel::getOrderMasterWorker($order_number);
		//获取当前用户id
			$id = GetModel::getSessionId();
			$data ="install_help_master";
			$wid = $wid ;
			$this->assign("id",$id);
		//判断当前id是否是主任师傅id
			if($id == $workerId || $workerId==0){  
				// 是
					//获取当前订单需要几个普通师傅
					$numWhere = ['order_number'=>$order_number];
					$num = Db::name('orders')->where($numWhere)->value('num');
					//查看当前是否有用户接单
					$masterListWhere = ['order_number'=>$order_number,'d_worker_id'=>$id];
					//找到技能
					$masterList = Db::name('common_master')->where($masterListWhere)->select();
					$skills = Db::name('skills')->select();
					//当前师傅的id
					$woker_id = session('id');
					//查找主任师傅需要几个普通师傅
					$num = Db::name('orders')->where($numWhere)->field('num')->value('num');
					//查找有几个师傅同意
					$where['order_number'] = $order_number;
					$where['status'] =1;
					$number = Db::name('common_master')->where($where)->count();
					
					//点击师傅工号回填
					$id = input('post.obj');
					$order_n = input('post.order_number');
                    //$where['c.worker_id'] = $id;
                    //$where['c.order_number'] = $order_n;
                    $arr =Db::name('common_master')->alias('c')
                         ->join('users u','c.worker_id = u.id')
                         ->join('users_worker w','c.worker_id = w.uid')
                         ->where('c.worker_id',$id)
                         ->where('c.order_number', $order_n)
                         ->field('c.worker_id,c.working_hours,c.skill,c.cost,c.need,u.img,w.guarantee,w.credit_score,w.technical_level,w.comprehensive')
                         ->find();
                   if(request()->isAjax()){
					return json($arr);
                   }


				    //渲染视图页面
					$this->assign("num",$num);//$num传值师傅个数
					$this->assign("skills",$skills);//$num传值技能
					$this->assign("masterlist",$masterList);//$masterList普通师傅
					$this->assign("order_number",$order_number);//$masterList普通师傅
					$this->assign("data",$data);
					$this->assign("wid",$wid);
					$this->assign("woker_id",$woker_id);
					$this->assign("num",$num);
					$this->assign("number",$number);
					$this->assign("arr",$arr);
					return $this->fetch('install_help_master'  );
			}else{
				//不是，跳回首页
				$ds_url= \think\Config::get('view_replace_str');
				$this->redirect($ds_url['__PUBLIC__'].'index');
			}
		exit;
		//获取普通师傅个数
	}
	 /**
     * 更换灯片时找帮手师傅
     */
    public function gjm_help_master($order_number,$wid=''){
        //获取当前订单的主任师傅id
        $workerId = GetModel::getOrderMasterWorker($order_number);
        //获取当前用户id
        $id = GetModel::getSessionId();
        $data ="gjm_help_master";
        $wid = $wid ;
        $this->assign("id",$id);
        //判断当前id是否是主任师傅id
        if($id == $workerId || $workerId==0){
            // 是
            //获取当前订单需要几个普通师傅
            $numWhere = ['order_number'=>$order_number];
            $num = Db::name('orders')->where($numWhere)->value('num');
            //查看当前是否有用户接单
            $masterListWhere = ['order_number'=>$order_number,'d_worker_id'=>$id];
            //找到技能
            $masterList = Db::name('common_master')->where($masterListWhere)->select();
            $skills = Db::name('skills')->select();
            //当前师傅的id
            $woker_id = session('id');
            //查找主任师傅需要几个普通师傅
            $num = Db::name('orders')->where($numWhere)->field('num')->value('num');
            //查找有几个师傅同意
            $where['order_number'] = $order_number;
            $where['status'] =1;
            $number = Db::name('common_master')->where($where)->count();

            //点击师傅工号回填
            $id = input('post.obj');
            $order_n = input('post.order_number');
            //$where['c.worker_id'] = $id;
            //$where['c.order_number'] = $order_n;
            $arr =Db::name('common_master')->alias('c')
                ->join('users u','c.worker_id = u.id')
                ->join('users_worker w','c.worker_id = w.uid')
                ->where('c.worker_id',$id)
                ->where('c.order_number', $order_n)
                ->field('c.worker_id,c.working_hours,c.skill,c.cost,c.need,u.img,w.guarantee,w.credit_score,w.technical_level,w.comprehensive')
                ->find();
            if(request()->isAjax()){
                return json($arr);
            }


            //渲染视图页面
            $this->assign("num",$num);//$num传值师傅个数
            $this->assign("skills",$skills);//$num传值技能
            $this->assign("masterlist",$masterList);//$masterList普通师傅
            $this->assign("order_number",$order_number);//$masterList普通师傅
            $this->assign("data",$data);
            $this->assign("wid",$wid);
            $this->assign("woker_id",$woker_id);
            $this->assign("num",$num);
            $this->assign("number",$number);
            $this->assign("arr",$arr);
            return $this->fetch('gjm_help_master'  );
        }else{
            //不是，跳回首页
            $ds_url= \think\Config::get('view_replace_str');
            $this->redirect($ds_url['__PUBLIC__'].'index');
        }
        exit;
        //获取普通师傅个数
    }
	/**
	 * 安装时找帮手师傅
	 */
	public function coaming_help_master($order_number,$wid=''){
		//获取当前订单的主任师傅id
			$workerId = GetModel::getOrderMasterWorker($order_number);
		//获取当前用户id
			$id = GetModel::getSessionId();
			$data ="coaming_help_master";
			$wid = $wid ;
			$this->assign("id",$id);
		//判断当前id是否是主任师傅id
			if($id == $workerId || $workerId==0){  
				// 是
					//获取当前订单需要几个普通师傅
					$numWhere = ['order_number'=>$order_number];
					$num = Db::name('orders')->where($numWhere)->value('num');
					//查看当前是否有用户接单
					$masterListWhere = ['order_number'=>$order_number,'d_worker_id'=>$id];
					//找到技能
					$masterList = Db::name('common_master')->where($masterListWhere)->select();
					$skills = Db::name('skills')->select();
					//当前师傅的id
					$woker_id = session('id');
					//查找主任师傅需要几个普通师傅
					$num = Db::name('orders')->where($numWhere)->field('num')->value('num');
					//查找有几个师傅同意
					$where['order_number'] = $order_number;
					$where['status'] =1;
					$number = Db::name('common_master')->where($where)->count();
					
					//点击师傅工号回填
					$id = input('post.obj');
					$order_n = input('post.order_number');
                    //$where['c.worker_id'] = $id;
                    //$where['c.order_number'] = $order_n;
                    $arr =Db::name('common_master')->alias('c')
                         ->join('users u','c.worker_id = u.id')
                         ->join('users_worker w','c.worker_id = w.uid')
                         ->where('c.worker_id',$id)
                         ->where('c.order_number', $order_n)
                         ->field('c.worker_id,c.working_hours,c.skill,c.cost,c.need,u.img,w.guarantee,w.credit_score,w.technical_level,w.comprehensive')
                         ->find();
                   if(request()->isAjax()){
					return json($arr);
                   }


				    //渲染视图页面
					$this->assign("num",$num);//$num传值师傅个数
					$this->assign("skills",$skills);//$num传值技能
					$this->assign("masterlist",$masterList);//$masterList普通师傅
					$this->assign("order_number",$order_number);//$masterList普通师傅
					$this->assign("data",$data);
					$this->assign("wid",$wid);
					$this->assign("woker_id",$woker_id);
					$this->assign("num",$num);
					$this->assign("number",$number);
					$this->assign("arr",$arr);
					return $this->fetch('coaming_help_master'  );
			}else{
				//不是，跳回首页
				$ds_url= \think\Config::get('view_replace_str');
				$this->redirect($ds_url['__PUBLIC__'].'index');
			}
		exit;
		//获取普通师傅个数
	}
}