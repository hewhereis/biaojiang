<?php
namespace app\common\model;


use think\Model;
use think\Db;

class Commodity extends Model{
    
    public static function getCommodityByPid($pid){
        $where[]=['exp',"FIND_IN_SET($pid,s_id)"];
        $where['status']=1;
        return Db::name('category')->where($where)->select();
    }
    
    public static function getCommodity(){
        return Db::name('commodity')->field('id,name')->select();
    }
    public static function goods(){
        return Db::name('goods')->where('y_id','3')->select();
    }
}