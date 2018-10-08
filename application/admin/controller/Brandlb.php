<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13/013
 * Time: 14:42
 */

namespace app\admin\controller;

use app\admin\model\BrandLbModel;
use think\Db;

class Brandlb extends  Base
{

    /**
     * [index 服务类型列表]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function index(){
        $key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['name'] = ['like',"%" . $key . "%"];
        }
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('brand_cate')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new BrandLbModel();
        $lists = $user->getBrandLbWhere($map, $Nowpage, $limits);

        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();

    }


    //删除
    public function del_ser()
    {
        $id = input('param.id');
        $ad = new BrandlbModel();
        $flag = $ad->delSer($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }


    /**
     * [add_ad 添加品牌]
     * @return [type] [description]

     */
    public function brandlbadd()
    {
        if(request()->isAjax()){

            $param = input('post.');
            $param['closed'] = 0;
            $ad = new BrandlbModel();
            $flag = $ad->insertAd($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $position = new BrandlbModel();
        $this->assign('position',$position->getAllCate());
        return $this->fetch();

    }



    public function  brandlbEdit(){


        $id = input('param.id');
        $cate = new BrandlbModel();
        $this->assign('cate',$cate->getAllCate());
        // $this->assign('commodity',$cate->getOneArticle($id));
        $aa=$cate->getOneArticle($id);
        //print_r($aa);
        $cate = Db::name('brand_cate')->select();
        $this->assign('cate',$cate);

        $this->assign('aa',$aa);
        return $this->fetch();
    }

    /**
     * [edit_ad 编辑品牌类]
     * @return [type] [description]

     */
    public function updatebrand()
    {
        $ad = new BrandlbModel();
        if(request()->isPost()){

            $param = input('post.');
            $flag = $ad->updater($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $id = input('param.id');
        $this->assign('ad',$ad->getOneAd($id));
        return $this->fetch();
    }


}