<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Query;
class SelectsModel extends Model{
    protected $name = 'orders_maintain';
    public function selects($offer,$order_number){
  
        $arr=array();
        $data = array();
        foreach($offer as $v){
          $data[] = $v;      
        }        
           $order_number = $data['order_number'][0];
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
       
        $this->where('order_number',$order_number)->update($new_arr);
    }
}