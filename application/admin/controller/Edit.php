<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25/025
 * Time: 16:20
 */

namespace app\admin\controller;

use think\Db;
use app\admin\model\EditModel;
class Edit extends  Base
{

    public  function  index(){

        $key = input('key');
        $map = [];
        if($key&&$key!=="")
        {

            $map[''] = ['like',"%" . $key . "%"];
        }
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数


        $count = Db::name('users_recommend')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $ad = new EditModel();
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
     * [updateArticle 编辑商品分类]
     * @author [标匠] [Technical team]
     */
    public  function  editEdit(){

        $service = new EditModel();
        if(request()->isAjax()){
            $param = input('post.');
            $flag = $service->updatebrand($param);
            return json([ 'code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $this->assign('service',$service->getserOne($id));
        return $this->fetch();
    }


    /**
     * [getOneArticle 根据id获取一条信息]
     * @author [标匠] [Technical team]
     */
    public function getOneArticle($id)
    {
        return $this->where('id', $id)->find();
    }



    //删除
    public function del_ser()
    {
        $id = input('param.id');
        $ad = new EditModel();
        $flag = $ad->delSer($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }



    /**
     * [add_ad 添加推荐位]
     * @return [type] [description]

     */
    public function editadd()
    {
        if(request()->isAjax()){

            $param = input('post.');
            $param['closed'] = 0;
            $ad = new EditModel();
            $flag = $ad->insertAd($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $position = new EditModel();
        $this->assign('position',$position->getAllCate());
        return $this->fetch();

    }

    public function article_state()
    {
        $id=input('param.id');
        $status = Db::name('users_recommend')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('users_recommend')->where(array('id'=>$id))->setField(['status'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('users_recommend')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }

    }


}