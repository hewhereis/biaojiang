<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/26/026
 * Time: 14:58
 */

namespace app\admin\model;
use think\Db;
use  think\Model;
class CostModel extends  Model
{     protected $name = 'orders';
    /**
     * 编辑信息
     * @param $param
     */
    public function updateService($param)
    {

        try{
           $result = $this->allowField(true)->save($param, ['id' => $param['id']]);

            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '类型编辑成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    public  function  updateCost1($parama){


            $data=$parama['name'];
            $list=$this->field('id')->select();

            foreach ($list as  $k=>$v){
                $ds_do=$this->where('id', $v['id'])->update(['amount_consulting' => $data]);
            }
            if(false==$ds_do){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑成功'];
            }






    }


    public  function  updateCost2($parama){


        $data=$parama['name'];
        $list=$this->field('id')->select();

        foreach ($list as  $k=>$v){
            $result=$this->where('id', $v['id'])->update(['platform_service' => $data]);
        }
        if(false === $result){
            return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
        }else{
            return ['code' => 1, 'data' => '', 'msg' => '编辑成功'];
        }
    }
    public  function  updateCost3($parama){


        $data=$parama['name'];
        $list=$this->field('id')->select();

        foreach ($list as  $k=>$v){
            $result=$this->where('id', $v['id'])->update(['g_platform_service' => $data]);
        }
        if(false === $result){
            return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
        }else{
            return ['code' => 1, 'data' => '', 'msg' => '编辑成功'];
        }
    }










}