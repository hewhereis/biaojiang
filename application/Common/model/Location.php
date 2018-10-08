<?php 


namespace app\common\model;

use think\Model;

class Location extends Model{
    static $levels = [
        '0' => 'province',
        '1' => 'city',
        '2' => 'country',
        '3' => 'town'
    ];
    public static function getFullLocation($id,$lvl=2){
        return self::get(function() use ($id,$lvl){
            return [self::$levels[$lvl].'_id','eq',$id];
        });
    }
}