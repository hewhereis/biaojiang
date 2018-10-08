<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14/014
 * Time: 15:37
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class ExamineModel extends  Model
{  protected $name = 'users_worker';
    public function getBrandLbWhere($map, $Nowpage, $limits)
    {

        $join = [
            ['bj_users','bj_users.id = bj_users_worker.uid','LEFT'],


        ];
        //return $this->field('bj_brand_cate.*')->where($map)->page($Nowpage, $limits)->order('id desc')->select();
        $data = $this->field('bj_users_worker.*,bj_users.phone as iphone')->join($join)->where($map)->page($Nowpage, $limits)->order('id  desc')->select();//或分页查询
        return  $data;
    }


    /**
     * 根据搜索条件获取所有的用户数量
     * @param $where
     */
    public function getAllCount($map)
    {
        return $this->where($map)->count();
    }
}