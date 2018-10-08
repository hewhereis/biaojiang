<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/26/026
 * Time: 11:42
 */

namespace app\admin\controller;
use app\admin\model\CostModel;
use think\Db;
class Cost  extends Base
{
    public  function  index()
    {


     $list=Db::name('orders')->limit(1)->find();

     $this->assign('list',$list);

       return view();
    }

    //咨询费
    public  function  amount_consulting(){
        if(request()->isAjax()){
            $parama=input();
            $list=new CostModel();
            $list->updateCost1($parama);
            return ['code' => 1, 'data' => '', 'msg' =>'修改成功'];
        }

        $list=Db::name('orders')->limit(1)->find();
        $this->assign('list',$list);
        return $this->fetch();
    }






    //没交保证金平台服务收费比例
    public  function  platform_service(){

        if(request()->isAjax()){
            $parama=input();
            $list=new CostModel();
            $list->updateCost2($parama);
            return ['code' => 1, 'data' => '', 'msg' =>'修改成功'];
        }
        $list=Db::name('orders')->limit(1)->find();

        $this->assign('list',$list);
        return  view();
    }


    //交完保证金之后的平台服务费
    public  function  g_platform_service(){

        if(request()->isAjax()){
            $parama=input();
            $list=new CostModel();
            $list->updateCost3($parama);
            return ['code' => 1, 'data' => '', 'msg' =>'修改成功'];
        }
        $list=Db::name('orders')->limit(1)->find();

        $this->assign('list',$list);
        return  view();
    }

}