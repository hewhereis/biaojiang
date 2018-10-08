<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class ExamModel extends Model
{
    protected $name = 'exam';
// 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;
    /**
     * 根据搜索条件获取列表信息
     */
    public function getExamWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)->page($Nowpage, $limits)->order('id desc')->select();
    }

    /**
     * 根据搜索条件获取所有的数量
     * @param $where
     */
    public function getAllCount($where)
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
     public function insterExam($param)
    {
        try{
            $result = $this->allowField(true)->save($param);

            if(false === $result){             
                return ['code' => -1, 'data' =>$this->id, 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '考题添加成功！'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑信息
     * @param $param
     */
	 public function ExamEdit($param)
		{
			try{
				$result = $this->allowField(true)->save($param, ['id' => $param['id']]);
				if(false === $result){          
					return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
				}else{
					return ['code' => 1, 'data' => '', 'msg' => '考题编辑成功'];
				}
			}catch( PDOException $e){
				return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
			}
		}


      /**
     * [getOneArticle 根据id获取一条信息]
     * @author [标匠] [Technical team]
     */
    public function getOne($id)
    {
        return $this->where('id', $id)->find();
    }

     /**
     * 删除信息
     * @param $id
     */
    public function examDel($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '考题删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

     /**
     * 修改状态信息
     * @param $id
     */
    public function examStatus($id)
    {
        try{
            $status = $this->where('id', $id)->value('status');
            if($status==1){
                $this->where('id',$id)->setField(['status'=>0]);
                return ['code' => 1, 'data' => '', 'msg' => '已关闭'];
            }else{
                $this->where('id',$id)->setField(['status'=>1]);
                return ['code' => 2, 'data' => '', 'msg' => '已开启'];
            }

        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

}