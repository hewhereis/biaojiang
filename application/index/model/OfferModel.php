<?php
namespace app\index\model;
use think\Model;
use think\Db;
class OfferModel extends Model{
    protected $name = 'offer';
    public function tender($param,$uid){               
          
        $data['order_number'][]=$param['order_number'];
		$data['worker_id'][] = $uid;
        $data['tender_cost']=$param['cost'];
        $order_number = $data['order_number'][0];
        unset($data['order_number']);
		unset($data['worker_id']);
        $keys = array_keys($data);        	
        $count1 = count($keys);
        $count2 = count($data[$keys[0]]);        
        for ($i=0; $i < $count2; $i++) {
            for ($j=0; $j < $count1; $j++) {
                $new_arr[$i][$keys[$j]] = $data[$keys[$j]][$i];        
            }
            $new_arr[$i]['order_number'] = $order_number;
			$new_arr[$i]['worker_id'] = $uid;
        }  		
        $this->saveAll($new_arr); 

        $order_number= $param['order_number'];
        $result = DB::name('orders_maintain')->where('order_number',$order_number)->field('service_type_id,l1_category_id,l2_category_id')->find();       
        $datas['worker_id'] = $uid;
        $datas['service_type_id'] = $result['service_type_id'];
        $datas['l1_category_id'] = $result['l1_category_id'];
        $datas['l2_category_id'] = $result['l2_category_id'];
		$where['order_number'] = $order_number;
		$where['worker_id']=$uid;
       $this->where($where)->update($datas);
    }
    /**
     * 咨询下单时，师傅的报价
     */
    public function send($cc,$worker_id,$bb,$money,$order_number,$gettime,$project_time){
        //查询是第几次报价，第一次就是加入数据表，第二次就是更新数据表
        $param = $this->where('order_number',$order_number)->select();
        if(empty($param)){
            $keys = array_keys($cc);          
            $count1 = count($keys);
            $count2 = count($cc[$keys[0]]);        
            for ($i=0; $i < $count2; $i++) {
                for ($j=0; $j < $count1; $j++) {
                    $new_arr[$i][$keys[$j]] = $cc[$keys[$j]][$i];        
                }
                $new_arr[$i]['worker_id'] = $worker_id;
            }       
            $this->saveAll($new_arr);
            /**
             * 加入报价表总表
             */
            $data['order_number']=$order_number;
            $data['worker_id'] = $worker_id;
            $data['totals'] = $bb;
            $data['amount_engineer'] = $money;
            $data['gettime'] = $gettime;
            $data['project_time'] = $project_time;
            Db::name('offer_total')->insert($data);
        }else{
            //查询出主表id
            $ids = Db::name('offer_total')->where('order_number',$order_number)->field('id')->find();
            //找出对应数据表对应的ID
            $id = Db::name('offer')->where('order_number',$order_number)->field('id')->select();
            foreach ($cc as $key => $v) {
                foreach ($v as $k => $vv) {
                    $cc['id'][$k] = $id[$k]['id'];
                }
            }
            $keys = array_keys($cc);          
            $count1 = count($keys);
            $count2 = count($cc[$keys[0]]);        
            for ($i=0; $i < $count2; $i++) {
                for ($j=0; $j < $count1; $j++) {
                    $new_arr[$i][$keys[$j]] = $cc[$keys[$j]][$i];        
                }
                $new_arr[$i]['worker_id'] = $worker_id;
            } 
              $this->saveAll($new_arr);
            $data['order_number']=$order_number;
            $data['worker_id'] = $worker_id;
            $data['totals'] = $bb;
            $data['amount_engineer'] = $money;
            $data['id'] = $ids['id'];
            $data['gettime'] = $gettime;
            $data['project_time'] = $project_time;
            Db::name('offer_total')->update($data);  
        }
    }
}