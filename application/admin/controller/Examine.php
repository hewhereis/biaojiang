<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14/014
 * Time: 15:31
 */

namespace app\admin\controller;
use think\Db;
use app\admin\model\ExamineModel;

class Examine extends  Base
{
    /**
     * [index 服务类型列表]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function index(){

       $key = input('key');
        $map = [];
        //$map['closed'] =0;
        if($key&&$key!=="")
        {
            $map['bj_users_worker.real_name'] = ['like',"%" . $key . "%"];
        }
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('users_worker')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $ad = new ExamineModel();
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

        $status = Db::name('users_worker')->where(array('id'=>$id))->value('review_status');//判断当前状态情况

        if($status==1)
        {
            $flag = Db::name('users_worker')->where(array('id'=>$id))->setField(['review_status'=>2]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已通过']);
        }
        else  {
            $flag = Db::name('users_worker')->where(array('id'=>$id))->setField(['review_status'=>0]);
            return json(['code' => 3, 'data' => $flag['data'], 'msg' => '未通过']);
        }
    }



    //未通过
    public function ad_state2()
    {
        $id=input('param.id');

        $status = Db::name('users_worker')->where(array('id'=>$id))->value('review_status');//判断当前状态情况

        if($status==1)
        {
            $flag = Db::name('users_worker')->where(array('id'=>$id))->setField(['review_status'=>3]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '未通过']);
        }
        else  {
            $flag = Db::name('users_worker')->where(array('id'=>$id))->setField(['review_status'=>0]);
            return json(['code' => 2, 'data' => $flag['data'], 'msg' => '未通过']);
        }
    }
}




