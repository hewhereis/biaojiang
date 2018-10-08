<?php
// +----------------------------------------------------------------------
// | 标匠	标匠试题管理
// +----------------------------------------------------------------------
// | Copyright (c) 
// +----------------------------------------------------------------------
// | Licensed 
// +----------------------------------------------------------------------
// | Author: 
// +----------------------------------------------------------------------
	
namespace app\admin\controller;
use app\admin\model\ExamModel;
use think\Db;
use think\Request;
class Exam extends Base{
	
	/**
     * [index 试题列表]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
	public function index(){

		$key = input('key');
		$map=[];
		if($key&&$key!=''){
			$map['question'] =['like',"%" . $key . "%"];
		}
		$Nowpage = input('get.page')?input('get.page'):1;
		$limits = config('list_rows');
		$count = Db::name('exam')->where($map)->count();
		$allpage = intVal(ceil($count / $limits));
		$exam = new ExamModel();
		$lists =$exam->getExamWhere($map,$Nowpage,$limits);
		foreach ($lists as $key1 => $value) {
			$tagsid =explode(',', $value['tags']);
			$group_id =explode(',', $value['group_id']);
			$groupname=Db::name('exam_group')->field('group_title')->where('id','in',$group_id)->select();
			$tags=Db::name('exam_tags')->field('tag')->where('id','in',$tagsid)->select();
			$lists[$key1]['tags']='';
			$lists[$key1]['group_id']='';
			foreach($tags as $v){
				$lists[$key1]['tags']='<label class="label label-warning" style="margin:2px;">'.$v['tag'].'</label>'.$lists[$key1]['tags'];
			}
			foreach($groupname as $x){
				$lists[$key1]['group_id']='<label class="label label-danger" style="margin:2px;">'.$x['group_title'].'</label>'.$lists[$key1]['group_id'];
			}
		}
		$this->assign('Nowpage',$Nowpage);
		$this->assign('allpage',$allpage);
		$this->assign('val',$key);
		if(input('get.page')){
			return json($lists);
		}

		return $this->fetch();

	}

	/**
     * [add 添加试题]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
	public function examAdd(){
		
		if(request()->isAjax()){
			$param = input();

			if(!array_key_exists('group_id',$param)){
				$param['group_id']='';
				
			}else{

				$group_id=$param['group_id'];
				$param['group_id']='';
				$param['group_id']=implode(',',$group_id);
			}
			$tags=$param['tags'];
			$param['tags']='';
			$param['tags']=implode(',',$tags);
			$add = new ExamModel();
			$flag = $add-> insterExam($param);
			if($flag){
				
				return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
			}		
		}
		$span[0]['group_title']="暂无数据";
		$span1[0]['tag']="暂无数据";
		$span[0]['id']="0";
		$span1[0]['id']="0";
		$field1=['id','group_title'];
		$field2=['id','tag'];
		$exam_group = Db::name('exam_group')->field($field1)->where('status',1)->select();
		$exam_tags = Db::name('exam_tags')->field($field2)->where('status',1)->select();
		if($exam_group){
			$this->assign('exam_group',$exam_group);
		}else{
			$this->assign('exam_group',$span);
		}
		if($exam_tags){
			$this->assign('exam_tags',$exam_tags);
		}else{
			$this->assign('exam_tags',$span1);
		}
		
		return $this->fetch();
	}


	/**
     * [Del 删除试题]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
	public function examDel(){
		$id = Request::instance()->param('id');
		$del= new ExamModel();
		$flag = $del->examDel($id);
		if($flag){
			return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
		}
	}	

	/**
     * [status 试题状态]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
	public function status(){
		if(request()->isAjax()){
			$id = input('post.id');
			$status = new ExamModel(); 
			$flag = $status->examStatus($id);
			if($flag){
				return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
			} 
		}
	}	

	/**
     * [status 修改考题]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
	public function examEdit(){
		$edit = new ExamModel();
		if(request()->isAjax()){
			$param = input();
			$group_id=$param['group_id'];
			$param['group_id']='';
			$param['group_id']=implode(',',$group_id);
			$tags=$param['tags'];
			$param['tags']='';
			$param['tags']=implode(',',$tags);
			$edit = new ExamModel(); 
			$flag = $edit->examEdit($param);
			if($flag){
				return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
			} 
		}
		$ids=input('param.id');
		$lists = $edit->getOne($ids);
		$span[0]['group_title']="暂无数据";
		$span1[0]['tag']="暂无数据";
		$span[0]['id']="0";
		$span1[0]['id']="0";
		$field1=['id','group_title'];
		$field2=['id','tag'];
		$group_ids=explode(',',$lists['group_id']);
		$tag_ids=explode(',',$lists['tags']);
		$exam_group = Db::name('exam_group')->field($field1)->where('status',1)->select();
		$exam_tags = Db::name('exam_tags')->field($field2)->where('status',1)->select();
		if($exam_group){
			$this->assign('exam_group',$exam_group);
		}else{
			$this->assign('exam_group',$span);
		}
		if($exam_tags){
			$this->assign('exam_tags',$exam_tags);
		}else{
			$this->assign('exam_tags',$span1);
		}
		$this->assign('exam',$lists);
		$this->assign('group_ids',$group_ids);
		$this->assign('tag_ids',$tag_ids);
		return $this->fetch();
	}	
}