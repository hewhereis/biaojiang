<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
       return $this->fetch();
    }
    
    public function dianpuweixiu(){
    	
    	return $this->fetch();
    }

    public function dingdandingbiao(){
        $this->assign('list',1);
        return $this->fetch();
    }
    public function kehuxingxi(){

        return $this->fetch();
    }
    public function zhurenshifu(){

        return $this->fetch();
    }
    public function lianxikehu(){

        return $this->fetch();
    }
    public function suaidanpeishifu(){

        return $this->fetch();
    }
    public function zhaobangshoushifu(){

        return $this->fetch();
    }
    // login
    public function login(){

        return $this->fetch();
    }
    public function findpassword(){

        return $this->fetch();
    }
    public function findpassword2(){

    return $this->fetch();
    }
    public function findpassword3(){

    return $this->fetch();
    }
    public function register(){

    return $this->fetch();
    }
    public function fufeizixun_shifuxingxi(){

    return $this->fetch();
    }
    public function putongshifujiedan(){

        return $this->fetch();
    }

    public function weixiubaogaomaster(){
        return $this->fetch();
    }
    public function qiantui(){
        return $this->fetch();
    }
    public function qiandao(){
        return $this->fetch();
    }
    public function meiyouxiaoxi(){
        return $this->fetch();
    }
    public function infomation(){
        return $this->fetch();
    }
    public function infomationlist(){
        return $this->fetch();
    }
    public function orderinfomationlist(){
        return $this->fetch();
    }
    public function kehugerenzhongxin(){
        return $this->fetch();
    }
    public function shifugerenzhongxin(){
        return $this->fetch();
    }

    public function goodpoint(){
        return $this->fetch();
    }
}

