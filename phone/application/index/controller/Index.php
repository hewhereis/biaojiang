<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index()
    {
		
		$uid=session('id');
		$type=session('type');
		
		if($type==1){
			$list=Db::name('orders')->where('owner_id',$uid)->field('order_number,create_time')->order('id desc')->limit(2)->select();
			foreach($list as $k=>$v){
					$list[$k]['create_time']=date('Y-m-d',$v['create_time']); 
				}
		}else if($type==2){
			$list=Db::name('orders')->where('worker_id','0')->field('order_number,create_time')->order('id desc')->limit(2)->select();
			foreach($list as $k=>$v){
					$list[$k]['create_time']=date('Y-m-d',$v['create_time']); 
				}
		}else{
			$list=Db::name('orders')->field('order_number,create_time')->order('id desc')->limit(2)->select();
			foreach($list as $k=>$v){
					$list[$k]['create_time']=date('Y-m-d',$v['create_time']); 
				}
		}
		 
		$this->assign('list',json_encode($list));//赋值数据集
		return $this->fetch('index');
    }
	
	
	
	
	
	
	
	
	
}
