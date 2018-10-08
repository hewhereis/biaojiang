<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class ExamgroupModel extends Model
{
    protected $name = 'exam_group';
// 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;
    /**
     * 根据搜索条件获取列表信息
     */
    public function getExamGroupWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)->page($Nowpage, $limits)->order('id desc')->select();
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
     public function insterExamgroup($param)
    {
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){             
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '试卷添加成功，您可以查看进行添加题目'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 编辑信息
     * @param $param
     */
	 public function updateExamgroup($param)
		{
            
			try{
				$result = $this->allowField(true)->save($param, ['id' => $param['id']]);
				if(false === $result){          
					return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
				}else{
					return ['code' => 1, 'data' => '', 'msg' => '试卷编辑成功'];
				}
			}catch( PDOException $e){
				return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
			}
		}

        public function updateDs($param){
            
           $data['exam_ids']=' ';
            $aa= $this->where('id',$param['id'])->update($data);
            $data['exam_ids']=$param['exam_ids'];
            $aa= $this->where('id',$param['id'])->update($data);    
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
     * [getExamIds 根据id获取一卷试卷的考题ids信息]
     * @author [标匠] [Technical team]
     */
    public function getExamIds($id)
    {
        return $this->field('exam_ids')->where('id', $id)->select();
    }

     /**
     * 删除信息
     * @param $id
     */
    public function examGroupDel($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '试卷删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

     /**
     * 修改状态信息
     * @param $id
     */
    public function status($id)
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

    public function addRandomExamGroup($param){
        $flag = $this->allowField(true)->save($param);

       if($flag){
        return ['code' => 200, 'data' => '', 'msg' => "添加成功"];
       }
       return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
    }

    public function randomexamgroupedit($param){
        $flag = $this->allowField(true)->update($param);

        return ['code' => 200, 'data' => '', 'msg' => "修改成功"];

    }
}