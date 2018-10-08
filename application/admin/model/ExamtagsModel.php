<?php
// +----------------------------------------------------------------------
// | 标匠	标匠考题标签数据模型
// +----------------------------------------------------------------------
// | Copyright (c) 
// +----------------------------------------------------------------------
// | Licensed 
// +----------------------------------------------------------------------
// | Author: 
// +----------------------------------------------------------------------

namespace app\admin\model;
use think\model;
use think\Db;

class ExamtagsModel extends Model
{
		//设置该数据模型的默认访问数据表名字
	protected $name = 'exam_tags';

		// 设置开启自动写入时间戳字段
	protected $autoWriteTimestamp = true ;

		// 根据搜索条件查找
			// 当$map为空的时候默认查找全部数据
			// $Nowpage 分页信息 前
			//$limits 分页信息 多少条
	public function getExamTagsWhere($map, $Nowpage, $limits){
		return $this->
		field('bj_exam_tags.*')->
		where($map)->
		page($Nowpage,$limits)->
		order('id ASC')->
		select();
	}


		//添加一条考题标签
	public function insterTags($parm){
		try {
			$flag = $this->allowField(true)->save($parm);
			if($flag==true){
				return ['code'=>1,'data'=>'','msg'=>'添加标签成功'];
			}else{
				return ['code'=>-1,'data'=>'','msg'=>$this->getError()];
			}
			
		} catch (PDOException $e) {
			
			return ['code'=>-2,'data'=>'','msg'=>$e->getMessage()];

		}
	}
		//修改信息
	public function updateTags($pram){
		try {
				$flag= $this->allowField(true)->save($pram,['id'=>$pram['id']]);
				if($flag==true){
					return ['code'=>1,'data'=>'','msg'=>'修改成功'];	
				}else{
					return ['code'=>-1,'data'=>'','msg'=>$this->getError()];	
				}

		} catch (PDOException $e) {
			
				return ['code'=>-2,'data'=>'','msg'=>$this->getMessage()];	
			
		}
	}

		//获取一条考试标签
	public function getOne($id){
		return $this->where('id',$id)->find();
	}

		//删除一条考试标签
	public function delTags($id){
		try {
			$flag = $this->where('id',$id)->delete();
			if($flag){
				return ['code'=>1,'data'=>'','msg'=>'删除成功'];
			}else{
				return ['code'=>-1,'data'=>'','msg'=>$this->getError()];
			}
		} catch (PDOException $e) {
				return ['code'=>-2,'data'=>'','msg'=>$e->getMessage()];
		}
	}
}
