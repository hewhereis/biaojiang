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
use think\Controller;
use think\Db;

class Examrecord extends Base{

    public function index(){
        $key = input('key');
        $map= [];
        if($key && $key!=''){
            $map['group_title'] = ['like',"%" . $key . "%"];    
        }
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('exam_group')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new ExamgroupModel();
        $lists = Db::name('exam_group')
                    ->alias('a')
                    ->field('count(b.exam_group_id) as num,max(b.exam_score) as max,min(b.exam_score) as min,a.*')
                    ->join('exam_record b','b.exam_group_id = a.id','LEFT')
                    ->group('a.id')
                    ->where($map)
                    ->page($Nowpage,$limits)
                    ->select();
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
    }
}