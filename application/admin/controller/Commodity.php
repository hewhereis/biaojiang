<?php

namespace app\admin\controller;
use app\admin\model\CategoryModel;
use app\admin\model\CommodityModel;
use think\Db;

class Commodity extends Base
{

    /**
     * [index 商品分类列表]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function index(){
		$key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['c_id'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('commodity')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new CommodityModel();
        $lists = $user->getCommodityWhere($map, $Nowpage, $limits);
        $arr=Db::name("category")->column("id,name"); //获取服务类型列表      
		
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
     * [add_ad 添加商品分类]
     * @return [type] [description]

     */
    public function commodityAdd()
    {
        if(request()->isAjax()){

            $param = input('post.');
			if(empty($param['c_id'])){
				
				 return json(array('code'=>-1,'msg'=>'至少选择一个分类'));
			 }
            $article = new CommodityModel();
            $flag = $article->insertCommodity($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
		$cate = new CategoryModel();
        $this->assign('cate',$cate->getAllCate());
     
        return $this->fetch();
    }
	
	/**
     * [updateArticle 编辑商品分类]
     * @author [标匠] [Technical team]
     */
    public function commodityEdit()
    {
		$commodity = new CommodityModel();
        if(request()->isAjax()){
            $param = input('post.');
			if(empty($param['c_id'])){
				
				 return json(array('code'=>-1,'msg'=>'至少选择一个分类'));
			 }
            $flag = $commodity->updateCommodity($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $cate = new CategoryModel();
		$cates = new CommodityModel();
		$list = $cates->getOneArticle($id);
		$c_id=explode(',',$list['c_id']);
		$this->assign('c_id',$c_id);
        $this->assign('cate',$cate->getAllCate());
        $this->assign('commodity',$commodity->getOneArticle($id));
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
	
	  public function del_ser()
    {
        $id = input('param.id');
        $ad = new CommodityModel();
        $flag = $ad->delSer($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }


    
}