<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/9/009
 * Time: 14:52
 */

namespace app\index\controller;
use think\Controller;
use think\Db;
class Authentication extends  Base{

    /*实名认证*/
    public  function  shimingrenzheng(){

        return $this->fetch();
    }

    //师傅实名认证提交信息
    public  function  master_approve(){
        $data['credit_card_phone']=input('post.phone');
        $phone=input('post.phone');
        $datas['captcha']=input('post.yuangongrenshu');
        $data['real_name']=input(   'post.fuwuleixing');
        $data['cert_id']=input('post.fuwuquyu');
        $data['id_front']=input('img');
        $data['id_reverse']=input('img1');
        $data['id_hand']=input('img2');
        $data['review_status']=1;
        $data['uid']=session('id');
//        $datas['real_name']=input('');
//        $wid=session('id');
//        $list=Db;;name('users_worker')->where('uid='.$wid)->select();
        //$wid=session('id');
        //验证码判断
        if($datas['captcha']==null){
            return json(array('code'=>0,'msg'=>'请填写验证码'));
        }

        $check=Db::name('sms_captcha_log')->field('captcha')->where("phone='{$phone}'")->order('id desc')->find();
        if($check['captcha']!==$datas['captcha']){
            return json(array('code'=>0,'msg'=>'验证码输入有误，请重新获取'));
        }else{

        }
        $wid=session('id');
        //$wid=15;
        $list=Db::name('users_worker')->where('uid='.$wid)->select();
        if(empty($list)){
        $result=Db::name('users_worker')->insertGetId($data);
         if($result){
             return json(array('code'=>200,'msg'=>'认证提交成功，请等待审核'));
         }else{
             return json(array('code'=>0,'msg'=>'认证提交失败，请重新提交'));
           }
        }else{
            $result =Db::name('users_worker')->where('uid='.$wid)->update($data);
            if(($result)){
                return json(array('code'=>200,'msg'=>'认证更新成功，请等待审核'));
            }else{
                return json(array('code'=>0,'msg'=>'认证更新失败,请重新提交'));
            }
        }
    }

    /*公司实名认证*/
    public  function  corporate_certification(){
        return  $this->fetch();
    }

    //公司实名认证信息提交
    public function  company_submit(){
        $data['phone']=input('post.phone');
        $data['real_name']=input('post.fuwuleixing');
        $data['company_name']=input('post.fuwushuliang');
        $data['img']=input('post.img3');
        $data['id_front']=input('post.img');
        $data['id_reverse']=input('post.img1');
        $data['id_hand']=input('post.img2');
        $data['cert_id']=input('post.fuwuquyu');
        $data['address']=input('post.houcedunwei');
        $phone=input('post.phone');
        $datas['captcha']=input('post.yuangongrenshu');
        $data['uid']=session('id');
        $select=Db::name('sms_captcha_log')->field('captcha')->where("phone='{$phone}'")->order('id desc')->find();
       //验证码做判断
        if($datas['captcha']==null){
            return json(array('code'=>0,'msg'=>'请填写验证码'));
        }

        if($select['captcha']==$datas['captcha']){

        }else{
            return json(array('code'=>0.,'msg'=>'验证码输入有误,请重新获取'));
        }
         $wid=session('id');
       // $wid=12;
        $result=Db::name('corporate_certification')->where('uid='.$wid)->select();
        if(empty($result)){
            $list=Db::name('corporate_certification')->insertGetId($data);
            if($list){
            return json(array('code'=>200,'msg'=>'认证提交成功，请等待审核'));
        }else{
            return json(array('code'=>0,'msg'=>'认证提交失败，请重新提交'));
            }
        }else{
            $list=Db::name('corporate_certification')->where('uid='.$wid)->update($data);
            if($list){
                 return json(array('code'=>200,'msg'=>'认证更新成功,请等待审核'));
            }else{
                return json(array('code'=>0,'msg'=>'认证更新失败，请重新提交'));
            }
        }
    }

}