<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\DetailsModel;
class Details extends Base
{
   /**
    * 项目故障详情
    * @service_id  判断是哪一个服务类型
    * @id  项目附表ID
    */
   public function repair_details($id){
       $order = new DetailsModel();
       $list = $order->repair_details($id);
       $this->assign('details',json_encode($list));
       return view('details');
   } 
}