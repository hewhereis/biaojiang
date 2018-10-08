<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class GoodsModel extends Model
{
    protected $name = 'goods';
// 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;
    /**
     * 根据搜索条件获取列表信息
     */
    public function getGoodsWhere($map, $Nowpage, $limits)
    {
		$join = [
				['bj_commodity','bj_goods.y_id = bj_commodity.id']
				
				
			];
		return $this->field('bj_goods.*,bj_commodity.name as s_name')->join($join)->where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }

    
    /**
     * 插入信息
     * @param $param
     */
     public function insertGoods($param)
    {
        try{
            $result = $this->allowField(true)->save($param);
			
			
			
            if(false === $result){             
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '商品添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
	  /**
     * [getOneArticle 根据id获取一条信息]
     * @author [标匠] [Technical team]
     */
    public function getOneArticle($id)
    {
        return $this->where('id', $id)->find();
    }

	
    /**
     * 编辑信息
     * @param $param
     */
	 public function updateGoods($param)
		{
			try{
				$result = $this->allowField(true)->save($param, ['id' => $param['id']]);
				if(false === $result){          
					return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
				}else{
					return ['code' => 1, 'data' => '', 'msg' => '商品分类编辑成功'];
				}
			}catch( PDOException $e){
				return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
			}
		}


      /**
     * [getOneArticle 根据id获取一条信息]
     * @author [标匠] [Technical team]
     */
    public function getserOne($id)
    {
        return $this->where('id', $id)->find();
    }

     /**
     * 删除信息
     * @param $id
     */
    public function delSer($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '分类删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
}