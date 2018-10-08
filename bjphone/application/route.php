<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//+------------------------------------------------------------------------------------------------
//|------------------------------------------------------------------------------------------------
//+------------------------------------------------------------------------------------------------
//|------------------------------         测    试                ---------------------------------
//+------------------------------------------------------------------------------------------------
//|------------------------------         路    由                ---------------------------------
//+------------------------------------------------------------------------------------------------
//|------------------------------------------------------------------------------------------------
//+------------------------------------------------------------------------------------------------
	Route::rule('dianpuweixiu','index/index/dianpuweixiu');//店铺维修
	Route::rule('kehuxingxi','index/index/kehuxingxi');//客户信息
	Route::rule('dingdandingbiao','index/index/dingdandingbiao');//订单定标
	Route::rule('zhurenshifu','index/index/zhurenshifu');//订单定标
	Route::rule('lianxikehu','index/index/lianxikehu');//联系客户
	Route::rule('suaidanpeishifu','index/index/suaidanpeishifu');//甩单配师傅
	Route::rule('zhaobangshoushifu','index/index/zhaobangshoushifu');//找帮手师傅
	Route::rule('login','index/index/login');//登入
	Route::rule('findpassword','index/index/findpassword');//找回密码1
	Route::rule('findpassword2','index/index/findpassword2');//找回密码2
	Route::rule('findpassword3','index/index/findpassword3');//找回密码3
	Route::rule('register','index/index/register');//注册
	Route::rule('fufeizixun_shifuxingxi','index/index/fufeizixun_shifuxingxi');//付费咨询-师傅信息
	Route::rule('putongshifujiedan','index/index/putongshifujiedan');//普通师傅接单
	Route::rule('weixiubaogaomaster','index/index/weixiubaogaomaster');//师傅，维修报告
	Route::rule('qiantui','index/index/qiantui');//签退
	Route::rule('qiandao','index/index/qiandao');//签到
	Route::rule('meiyouxiaoxi','index/index/meiyouxiaoxi');//么有消息
	Route::rule('infomation','index/index/infomation');//消息
	Route::rule('infomationlist','index/index/infomationlist');//消息列表
	Route::rule('orderinfomationlist','index/index/orderinfomationlist');//订单消息列表
	Route::rule('kehugerenzhongxin','index/index/kehugerenzhongxin');//客户个人中心
	Route::rule('shifugerenzhongxin','index/index/shifugerenzhongxin');//师傅个人中心
	Route::rule('shifuchengxinfeng','index/index/goodpoint');//师傅诚信分
//=====================================================================================

	Route::rule('qiangdan','index/indexlp/qiangdan');//抢单
	Route::rule('kehu_zixunzhurenshifu','index/indexlp/kehu_zixunzhurenshifu');//客户咨询主任师傅
	Route::rule('kehu_shigongbaogaoqueren','index/indexlp/kehu_shigongbaogaoqueren');//客户施工报告确认表
	Route::rule('shifu_weixiubaogao','index/indexlp/shifu_weixiubaogao');//师傅维修报告确认表
	Route::rule('shifu_weixiubaogaotianxie','index/indexlp/shifu_weixiubaogaotianxie');//师傅维修报告填写
	Route::rule('liuyanpeishifu','index/indexlp/liuyanpeishifu');//留言配师傅
	Route::rule('hedanbaogao','index/indexlp/hedanbaogao');//核单报告表
	Route::rule('hedanbaogaobiao','index/indexlp/hedanbaogaobiao');//核单报告表2
//=====================================================================================

	Route::rule('maintain','index/maintain/index'); //店铺维修
	Route::rule('selection','index/maintain/selection'); //订单定标
	Route::rule('page','index/maintain/page'); //新增加项目
	Route::rule('kehuxinxi','index/maintain/kehuxinxi');//客户信息
	Route::rule('shaixuan','index/maintain/shaixuan');//筛选师傅

	Route::rule('pingjiakehu','index/maintain/pingjiakehu');//评价客户
	Route::rule('yanzheng','index/maintain/yanzheng');//客户咨询主任师傅
	Route::rule('shifudingdanzhuanvgtai','index/maintain/shifudingdanzhuanvgtai');//师傅订单状态
	Route::rule('kehudingdanzhuangtai','index/maintain/kehudingdanzhuangtai');//客户订单状态
	Route::rule('fuwuxingxi','index/maintain/fuwuxingxi');//服务信息
	Route::rule('fuwuxingxixiugai','index/maintain/fuwuxingxixiugai');//服务信息修改
	Route::rule('kehushouye','index/maintain/kehushouye');//客户首页
	Route::rule('wodedingdan','index/maintain/wodedingdan');//我的订单
	Route::rule('shifushouye','index/maintain/shifushouye');//师傅首页
	Route::rule('shifuziliao','index/maintain/shifuziliao');//师傅资料
	Route::rule('chengxinbaozhengjin','index/maintain/chengxinbaozhengjin');//诚信保证金
	Route::rule('gerenxinxi','index/maintain/gerenxinxi');//个人信息
	Route::rule('chengxinbaozheng','index/maintain/chengxinbaozheng');//诚信保障金
	Route::rule('wodeqianbao','index/maintain/wodeqianbao');//我的钱包
	Route::rule('jinjilianxi','index/maintain/jinjilianxi');//紧急联系电话
	Route::rule('mimaguanli','index/maintain/mimaguanli');//密码管理
	Route::rule('nicheng','index/maintain/nicheng');//修改昵称

	Route::rule('shouzhimingxi','index/maintain/shouzhimingxi');//收支明细
	Route::rule('tixian','index/maintain/tixian');//提现
	Route::rule('wodeyinghangka','index/maintain/wodeyinghangka');//我的银行卡
	Route::rule('tukuanguanli','index/maintain/tukuanguanli');//退款管理
	Route::rule('tousujilu','index/maintain/tousujilu');//投诉记录
	Route::rule('pingjiajieshi','index/maintain/pingjiajieshi');//评价解释
	Route::rule('shezhimimas','index/maintain/shezhimimas');//设置密码
	Route::rule('xiugaimima','index/maintain/xiugaimima');//修改密码
	Route::rule('xiugaishoujihao','index/maintain/xiugaishoujihao');//修改手机号
	Route::rule('zhifumima','index/maintain/zhifumima');//支付密码
	Route::rule('wangongzhaopian','index/maintain/wangongzhaopian');//完工照片
		
		

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
