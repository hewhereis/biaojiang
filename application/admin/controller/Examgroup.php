<?php
// +----------------------------------------------------------------------
// | 标匠	标匠试卷管理
// +----------------------------------------------------------------------
// | Copyright (c) 
// +----------------------------------------------------------------------
// | Licensed 
// +----------------------------------------------------------------------
// | Author: 
// +----------------------------------------------------------------------
namespace app\admin\controller;
use app\admin\model\ExamgroupModel;
use app\admin\model\ExamModel;
use think\Db;
use think\Session;

class Examgroup extends Base{
	/**
     * [index 考试卷列表]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
		public function index(){
			$key = input('key');
	        $map = [];
	        if($key&&$key!=="")
	        {
	            $map['group_title'] = ['like',"%" . $key . "%"];          
	        }       
	        $Nowpage = input('get.page') ? input('get.page'):1;
	        $limits = config('list_rows');// 获取总条数
	        $count = Db::name('exam_group')->where($map)->count();//计算总页面
	        $allpage = intval(ceil($count / $limits));
	        $user = new ExamgroupModel();
			$lists = $user->getExamGroupWhere($map, $Nowpage, $limits);
	        foreach ($lists as $key1 => $value) {
				if($value['subtags']){
					$value['subtags'] = Db::name('exam_tags')->where('id','in',$value['subtags'])->field('tag')->select();
					$string = '';
					foreach($value['subtags'] as $sIndex => $sValue){
						$string.= "<label class='label label-success'>".$sValue['tag']."</label>&nbsp;";
					}
					$value['subtags'] = $string;	
				}else{
					$value['subtags'] = "暂无";
				}
	        	$examNum=0;
	        	$lists[$key1]['exam_ids']='';
					$exam_ids= Db::name('exam')->field('id')->where("find_in_set('{$lists[$key1]["id"]}',group_id)")->where('status',1)->select();
					$examNum =Db::name('exam')->where("find_in_set('{$lists[$key1]["id"]}',group_id)")->where('status',1)->count();
					foreach($exam_ids as $ex){
						$lists[$key1]['exam_ids'] = $ex['id'].','.$lists[$key1]['exam_ids'];
					}

					$dn = $user->updateDs($value);
	        	$examNum =Db::name('exam')->where("find_in_set('{$lists[$key1]["id"]}',group_id)")->where('status',1)->count();
	        	$lists[$key1]['exam_ids'] = $examNum;
	        	$lists[$key1]['author'] = Db::name('admin')->where('id', $lists[$key1]['author'])->value('username');
	        	$lists[$key1]['tags_id'] = "<label class='label label-warning' >".Db::name('exam_tags')->where('id', $lists[$key1]['tags_id'])->value('tag')."</label>";
	        	}
	        $this->assign('Nowpage', $Nowpage); //当前页
	        $this->assign('allpage', $allpage); //总页数 
	        $this->assign('val', $key);
	        if(input('get.page'))
	        {
	            return json($lists);
	        }
	        return $this->fetch();
		}

		/**
	     * [Edit 修改考试卷信息]
	     * @return [type] [description]
	     * @author [标匠] [Technical team]
	     */	
		public function examGroupEdit(){

			$edit = new ExamgroupModel();
			if(request()->isAjax()){
				$p = input();
				$flag = $edit->updateExamgroup($p);
				return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
			}
			$param = input('param.id');
			$exam = $edit->getserOne($param);
			$this->assign('exam',$exam);
			$span1[0]['tag']="暂无数据";
		$span1[0]['id']="0";
		$field2=['id','tag'];
		$exam_tags = Db::name('exam_tags')->field($field2)->where('status',1)->select();
		if($exam_tags){
			$this->assign('exam_tags',$exam_tags);
		}else{
			$this->assign('exam_tags',$span1);
		}
			return $this->fetch();
		}

		/**
	     * [Add 添加考试卷信息]
	     * @return [type] [description]
	     * @author [标匠] [Technical team]
	     */	
		public function examGroupAdd(){

			if(request()->isAjax()){
				$add = new ExamgroupModel();
				$param = input();
				$flag =Db::name('exam_group')->insertGetId($param);
				if($flag){
					return json(['code' => 1, 'data' => $flag, 'msg' => '题组添加成功,正在前往添加试题']);
				}else{
					return json(['code' => 0, 'data' => '', 'msg' => '系统错误']);

				}
 			}
		$span1[0]['tag']="暂无数据";
		$span1[0]['id']="0";
		$field2=['id','tag'];
		$exam_tags = Db::name('exam_tags')->field($field2)->where('status',1)->select();
		if($exam_tags){
			$this->assign('exam_tags',$exam_tags);
		}else{
			$this->assign('exam_tags',$span1);
		}
			return $this->fetch();
		}


		/**
	     * [Del 添加考试卷信息]
	     * @return [type] [description]
	     * @author [标匠] [Technical team]
	     */	
		public function examGroupDel(){
			
			$param = input('param.id');
			$del = new ExamGroupModel();
        	$flag = $del->examGroupDel($param);
        	return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
				
		}


		/**
	     * [status 修改试卷状态信息]
	     * @return [type] [description]
	     * @author [标匠] [Technical team]
	     */	
		public function examGroupStatus(){
			if(request()->isAjax()){
				$status = new ExamgroupModel();				
				$param = input('param.id');
				$flag = $status->status($param);
				return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
 			}
		}


		/**
	     * [status 添加试卷成功后，添加题目]
	     * @return [type] [description]
	     * @author [标匠] [Technical team]
	     */	
		public function lastAdd($id){
		$ids = $id;
		$this->assign('id',$ids);
		$key = input('key');
		$examIds = Db::name('exam_group')->where('id',$ids)->value('exam_ids');
			$examids = explode(',',$examIds);
			array_pop($examids);
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
			$tags=Db::name('exam_tags')->field('tag')->where('id','in',$tagsid)->select();
			$lists[$key1]['tags']='';
			foreach($tags as $v){
				$lists[$key1]['tags']='<label class="label label-warning" style="margin:2px;">'.$v['tag'].'</label>'.$lists[$key1]['tags'];
			}

			$examid=$lists[$key1]['id'];
			if(in_array($examid,$examids)){
				$lists[$key1]['status'] =1;
			}else{
				$lists[$key1]['status'] =0;
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
//-------------------------------------------------------------查看-----------------------------------------
		/**
	     * [status 查看试卷考题信息]
	     * @return [type] [description]
	     * @author [标匠] [Technical team]
	     */	
		public function examGroupLook($id){
			$ids = $id;
			$arr = Db::name('exam_group')->field('exam_ids')->where('id',$ids)->find();
			$exam_ids =explode(',',$arr['exam_ids']);
			array_pop($exam_ids); 
			$examgroupname = Db::name('exam_group')->where('id',$ids)->value('group_title');
			$Nowpage = input('get.page') ? input('get.page'):1;
	       	$limits = config('list_rows');// 获取总条数
	        $count = Db::name('exam')->where('id','in',$exam_ids)->count();//计算总页面
	        $allpage = intval(ceil($count / $limits));
	        $lists = Db::name('exam')->where('id','in',$exam_ids)->page($Nowpage,$limits)->order('orders ASC')->select();
	        $this->assign('Nowpage', $Nowpage); //当前页
	        $this->assign('allpage', $allpage); //总页数
	        $this->assign('examgroupname',$examgroupname);
	        $this->assign('id',$ids);
	        if(input('get.page'))
	        {
	            return json($lists);
	        }
	        return $this->fetch();
		}	

		/**
	     * [examdel 查看试卷考题信息-删除]
	     * @return [type] [description]
	     * @author [标匠] [Technical team]
	     */	
		public function examDel(){
			$examid=input();
			$examidString = Db::name('exam_group')->where('id',$examid['id'])->value('exam_ids');
			$groupidString = Db::name('exam')->where('id',$examid['id2'])->value('group_id');
			$examids = explode(',',$examidString);
			$groupids = explode(',',$groupidString);
			$examidString= '';
			$groupidsString= '';
			array_pop($examids);
			foreach($examids as $k => $v){
				if($v==$examid['id2']){
					unset($examids[$k]);
				}
			}
			foreach($groupids as $k1 => $v1){
				if($v1==$examid['id']){
					unset($groupids[$k1]);
				}
			}
			foreach($examids as $v){
				$examidString = $v.','.$examidString;
			}
			$groupidsString = implode(',',$groupids);
			$flag =  Db::name('exam_group')->where('id',$examid['id'])->update(['exam_ids'=>$examidString]);
			$flag1 =  Db::name('exam')->where('id',$examid['id2'])->update(['group_id'=>$groupidsString]);
			if($flag){
				return json(['code' => 1, 'data' => '', 'msg' => '考题删除成功']);
			}else{
				return json(['code' => 0, 'data' => '', 'msg' => '系统错误']);

			}
		}


		public function groupexamadd(){
			$ids= input('id');
			$this->assign('id',$ids);
			$groupTitle = Db::name('exam_group')->where('id',$ids)->value('group_title');
			$examIds = Db::name('exam_group')->where('id',$ids)->value('exam_ids');
			$examids = explode(',',$examIds);
			array_pop($examids);
			
			$this->assign('titles',$groupTitle);
			$this->assign('id',$ids);
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
				$examid=$lists[$key1]['id'];
				
					if(in_array($examid,$examids)){
						$lists[$key1]['status'] =1;
					}else{
						$lists[$key1]['status'] =0;
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

		public function groupexamaddstatus(){
			$input = input();//接收传过来的值
			$groupids=[];
			$examids = [];
			if(Db::name('exam_group')->where('id',$input['ids'])->value('exam_ids')){
				$examids =array_pop(explode(',',Db::name('exam_group')->where('id',$input['ids'])->value('exam_ids')));
			}
			if(Db::name('exam')->where('id',$input['id'])->value('group_id')){
				$groupids = explode(',',Db::name('exam')->where('id',$input['id'])->value('group_id'));
			}
			$examidstring = '';

			// if(in_array($input['id'],$examids)){
			// 	foreach($examids as $k1 =>$v1){
			// 		if($v1 == $input['id']){
			// 			unset($groupids[$k1]);
			// 		}
			// 	$examidstring = $k1.','.$examidstring;	
			// 	}
			// $flag2 = Db::name('exam_group')->where('id',$input['ids'])->update(['exam_ids'=>$examidstring]);
			// }else{
			// 	$examidstring = Db::name('exam_group')->where('id',$input['ids'])->value('exam_ids');
			// 	$examidstring = $input['id'].','.$examidstring;
			// 	$flag2 = Db::name('exam_group')->where('id',$input['ids'])->update(['exam_ids'=>$examidstring]);
			// }

			if(in_array($input['ids'],$groupids)){
				foreach($groupids as $k =>$v){
					if($v == $input['ids']){
						unset($groupids[$k]);
					}
				}
				$groupidString = implode(',',$groupids);
				$flag = Db::name('exam')->where('id',$input['id'])->update(['group_id'=>$groupidString]);
				if($flag){
					return json(['code' => 1, 'data' => '', 'msg' => '考题关闭成功']);
				}
			}else{
				$groupids[] = $input['ids'];
				$groupidString = implode(',',$groupids);
				$flag = Db::name('exam')->where('id',$input['id'])->update(['group_id'=>$groupidString]);
				if($flag){
					return json(['code' => 2, 'data' => '', 'msg' => '考题添加成功']);
				}
			}
		}

		public function lastaddstatus(){
			$input = input();//接收传过来的值
			// var_dump($input);
			$groupids=[];
			$examids =[];
			$test = Db::name('exam_group')->where('id',$input['ids'])->value('exam_ids');
			if($test!==''){
				$examids =explode(',',$test);
				array_pop($examids);
			}
			if(Db::name('exam')->where('id',$input['id'])->value('group_id')){
				$groupids = explode(',',Db::name('exam')->where('id',$input['id'])->value('group_id'));
			}
			$examidstring = '';
			if(in_array($input['id'],$examids)){
				foreach($examids as $k1 =>$v1){
					if($v1 == $input['id']){
						unset($groupids[$k1]);
					}
				$examidstring = $k1.','.$examidstring;	
				}
			$flag2 = Db::name('exam_group')->where('id',$input['ids'])->update(['exam_ids'=>$examidstring]);
			}else{
				$examidstring = Db::name('exam_group')->where('id',$input['ids'])->value('exam_ids');
				$examidstring = $input['id'].','.$examidstring;
				$flag2 = Db::name('exam_group')->where('id',$input['ids'])->update(['exam_ids'=>$examidstring]);
			}

			if(in_array($input['ids'],$groupids)){
				foreach($groupids as $k =>$v){
					if($v == $input['ids']){
						unset($groupids[$k]);
					}
				}
				$groupidString = implode(',',$groupids);
				$flag = Db::name('exam')->where('id',$input['id'])->update(['group_id'=>$groupidString]);
				if($flag){
					return json(['code' => 1, 'data' => '', 'msg' => '考题关闭成功']);
				}
			}else{
				$groupids[] = $input['ids'];
				$groupidString = implode(',',$groupids);
				$flag = Db::name('exam')->where('id',$input['id'])->update(['group_id'=>$groupidString]);
				if($flag){
					return json(['code' => 2, 'data' => '', 'msg' => '考题添加成功']);
				}
			}
		}
		// 添加考试选择
		public function addexamgroupselect(){
			return $this->fetch();
		}

		public function addrandomgroup(){
			
			if(request()->isAjax()){
				$param = input();
				$param['tags_id'] = Config('examConfig')['randomTag'];
				$param['subtags'] = implode(',',$param['subtags']);
				$randomGroup = new ExamgroupModel();
				$flag = $randomGroup->addRandomExamGroup($param);
				return json($flag);
			}
			$span1[0]['tag']="暂无数据";
			$span1[0]['id']="0";
			$field2=['id','tag'];
			$exam_tags = Db::name('exam_tags')->field($field2)->where('status',1)->select();
			$this->assign('randomTag',Config('examConfig')['randomTag']);
			if($exam_tags){
				$this->assign('exam_tags',$exam_tags);
				
			}else{
				$this->assign('exam_tags',$span1);
			}
			
			return $this->fetch();
		}

		public function randomexamgroupedit($id){
			if(request()->isAjax()){
				$param = input();
				$param['subtags'] = implode(',',$param['subtags']);
				$randomGroup = new ExamgroupModel();
				$flag = $randomGroup->randomexamgroupedit($param);
				return json($flag);
			}
			$exam_tags = Db::name('exam_tags')->field('id,tag')->select();
			$this->assign('exam_tags',$exam_tags);
			$this->assign('randomTag',Config('examConfig')['randomTag']);
			$where = ['id'=>$id];
			$list = Db::name('exam_group')->where($where)->find();
			$list['subtags'] = explode(',',$list['subtags']);
			$this->assign('exam',$list);
			return $this->fetch();
		} 


}