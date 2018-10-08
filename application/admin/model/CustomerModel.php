<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/21/021
 * Time: 14:35
 */

namespace app\admin\model;


use think\Model;
use think\Db;
class CustomerModel extends  Model
{   protected $name = 'users_partner';

// 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;
    public function getBrandLbWhere($map, $Nowpage, $limits)
    {


        //return $this->field('bj_brand_cate.*')->where($map)->page($Nowpage, $limits)->order('id desc')->select();
        $data = $this->where($map)->page($Nowpage, $limits)->order('id  desc')->select();//或分页查询
        return  $data;
    }





}