<?php 
namespace app\index\validate;
use think\Validate;
/*
	评论验证
*/
class CommentsValidate extends Validate{
	 protected $rule =   [
        'order_id'  => 'require|length:15,25',
        'service_attitude'   => 'require|float|between:0,5',
        'work_quality' => 'require|float|between:0,5',    
        'work_speed' => 'require|float|between:0,5',
        'work_speed' => 'require|float|between:0,5',
        'master_manifestation' => 'require|number|between:-1,1',
        'comments|留言内容' => 'require',    
        'uid' => 'require|number',    
        'owner_id' => 'require|number',    
        'adopt_id' => 'require|number',    
        'username' => 'require',    
    ];

}