<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Base extends Controller{
    public function _initialize()
    {
		/*
		*初始化 必须登录
		*/
		if(!session('id')||!session('ds_username')){
            $this->redirect('http://localhost/phone/login');
        }
		
    }
}
