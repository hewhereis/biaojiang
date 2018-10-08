<?php
namespace app\index\validate;
use think\Validate;
class IndexsValidate extends Validate{
	protected $rule = [
       		['phone','require|number|min:6'],
       		['birth','require'],
       		['email','email']
       	];
	// protected $message =  [
    // 'phone.require' => '名称必须',
	// 	];
}