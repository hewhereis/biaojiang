<?php
namespace app\index\model;
use think\Model;
class TextModel extends Model{
	protected $name = 'aa';

	public function add($param){
      try{
            $result =  $this->allowField(true)->validate('IndexsValidate')->save($param);
            if(false === $result){               
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '1fdsfds'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
	}
}