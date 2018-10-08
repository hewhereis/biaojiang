<?php
  namespace app\index\controller;
  use think\Db;
  use think\Controller;


  class Masterdata extends  Base{

      /*
       * 师傅信息登记首页
       */
      public  function  index(){
          return $this->fetch();
      }

    /*
     *师傅服务信息登记
     */
      public  function  servicer(){

       /*
       *获取服务类别all
       */
        $id=session('id');
        //
        // $id=42;
       $work_skill = Db::name('service')->field('id as value,name as title')->select();
      
       

        $listz=Db::name('users_worker')->where('uid', $id)->find();
        $s_id=explode(',',$listz['service_type_id']);
          $this->assign('ser', json_encode($work_skill));
          $this->assign('s_id',json_encode($s_id));
    
          return $this->fetch();
      }
      /*
       * 师傅服务信息提交
       */
      public  function  submits(){
         $list=input();
       // var_dump($list);

       // die;
           $id=session('id');
           //$id=42;
            $datas['address']=$list['datas']['datau']['address_area']; 
            $address=explode('-',$datas['address']);
            // var_dump($address);
            // die;
            $user=Db::name('users')->where('id',$id)->update(['province'=>$address[0],'city'=>$address[1],'town'=>$address[2]]);
            // if($user){
            //    return json(array('code'=>200,'msg'=>'地址修改成功'));
            // }else{
            //    return json(array('code'=>0,'msg'=>'地址修改失败'));
            // }
         
            $data['service_time']=$list['datas']['datau']['fuwushijian'];
            $data['staff_num']=$list['datas']['datau']['yuangongrenshu'];
            $data['truck_situation']=$list['datas']['datau']['fuwushuliang'];
            $data['car_size']=$list['datas']['datau']['houchedaxiao'];
            $data['car_weight']=$list['datas']['datau']['houcedunwei'];
            $data['introduce']=$list['datas']['datau']['fuwujiesho'];
            $data['service_type_id']=$list['datas']['datau']['malfunctions'];
            $data['uid']=$id;
     
       $list=Db::name('users_worker')->where('uid',$id)->select();
       if(empty($list)){
          $result=Db::name('users_worker')->insertGetId($data);
          if($result){
            return json(array('code'=>200,'msg'=>'信息提交成功'));
          }else{
            return json(array('code'=>0,'msg'=>'信息提交失败'));
          }

   }else{
       $result=Db::name('users_worker')->where('uid',$id)->update($data);
       if($result){
         return json(array('code'=>200,'msg'=>'信息修改成功'));
       }else{
         return json(array('code'=>0,'msg'=>'信息修改失败'));
       }
       }

      }
  }


?>