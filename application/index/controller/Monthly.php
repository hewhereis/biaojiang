<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28/028
 * Time: 15:05
 */

namespace app\index\controller;
use think\Controller;
use think\Db;
class Monthly extends Base
{
  /**
   * [month description]
   * 选择月结客户跳转页面
   * @return [type] [description]
   */
  public function month(){
    return $this->fetch('monthly_client_order');
  }
  /**
   * 月结客户付款页面
   */
  public function month_pay(){
    $order_number = '12345678912';
    $total= '8';
    $this->assign('order_number',$order_number);
    $this->assign('total',$total);
    return view('monthly_payment');
  }
  /**
   * 申请月结客户
   */
     public function apply_monthly_statement(){
      //查找该账户注册时的手机号
      $id = session('id');
      $phone = Db::name('users')->where('id',$id)->field('phone')->find();
      $this->assign('phone',$phone['phone']);
      return view("apply_monthly_statement");
    }
    /**
     * 提交过来月结客户信息
     */
    public function add_monthly_information(){
      $param =input('post.');
      $captcha = $param['yanz'];
      if(!is_numeric($captcha)){
      return json(array('code'=>0,'msg'=>'验证码输入错误！'));
    }
     $user = Db::name('sms_captcha_log');
     $list = $user->where('phone='.$param['phone'])->field('captcha')->order('id desc')->limit(1)->find();
     if($captcha==$list['captcha']){
        $data['uid'] = session('id');
      $data['real_name'] = $param['linkman_contacts'];
      $data['phone'] = $param['phone'];
      $data['bank_card'] = $param['bank_card'];
      $data['company'] = $param['the_name_of'];
      $data['province'] = $param['province'];
      $data['city'] = $param['city'];
      $data['area'] = $param['town'];
      $data['address'] = $param['address'];
      $data['business'] = $param['business'];
      $data['Id_Car'] = $param['Id_Car'];
      $data['id_img'] = $param['id_front'];
      $data['bus_img'] = $param['id_front1'];
      $data['create_time'] = time();
      $list = Db::name('users_partner')->insert($data);
      if($list){
        return json(array('code'=>200,'msg'=>'申请成功，请等待审核'));
      }else{
        return json(array('code'=>0,'msg'=>'申请出现一点问题，请重新申请'));
      }
    }else{
       return json(array('code'=>0,'msg'=>'验证码输入错误！'));
     }
 
    }
    /**
     * 月结密码
     */
    public function password(){
      $uid = session('id');
      $list = Db::name('users_partner')->where('uid',$uid)->field('phone')->find();
      $this->assign('phone',$list['phone']);
      return view('wallet_password');
    }
    /**
     * 密码加入数据表
     */
    public function add_password(){
     $uid = session('id');
     $param = input('post.');
     $data['monthly_service_password']=$param['password'];
     $user = Db::name('sms_captcha_log');
     $list = $user->where('phone='.$param['phone'])->field('captcha')->order('id desc')->limit(1)->find();
      if($param['code']==$list['captcha']){
        $arr = Db::name('users_partner')->where('uid',$uid)->update($data);
        if($arr){
          return json(array('code'=>200,'msg'=>'密码设置成功'));
        }else{
          return json(array('code'=>0,'msg'=>'密码出现一点问题'));
        }
      }else{
          return json(array('code'=>0,'msg'=>'验证码输入错误！'));
      }
    }
}