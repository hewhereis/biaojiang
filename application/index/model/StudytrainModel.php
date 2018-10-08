<?php

namespace app\index\model;
use think\model;

class StudytrainModel extends model{

	//设置开启自动写入时间戳
    protected $autoWriteTimestamp = true;
    //操作数据表名
	protected $name = 'exam_record';

	public function getStudytrain($map,$page,$limits){
		return $this->where($map)->page($page, $limits)->order('id')->select();
	}
}