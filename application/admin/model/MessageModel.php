<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14/014
 * Time: 9:20
 */

namespace app\admin\model;

use think\Db;
use think\Model;

class MessageModel extends  Model
{
    protected $name = 'message';

// 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;
    /**
     * 根据搜索条件获取列表信息
     */
    public function getAdAll($map, $Nowpage, $limits)
    {
        $join = [
            ['bj_users','bj_users.id = bj_message.uid','LEFT'],


        ];
       //$data = $this->where($map)->page($Nowpage, $limits)->order('id ')->select();//或分页查询
        $data=$this->field('bj_message.*,bj_users.username as u_name')->join($join)->where($map)->page($Nowpage, $limits)->order('bj_message.id  desc')->select();
        return  $data;

        /*$join = [
            ['bj_users','bj_users.id = bj_message.uid','LEFT'],


        ];*/
        //$list1=Db::name("消息表")->field('查询显示字段')->join($join)->select();
       // $data=Db::name("message")->field('uid')->join($join)->where($map)->page($Nowpage, $limits)->order('id ')->select();



       // return  $data;
}
}