<?php
namespace app\index\controller;

use think\Db;

class Location extends Base
{

    protected $levels = [
        '0' => 'province',
        '1' => 'city',
        '2' => 'country',
        '3' => 'town'
    ];

    public function locationList($pid, $level)
    {
        if(!in_array($level, array_keys($this->levels))){
            die();
        }
        echo  json_encode(Db::name('location_'.$this->levels[$level+1])->field($this->levels[$level+1].'_id'.' id,'.$this->levels[$level+1].'_name'.' name')->where($this->levels[$level].'_id','eq',$pid)->select());
    }
}