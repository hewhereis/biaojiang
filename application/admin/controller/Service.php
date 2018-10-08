<?php

namespace app\admin\controller;
use app\admin\model\ServiceModel;
use think\Db;

class Service extends Base
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
        $count = Db::name('service')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new ServiceModel();
        $lists = $user->getServiceWhere($map, $Nowpage, $limits);
         
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
     * [add_ad 添加服务类型]
     * @return [type] [description]

     */
    public function serviceAdd()
    {
        if(request()->isAjax()){

            $param = input('post.');
            $article = new ServiceModel();
            $flag = $article->insertService($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

     
        return $this->fetch();
    }
	
	/**
     * [updateArticle 编辑服务类型]
     * @author [标匠] [Technical team]
     */
    public function serviceEdit()
    {
		$service = new ServiceModel();
        if(request()->isAjax()){
            $param = input('post.');
            $flag = $service->updateService($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $this->assign('service',$service->getserOne($id));
        return $this->fetch();
    }

	
	
	    /**
     * [ad_state 类型状态]
     * @return [type] [description]

     */
    public function ad_state()
    {
        $id=input('param.id');
        $status = Db::name('service')->where(array('id'=>$id))->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('service')->where(array('id'=>$id))->setField(['status'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('service')->where(array('id'=>$id))->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }  
    } 
	
	  public function del_ser()
    {
        $id = input('param.id');
        $ad = new ServiceModel();
        $flag = $ad->delSer($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }


    
}