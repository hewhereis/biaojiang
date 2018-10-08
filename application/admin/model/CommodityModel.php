<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class CommodityModel extends Model
{
    protected $name = 'commodity';
// 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;
    /**
     * 根据搜索条件获取列表信息
     */
    public function getCommodityWhere($map, $Nowpage, $limits)
    {
     
		
		
		$data = Db::name("commodity")->where($map)->page($Nowpage, $limits)->order('id desc')->select();//或分页查询
		foreach($data as &$val){
		$val['category'] = Db::name('category')->field('name')->where('id','in',$val['c_id'])->select();
		}
		return  $data;
    }

    
    /**
     * 插入信息
     * @param $param
     */
     public function insertCommodity($param)
    {
        try{
           
			$c_id=$param['c_id'];
			$cha=implode(',',$c_id);
			
			$data["name"] = $param['name'];
			$data["img"] = $param['img'];
			$data["status"] =$param['status'];
			$data["c_id"] =$cha;
			
			$result = $this->save($data);
			
			
            if(false === $result){             
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '服务类目添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
	/**
     * [getAllCate 获取全部分类]
     * @author [标匠] [Technical team]
     */
    public function getAllCate()
    {
        return $this->order('id asc')->select();       
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
	 public function updateCommodity($param)
		{
			try{
				
				$c_id=$param['c_id'];
				$cha=implode(',',$c_id);	
				$data["name"] = $param['name'];
				$data["img"] = $param['img'];
				$data["status"] =$param['status'];
				$data["c_id"] =$cha;
				
				$result = $this->allowField(true)->save($data, ['id' => $param['id']]);
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