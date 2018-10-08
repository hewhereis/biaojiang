<?php
namespace app\index\model;
use think\Model;
use think\Db;
class MasterModel extends Model{
    protected $name = 'master_report';
    public function add_report($param){ 

        $data['beforepics']=$param['dimg'];
        $data['afterpics']=$param['eimg'];
        $data['detials'] = $param['details'];
        $order_number = $param['order_number'];
        unset($data['order_number']);
        $keys = array_keys($data);        	
        $count1 = count($keys);
        $count2 = count($data[$keys[0]]);        
        for ($i=0; $i < $count2; $i++) {
            for ($j=0; $j < $count1; $j++) {
                $new_arr[$i][$keys[$j]] = $data[$keys[$j]][$i];        
            }
            $new_arr[$i]['order_number'] = $order_number;
        }  	
        $this->saveAll($new_arr);
        
        $datas['itemname']=$param['project_name'];
        $datas['worker_id']=$param['worker_id'];
        $datas['contactofcus']=$param['store_contact'];
        $datas['address']=$param['project_address'];
        $datas['phoneofcus']=$param['phone_number_of_the_contact'];
        $datas['company']=$param['construction_company'];
        $datas['master']=$param['Construction_contact'];
        $datas['finish_time']=strtotime($param['end_time']);
        $datas['master_phone']=$param['construction_contact_number'];
        $datas['doorpics']=$param['img0'];
        $datas['signrecvpics']=$param['img1'];
        $datas['overviewpics']=$param['img2'];

       $list =  $this->where('order_number='.$order_number)->update($datas);
         if(empty($list)){
                      return ['code' => 0, 'data' => '', 'msg' => '-1'];
                 }else{
                    return ['code' => 200, 'data' => '', 'msg' => '提交成功'];
                 }
    }
}