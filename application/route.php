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

Route::rule('qianming','index/ceshi/qianming');//验证码10-12
Route::rule('ceshi','index/auth/ceshi');//验证码10-12
//后台
Route::rule(['examgrouplook','examgrouplook/:id'],'admin/examgroup/examgrouplook');//考题
Route::rule(['lastadd','lastadd/:id'],'admin/examgroup/lastadd');//考题
//微信
Route::rule('weixin','index/weixin/index');//微信验证首页
Route::rule('weixinzc/register','index/wxregister/index');//微信验证首页
Route::rule('weixinzc/auth','index/wxregister/wxauth');//微信验证首页
Route::rule('wxpay/consult','index/wxpay/consult');//微信咨询费用
Route::rule('wxpays/pay','index/wxpay/pay_consult');//微信jsapi
Route::rule('jsApiConsult','index/wxpay/jsApiConsult');//微信jsapi咨询费加入数据表
Route::rule('consult_adds','index/wxpay/consult_adds');//微信咨询费成功之后加入数据表
Route::rule('wxpay/scan','index/wxpay/index');//微信扫码支付
Route::rule('wxpay/pay','index/wxpay/payment');//微信jsapi
Route::rule('adds','index/wxpay/adds');//扫码支付成功加入数据库
Route::rule('jsApiAdd','index/wxpay/jsApiAdd');//扫码支付成功加入数据库
Route::rule('is_weixin','index/api/is_weixin');//判断是微信还是PC端
Route::rule('weixinzc/wxlogin','index/wxregister/wxlogin');//微信登入
Route::rule('weixinzc/wxregister','index/wxregister/wxzhuz');//微信注册
Route::rule('weixinzc/regpassword','index/wxregister/regPassword');//微信重置密码
Route::rule('ds_is_sign','index/api/ds_is_sign');
// 前台
Route::rule('auth','auth/index');//登录路由
Route::rule('auth/login','index/auth/login');//登入
Route::rule('auth/logout','index/auth/logout');//登出
Route::rule('auth/vcode','index/auth/vcode');//获取验证码
Route::rule('auth/send_code','index/auth/send_code');//获取验证码
Route::rule(['orders','orders/:sid','orders/:cid'],'index/orders/index');//订单处理页面
Route::rule('orders/twostclass','index/orders/twostclass');//订单处二分类
Route::rule('orders/threestclass','index/orders/threestclass');//订单处三分类
Route::rule('orders/threedefault','index/orders/threedefault');//订单故障详情默认
Route::rule('orders/placeorder','index/orders/placeorder');//下单
Route::rule('auth/vvcode','index/auth/vvcode');//获取重置验证码
Route::rule('auth/register','index/auth/register');//注册
Route::rule('auth/update','index/auth/update');//重置密码
Route::rule('master','index/master/index');//师傅首页
Route::rule('approve','index/master/approve');//师傅实名认证
Route::rule('master_contact_customer/:onumber','index/master/contact_customer');//客户支付后师傅联系客户页面
Route::rule('hours','index/master/hours');//师傅和客户沟通后确定的施工时间
Route::rule('reason','index/master/reason');//客户电话打不通的原因
Route::rule('confirms','index/master/confirms');//普通师傅同意主任师傅的邀请
Route::rule('refuse','index/master/refuse');//普通师傅拒绝主任师傅的邀请
Route::rule('keep','index/master/keep');//师傅工程简历提交
Route::rule('resume_auth','index/master/resume_auth');//师傅工程简历分享
Route::rule('resumes','index/master/resumes');//师傅认证数

Route::rule(['master_maintenance_reports','master_maintenance_reports/:order_number'],'index/master/master_maintenance_report');//师傅维修确认表
Route::rule('img','index/master/img');//师傅维修确认表图片上传
Route::rule('add','index/master/add');//师傅维修确认页面信息加入
Route::rule(['confirm_orders','confirm_orders/:ornumber','confirm_orders/:uid'],'index/master/confirm_order');//客户邀请师傅，师傅确认页面




Route::rule('install/ajax/message_qiang','index/installation/install_ajax_me_q');//安装模块判断当前师傅抢单
Route::rule('information','index/master/information');//师傅填写个人信息
Route::rule('service','index/master/service');//服务类型联动
Route::rule('commodity','index/master/commodity');//商//更换灯片
Route::rule('replacing_the_lamp','index/replace/replace');//
Route::rule('replace_add','index/replace/replace_add');//用户信息提交
//类型联动
Route::rule('category','index/master/category');//二级类型联动
Route::rule('submit_information','index/master/submit_information');//提交师傅的个人信息
Route::rule('core/customer','index/personal/client_home');//客户个人中心
Route::rule('customer/personalcenter','index/personal/ds_client_home');//客户个人首页
Route::rule('core/master','index/personal/client_home_s');//师傅个人中心
Route::rule('master/personalcenter','index/personal/ds_work_home');//师傅个人首页
Route::rule('ajax/message','index/personal/ajax_message');//判断师傅是否认证
Route::rule('ajax/message_qiang','index/orders/ajax_me_q');//判断当前师傅抢单
Route::rule('ajax/dspan','index/personal/ajax_dspan');//判断当前师傅抢单
Route::rule('yezhuxieyi','index/orders/yezhuxieyi');//业主协议
Route::rule('review','index/master/review');//师傅实名认证未审核的跳转页面
Route::rule('master/approve','index/master/master_approve');//师傅实名认证上传信息
Route::rule('uploadImage','index/api/uploadImage');//师傅实名认证时身份证上传
Route::rule('api/repairOrders/:onumber','index/api/repairOrders');//维修API
Route::rule('api/message_refresh','index/api/message_refresh');//消息API
Route::rule(['Cqueryprice','Cqueryprice/:ornumber','Cqueryprice/:wid'],'index/Cqueryprice/index');//客户咨询价格
Route::rule(['choose','choose/:ornumber','choose/:wid'],'index/Cqueryprice/choose');//挑选主任师傅
Route::rule(['director_master','director_master/:ornumber','director_master/:wid'],'index/Cqueryprice/director_master');//客户咨询主任师傅
Route::rule('send','index/Cqueryprice/send');//师傅修改价格。
Route::rule('num','index/Cqueryprice/num');//添加选择普通师傅的条件。
Route::rule(['pay','pay/:ornumber','pay/:wid'],'index/Cqueryprice/pay');//咨询付费。
Route::rule(['master_filters','master_filters/:ornumber','master_filters/:cid','master_filters/:sid'],'index/Cqueryprice/master_filter');//挑选主任师傅
Route::rule(['master_filtersk','master_filtersk/:ornumber','master_filtersk/:cid','master_filtersk/:sid'],'index/Cqueryprice/master_filterk');//挑选主任师傅
Route::rule('master_filterknam','index/Cqueryprice/master_filterknam');//搜索
Route::rule(['common_master','common_master/:ornumber','common_master/:wid'],'index/Cqueryprice/common_master');//选择普通师傅
Route::rule('find_master','index/Cqueryprice/find_master');//查找师傅
Route::rule(['master_information','master_information/:ornumber','master_information/:cid','master_information/:wid'],'index/Cqueryprice/master_information');//师傅师傅个人信息
Route::rule('praise','index/Cqueryprice/praise');//好评
Route::rule('secondary','index/Cqueryprice/secondary');//中评
Route::rule('bad','index/Cqueryprice/bad');//差评
Route::rule('all','index/Cqueryprice/all');//全部
Route::rule('default','index/Cqueryprice/defaults');//默认
Route::rule('number','index/Cqueryprice/number');//主任师傅需要普通师傅的个数
Route::rule('consult_confirm','index/Cqueryprice/consult_confirm');//咨询下单客户选择师傅
Route::rule('work_basics','index/personal/work_basics');//师傅基本资料
Route::rule('ajax_mase_modify','index/personal/ajax_mase_modify');//师傅基本资料
Route::rule('mase_headportrait','index/personal/mase_headportrait');//师傅头像显示页面
Route::rule('ajax_mase_headportrait','index/personal/ajax_mase_headportrait');//师傅头像修改
Route::rule('client_basics','index/personal/client_basics');//客户基本资料
Route::rule('ajax_client_modify','index/personal/ajax_client_modify');//师傅基本资料修改

Route::rule(['tianjiagongcheng','tianjiagongcheng/:order','tianjiagongcheng/:on'],'index/personal/tianjiagongcheng');//编辑工程简历
Route::rule(['addtianjiagongcheng','addtianjiagongcheng/:order','addtianjiagongcheng/:on'],'index/personal/addtianjiagongcheng');//添加工程简历
Route::rule("removetianjiagongcheng",'index/personal/removetianjiagongcheng');//删除工程简历

Route::rule('consults','index/Cqueryprice/consults');//客户咨询费用
Route::rule('reselect','index/Cqueryprice/reselect');//重新选择主任师傅
Route::rule('status','index/Cqueryprice/status');//修改状态
Route::rule('change_number','index/Cqueryprice/change_number');//点击添加普通师傅，修改步数
Route::rule('default_master','index/Cqueryprice/default_master');//默认查找师傅
Route::rule('cate','index/Cqueryprice/cate');//二级分类
Route::rule('verification','index/Cqueryprice/verification');//验证师傅ID。
Route::rule('choose_id','index/Cqueryprice/choose_id');//客户选择师傅的工号
Route::rule('Cdirectorder','index/Cdirectorder/index');//甩单配师傅。
Route::rule('index/defa','index/index/defa');//首页服务联动默认没点击
Route::rule('index/linkage','index/index/linkage');//首页服务联动默认点击
Route::rule(['orders','orders/:sid','orders/:cid'],'index/orders/index');//订单处理页面
Route::rule('orders/twostclass','index/orders/twostclass');//订单处二分类
Route::rule('orders/threestclass','index/orders/threestclass');//订单处三分类
Route::rule('orders/placeorder','index/orders/placeorder');//下单
Route::rule(['jilt_single','jilt_single/:ornumber'],'index/orders/jilt_single');//甩单师傅
Route::rule('rejection','index/orders/rejection');//用户下单基本信息
Route::rule(['guestbook','guestbook/:ornumber'],'index/orders/guestbook');//留言配单
Route::rule('message','index/orders/message');//师傅客户留言信息
Route::rule('change_status','index/orders/change_status');//留言配单
Route::rule(['calibrate','calibrate/:ornumber'],'index/orders/calibrate');//客户选师傅页面
Route::rule(['grab','grab/:ornumber'],'index/orders/grab');//师傅抢单
Route::rule('mess','index/orders/mess');//客户发送订单，师傅收到消息
Route::rule('tender','index/orders/tender');//师傅投标
Route::rule('selects','index/orders/selects');//客户选定师傅
Route::rule(['settlement','settlement/:ornumber','settlement/:url'],'index/orders/settlement');//用户结算
//月结客户
Route::rule('month_order','index/monthly/month');//月结客户
Route::rule('month_pay','index/monthly/month_pay');//月结客户
Route::rule("apply_monthly_statement","index/monthly/apply_monthly_statement");//申请月结客户
Route::rule("add_monthly_information","index/monthly/add_monthly_information");//提交月结客户信息
Route::rule("password","index/monthly/password");//提交月结客户信息
Route::rule("add_password","index/monthly/add_password");//提交月结客户信息

Route::rule('total','index/orders/total');//客户需要支付的总费用
Route::rule(['one','one/:ornumber'],'index/orders/one');//一个故障详情页面
Route::rule('orders/client','index/Ordermanage/order_manage_client');//客户订单管理
Route::rule('orders/master','index/Ordermanage/order_manage_master');//师傅订单管理
Route::rule('orders/del_ser','index/Ordermanage/del_ser');//客户删除
Route::rule('orders/del_sers','index/Ordermanage/del_sers');//客户全选删除
Route::rule('orders/del_wor','index/Ordermanage/del_wor');//师傅删除
Route::rule('orders/del_wors','index/Ordermanage/del_wors');//师傅全选删除
Route::rule(['order/status','order/status/:id'],'index/Ordermanage/orderstatus');//客户订单状态
Route::rule(['order/workstatus','order/workstatus/:id'],'index/Ordermanage/order_work_status');//师傅订单状态
Route::rule(['order/additional','order/additional/:id'],'index/Ordermanage/order_additional');//客户追加报价
Route::rule('addition','index/Ordermanage/addition');//追加价格和理由加入数据表
Route::rule('ordermanage/scan/:number','index/Ordermanage/scan');//微信扫码支付
Route::rule('addition_adds','index/Ordermanage/adds');//微信扫码支付成功后加入数据表
Route::rule('ordermanage/jsapi','index/Ordermanage/payment');//微信jsapi支付
Route::rule('apiAdd','index/Ordermanage/apiAdd');//微信jsapi支付
Route::rule('orderAdd','index/Ordermanage/orderAdd');//微信jsapi支付
Route::rule(['touching','touching/:orderIds'],'index/touching/touching');//核单报告
Route::rule('touchingadd','index/touching/touchingadd');//添加核单报告
Route::rule('uploadImg','index/api/uploadImg');//核单报告图片上传
Route::rule('signature','index/api/signature');//签名图片上传

Route::rule('orders/client/daiset','index/Orderlogic/order_logic_a');//客户订单管理status=1
Route::rule('orders/client/daipay','index/Orderlogic/order_logic_b');//客户订单管理status=2
Route::rule('orders/client/daitob','index/Orderlogic/order_logic_c');//客户订单管理status=3
Route::rule('orders/client/daiche','index/Orderlogic/order_logic_d');//客户订单管理status=4
Route::rule('orders/client/daieva','index/Orderlogic/order_logic_e');//客户订单管理status=5
Route::rule('orders/client/daiclo','index/Orderlogic/order_logic_f');//客户订单管理status=6
Route::rule('orders/client/quan','index/Orderlogic/order_logic_g');//客户订单管理status=7
Route::rule('orders/client/suo','index/Orderlogic/order_logic_k');//客户订单管理status=8
Route::rule('orders/master/daiset','index/Orderwork/order_logic_a');//师傅订单管理status=1
Route::rule('orders/master/daipay','index/Orderwork/order_logic_b');//师傅订单管理status=2
Route::rule('orders/master/daitob','index/Orderwork/order_logic_c');//师傅订单管理status=3
Route::rule('orders/master/daiche','index/Orderwork/order_logic_d');//师傅订单管理status=4
Route::rule('orders/master/daieva','index/Orderwork/order_logic_e');//师傅订单管理status=5
Route::rule('orders/master/daiclo','index/Orderwork/order_logic_f');//师傅订单管理status=6
Route::rule('orders/master/quan','index/Orderwork/order_logic_g');//师傅订单管理status=7
Route::rule(['orderwork/sign','orderwork/sign/:id'],'index/Ordermanage/order_work_sign');//师傅签到
Route::rule('orderwork/signajax','index/Ordermanage/order_work_signajax');//师傅签到AJAX
Route::rule(['orderwork/outsign','orderwork/outsign/:id'],'index/Ordermanage/order_work_outsign');//师傅签退
Route::rule('orderwork/outsignajax','index/Ordermanage/order_work_outsignajax');//师傅签到AJAX
Route::rule('api/message','index/api/message');//消息API
Route::rule('messages/all','index/allmessages/index');//消息index
Route::rule('messages/order_messages','index/allmessages/order_messages');//订单消息
Route::rule('messages/system_messages','index/allmessages/system_messages');//系统消息
Route::rule('read_messages','index/allmessages/read_messages');//处理消息
Route::rule('del_messages','index/allmessages/del_messages');//删除消息
Route::rule('index','index/index');//首页
//安装后台
Route::rule('installation/','index/installation/index');
Route::rule('location/locationList','index/location/locationList');
Route::rule('publish','index/installation/publish');//安装下单页面详情
Route::rule('install_change_status','index/installation/install_change_status');//改变安装主表状态
Route::rule('install_grab/:ornumber','index/installation/install_grab'); //安装师傅抢单页面
Route::rule('install_settlement/:ornumber','index/installation/install_settlement'); //安装师傅抢单页面
Route::rule('install_selected','index/installation/install_selected'); //客户选择师傅
Route::rule('installation/twostclass','index/installation/twostclass');//    商品二类
Route::rule('installation/threestclass','index/installation/threestclass');//    商品二类
Route::rule('installation/threedefault','index/installation/threedefault');//    商品二类
Route::rule('installation/placeorder','index/installation/placeorder');//   安装 故障详情下单 判断月结客户
Route::rule('install_jilt_single/:id','index/installation/install_jilt_single'); //        安装 甩单配师傅 初始化变量
Route::rule('installation/install_rejection','index/installation/install_rejection');
Route::rule('install_order/:order_num','index/installation/install_order');//  安装 甩单配师傅 更行数据
Route::rule('install_calibrate/:order_num','index/installation/install_calibrate');
Route::rule('install_order_calibrate/:ornumber','index/installation/install_order_calibrate');//订单定标
Route::rule('install_message_pairing/:order_num','index/installation/install_message_pairing');//留言配单
//安装咨询下单
Route::rule(['choose_wid','choose_wid/:ornumber','choose_wid/:wid'],'index/consulation/choose');//安装客户咨询
Route::rule(['install_director_master','install_director_master/:ornumber','install_director_master/:wid'],'index/consulation/install_director_master'); //客户咨询主任师傅页面
Route::rule(['install_index','install_index/:ornumber','install_index/:wid'],'index/consulation/install_index');//主任师傅应答客户页面
Route::rule('install_reselect','index/consulation/install_reselect');//重新选择主任师傅
Route::rule('install_send','index/consulation/install_send');//师傅客户聊天 点击发送
Route::rule('install_consult_confirm','index/consulation/install_consult_confirm');//客户提交订单，去结算
Route::rule('install_number','index/consulation/install_number');//需要普通师傅个数
//安装核单报告
Route::rule('install_touching/:orderIds','index/single/install_touching');//安装核单报告
Route::rule('install_uplatetouching/:order_number','index/single/install_uplatetouching');//更新安装核单报告
Route::rule('install_client_touching/:order_number','index/single/install_client_touching');//客户看到师傅填写的核单
Route::rule('kehuqurenbiao/:order_number','index/installation/kehuqurenbiao');//客户确认表
Route::rule('shifuqurenbiao/:order_number','index/installation/shifuqurenbiao');//师傅确认表
Route::rule('install_img_send','index/installation/install_img_send');//师傅确认表
Route::rule('install_signature','index/api/install_signature');//安装签字

//围板搭建/拆除
Route::rule('coaming_construct_dismantles','index/coaming/coaming_construct_dismantle');//围板搭建下单页面
Route::rule('coaming_submit','index/coaming/coaming_submit');//围板搭建下单提交页面coaming_jilt_single
Route::rule('coaming_jilt_single/:order_number','index/coaming/coaming_jilt_single');//客户预算价页面
Route::rule('addBuget','index/coaming/addBuget');//提交客户预算价
Route::rule('coaming_message_pairing/:order_number','index/coaming/coaming_message_pairing');//留言配单页面
Route::rule('coaming_grab/:order_number','index/coaming/coaming_grab');//师傅投标页面
Route::rule('coaming_change_status','index/coaming/coaming_change_status');//改状态
Route::rule('coaming_order_calibrate/:order_number','index/coaming/coaming_order_calibrate');//客户选择师傅页面
Route::rule('coaming_selected','index/coaming/coaming_selected');//客户选择师傅信息
Route::rule('coaming_settlement/:order_number','index/coaming/coaming_settlement');//客户付款页面
Route::rule('coaming/ajax/message_qiang','index/coaming/coaming_ajax_me_q');//安装模块判断当前师傅抢单
Route::rule('coaming_detail/:order_number','index/coaming/coaming_detail');//围板搭建单个故障详情页面
//围板搭建核单报告
Route::rule('coaming_touching/:orderIds','index/nuclear/coaming_touching');//围板搭建核单报告
Route::rule('coaming_uplatetouching/:order_number','index/nuclear/coaming_uplatetouching');//更新围板搭建核单报告
Route::rule('coaming_client_touching/:order_number','index/nuclear/coaming_client_touching');//客户看到师傅填写的核单
//围板搭建咨询下单
Route::rule(['choose_coaming','choose_coaming/:ornumber','choose_coaming/:wid'],'index/coamconsult/choose_coaming');//围板搭建客户咨询
Route::rule(['coaming_director_master','coaming_director_master/:ornumber','coaming_director_master/:wid'],'index/coamconsult/coaming_director_master'); //客户咨询主任师傅页面
Route::rule(['coaming_index','coaming_index/:ornumber','coaming_index/:wid'],'index/coamconsult/coaming_index');//主任师傅应答客户页面
Route::rule('coaming_reselect','index/coamconsult/coaming_reselect');//重新选择主任师傅
Route::rule('coaming_consult_confirm','index/coamconsult/coaming_consult_confirm');//客户提交订单，去结算
Route::rule('coaming_send','index/coamconsult/coaming_send');//师傅客户聊天 点击发送
Route::rule('coaming_number','index/coamconsult/coaming_number');//需要普通师傅个数
Route::rule('coaming_master_presentation/:order_number','index/coaming/coaming_master_presentation');//师傅施工报告
Route::rule('coaming_ajaxpresentation','index/coaming/coaming_ajaxpresentation');//师傅施工报告ajax
Route::rule('coaming_customer_presentation/:order_number','index/coaming/coaming_customer_presentation');//客户施工报告
Route::rule('ajax_coaming_feedback','index/coaming/ajax_coaming_feedback');//客户反馈围板搭建ajax
Route::rule('coaming_signature','index/api/coaming_signature');//围板搭建签名图片上传
Route::rule('coaming_confirmma','index/coaming/coaming_confirmma');//围板搭建确认码




Route::rule(['client_affirm_accomplishs','client_affirm_accomplishs/:order_number'],'index/client/client_affirm_accomplish');//客户维修确认表
Route::rule(['update_client_affirm_accomplish','update_client_affirm_accomplish/:order_number'],'index/client/update_client_affirm_accomplish');//客户维修提交
Route::rule(['uplatetouching','uplatetouching/:order_number'],'index/touching/uplatetouching');//师傅核单报告信息修改
Route::rule(['client_touching','client_touching/:order_number'],'index/touching/client_touching');//客户查看核单报告
Route::rule('client_submit','index/touching/client_submit');//客户提交签名
//客户下单
//评价块
Route::rule(['master_evaluate','master_evaluate/:order_number'],'index/comments/master_evaluate');// 主任师傅评价客户和普通师傅
Route::rule(['client_evaluate','client_evaluate/:order_number'],'index/comments/client_evaluate');// 客户评价师傅
Route::rule('client_evaluate/add','index/comments/client_evaluate_add');// 
Route::rule('client_home','index/test/client_home');//客户首页
Route::rule('client_home_s','index/test/client_home_s');//师傅首页
Route::rule('client_home_k','index/test/client_home_k');//客户首页
Route::rule('clien_home_ss','index/test/clien_home_ss');//师傅首页

//找帮手师傅
Route::rule(['help_master','help_master/:order_number','help_master:/wid'],'index/Helpmaster/helpMaster');//找帮手师傅
Route::rule('getMasterInfo','index/Helpmaster/getMasterInfo');//获取师傅信息
Route::rule('addMaster','index/Helpmaster/addMaster');//增加普通师傅
Route::rule('delectMaster','index/Helpmaster/delectMaster');//增加普通师傅
Route::rule(['install_help_master','install_help_master/:order_number','install_help_master:/wid'],'index/Helpmaster/install_help_master');//安装找帮手师傅
Route::rule(['coaming_help_master','coaming_help_master/:order_number','coaming_help_master:/wid'],'index/Helpmaster/coaming_help_master');//围板搭建找帮手师傅
Route::rule(['gjm_help_master','gjm_help_master/:order_number','gjm_help_master:/wid'],'index/Helpmaster/gjm_help_master');//更换灯片找帮手师傅
//师傅钱包
Route::rule('purse_center','index/purse/index');//钱包首页
Route::rule('personal_center_pay','index/purse/personal_center_pay');//钱包充值
Route::rule('money','index/purse/money');//充值钱数
Route::rule('purse/scan','index/purse/scan');//微信扫码支付
Route::rule('purse/jsapi','index/purse/jsapi');//微信jsapi
Route::rule('add_money','index/purse/add_money');//扫码加入数据表
Route::rule('api_money','index/purse/api_money');//jsapi加入数据表
Route::rule('faith_deposit','index/purse/faith_deposit');//保障金页面
Route::rule('guarantee_pay','index/purse/guarantee_pay');//保障金页面
Route::rule('purse/b_scan','index/purse/b_scan');//保障金微信扫码支付
Route::rule('purse/b_jsapi','index/purse/b_jsapi');//保障金微信jsapi
Route::rule('add_guarantee','index/purse/add_guarantee');//充值保障金
Route::rule('adds_guarantee','index/purse/adds_guarantee');//充值保障金加入数据表
Route::rule('api_guarantee','index/purse/api_guarantee');//充值保障金加入数据表
//客户钱包
Route::rule('wallet_center','index/wallet/index');//钱包首页
Route::rule('wallet_center_pay','index/wallet/wallet_center_pay');//钱包充值
Route::rule('price','index/wallet/price');//充值钱数
Route::rule('wallet/scan','index/wallet/scan');//微信扫码支付
Route::rule('wallet/jsapi','index/wallet/jsapi');//微信jsapi
Route::rule('add_price','index/wallet/add_price');//扫码加入数据表
Route::rule('api_price','index/wallet/api_price');//jsapi加入数据表
Route::rule('faith_deposits','index/wallet/faith_deposits');//保障金页面
Route::rule('guarantee_pays','index/wallet/guarantee_pays');//保障金充值页面
Route::rule('add_c_guarantee','index/wallet/add_c_guarantee');//充值保障金
Route::rule('wallet/c_scan','index/wallet/c_scan');//保障金微信扫码支付
Route::rule('wallet/c_jsapi','index/wallet/c_jsapi');//保障金微信jsapi
Route::rule('adds_c_guarantee','index/wallet/adds_c_guarantee');//充值保障金加入数据表
Route::rule('api_c_guarantee','index/wallet/api_c_guarantee');//充值保障金加入数据表



//学习培训
Route::rule('studytrain/index','index/Studytrain/index');//学习中心
Route::rule('studytrain/exam_select','index/Studytrain/exam_select');//考试选择
Route::rule('studytrain/proceed_exam/:examGroupId','index/Studytrain/proceed_exam');//考试选择
Route::rule('studytrain/success/:s','index/Studytrain/Examsuccess');//考试成功 	
//api 判断是否前去考试，是否能接单
Route::rule('api/goExamOrDie','index/api/goExamOrDie');//查询等级
Route::rule('api/allGoExamOrDie','index/api/allGoExamOrDie');//查询等级
Route::rule('Cqueryprice/Ghint','index/Cqueryprice/Ghint');//不通过提示
Route::rule('ORders/Ghint','index/orders/Ghint');//不通过提示
Route::rule(['studytrain/proceed_exam_select','studytrain/proceed_exam_select/:examGroupId','studytrain/proceed_exam_select/:o'],'index/studytrain/proceed_exam_select');//抽查
//维修确认报告--> 问题反馈
Route::rule('client/issue_feedback/:order_number','index/Client/issue_feedback');
Route::rule('client/issue_feedback/issueAdd','index/Client/issueAdd');
//师傅入驻 协议
Route::rule('shifuxieyi','index/master/shifuxieyi');
Route::rule('baozhangjing','index/Wallet/baozhangjing');
//文章展示
Route::rule('show/:cate_id/:id','index/newshow/show');


//勘测-ds-17-10-13
Route::rule('survey','index/survey/index');//勘测
Route::rule('ajax_survery','index/survey/ajax_survery');//勘测ajax提交
Route::rule('ds_release_task','index/survey/ds_release_task');//勘测提交之后页面
Route::rule('ds_survey_payment/:order_number','index/survey/survey_payment');//勘测付款页面
Route::rule('ajax_survey_invitation','admin/survey/ajax_survey_invitation');//勘测后台邀请师傅ajax
Route::rule('sry_choose_master/:order_number','admin/survey/sry_choose_master');//勘测后台增加师傅
Route::rule('ds_scrvey_masterorder/:order_number','index/survey/ds_scrvey_masterorder');//勘测师傅接单页面
Route::rule('ajax_survey_masterok','index/survey/ajax_survey_masterok');//勘测师傅确认接单
Route::rule('survey_manuscript/:order_number','index/survey/survey_manuscript');//师傅勘测手稿
Route::rule('ajax_survey_manuscript','index/survey/ajax_survey_manuscript');//师傅勘测手稿ajax
Route::rule('customer_survey_manuscript/:order_number','index/survey/customer_survey_manuscript');//客户勘测手稿
Route::rule('ajax_survey_feedback','index/survey/ajax_survey_feedback');//客户反馈勘测手稿ajax
Route::rule('ajax_survey_confirm','index/survey/ajax_survey_confirm');//客户确认勘测手稿ajax
Route::rule('survey_master_presentation/:order_number','index/survey/survey_master_presentation');//师傅施工报告
Route::rule('survey_ajaxpresentation','index/survey/survey_ajaxpresentation');//师傅施工报告ajax
Route::rule('survey_customer_presentation/:order_number','index/survey/survey_customer_presentation');//客户施工报告
Route::rule('survey_signature','index/api/survey_signature');//勘测签名图片上传
Route::rule('survey_confirmma','index/survey/survey_confirmma');//勘测确认码




//更换灯片
Route::rule('replacing_the_lamp','index/replace/replace');//
Route::rule('replace_add','index/replace/replace_add');//用户信息提交
Route::rule('gjmjilt_single/:order_number','index/replace/gjmjilt_single');//用户审核订单

Route::rule('gjmrejection','index/replace/gjmrejection');//用户下单基本信息

Route::rule(['gjmguestbook','gjmguestbook/:order_number'],'index/replace/gjmmessage_pairing');//留言配单
Route::rule(['oneer','oneer/:order_number'],'index/replace/one');//一个故障详情页面
Route::rule(['gjmgrab','gjmgrab/:ornumber'],'index/replace/gjmgrab');//师傅抢单
Route::rule(['guestbooks','guestbooks/:ornumber'],'index/replace/guestbooks');//留言配单
Route::rule('tenders','index/replace/tenders');//师傅投标
Route::rule('gjmselects','index/replace/gjmselects');//客户选定师傅
Route::rule(['calibrates','calibrates/:ornumber'],'index/replace/calibrates');//客户选师傅页面

Route::rule(['gjmtouching','gjmtouching/:orderIds'],'index/replacer/touching');//核单报告
Route::rule(['gjmuplatetouching','gjmuplatetouching/:order_number'],'index/replacer/uplatetouching');//师傅核单报告信息修改
Route::rule(['gjmclient_touching','gjmclient_touching/:order_number'],'index/replacer/client_touching');//客户查看核单报告
//oute::rule('touchingadd','index/touching/touchingadd');//添加核单报告

//更换灯片咨询下单
Route::rule(['gjmchoose_wid','gjmchoose_wid/:ornumber','gjmchoose_wid/:wid'],'index/replacer/choose');//更换灯片客户咨询
Route::rule(['gjminstall_director_master','gjminstall_director_master/:ornumber','gjminstall_director_master/:wid'],'index/replacer/install_director_master'); //客户咨询主任师傅页面
Route::rule(['gjminstall_index','gjminstall_index/:ornumber','gjminstall_index/:wid'],'index/replacer/install_index');//主任师傅应答客户页面
Route::rule('gjminstall_reselect','index/replacer/install_reselect');//重新选择主任师傅
Route::rule('gjminstall_send','index/replacer/install_send');//师傅客户聊天 点击发送
Route::rule('gjminstall_consult_confirm','index/replacer/install_consult_confirm');//客户提交订单，去结算
Route::rule('gjminstall_number','index/replacer/install_number');//需要普通师傅个数
Route::rule('replace_master_presentation/:order_number','index/replace/replace_master_presentation');//师傅施工报告
Route::rule('replace_ajaxpresentation','index/replace/replace_ajaxpresentation');//师傅施工报告ajaxForm
Route::rule('replace_customer_presentation/:order_number','index/replace/replace_customer_presentation');//客户施工报告
Route::rule('replace_signature','index/api/replace_signature');//更换幻灯片签名图片上传
Route::rule('ajax_replace_feedback','index/replace/ajax_replace_feedback');//客户反馈更换幻灯片ajax
Route::rule('replace_confirmma','index/replace/replace_confirmma');//更换幻灯片确认码






    

Route::rule('uploadImg','index/api/uploadImg');//核单报告图片上传
Route::rule('signature','index/api/signature');//签名图片上传+


Route::rule(['settlements','settlements/:ornumber','settlements/:url'],'index/replace/settlements');//用户结算
Route::rule('replace/client','index/replace/order_manage_client');//客户订单管理
Route::rule('gjmtotal','index/replace/gjmtotal');//客户需要支付的总费用



Route::rule('client_location','index/personal/client_location');//客户地址管理
Route::rule('client_location/default','index/personal/client_location_default');//客户地址管理设为默认
Route::rule('editlocation/client/:id','index/personal/editlocation');//修改客户地址管理
Route::rule('updatelocation','index/personal/updatelocation');//修改客户地址管理2
Route::rule('addlocation','index/personal/addlocation');//修改客户地址管理2
Route::rule('api_uid_address','index/api/goUidaddress');//判断当前登录者默认地址
Route::rule('del_address','index/personal/del_address');//地址删除






























//===================================================================================================
//========================================测试静态页面放下面=========================================
//===================================================================================================
//===================================================================================================
//========================================测试静态页面放下面+=========================================
//===================================================================================================
//===================================================================================================
//========================================测试静态页面放下面=========================================
//===================================================================================================
//===================================================================================================
//========================================测试静态页面放下面=========================================
//===================================================================================================


Route::rule('maintenance_items_select','index/test/maintenance_items_select');//维修师傅选择
Route::rule('fault_details','index/test/fault_details');//故障详情
Route::rule('choose_director_master','index/test/choose_director_master');//挑选主任师傅
Route::rule('client_consult_director_master','index/test/client_consult_director_master');//客户咨询主任师傅
Route::rule('select_common_master','index/test/select_common_master');//选普通师傅
Route::rule('payment_external_maintain','index/test/payment_external_maintain');//付款第三方页面_维修
Route::rule('payment_external_consult','index/test/payment_external_consult');//付款第三方页面_咨询
Route::rule('master_filter','index/test/master_filter');//师傅筛选
Route::rule('settlement_page','index/test/settlement_page');//结算页面
Route::rule('consult_pay','index/test/consult_pay');//咨询付费页面
Route::rule('monthly_payment','index/test/monthly_payment');//月结付款界面
Route::rule('client_affirm_accomplish','index/test/client_affirm_accomplish');//客户确认维修完成
//Route::rule('master_maintenance_report','index/test/master_maintenance_report');//师傅确认维修完成
Route::rule('monthly_client_order','index/test/monthly_client_order');//月结客户下单页面
Route::rule('jilt_singles','index/test/jilt_singles');//甩单师傅
Route::rule('message_pairing','index/test/message_pairing');//留言配单
Route::rule('order_calibrate','index/test/order_calibrate');//订单定标
Route::rule('grab_order','index/test/grab_order');//抢单页面
Route::rule('one_malfunction_particulars','index/test/one_malfunction_particulars');//单个故障详情//
Route::rule('order_status','index/test/order_status');//客户订单状态
Route::rule("Master_order_status",'index/test/Master_order_status');//师傅订单状态
Route::rule("contact_customer",'index/test/contact_customer');//联系客户
Route::rule('the_customer_additional','index/test/the_customer_additional');//客户追加项目报价
Route::rule('customer_master_has_additional_items','index/test/customer_master_has_additional_items');//客户-师傅有追加项目
//  首页
Route::rule('Bjnews','index/Bjnews/index');//新闻咨询
Route::rule('Bjservice','index/Bjservice/index');//师傅入驻
Route::rule('Bjclientorder','index/Bjclientorder/index');//下单流程
Route::rule('Bjmasterreg','index/Bjmasterreg/index');//平台保障
Route::rule('Bjhelp','index/Bjhelp/index');//帮助中心
Route::rule('Bjintroduce','index/Bjintroduce/index');//关于我们

//消息
Route::rule('master_message_page','index/test/master_message_page'); //师傅消息页面
Route::rule('system_messages','index/test/system_messages');//系统消息
Route::rule('new_Order_Single','index/test/new_Order_Single');//订单消息

//个人中心
Route::rule('choose_the_payment','index/test/choose_the_payment');//选择付款
Route::rule('change_payment_method','index/test/change_payment_method');//更换付款方式
Route::rule('shouji','index/test/shouji');
// 任务发布成功
Route::rule('release_task','index/test/release_task');//

// 订单付款成功
Route::rule('order_payment','index/test/order_payment');//

// 现场测绘表
Route::rule('mapping_surface','index/test/mapping_surface');//

// 确认你的订单
Route::rule('affirm_order_form','index/test/affirm_order_form');//

// 问题反馈
Route::rule('issue_feedback','index/test/issue_feedback');//

// 勘测任务提交
Route::rule('survey_task','index/test/survey_task');//
Route::rule('write_report','index/test/write_report');//
Route::rule('test','index/test/index');//测试
Route::rule('master_home','index/test/master_home');//师傅首页
Route::rule('master_response_client','index/test/master_response_client');//主任师傅应答客户咨询
Route::rule('master_price_negotiationt','index/test/master_price_negotiationt');//价格协商
Route::rule('nuclear_single_report','index/test/nuclear_single_report');//核单报告
Route::rule('header','index/test/header');//核单报告
//zkl 导航页面
Route::rule('nav','index/fenlei/nav');//导航
//订单
Route::rule('order_details','index/test/order_details');// //订单详情
Route::rule('order_manage_client','index/test/order_manage_client');// 订单管理-客户
Route::rule('order_manage_master','index/test/order_manage_master');//  订单管理-师傅
Route::rule('order_refund','index/test/order_refund');// 订单退款
Route::rule('order_construction','index/test/order_construction');// 标匠师傅_施工情况
Route::rule('order_inquiry','index/test/order_inquiry');//订单查询
Route::rule('client_order_construction_info','index/test/client_order_construction_info');//客户情况预览
Route::rule('the_customer_sign_in','index/test/the_customer_sign_in');//签到
Route::rule('the_customer_sign_ins','index/test/the_customer_sign_ins');//签退
Route::rule('the_customer_additional','index/test/the_customer_additional');//客户追加项目报价
//我的钱包页面
Route::rule('my_purse','index/test/my_purse');//我的钱包
Route::rule('purse_recharge','index/test/purse_recharge');//钱包充值
//Route::rule('alipay','index/test/alipay');//微信转入
//Route::rule('pay_into','index/test/pay_into');//支付宝转入
Route::rule('balance','index/test/balance');//剩余余额查询
Route::rule('withdraw_deposit','index/test/withdraw_deposit');//提现
Route::rule('coupon_filled_red_envelope','index/test/coupon_filled_red_envelope'); //优惠券_红包
Route::rule('good_faith_deposit','index/test/good_faith_deposit');//诚信保证金
Route::rule('pay_the_deposit','index/test/pay_the_deposit');//缴纳保证金
Route::rule('bind_bank_card','index/test/bind_bank_card');//绑定银行卡

Route::rule('template','index/test/template');//平台等级考试
Route::rule('order_calibrate','index/test/order_calibrate');//订单定标
Route::rule('master_review','index/test/master_review');//认证详情
//学习中心
Route::rule('exam_select','index/test/exam_select');  //考试类型选择
Route::rule('proceed_exam','index/test/proceed_exam'); 	//师傅木匠定级考试
Route::rule('acquire_knowledge','index/test/acquire_knowledge');//学习页面
Route::rule('Teacher_learning','index/test/Teacher_learning');  //知识点
Route::rule('Video_learning_page','index/test/Video_learning_page');//视频学习页面
Route::rule('learning_center','index/test/learning_center');//标匠学习中心
Route::rule('examination_succeed','index/test/examination_succeed');//考试成功
Route::rule('examination_be_defeated','index/test/examination_be_defeated');//考试失败

Route::rule('location','index/test/location');//地址管理
Route::rule('client_home','index/test/client_home');////客户管理
//安装
Route::rule('installation_project_selection','index/install/installation_project_selection');//安装项目选择
//Route::rule('install_order','index/install/install_order');//安装详情
Route::rule('install_choose_director_master','index/install/install_choose_director_master');//安装_挑选主任师傅
Route::rule('install_client_consult_director_master','index/install/install_client_consult_director_master');//安装_客户咨询主任师傅
Route::rule('install_select_common_master','index/install/install_select_common_master');//选普通师傅
Route::rule('install_payment_external_maintain','index/install/install_payment_external_maintain');//付款第三方页面_安装
Route::rule('install_payment_external_consult','index/install/install_payment_external_consult');//付款第三方页面_咨询
// Route::rule('install_master_filter','index/install/install_master_filter');//师傅筛选
Route::rule('install_settlement_page','index/install/install_settlement_page');//结算页面
Route::rule('install_consult_pay','index/install/install_consult_pay');//咨询付费页面
Route::rule('install_monthly_payment','index/install/install_monthly_payment');//月结付款界面
Route::rule('client_installation_confirmation','index/install/client_installation_confirmation');//客户安装确认页面
Route::rule('master_installation_report','index/install/master_installation_report');//师傅维修报告及其确认页面
Route::rule('master_maintenance_report_s','index/test/master_maintenance_report_s');//普通师傅确认维修完成
Route::rule('ordinary_master_orders','index/test/ordinary_master_orders');//普通师傅接单

Route::rule('install_monthly_client_order','index/install/install_monthly_client_order');//月结客户下单页面
// Route::rule('install_jilt_single/:id','index/install/install_jilt_single');//甩单师傅
//Route::rule('install_message_pairing','index/install/install_message_pairing');//留言配单
//Route::rule('install_order_calibrate','index/install/install_order_calibrate');//订单定标
Route::rule('install_order_details','index/install/install_order_details');//安装下单详情页面
Route::rule('install_grab_order','index/install/install_grab_order');//抢单页面
Route::rule('mas_intstall_status','index/install/mas_intstall_status');//师傅-订单状态
Route::rule('intstall_status','index/install/intstall_status');//客户-订单状态
Route::rule('intall_contact_customer','index/install/intall_contact_customer');//安装_联系客户
Route::rule('intall_customer_master_has_additional_items','index/install/intall_customer_master_has_additional_items');//客户-师傅有追加项目
Route::rule('intall_the_customer_additional','index/install/intall_the_customer_additional');//客户追加项目报价
Route::rule('utilization_review','index/install/utilization_review');//审核情况
Route::rule('intall_succPage','index/install/intall_succPage');//师傅抢单成功页面
Route::rule('client_home','index/test/client_home');//客户首页
Route::rule('client_home_s','index/test/client_home_s');//师傅首页

//更改
Route::rule('install_master_filter','index/install/install_master_filter');//师傅筛选
Route::rule('he_master_of_information','index/install/he_master_of_information');//师傅信息
Route::rule('intsall_personnelcontacts','index/install/intsall_personnelcontacts');//师傅信息
Route::rule('help_master','index/test/help_master');//找帮手师傅

// 勘测施工报告确认表
Route::rule('report_confirmation_form','index/test/report_confirmation_form');//
Route::rule('write_report','index/test/write_report');//

// 师傅信息登记
Route::rule('information_registration','index/test/information_registration');//
Route::rule('write_report','index/test/write_report');//

//微信支付

Route::rule('write_report','index/test/writw_report');//
                                                          
//更换灯片                                                        
// Route::rule('replacing_the_lamp','index/test/replacing_the_lamp');//
Route::rule('write_report','index/test/writw_report');//

//更换灯片订单详情                                                      
Route::rule('line_item','index/test/line_item');//
Route::rule('write_report','index/test/writw_report');//

//围板搭建/拆除
Route::rule('coaming_construct_dismantle','index/test/coaming_construct_dismantle');//
Route::rule('write_report','index/test/writw_report');//

//围板搭建/拆除详情
Route::rule('coaming_details','index/test/coaming_details');//
Route::rule('write_report','index/test/writw_report');//


//业主协议//编辑头像
// Route::rule('yezhuxieyi','index/test/yezhuxieyi');//
Route::rule('bianjitouxiang','index/test/bianjitouxiang');//

//师傅个人中心//基本中心
Route::rule('personal_center','index/test/personal_center');//
Route::rule('basics','index/test/basics');//
//勘测
Route::rule('upload_prospect_manuscripts','index/test/upload_prospect_manuscripts');//
Route::rule("reconnaissance","index/test/reconnaissance");


//勘测所需表
Route::rule('survey_form','index/test/survey_form');//
Route::rule('write_report','index/test/writw_report');//

Route::rule('administration','index/orders/administration');//地址管理

Route::rule('pingjiaguanli','index/personal/pingjiaguanli');//评价管理
