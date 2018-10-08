<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/25/025
 * Time: 16:54
 */

namespace app\admin\model;


use think\Model;
use think\Db;

class EditModel extends  Model
{
    protected  $name='users_recommend';
    public function getAdAll($map, $Nowpage, $limits)
    {
        $join = [
            ['bj_users_worker','bj_users_worker.uid = bj_users_recommend.uid','LEFT'],


        ];
        $data=$this->field('bj_users_recommend.*,bj_users_worker.real_name as u_name')->join($join)->where($map)->page($Nowpage, $limits)->order('bj_users_recommend.id  desc')->select();

        return  $data;

}




    /**
     * [getOneArticle 根据id获取一条信息]
     * @author [标匠] [Technical team]
     */
    public function getserOne($id)
    {
        return $this->where('id', $id)->find();
    }





    /**
     * 编辑信息
     * @param $param
     */
    public function updatebrand($param)
    {
        try{

//            $data["img"] = $param['img'];
//            $data["order"]=$param['order'];
//            $data["introduce"] =$param['content'];


            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);
            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '师傅推荐编辑成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    //删除信息
    /**
     * 删除信息
     * @param $id
     */
    public function delSer($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '类型删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    public function getAllCate()
    {
        return $this->order('id asc')->select();
    }

    /**
     * [getOneArticle 根据id获取一条信息]
     * @author [标匠] [Technical team]
     */
    public function getOneArticle($id)
    {
        return $this->where('id', $id)->find();
    }



    /**
     * 插入信息
     * @param $param
     */
    public function insertAd($param)
    {
        try{
            $data['uid']=$param['uid'];


            $result=$this->save($data);
            if(false === $result){
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



}