<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class SurveyModel extends Model
{
    protected $name = 'orders';  
    protected $autoWriteTimestamp = true;   // 开启自动写入时间戳

    /**
     * 根据搜索条件获取勘测订单列表信息
     */
    public function getSurveyWhere($map, $Nowpage, $limits)
    {
		$where['bj_orders.service_type_id']='4';
		$where['bj_orders.worker_id']='0';
		$where['bj_orders.is_del']='0';
		$where['bj_orders.work_del']='0';
		$where['bj_orders.step_type']='5';
		$where['bj_orders.step_number']='1';
		$join = [
				['bj_orders_survey s','s.order_number = bj_orders.order_number','LEFT']
			];
		$field='bj_orders.*,s.brand as s_brand';
        return $this->field($field)->join($join)->where($map)->where($where)->page($Nowpage, $limits)->order('bj_orders.id desc')->select();
    }

    /**
     * 根据搜索条件获取所有的订单数量
     * @param $where
     */
    public function getAllCount($map)
    {	$where['bj_orders.service_type_id']='4';
		$where['bj_orders.worker_id']='0';
		$where['bj_orders.is_del']='0';
		$where['bj_orders.work_del']='0';
		$where['bj_orders.step_type']='5';
		$where['bj_orders.step_number']='1';
        return $this->where($map)->where($where)->count();
    }

	/**
     * 插入信息
     * @param $param
     */
     public function insertInvitation($param)
    {
        try{
			$data['order_number']=$param['order_number'];
			$data['worker_id']=$param['worker_id'];
			$data['price']=$param['cost'];
			
			$map['message_type']='1';
			$map['source_id']='0';
			$map['receive_id']=$param['worker_id'];
			$map['content']='系统给您发来新的订单，请点击查看';
			$map['link']=$param['link'];
			$map['status']='0';
			$map['sending_time']=date("Y-m-d H:i:s");
			
			Db::name('message_reminder')->insert($map);
			
			
            $result = Db::name('survey_invitation_record')->insert($data);
            if(false === $result){             
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 200, 'data' => '', 'msg' => '邀请师傅成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
	
	

  

  

   



}