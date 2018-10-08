<?php
namespace app\index\model;
use think\Model;
class ApimessageModel extends Model
{
   
    protected $name = 'message_reminder';
 
  
    public function new_message($param)
      {
		try{
            $result = $this->save($param);
            if(false === $result){             
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 200, 'data' => '', 'msg' => '消息发送成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
	
      }
 
}