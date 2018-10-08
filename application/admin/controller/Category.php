<?php

namespace app\admin\controller;
use app\admin\model\CategoryModel;
use app\admin\model\ServiceModel;
use think\Db;

class Category extends Base
{

    /**
     * [index 服务类目列表]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function index(){
		
	
		
		$key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['s_id'] = ['like',"%" . $key . "%"];  
					
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('category')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new CategoryModel();
        $lists = $user->getCategoryWhere($map, $Nowpage, $limits);
        $arr=Db::name("service")->column("id,name"); //获取服务类型列表      
		
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
	    /**
     * [add_ad 添加服务类目]
     * @return [type] [description]

     */
    public function categoryAdd()
    {
        if(request()->isAjax()){

            $param = input('post.');
			if(empty($param['s_id'])){
				
				 return json(array('code'=>-1,'msg'=>'至少选择一个分类'));
			 }
			
            $article = new CategoryModel();
            $flag = $article->insertCategory($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
		$cate = new ServiceModel();
        $this->assign('cate',$cate->getAllCate());
     
        return $this->fetch();
    }
	
	/**
     * [updateArticle 编辑服务类目]
     * @author [标匠] [Technical team]
     */
    public function categoryEdit()
    {
		$category = new CategoryModel();
        if(request()->isAjax()){
            $param = input('post.');
			 if(empty($param['s_id'])){
				
				 return json(array('code'=>-1,'msg'=>'至少选择一个分类'));
			 }
        
            $flag = $category->updateCategory($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }


        $id = input('param.id');
		
        $cate = new ServiceModel();
		$cates = new CategoryModel();
		$list = $cates->getOne($id);
		$s_id=explode(',',$list['s_id']);
	
		$this->assign('s_id',$s_id);
        $this->assign('cate',$cate->getAllCate());
        $this->assign('category',$category->getOneArticle($id));
        return $this->fetch();
    }

	
	
	    /**
     * [ad_state 类目状态]
     * @return [type] [description]

     */
    public function ad_state()
    {
        $id=input('param.id');
        $status = Db::name('category')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('category')->where(array('id'=>$id))->setField(['status'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('category')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }  
    } 
	
	  public function del_ser()
    {
        $id = input('param.id');
        $ad = new CategoryModel();
        $flag = $ad->delSer($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }


    
}