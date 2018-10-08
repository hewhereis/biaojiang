<?php


  namespace  app\index\controller;
   use think\Db;
   use think\Controller;

   Class Projectresume extends  Controller{
       /*
        * 师傅填写工程简历首页
        */
       public  function  index(){
            $id=session('id');
            $id=21;
           $work_skill = Db::name('service')->field('id as value,name as title')->select();//服务类型
           $brand = Db::name('brand_list')->field('id as value,brand as title')->limit(30)->select();//品牌
           $skill = Db::name('skills')->field('id as value,skill as title')->select();//技能
            $this->assign('skill',json_encode($skill));
            $this->assign('ser', json_encode($work_skill));
            $this->assign('brand',json_encode($brand));

           return $this->fetch('gongchangjianli');
       }
      /*
       * 师傅提交工程简历
       */
       public  function  master_submit(){
           $uid=session('id');
           $uid=11;
           $list=input('post.');
           $data['project_start_time']=strtotime($list['datas']['time']);
           $data['project_end_time']=strtotime($list['datas']['times']);
           $data['entry_name']=$list['datas']['little'];
           $data['company']=$list['datas']['renzhigongsi'];
           $data['brand']=$list['datas']['brands'];
           $data['service_type_id']=$list['datas']['leis'];
           $data['skill']=$list['datas']['skills'];
           $data['worker_id']=$uid;
          $lister=Db::name('reume')->where('worker_id',$uid)->select();
          if(empty($lister)){
              $result=Db::name('reume')->where('worker_id',$uid)->insertGetId($data);
              if($result) {
                  return json(array('code' => 200, 'msg' => '信息提交成功'));
              }else{
              return json(array('code'=>0,'msg'=>'信息提交失败'));
              }
          }else{
              $result=Db::name('reume')->where('worker_id',$uid)->update($data);
              if($result){
                  return json(array('code'=>200,'msg'=>'信息修改成功'));
              }else{
                  return  json(array('code'=>0,'msg'=>'信息修改失败'));
              }
          }


       }


   }

   ?>