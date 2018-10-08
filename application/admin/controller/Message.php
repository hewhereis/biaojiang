<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14/014
 * Time: 9:00
 */

namespace app\admin\controller;
use app\admin\model\MessageModel;
use think\Db;

class Message extends  Base
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

               $map['bj_message.content|bj_message.order_number|bj_users.username'] = ['like',"%" . $key . "%"];
           }
           $Nowpage = input('get.page') ? input('get.page'):1;
           $limits = config('list_rows');// 获取总条数

           $join = [
               ['bj_users','bj_users.id = bj_message.uid','LEFT'],


           ];
           $count = Db('message')->join($join)->where($map)->count();//计算总页面
           $allpage = intval(ceil($count / $limits));
           $ad = new MessageModel();
           $lists = $ad->getAdAll($map, $Nowpage, $limits);


           /*$join = [
               ['bj_users','bj_users.id = 消息表.uid','LEFT'],


           ];
           $list1=Db::name("消息表")->field('查询显示字段')->join($join)->select();
           $this->assign('list1',$list1);*/

//var_dump($list1);

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
     * [ad_state 广告状态]
     * @return [type] [description]

     */
    public function ad_state()
    {
        $id=input('param.id');
       // $status1 = Db::name('message')->where(array('id'=>$id))->save('status',1);//判断当前状态情况
        $status=Db::name('message')->where(array('id'=>$id))->value('status');
        if($status==1)
        {
            $flag = Db::name('message')->where(array('id'=>$id))->setField(['status'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('message')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    }




}