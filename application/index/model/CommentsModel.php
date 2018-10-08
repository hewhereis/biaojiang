<?php
namespace app\index\model;
use think\Model;
use think\Db;

class CommentsModel extends Model{

	protected $name = 'order_comments';
    
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;

    public function CommentsAdd($param){
    	
        $flag = $this->allowField(true)->validate('CommentsValidate')->save($param);
        if($flag){
            return ['code'=>'200','data'=>'','msg'=>'评论成功'];
        }
        return ['code'=>'0','data'=>'','msg'=>$this->getError()];
    }

    public function CommentsAddAll($param){
        $rule = [
        'order_id'  => 'require|length:15,25',
        'master_manifestation' => 'require|number|between:-1,1',
        'comments|留言内容' => 'require',    
        'uid' => 'require|number',    
        'owner_id' => 'require|number',    
        'adopt_id' => 'require|number',    
        'username' => 'require',    
        ];
        
        $flag = $this->allowField(true)->validate($rule)->saveAll($param);
        if($flag){
            return ['code'=>'200','data'=>'','msg'=>'评论成功'];
        }
        return ['code'=>'0','data'=>'','msg'=>$this->getError()];
    }
}