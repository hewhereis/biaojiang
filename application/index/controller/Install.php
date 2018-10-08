<?php
namespace app\index\controller;


class Install extends Base{

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
    //师傅消息页面
    public function he_master_of_information(){
        return view('he_master_of_information');
    }
    //师傅消息页面
    public function intsall_personnelcontacts(){
        return view('intsall_personnelcontacts');
    }

}