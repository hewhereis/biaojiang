<?php

namespace app\index\model;
use think\Model;

class HelpmasterModel extends Model
{
    protected $name ='common_master';
        // 开启自动写入时间戳
    protected $autoWriteTimestamp = true;

	function initialize()
	{
		parent::initialize();
	}

    public function AddMaster($param){
        $order_number = $param['order_number'];
        $where['order_number'] = $param['order_number'];
        $where['worker_id'] = $param['worker_id'];

        $arr = $this->where($where)->find();
        
        if($arr!=null){
              return ['code' =>-1, 'data' => '', 'msg' =>'不能重复邀请师傅'];
        }else{
            $result = $this->allowField(true)->save($param);
        if($result){
            $list = $this->where('order_number',$order_number)->select();
            return ['code' => 1, 'data' => $list, 'msg' => '邀请成功！'];
        }else{
            return ['code' => 0, 'data' => '', 'msg' => $this->getError()];

          }
        }
        
    }

    public function delectMaster($param){
        $result = $this->where($param)->delete();
        if($result){
            return ['code' => 1, 'data' => '', 'msg' => '删除成功！'];
        }else{
            return ['code' => -1, 'data' => '', 'msg' => $this->getError()];

        }
    }

}