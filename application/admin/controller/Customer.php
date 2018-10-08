<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21/021
 * Time: 13:56
 */

namespace app\admin\controller;

use think\Db;

use app\admin\model\CustomerModel;
class Customer extends  Base
{

    public  function  index(){
        $key = input('key');
        $map = [];

        if($key&&$key!=="")
        {
            $map['bj_users_partner.real_name'] = ['like',"%" . $key . "%"];
        }
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('users_partner')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));

        $ad = new CustomerModel();
        $lists = $ad->getBrandLbWhere($map, $Nowpage, $limits);

        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }


        return $this->fetch();


    }





    //待审核
    public function ad_state()
    {
        $id=input('param.id');

        $status = Db::name('users_worker')->where(array('id'=>$id))->value('review_status');//判断当前状态情况

        if($status==0)
        {
            $flag = Db::name('users_worker')->where(array('id'=>$id))->setField(['review_status'=>1]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '未审核']);
        }

    }

    //通过
    public function ad_state1()
    {
        $id=input('param.id');
        $uid=Db::name('users_partner')->field('uid')->where('id',$id)->find();

        $data['message_type']=1;
        $data['source_id']=0;
        $data['receive_id']=$uid['uid'];
        $data['content']='恭喜您已成为月结客户，请前往个人中心,我的钱包下密码管理设置您的月结密码';
        $data['link']=input('post.link');
        $data['status']=0;
        $data['sending_time']=date("Y-m-d h:i:s");
        Db::name('message_reminder')->insertGetId($data);
        $status = Db::name('users_partner')->where(array('id'=>$id))->value('status');//判断当前状态情况

        if($status==0)
        {
            $list = Db::name('users_partner')->where('id',$id)->field('phone')->find();
            $phone =$list['phone'];
            $qq=yj_information($phone);
            $flag = Db::name('users_partner')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已通过']);



        }

    }



    //未通过
    public function ad_state2()
    {
        $id=input('param.id');

        $status = Db::name('users_partner')->where(array('id'=>$id))->value('status');//判断当前状态情况

        if($status==0)
        {
            $flag = Db::name('users_partner')->where(array('id'=>$id))->setField(['status'=>2]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '未通过']);
        }
        else  {
            $flag = Db::name('users_partner')->where(array('id'=>$id))->setField(['status'=>0]);
            return json(['code' => 2, 'data' => $flag['data'], 'msg' => '未通过']);
        }
    }
}