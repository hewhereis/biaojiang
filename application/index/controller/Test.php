<?php
namespace app\index\controller;

use think\Db;
class Test extends Base
{
    public function index(){
        return view('index');
    }
    //师傅的首页
    public function master_home(){
    	return view('master_home');
    }
    //客户首页
    public function client_home(){
        return view('client_home');
    }
    //师傅的认证信息
    public function master_approve(){
        return view('master_approve');
    }
     //师傅的认证信息查看
    public function master_review(){
        return view('master_review');
    }
    // 师傅信息登记页
    public function master_register(){
        return view('master_register');
    }
        // 审核情况
    public function audit_situation(){
        return view('audit_situation');
    }
    // 公司信息认证
     public function company_approve(){
        return view('company_approve');
    }
    // 客户信息添加
    public function client_register(){
        return  view('client_register');
    }
    //平台客户签约
    public function client_sign(){
        return view('client_sign');
    }
    //个人中心的模块
    	//师傅的个人中心
    public function personal_center_master(){
    	return view('personal_center_master');
    }

        //师傅的订单页面
    public function master_myorder(){
        return view('master_myorder');
    }

    	//客户的个人中心
    public function personal_center_client(){
    	return view('personal_center_client');
    }
    //选择付款
    public function choose_the_payment(){
        return view('choose_the_payment');
    }

    //更换付款方式
    public function change_payment_method(){
        return view('change_payment_method');
    }


    	//我的钱包
    public function my_purse(){
    	return view('my_purse');
    }

    	//钱包充值
    public function purse_recharge(){
    	return view('purse_recharge');
    }

    	//微信转入
    public function alipay(){
    	return view('alipay');
    }

    	//余额查询
    public function balance(){
    	return view('balance');
    }
    //支付宝-
  public function pay_into(){
         //    return view('pay_into');
 }

    	//绑定银行卡
    public function bind_bank_card(){
    	return view('bind_bank_card');
    }

    	//提现
    public function withdraw_deposit(){
    	return view('withdraw_deposit');
    }

    	//优惠卷
    public function coupon_filled_red_envelope(){
    	return view('coupon_filled_red_envelope');
    }
      //缴纳保证金
  public function pay_the_deposit(){
       return view('pay_the_deposit');
      }
     //诚信保证金
  public function good_faith_deposit(){
               return view('good_faith_deposit');
           }
      //我的银行卡
   public function wfwb(){
               return view('wfwb');
             }


    //系统功能
    	//师傅评价页面
    public function master_evaluate(){
    	return view('master_evaluate');
    }
         // 答谢师傅
    public function appreciation_master(){
        return view('appreciation_master');
    }
   		//客户评价页面
    public function client_evaluate(){
    	return view('client_evaluate');
    }
    	//师傅情况页面
    public function master_condition(){
    	return view('master_condition');
    }
        //追加评论页面
    public function evaluation(){
        return view('evaluation');
    }

    	//投诉建议
    public function complaint_advice(){
    	return view('complaint_advice');
    }

    	//地址管理 --通用（外面已经写好了）
    public function location(){
            return view("location");
    }
    	//增加地址 --通用（外面已经写好了）
    public function add_location(){
   
    }

    //勘察
    	//勘察
    public function prospect(){
    	return view('prospect');
    }

    	//师傅提交测量报告页面
    public function submit_report(){
    	return view('submit_report');
    }

        //师傅上传勘测手稿照片
    public function upload_prospect_manuscripts(){

        return view('upload_prospect_manuscripts');
    }
    //勘测
    public function reconnaissance(){




        $sid=2;
        $cid=6;
        //echo $cid;


        $slist = Db::name('service')->field('name')->where("id='{$sid}'")->find();//获取当前服务类型名称
        $clist = Db::name('commodity')->field('name,id,c_id')->where("id='{$cid}'")->find();//获取当前商品二类名称
        $gsid=$clist['id'];
        $ylist = Db::name('commodity')->field('c_id')->where("id='{$cid}'")->find();
        $yid=$ylist['c_id'];
        $rlist = Db::name('category')->field('name,id')->where('find_in_set('.$sid.',s_id)')->where('id','in',$yid)->find();
        $csid=$rlist['id'];
        $lists = Db::name('category')->field('name,id')->where('id','not in',$csid)->where('find_in_set('.$sid.',s_id)')->select();
        $listss = Db::name('category')->field('name,id')->where('find_in_set('.$sid.',s_id)')->select();
        $carr=Db::name("commodity")->field("id,name")->where('find_in_set('.$csid.',c_id)')->where('id','not in',$gsid)->select(); //获取商品二类
        $brand=Db::name("brand_list")->select(); //品牌
        $sname=$slist['name'];
        $glist=Db::name("goods")->field("id,name")->where("y_id='{$gsid}'")->select(); //获取商品三类

        $sname=$slist['name'];


        $this->assign('sname',$sname);
        $this->assign('clist',$clist);
        $this->assign('rlist',$rlist);
        $this->assign('comm',$carr);
        $this->assign('glist',$glist);
        $this->assign('lists',$lists);
        $this->assign('listss',$listss);
        $this->assign('brand',$brand);
        return view('reconnaissance');
    }
         //确认接单
    public function confirm_order(){

        return view('confirm_order');
    }
        //联系客户
    public function prospect_relation_client(){

        return view('prospect_relation_client');
    }
        //勘测查看订单详情
    public function the_order_details(){

        return view('the_order_details');
    }
    //填写勘测报告
    public function write_report(){

        return view('write_report');
    }

    //工程管理
    	//订单估价
    public function order_value(){
    	return view('order_value');
    }

     //安装
    	//安装
    public function install(){
    	return view('install');
    }
    	//安装下单详情页面
    public function install_order_details(){
    	return view('install_order_details');
    }
    //安装详情
    public function install_order(){
        return view('install_order');
    }
    	//安装订单询价
 //   public function install_order_enquiry(){
  //  	return view('install_order_enquiry');
   // }

    	//师傅安装报告及确认页面
    public function master_installation_report(){
    	return view('master_installation_report');
    }
     	//客户安装确认页面
    public function client_installation_confirmation(){
    	return view('client_installation_confirmation');
    }
    //安装项目选择
    public function installation_project_selection(){
        return view('installation_project_selection');
    }
    //师傅-订单状态
    public function mas_intstall_status(){
        return view('mas_intstall_status');
    }
    //客户-订单状态
    public function intstall_status(){
        return view('intstall_status');
    }
    //审核情况
    public function utilization_review(){
        return view('utilization_review');
    }
    //安装_联系客户
    public function intall_contact_customer(){
        return view('intall_contact_customer');
    }
    //安装_挑选主任师傅
    public function install_choose_director_master(){
        return view('install_choose_director_master');
    }
    //安装_客户咨询主任师傅
    public function install_client_consult_director_master(){
        return view('install_client_consult_director_master');
    }

    //选普通师傅
    public function install_select_common_master(){
        return view('install_select_common_master');
    }
    //付款第三方页面_安装
    public function install_payment_external_maintain(){
        return view('install_payment_external_maintain');
    }
    //付款第三方页面_咨询
    public function install_payment_external_consult(){
        return view('install_payment_external_consult');
    }
    //师傅筛选
    public function install_master_filter(){
        return view('install_master_filter');
    }
    //结算页面
    public function install_settlement_page(){
        return view('install_settlement_page');
    }
    //咨询付费页面
    public function install_consult_pay(){
        return view('install_consult_pay');
    }
    //月结付款界面
    public function install_monthly_payment(){
        return view('install_monthly_payment');
    }
    //甩单师傅
    public function install_jilt_single(){
        return view('install_jilt_single');
    }
    //留言配单
    public function install_message_pairing(){
        return view('install_message_pairing');
    }
    //订单定标
    public function install_order_calibrate(){
        return view('install_order_calibrate');
    }
    //月结客户下单页面
    public function install_monthly_client_order(){
        return view('install_monthly_client_order');
    }
    //抢单页面
    public function install_grab_order(){
        return view('install_grab_order');
    }
    //抢单页面
    public function intall_customer_master_has_additional_items(){
        return view('intall_customer_master_has_additional_items');
    }
    //客户追加项目报价
    public function intall_the_customer_additional(){
        return view('intall_the_customer_additional');
    }
    //师傅抢单成功页面
    public function intall_succPage(){
        return view('intall_succPage');
    }

    //维修
    	//师傅服务
    		//主任师傅应答客户咨询
    public function master_response_client(){
    	return view('master_response_client');
    }

    		//师傅价格协商确认页面
    public function master_price_negotiationt(){
    	return view('master_price_negotiationt');
    }

    		//核单报告
	public function nuclear_single_report(){
	    return view('nuclear_single_report');
	    }
			//师傅维修报告及确认页面
	public function master_maintenance_report(){
	    return view('master_maintenance_report');
	    }

	    //客户下单
	    	//师傅维修报告及确认页面
	public function maintenance_items_select(){
	    return view('maintenance_items_select');
	    }
        //普通师傅维修报告及确认页面
    public function master_maintenance_report_s(){
        return view('master_maintenance_report_s');
    }
    //普通师傅接单
    public function ordinary_master_orders(){
        return view('ordinary_master_orders');
    }

	    	//故障详情
	public function fault_details(){
	    return view('fault_details');
	}  
        	//选主任师傅
	public function choose_director_master(){
	    return view('choose_director_master');
	    }

	    	//客户咨询主任师傅
	public function client_consult_director_master(){
	    return view('client_consult_director_master');
	    }  

        	//选普通师傅
	public function select_common_master(){
	    return view('select_common_master');
	    }  
	    	//师傅筛选
	public function master_filter(){
	    return view('master_filter');
	    } 
	    	//结算页面
	public function settlement_page(){
	    return view('settlement_page');
	    } 
        	//咨询付费页面
	public function consult_pay(){
	    return view('consult_pay');
	}
	    	//付款第三方支付页面_维修
	public function payment_external_maintain(){
	    return view('payment_external_maintain');
	}
    //付款第三方支付页面_咨询
    public function payment_external_consult(){
        return view('payment_external_consult');
    }

	    	//月结付款界面
	public function monthly_payment(){
	    return view('monthly_payment');
	}

	    	//客户确认维修完成
	public function client_affirm_accomplish(){
	    return view('client_affirm_accomplish');
	}

	    	//月结客户下单
	public function monthly_client_order(){
	    return view('monthly_client_order');
	}
	    	//甩单配师傅
	public function jilt_single(){
	    return view('jilt_single');
	}

	    	//留言配单
	public function message_pairing(){
	    return view('message_pairing');
	}

	    	//订单定标
	public function order_calibrate(){
	    return view('order_calibrate');
	}

	    	//抢单页面
	public function grab_order(){
	    return view('grab_order');
	}

	    	//单个项目故障详情
	public function one_malfunction_particulars(){
	    return view('one_malfunction_particulars');
	}
	//客户订单状态
    public function order_status(){
        return view('order_status');
    }
    //师傅订单状态
    public function Master_order_status(){
        return view("Master_order_status");
    }
    //联系客户
    public function contact_customer(){
        return view("contact_customer");
    }
    //客户追加项目报价
    public function the_customer_additional(){
        return view('the_customer_additional');
    }
    //客户-师傅有追加项目
    public function customer_master_has_additional_items(){
        return view('customer_master_has_additional_items');
    }

	//订单
    //订单管理-师傅
    public function order_manage_master(){
         return view('order_manage_master');
    }

    //订单管理-客户
    public function order_manage_client(){
         return view('order_manage_client');
    }

       //订单详情
    public function order_details(){
        return view('order_details');
    }
   //订单退款
    public function order_refund(){
         return view('order_refund');
    }

   // 标匠师傅 施工情况
    public function order_construction(){
      return view('order_construction');
    }

    //订单查询
    public function order_inquiry(){
        return view('order_inquiry');
    }

    //客户施工情况
    public function client_order_construction_info(){
             return view('client_order_construction_info');
    }
    //签到
    public function the_customer_sign_in(){
        return view('the_customer_sign_in');
    }
    public function the_customer_sign_ins(){
        return view('the_customer_sign_ins');
    }

 //学习培训
   //师傅木匠定级考试
    public function proceed_exam(){
    return view('proceed_exam');
}
   //标匠学习中心
public function learning_center(){
    return view('learning_center');
}
   //考试类型选择
public function exam_select(){
    return view('exam_select');
}
  //学习页面
public function acquire_knowledge(){
           return view('acquire_knowledge');
       }
   //知识点
   public function Teacher_learning(){
               return view('Teacher_learning');
      }
      //视频学习页面
      public function  Video_learning_page(){
        return view('Video_learning_page');
      }
       //考试成功
    public function  examination_succeed(){
        return view('examination_succeed');
    }
    //考试失败
    public function  examination_be_defeated(){
        return view('examination_be_defeated');
    }
//消息
        //师傅消息页面
    public function  master_message_page(){
        return view('master_message_page');
    }
        //系统消息
    public function  system_messages(){
        return view('system_messages');
    }
        //订单消息
    public function  new_Order_Single(){
        return view('new_Order_Single');
    }
    

 public function  shouji(){
        return view('shouji');
    }

     //任务发布成功
    public function release_task(){
        return view('release_task');
    }
    //订单付款成功
    public function order_payment(){
        return view('order_payment');
    }
    //现场测绘表
    public function mapping_surface(){
        return view('mapping_surface');
    }
    //确认你的订单
    public function affirm_order_form(){
        return view('affirm_order_form');
    }
    //问题反馈
    public function issue_feedback(){
        return view('issue_feedback');
    }
    //勘测任务提交
    public function survey_task(){
        return view('survey_task');
    }
    
    //    师傅首页
    public function  client_home_s(){
        return view('client_home_s');
    }
//    客户首页
    public function  client_home_k(){
          return view('client_home_k');
    }
//    客户首页
    public function  clien_home_ss(){
        return view('clien_home_ss');
    }

    //找帮手师傅
    public function help_master(){
        return view('help_master');
    }

    //勘测施工报告确认表
    public function report_confirmation_form(){
        return view('report_confirmation_form');
    }
    //师傅信息登记
    public function information_registration(){
        return view('information_registration');
    }
    //微信支付
    public function weixin(){
        return view('weixin');
    }
    //更换灯片
    public function replacing_the_lamp(){
        return view('replacing_the_lamp');
    }
     //更换灯片订单详情
    public function line_item(){
        return view('line_item');
    }
    //围板搭建/拆除
    public function coaming_construct_dismantle(){
        return view('coaming_construct_dismantle');
    }
    //围板搭建/拆除详情
    public function coaming_details(){
        return view('coaming_details');
    }
    //师傅中心
    public function personal_center(){
        return view('personal_center');
    }
        //基本资料
    public function basics(){
        return view('basics');
    }
    //业主协议
    public function yezhuxieyi(){
        return view('yezhuxieyi');
    }
     //编辑头像
    public function bianjitouxiang(){
        return view('bianjitouxiang');
    }

      //勘测所需表
    public function survey_form(){
        return view('survey_form');
    }
}
