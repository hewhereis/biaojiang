<?php
  namespace  app\index\controller;
  use think\Controller;
  use think\Db;

  /*
   *月结客户认证
   */
  class Applymonth extends  Base{
      //月结客户认证首页
      public  function  apply_month(){

          return $this->fetch();
      }

      //月结客户申请提交
      public  function  month_submit(){

          $data['real_name']=input('post.fuwuleixing') ;
          $data['Id_Car']=input('post.fuwuquyu') ;
          $data['phone']=input('post.phone') ;
          $data['bank_card']=input('post.fuwushuliang') ;
          $data['img_zheng']=input('post.img') ;
          $data['img_fan']=input('post.img1') ;
          $data['img_brand']=input('post.img2') ;
          $datas['captcha']=input('post.yuangongrenshu') ;
          $phone=input('post.phone');
          $data['uid']=session('id');

          //验证码做判断
          if($datas['captcha']==null){
              return json(array('code'=>0,'msg'=>'请填写验证码'));
          }

          $check=Db::name('sms_captcha_log')->field('captcha')->where('phone='.$phone)->order('id desc')->find();
          if($check['captcha']!==$datas['captcha']){
              return json(array('code'=>0,'msg'=>'验证码输入有误，请重新获取'));
          }else{

          }
          $wid=session('id');
          // $wid=1;
           $result=Db::name('users_partner')->where('uid='.$wid)->select();
           if(empty($result)){
               $list=Db::name('users_partner')->insertGetId($data);
                   if($list){
                       return json(array('code'=>200,'msg'=>'认证提交成功，请等待审核'));
                   }else{
                       return json(array('code'=>0,'msg'=>'认证提交失败，请重新提交'));
                   }
           }else{
               $list=Db::name('users_partner')->where('uid='.$wid)->update($data);
                    if($list){
                        return json(array('code'=>200,'msg'=>'认证更新成功，请等待审核'));
                    }else{
                        return json(array('code'=>0,'msg'=>'认证更新失败，请重新提交'));
                    }
           }



      }




  }
  ?>