<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/19/019
 * Time: 8:38
 */

namespace app\admin\model;


use think\Model;
use think\Db;
class RecommendModel extends  Model
{
    protected $name = 'users_worker';
    public function getAdAll($map, $Nowpage, $limits)
    {
        $join = [
            ['bj_users','bj_users.id = bj_users_worker.uid','LEFT'],


        ];
        $data=$this->field('bj_users_worker.*,bj_users.real_name as u_name')->join($join)->where($map)->where('bj_users_worker.review_status=2')->page($Nowpage, $limits)->order('bj_users_worker.id  desc')->select();
        return  $data;

}

}