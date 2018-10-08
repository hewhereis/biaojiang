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
//微信支付
Route::rule('is_weixin','index/api/is_weixin'); //phone--判断是微信还是PC登录
Route::rule('add_money','index/wxpay/add_money'); //phone--微信扫码支付之前数据先加入数据表
Route::rule('payment/:order_number','index/wxpay/payment'); //phone--微信扫码支付页面
Route::rule('add_price/','index/wxpay/add_price'); //phone--微信扫码支付成功之后加入数据表
Route::rule('PhoneWxpay/project_cost','index/wxpay/project_cost'); //phone--微信JSAPi支付页面
Route::rule('add_project_cost','index/wxpay/add_project_cost'); //phone--微信JSAPi支付成功之后加入数据表
Route::rule('pay_success','index/wxpay/pay_success'); //phone--项目付款成功跳转
//客户钱包
Route::rule('customer_add_qian','index/wxpay/customer_add_qian'); //客户钱包支付之前加入数据表
Route::rule(['customer_payment','customer_payment/:uid','customer_payment/:times'],'index/wxpay/customer_payment'); //客户钱包扫码支付页面
Route::rule('customer_payment_ajaxs','index/wxpay/customer_payment_ajaxs'); //客户钱包支付之前加入数据表
Route::rule('PhoneWxpay/customer_payment_jsapi','index/wxpay/customer_payment_jsapi'); //客户jsapi页面
Route::rule('customer_payment_ajax','index/wxpay/customer_payment_ajax'); //客户钱包支付成功之后加入表
//师傅保证金充值
Route::rule('add_guarantee','index/wxpay/add_guarantee'); //师傅保证金充值支付之前加入数据表
Route::rule(['master_guarantee','master_guarantee/:uid','master_guarantee/:times'],'index/wxpay/master_guarantee'); //师傅保证金充值充值页面
Route::rule('add_guarantee_ajax','index/wxpay/add_guarantee_ajax'); //师傅保证金充值支付之后加入数据表
Route::rule('PhoneWxpay/master_guarantee_jsapi','index/wxpay/master_guarantee_jsapi'); //师傅保证金jsapi页面
Route::rule('add_guarantee_api_ajax','index/wxpay/add_guarantee_api_ajax'); //师傅保证金充值支付之后加入数据表
//客户咨询付费
Route::rule('add_consult','index/wxpay/add_consult'); //客户咨询支付之前加入数据表
Route::rule(['add_consult_index','add_consult_index/:order_number','add_consult_index/:times'],'index/wxpay/add_consult_index');//客户咨询支付页面
Route::rule('add_consult_ajax','index/wxpay/add_consult_ajax'); //客户咨询支付成功之后加入数据表
Route::rule('PhoneWxpay/add_consult_jsapi','index/wxpay/add_consult_jsapi'); //客户付费咨询jsapi页面
Route::rule('add_consult_jsapi_ajax','index/wxpay/add_consult_jsapi_ajax'); //客户付费咨询加入数据表
//客户追加项目费用
Route::rule('additional_projects','index/wxpay/additional_projects'); //客户追加项目之前加入数据表
Route::rule('additional_projects_index/:order_number','index/wxpay/additional_projects_index'); //客户追加项目页面
Route::rule('additional_projects_ajax','index/wxpay/additional_projects_ajax'); //客户追加项目支付成功之后加入数据表
Route::rule(['additional_projects_jsapi','additional_projects_jsapi/:total','additional_projects_jsapi/:number'],'index/wxpay/additional_projects_ajax'); 
Route::rule('additional_projects_jsapi_ajax','index/wxpay/additional_projects_jsapi_ajax'); //客户追加项目支付成功之后加入数据表
/*
*Ds-17-11-8
*
*/
Route::rule('login','index/auth/login');               //Ds-phone-登录页面
Route::rule('logout','index/auth/logout');               //Ds-phone-退出
Route::rule('login_ajax','index/xwf/ds_login');        //Ds-phone-登录ajax
Route::rule('register','index/auth/register');         //Ds-phone-注册页面
Route::rule('register_ajax','index/xwf/ds_register');  //Ds-phone-注册页面
Route::rule('send_out','index/auth/vcode');            //Ds-phone-注册发送短信验证码
Route::rule('backpwdone','index/auth/backpwdone');     //Ds-phone-找回密码1
Route::rule('backpwdtwo','index/auth/backpwdtwo');     //Ds-phone-找回密码2
Route::rule('backpwdthree','index/auth/backpwdthree'); //Ds-phone-找回密码3
Route::rule('yanzheng','index/auth/yanzheng');         //Ds-phone-找回密码3
Route::rule('send_outs','index/auth/vvcode');          //Ds-phone-找回密码发送短信验证码
Route::rule('reset','index/auth/reset');               //Ds-phone-找回密码验证码判断
Route::rule('complete','index/auth/complete');         //Ds-phone-完成密码修改
Route::rule('masterhome','index/masterhome/master_home');               //Ds-phone-师傅首页
Route::rule('grab_single/:onumber','index/mastersingle/grab_single');  //Ds-phone-师傅抢单页面
Route::rule('real_name','index/masterhome/real_name');                //Ds-phone-验证师傅是否实名认证
Route::rule('ds_single','index/mastersingle/ds_single');             //Ds-phone-验证师傅是否抢单
Route::rule('grab_page/:onumber','index/mastersingle/grab_page');   //Ds-phone-师傅抢单页面s
Route::rule('grab_pageajax','index/mastersingle/grab_pageajax');  //Ds-phone-师傅抢单页面ajax
Route::rule('order_customer_home','index/Ordermanage/order_customer_home');  //Ds-phone-客户订单管理
Route::rule('order_customer_state/:id','index/Ordermanage/order_customer_state');  //Ds-phone-客户订单状态
Route::rule('order_master_home','index/Ordermanage/order_master_home');  //Ds-phone-师傅订单管理
Route::rule('order_master_state/:id','index/Ordermanage/order_master_state');  //Ds-phone-师傅订单状态



//客户
Route::rule('customer_home','index/Personalcenter/customer_home');  //Ds-phone-客户个人中心
Route::rule('cus_information','index/Personalcenter/cus_information');  //Ds-phone-个人信息
Route::rule('nickname','index/Personalcenter/nickname');  //Ds-phone-修改昵称
Route::rule('nickname_ajax','index/Personalcenter/nickname_ajax');  //Ds-phone-修改昵称ajax
Route::rule('modifyphone','index/Personalcenter/modifyphone');  //Ds-phone-修改手机号
Route::rule('modify_vcode','index/auth/vscode');            //Ds-phone-修改手机号发送短信
Route::rule('modifyphone_ajax','index/Personalcenter/modifyphone_ajax');  //Ds-phone-修改手机号ajax
Route::rule('head','index/Personalcenter/head');  //头像修改
Route::rule('head1','index/Personalcenter/head1');  //服务类型
Route::rule('head2','index/Personalcenter/head2');  //性别修改
Route::rule('head3','index/Personalcenter/head3');  //性别修改
Route::rule('pwd','index/Personalcenter/pwd');  //密码管理页面
Route::rule('login_pwd','index/Personalcenter/login_pwd');  //修改登录密码页面
Route::rule('login_pwd_ajax','index/Personalcenter/login_pwd_ajax');  //修改登录ajax
Route::rule('pay_pwd','index/Personalcenter/pay_pwd');  //支付密码页面
Route::rule('chapt','index/Personalcenter/chapt');  //提交验证码
//师傅
Route::rule('master_home','index/personalcmaster/index');  //师傅个人中心
//钱包
Route::rule('wallet/index','index/wallet/index');  //客户我的钱包
Route::rule('wallet/index_home','index/wallet/index_home');  //师傅我的钱包

Route::rule('wallet/index1','index/wallet/index1');  //收支明细
Route::rule('wallet/index2','index/wallet/index2');  //收支明细筛选
Route::rule('wallet/index3','index/wallet/index3');  // 索取发票
Route::rule('wallet/index4','index/wallet/index4');  //分享推荐
Route::rule('wallet/index5','index/wallet/index5');  //评价管理
Route::rule('wallet/index6','index/wallet/index6');  //投诉记录
Route::rule('wallet/index7','index/wallet/index7');  //完工照片
Route::rule('wallet/index8','index/wallet/index8');  //师傅诚信分
Route::rule('wallet/index9','index/wallet/index9');  //客户支付密码
Route::rule('wallet/index10','index/wallet/index10');  //师傅资料
Route::rule('wallet/index11','index/wallet/index11');  //扣分明细
Route::rule('wallet/index12','index/wallet/index12');  //钱包选择支付方式
Route::rule('wallet/index13','index/wallet/index13');  //师傅诚信保证金
Route::rule('wallet/index14','index/wallet/index14');  //师傅诚信保证金充值
Route::rule('wallet/index15','index/wallet/index15');  //钱包选择支付方式

/*
 *liu
 */
Route::rule('select_master/:order_number','index/repair/select_master');//phone--客户选择师傅页面
Route::rule('main_customer','index/customer/main_customer');//phone--客户主页
Route::rule('repair_order','index/repair/repair_order');//phone--维修下单页面
Route::rule('repair_information','index/repair/repair_information');//phone--维修下单信息显示页面
Route::rule('dsupload','index/Uploads/dsupload');//phone--维修下单信息显示页面
Route::rule('customer_information','index/repair/customer_information');//phone--维修下单客户信息显示页面
Route::rule('direct_order','index/repair/direct_order');//phone--直接下单
Route::rule('customer_rejection/:order_number','index/repair/customer_rejection');//phone--甩单配师傅
Route::rule('get_money','index/repair/getmoney');//phone--客户报价
Route::rule('message_list/:order_number','index/repair/message_list');//phone--客户留言配单页面
Route::rule('change_status','index/repair/change_status');//phone--客户点击选择师傅前改变状态
Route::rule('confirm_master','index/repair/confirm_master');//phone--客户选择师傅AJAX
Route::rule('settlement/:order_number','index/repair/settlement');//phone--客户付款
Route::rule('additional/:order_number','index/repair/additional');//phone--客户追加项目页面
Route::rule('que_additonal/:order_number','index/repair/que_additonal');//phone--师傅确认追加项目页面
Route::rule('que_additonal_ajax','index/repair/que_additonal_ajax');//phone--师傅确认追加项目ajax
//地址管理
Route::rule('address_admin','index/address/address_admin');//phone--地址管理页面
Route::rule('addaddress','index/address/addaddress');//phone--添加地址页面
Route::rule('getaddress','index/address/getaddress');//phone--ajax添加地址
Route::rule('default_address','index/address/default_address');//phone--默认地址
Route::rule('delete_address','index/address/delete_address');//phone--删除地址
Route::rule('edit_address/:id','index/address/edit_address');//phone--编辑地址
Route::rule('edit_address_ajax','index/address/edit_address_ajax');//phone--编辑地址
//项目故障详情
Route::rule(['repair_details','repair_details/:id'],'index/details/repair_details');//phone--项目故障详情
//师傅个人信息
Route::rule(['master_information','master_information/:order_number','master_information/:wid'],'index/master/master_information');//phone--师傅个人信息
Route::rule('getcomment','index/master/getcomment');//phone--评论分类
//核单报告
Route::rule('master_nuclear/:order_number','index/nuclear/master_nuclear');//phone--师傅填写核单报告页面
Route::rule('submit_nuclear','index/nuclear/submit_nuclear');//phone--师傅提交填写的核单报告
Route::rule('customer_nuclear/:order_number','index/nuclear/customer_nuclear');//phone--客户看到的核单报告页面
Route::rule('submit_sign','index/nuclear/submit_sign');//phone--客户提交签名Ajax
Route::rule('report_error/:order_number','index/nuclear/report_error');//phone--客户报告有问题
Route::rule('feedback','index/nuclear/feedback');//phone--客户反馈AJAX
Route::rule('nuclear_sign/:order_number','index/nuclear/nuclear_sign');//phone--客户签字页面
Route::rule('nuclear_sign_ajax','index/nuclear/nuclear_sign_ajax');//phone--客户签字ajax
//师傅签到
Route::rule('master_sign/:id','index/mastersign/master_sign');//phone--师傅签到页面
Route::rule('signajax','index/mastersign/signajax');//phone--师傅签到ajax
Route::rule('master_sign_out/:id','index/mastersign/master_sign_out');//phone--师傅签退页面
Route::rule('signajax_out','index/mastersign/signajax_out');//phone--师傅签退ajax
//维修确认报告
Route::rule('master_reports/:order_number','index/confrimreport/master_reports');//phone--师傅确认报告页面
Route::rule('submit_reports','index/confrimreport/submit_reports');//phone--师傅提交确认报告
Route::rule('img','index/confrimreport/img');//phone--维修前后的图片先加入图片表
Route::rule('customer_reports/:order_number','index/confrimreport/customer_reports');//phone--客户确认报告页面
Route::rule('customer_reportse/:order_number','index/confrimreport/customer_reportse');//phone--客户确认报告页面
Route::rule('submit_reports1','index/api/submit_reports1');//phone--客户签字确认 
Route::rule('submit_reports2','index/confrimreport/submit_reports2');//phone--客户签字确认
Route::rule('confrim_reports','index/confrimreport/confrim_reports');//phone--客户确认维修报告
Route::rule('problem/:order_number','index/confrimreport/problem');//phone--客户维修报告有问题页面
Route::rule('problem_ajax','index/confrimreport/problem_ajax');//phone--客户维修报告提交
Route::rule('querenma_ajax','index/confrimreport/querenma_ajax');//phone--客户维修报告提交
/*
*gu
 */
Route::rule('infomation','index/allinformation/infomation');//手机端消息
Route::rule('infomationlist','index/allinformation/infomationlist'); //系统消息列表
Route::rule('orderinfomationlist','index/allinformation/orderinfomationlist');//订单消息列表
Route::rule('delete_messages','index/allinformation/delete_messages');//删除消息
Route::rule('true_master','index/authentication/shimingrenzheng');//师傅实名认证
Route::rule('master_approve','index/authentication/master_approve');//师傅提交认证信息
Route::rule('shifugerenzhongxin','index/index/shifugerenzhongxin');//师傅个人中心
Route::rule('auth/master_vcode','index/auth/master_vcode');//获取验证码
Route::rule('corporate_certification','index/authentication/corporate_certification');//公司实名认证
Route::rule('company_submit','index/authentication/company_submit');//公司实名提交认证
Route::rule('apply/month','index/applymonth/apply_month');//客户申请月结
Route::rule('month_submit','index/applymonth/month_submit');//月结提交
Route::rule('contact_customers/:onumber','index/contactcustomers/index');//师傅联系客户页面
Route::rule('connection_method','index/contactcustomers/times');//师傅和客户沟通后确定的施工时间

Route::rule('reason','index/contactcustomers/reason');//无法联系到客户的原因
Route::rule('studytrain_index','index/personalcenter/index');//考试中心
Route::rule('master_choice','index/personalcenter/choice');//师傅选择考题 
Route::rule('proceed_exam/:examGroupId','index/personalcenter/proceed_exam');//师傅进行考试
Route::get('examcenter/exam/:ids','index/personalcenter/getExam');//获取考题信息
Route::post('examination_submit','index/personalcenter/examination_submit');//获取考题信息
Route::rule('master_assignment','index/personalcenter/assignment');//试卷提交
Route::rule('master_score','index/personalcenter/score');//得分情况
Route::rule('master_data','index/masterdata/index');//师傅信息登记首页
Route::rule('master_services','index/masterdata/servicer');//师傅服务信息登记
Route::rule('information_submits','index/masterdata/submits');//师傅服务信息提交
Route::rule('projectresume_index','index/projectresume/index');//师傅登记工程简历首页
Route::rule('projectresume_submit','index/projectresume/master_submit');//师傅工程简历提交

// zi
Route::rule(['choose','choose/:order'],'index/choose/index');//咨询下单
Route::rule('roand','index/choose/roand');//推荐师傅
Route::rule('yanzheng','index/choose/yanzheng');//验证师傅
Route::rule(['screen','screen/:order','screen/:zt'],'index/choose/screen');//筛选师傅页面加载
Route::rule('screen1','index/choose/screen1');//验证师傅
Route::rule('screen2','index/choose/screen2');//筛选师傅

Route::rule('screen3','index/choose/screen3');//客户咨询主任师傅
Route::rule('screen4','index/choose/screen4');//师傅找帮手师傅
Route::rule('mast_tie','index/masterc/tie');//计算

Route::rule(['consult1','consult1/:order','consult1/wid'],'index/consult/consult1');//客户咨询主任师傅
Route::rule("consult2","index/consult/consult2");//客户点击付款改步骤

Route::rule(['masterc','masterc/:order'],'index/masterc/index');//师傅应答客户

Route::rule('helper','index/helper/index');//帮手师傅
Route::rule(['helper1','helper1/:order','helper1/:wid'],'index/helper/helper1');//帮手师傅
Route::rule('helper2','index/helper/helper2');//验证师傅
Route::rule('helper3','index/helper/helper3');//邀请师傅
Route::rule('helper4','index/helper/helper4');//删除师傅

Route::rule(['helper5','helper5/:order','helper5/:wid'],'index/helper/helper5');//普通师父接单
Route::rule('helper6','index/helper/helper6');//同意接单和拒绝接单