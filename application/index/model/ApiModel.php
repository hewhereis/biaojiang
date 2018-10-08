<?php
namespace app\index\model;
use think\Model;
class ApiModel extends Model
{
    protected $autoWriteTimestamp = true;
    protected $name = 'users_worker';
 
   public function get_folder_name()
      {
          return ['1' => 'ids', '2' => 'company_logo', '3' => 'company_license', '4' => 'legal_person','5'=>'touching','6'=>'signature'];
      }
 
}