<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\AddressModel;
use think\Db;
class Address extends Base
{    
	/**
     * 地址管理页面
     */
	 public function address_admin(){
	 	$uid=session('id');
	 	$order = new AddressModel();
	 	$list = $order->address_admin($uid);
	 	$this->assign('list',json_encode($list));
	 	return view('dizhiguanli');
	 }
	 /**
	  * 添加地址页面
	  */
	 public function addaddress(){
	 	 return view('tianjiadizhi');
	 }
	 /**
	  * ajax添加地址
	  */
	 public function getaddress(){
	 	$param = input();
	 	$param['uid'] = session('id'); 
	 	//查询有多少个地址
	 	$param['num'] =Db::name('client_loaction')->where('uid',$param['uid'])->count();
	 	$order = new AddressModel();
	 	$list = $order->getaddress($param);
        return json(['code'=>$list['code'],'data'=>$list['data'],'msg'=>$list['msg']]);
	 }
	 /**
	  * 默认地址
	  */
	 public function default_address(){
	 	$uid=session('id');
	 	$id = input();
	 	$order = new AddressModel();
	 	$list = $order->default_address($uid,$id);
	 	return json(['code'=>$list['code'],'data'=>$list['data'],'msg'=>$list['msg']]);
	 }
	 /**
	  * 删除地址
	  */
	 public function delete_address(){
	 	$id = input();
	 	$order = new AddressModel();
	 	$list = $order->delete_address($id);
	 	return json(['code'=>$list['code'],'msg'=>$list['msg']]);
	 }
	 /**
	  * 编辑地址
	  */
	 public function edit_address($id){
	 	$list = Db::name('client_loaction')->where('id',$id)->find();
	 	$list['address_area'] = $list['province'].' '.$list['city'].' '.$list['district'];
	 	$this->assign('list',json_encode($list));
        return view('bianjidizhi');
	 }
	 /**
	  * 编辑地址ajax
	  */
	 public function edit_address_ajax(){
       $param = input();
       $order = new AddressModel();
	   $list = $order->edit_address_ajax($param);
	   return json(['code'=>$list['code'],'msg'=>$list['msg']]);
	 }
	 
	  
}