<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/9/009
 * Time: 8:23
 */

namespace app\admin\controller;
use app\admin\model\BrandLbModel;
use think\Db;

use app\admin\model\BrandModel;

class Brand extends Base
{
    //商品显示
    /*public function index(){

       $a= new BrandModel();
       $list= $a->chaxun();
       $this->assign('list',$list);
       //return $this->fetch();
       return  view();
    }*/
    public function index(){



        $key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['brand'] = ['like',"%" . $key . "%"];

        }
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('brand_list')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new BrandModel();
        $lists = $user->getBrandWhere($map, $Nowpage, $limits);


        $arr=Db::name("brand_cate")->column("id,name"); //获取服务类型列表

        // $data = Db::name("category")->where($map)->page($Nowpage, $limits)->order('id desc')->select();//或分页查询
        // foreach($data as &$val){
        // $val['service'] = Db::name('service')->field('name')->where('id','in',$val['s_id'])->select();
        // }
        //print_r($data);

        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数
        $this->assign("search",$arr);
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
        $ad = new BrandModel();
        $flag = $ad->delSer($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }







    /**
     * [add_ad 添加商品分类]
     * @return [type] [description]

     */
    public function brandAdd()
    {
        if(request()->isAjax()){

            $param = input('post.');
            if(empty($param['c_id'])){

                return json(array('code'=>-1,'msg'=>'至少选择一个分类'));
            }
            $article = new BrandModel();
            $flag = $article->insertBrand($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $cate = new BrandModel();
        $this->assign('cate',$cate->getAllCate());


        $cate = Db::name('brand_cate')->select();
        $this->assign('cate',$cate);

        return $this->fetch();
    }


    /**
     * [updateArticle 编辑商品分类]
     * @author [标匠] [Technical team]
     */
    public function brandEdit()
    {
        $commodity = new BrandModel();
        if(request()->isAjax()){
            $param = input('post.');
            if(empty($param['c_id'])){

                return json(array('code'=>-1,'msg'=>'至少选择一个分类'));
            }
            $flag = $commodity->updatebrand($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');

        $cate = new BrandLbModel();
        $cates = new BrandModel();
        $list = $cates->getOne($id);
        $s_id=explode(',',$list['c_id']);

        $this->assign('s_id',$s_id);
        $this->assign('cate',$cate->getAllCate());
        $this->assign('commodity',$commodity ->getOneArticle($id));
        return $this->fetch();
    }




    /**
     * [ad_state 类目状态]
     * @return [type] [description]

     */
    public function ad_state()
    {
        $id=input('param.id');
        $status = Db::name('commodity')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('commodity')->where(array('id'=>$id))->setField(['status'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('commodity')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    }




}