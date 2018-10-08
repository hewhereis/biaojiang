<?php

namespace app\admin\controller;
use app\admin\model\GoodsModel;
use app\admin\model\CommodityModel;
use think\Db;

class Goods extends Base
{

    /**
     * [index 商品列表]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function index(){
		$key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['y_id'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('Goods')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new GoodsModel();
        $lists = $user->getGoodsWhere($map, $Nowpage, $limits);
        $arr=Db::name("commodity")->column("id,name"); //获取服务类型列表      
		
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
	    /**
     * [add_ad 添加商品]
     * @return [type] [description]

     */
    public function goodsAdd()
    {
        if(request()->isAjax()){

            $param = input('post.');
            $article = new GoodsModel();
            $flag = $article->insertGoods($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
		$cate = new CommodityModel();
        $this->assign('cate',$cate->getAllCate());
     
        return $this->fetch();
    }
	
	/**
     * [updateArticle 编辑商品]
     * @author [标匠] [Technical team]
     */
    public function goodsEdit()
    {
		$goods = new GoodsModel();
        if(request()->isAjax()){
            $param = input('post.');
            $flag = $goods->updateGoods($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $cate = new CommodityModel();
        $this->assign('cate',$cate->getAllCate());
        $this->assign('goods',$goods->getOneArticle($id));
        return $this->fetch();
    }

	
	
	    /**
     * [ad_state 商品状态]
     * @return [type] [description]

     */
    public function ad_state()
    {
        $id=input('param.id');
        $status = Db::name('goods')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('goods')->where(array('id'=>$id))->setField(['status'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('goods')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }  
    } 
	
	  public function del_ser()
    {
        $id = input('param.id');
        $ad = new GoodsModel();
        $flag = $ad->delSer($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }


    
}