<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/13/013
 * Time: 15:02
 */

namespace app\admin\model;
use think\Db;

use think\Model;

class BrandLbModel extends  Model
{
    protected $name = 'brand_cate';
// 开启自动写入时间戳字段
   // protected $autoWriteTimestamp = true;
    /**
     * 根据搜索条件获取列表信息
     */
    public function getBrandLbWhere($map, $Nowpage, $limits)
    {
        //return $this->field('bj_brand_cate.*')->where($map)->page($Nowpage, $limits)->order('id desc')->select();
        $data = Db::name("brand_cate")->where($map)->page($Nowpage, $limits)->order('id ')->select();//或分页查询
        return  $data;
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


    /**
     * 插入信息
     * @param $param
     */
    public function insertAd($param)
    {
        try{
           $data['name']=$param['name'];
            $data['status']=$param['status'];

            $result=$this->save($data);
            if(false === $result){
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '品牌类型添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * 根据条件获取列表信息
     * @param $where
     * @param $Nowpage
     * @param $limits
     */
    /*public function getAdAll($map, $Nowpage, $limits)
    {
        return $this->field('bj_ad.*,name')->join('bj_ad_position', 'bj_ad.ad_position_id = bj_ad_position.id')->where($map)->page($Nowpage,$limits)->order('orderby desc')->select();
    }*/
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
     * 编辑信息
     * @param $param
     */
    public function updater($param)
    {
        try{

            $data['id']=$param['id'];
            $data["name"] = $param['name'];

            $result = $this->allowField(true)->save($data, ['id' => $param['id']]);
            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '品牌类编辑成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
}

    /**
     * [getOneArticle 根据id获取一条信息]
     * @author [标匠] [Technical team]
     */
    public function getserOne($id)
    {
        return $this->where('id', $id)->find();
    }
}