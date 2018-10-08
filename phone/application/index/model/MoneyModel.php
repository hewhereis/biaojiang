<?php
namespace app\index\model;
use think\Model;
use think\Db;

class MoneyModel extends Model
{
     protected $name = 'offer';
	public function money($pars,$uid,$total,$totals){
      
        $order_number = $pars['order_number'];
        foreach ($pars['mei'] as $index=>$value){
         $qian['tender_cost'][$index]=$value;
        }

         $param = $this->where('order_number',$order_number)->select();
         if(empty($param)){
            $keys = array_keys($qian);          
            $count1 = count($keys);
            $count2 = count($qian[$keys[0]]);        
            for ($i=0; $i < $count2; $i++) {
                for ($j=0; $j < $count1; $j++) {
                    $new_arr[$i][$keys[$j]] = $qian[$keys[$j]][$i];        
                }
                $new_arr[$i]['worker_id'] = $uid;
                $new_arr[$i]['order_number'] = $order_number;
            }    
            $this->saveAll($new_arr);
            /**
             * 加入报价表总表
             */
            $data['order_number']=$order_number;
            $data['worker_id'] = $uid;
            $data['totals'] = $totals;
            $data['amount_engineer'] = $total;
            $data['gettime'] = 1;
            Db::name('offer_total')->insert($data);
        }else{
           //先删除数据表数据
           Db::name('offer')->where('order_number',$order_number)->delete();
           Db::name('offer_total')->where('order_number',$order_number)->delete();
             $keys = array_keys($qian);          
            $count1 = count($keys);
            $count2 = count($qian[$keys[0]]);        
            for ($i=0; $i < $count2; $i++) {
                for ($j=0; $j < $count1; $j++) {
                    $new_arr[$i][$keys[$j]] = $qian[$keys[$j]][$i];        
                }
                $new_arr[$i]['worker_id'] = $uid;
                $new_arr[$i]['order_number'] = $order_number;
            }    
            $this->saveAll($new_arr);
            /**
             * 加入报价表总表
             */
            $data['order_number']=$order_number;
            $data['worker_id'] = $uid;
            $data['totals'] = $totals;
            $data['amount_engineer'] = $total;
            $data['gettime'] = 1;
            Db::name('offer_total')->insert($data);
        }
 
    }
	


}