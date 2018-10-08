<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\Sign;
class Mastersign extends Base{
    /**
     * 师傅签到页面
     */
    public function master_sign($id){
    	$list = new Sign();
    	$list = $list->master_sign($id);
    	$this->assign('list',$list);
    	$this->assign('id',$id);
    	return view('qiandao');
    }
    /**
     * 师傅签到AJAX
     */
    public function signajax(){
    	$param = input();
    	$list = new Sign();
    	$list = $list->signajax($param);
    	 return json(['code'=>$list['code'],'msg'=>$list['msg']]);
    }
    /**
     * 师傅签退
     */
    public function master_sign_out($id){
        $list = new Sign();
        $list = $list->master_sign($id);

        $this->assign('list',$list);
        $this->assign('id',$id);
        return view('qiantui');
    }
    /**
     * 师傅签退AJAX
     */
    public function signajax_out(){
        $param = input();
        $list = new Sign();
        $list = $list->signajax_out($param);
        return json(['code'=>$list['code'],'msg'=>$list['msg']]);
    }
}