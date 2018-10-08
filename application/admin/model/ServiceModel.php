<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class ServiceModel extends Model
{
    protected $name = 'service';
// 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;
    /**
     * 根据搜索条件获取列表信息
     */
    public function getServiceWhere($map, $Nowpage, $limits)
    {
        return $this->field('bj_service.*')->where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }

    /**
     * 根据搜索条件获取所有的数量
     * @param $where
     */
    public function getAllUsers($where)
    {
        return $this->where($where)->count();
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
     * 插入信息
     * @param $param
     */
     public function insertService($param)
    {
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){             
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '服务类型添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑信息
     * @param $param
     */
	 public function updateService($param)
		{
			try{
				$result = $this->allowField(true)->save($param, ['id' => $param['id']]);
				if(false === $result){          
					return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
				}else{
					return ['code' => 1, 'data' => '', 'msg' => '类型编辑成功'];
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
            return ['code' => 1, 'data' => '', 'msg' => '类型删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }
}