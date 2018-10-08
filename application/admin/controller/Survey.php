<?php

namespace app\admin\controller;
use think\Db;
use app\admin\model\SurveyModel;
class Survey extends Base
{
 

    //*********************************************勘测列表*********************************************//
    /**
     * 勘测订单列表
     * @author [标匠] [Technical team]
     */
    public function index(){

        $key = input('key');
        $map= [];
        if($key&&$key!=="")
        {
            $map['bj_orders.order_number'] = ['like',"%" . $key . "%"];          
        }
        $member = new SurveyModel();       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = $member->getAllCount($map);//计算总页面
        $allpage = intval(ceil($count / $limits));       
        $lists = $member->getSurveyWhere($map, $Nowpage, $limits);  
		foreach($lists as $k=>$v)
        {
            $lists[$k]['start_time']=date('Y-m-d H:i:s',$v['start_time']);
        }  		
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
        
		
        return $this->fetch();
    }
    //分配师傅
	public function dispensing_master(){
		$id = input('param.id');
		
        $order_number=Db::name('orders')->field('order_number')->where('id',$id)->find();
		$si_where['order_number']=$order_number['order_number'];
		$sinv=Db::name('survey_invitation_record')->field('worker_id')->where($si_where)->select();
		
		$this->assign('order_number', $order_number['order_number']); //订单号
		$this->assign('sinv', $sinv); //邀请师傅人数
        return $this->fetch();
    }
	//分配师傅ajax
	public function ajax_survey_invitation(){
		
		$param = input('post.');
		$where['uid']=$param['worker_id'];
		$where['review_status']=2;
		$work=Db::name('users_worker')->where($where)->find();
		
		if(empty($work)){
            return json(['code' => -1, 'msg' => '请填写正确的师傅工号']);
        }
		$si_where['order_number']=$param['order_number'];
		$si_where['worker_id']=$param['worker_id'];
		$sinv=Db::name('survey_invitation_record')->where($si_where)->find();
		
		if(!empty($sinv)){
            return json(['code' => -1, 'msg' => '不要重复邀请师傅']);
        }
		
		 $article = new SurveyModel();
         $flag = $article->insertInvitation($param);
         return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
       
    }
	//增加师傅
	public function sry_choose_master($order_number){
		$jineng = input('jineng');
		$key    = input('key');
        $map    = [];
		
        if($key&&$key!=="")
        {
            $map['bj_users_worker.real_name|bj_users_worker.uid'] = ['like',"%" . $key . "%"];          
        }
		
		$ds_where=[];
		if($jineng&&$jineng!=="")
        {	 $va=$jineng;
             $ds_where["bj_users_worker.work_skill"]=["like","%$va%"];         
        }
                    
				
				$wheres['bj_users_worker.review_status']='2';
				$Nowpage  = input('get.page') ? input('get.page'):1;
				$limits   = '8';// 获取总条数
				$count    = Db::name('users_worker')->where($wheres)->where($map)->where($ds_where)->count();//计算总页面
				$allpage  = intval(ceil($count / $limits));
				
				$where['a.review_status']='2';
				$field='a.uid,a.real_name,a.service_type_id as a_sertype, a.work_skill as a_workski,u.img as img';
				$list=Db::name("users_worker")->alias('a')->field($field)->join('users u','u.id = a.uid')->where($where)->where($map)->where($ds_where)->page($Nowpage, $limits)->group('a.id desc')->select();
				
				
				foreach($list as &$val){
					$val['service'] = Db::name('service')->field('name')->where('id','in',$val['a_sertype'])->select();
					}
				foreach($list as &$val){
					$val['skills'] = Db::name('skills')->field('skill')->where('id','in',$val['a_workski'])->select();
					}
				
				$skills=Db::name("skills")->field('id,skill')->select();
				
				$this->assign('Nowpage', $Nowpage); //当前页
				$this->assign('allpage', $allpage); //总页数 
				$this->assign('val', $key);
				$this->assign('jineng', $jineng);
				$this->assign('order_number', $order_number); //订单号 
				$this->assign('skills', $skills);
		
				if(input('get.page')){
					return json($list);
				} 
		return $this->fetch();
       
    }

 


   



 

}