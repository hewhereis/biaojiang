<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Base extends Controller{
    public function _initialize()
    {
		$module     = strtolower(request()->module());
        $controller = strtolower(request()->controller());
        $action     = strtolower(request()->action());
        $url        = $module."/".$controller."/".$action;

        if(session('id')==''){
        	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) { 

				  $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxa0a4b634184f1e0f&redirect_uri=http%3A%2F%2Fwww.bj-wang.com%2Fweixinzc%2Fregister&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect');

			}elseif(in_array($url, [
				'index/index/index',
				'index/auth/index',
				'index/orders/index',
				'index/bjnews/index',
				'index/bjservice/index',
				'index/bjclientorder/index',
				'index/bjmasterreg/index',
				'index/bjhelp/index',
				'index/bjintroduce/index',
				'index/newshow/show'
				])){

			}else{
				$this->redirect('auth/index');
			}  

        }

		
		  /*
		*头部消息
		*/
        $uid=session('id');
		$ds_where['receive_id']=$uid;
		$ds_where['status']='0';
		$carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
		$this->assign('carr',$carr);
    }
}
