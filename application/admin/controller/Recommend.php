<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19/019
 * Time: 8:24
 */

namespace app\admin\controller;
use think\Db;
use app\admin\model\RecommendModel;


class Recommend  extends Base
{

    public  function  index(){

        $key = input('key');
        $map = [];
        //$map['closed'] =0;
        if($key&&$key!=="")
        {

            $map['bj_users.real_name'] = ['like',"%" . $key . "%"];
        }
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数

        $join = [
            ['bj_users','bj_users.id = bj_users_worker.uid','LEFT'],


        ];
       $count = Db::name('users_worker')->join($join)->where($map)->where('bj_users_worker.review_status=2')->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $ad = new recommendModel();
        $lists = $ad->getAdAll($map, $Nowpage, $limits);



        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
    }


    /**
     * [ad_state 类目状态]
     * @return [type] [description]

     */
    public function ad_state()
    {
        $id=input('param.id');
        $status = Db::name('users_worker')->where(array('id'=>$id))->value('is_tui');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('users_worker')->where(array('id'=>$id))->setField(['is_tui'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已取消']);
        }
        else
        {
            $flag = Db::name('users_worker')->where(array('id'=>$id))->setField(['is_tui'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已推荐']);
        }
    }


}