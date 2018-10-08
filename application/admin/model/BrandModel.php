<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/9/009
 * Time: 8:29
 */

namespace app\admin\model;
use think\Model;
use think\Db;

class BrandModel extends Model
{ protected $name = 'brand_list';
// 开启自动写入时间戳字段
    //protected $autoWriteTimestamp = true;
    /**
     * 根据搜索条件获取列表信息
     */
    public function getBrandWhere($map, $Nowpage, $limits)
    {

        $data = Db::name("brand_list")->where($map)->page($Nowpage, $limits)->order('id ')->select();//或分页查询
        foreach($data as &$val){
            $val['service'] = Db::name('brand_cate')->field('name')->where('id','in',$val['c_id'])->select();
        }
        return  $data;

    }
    // 定义关联方法
    public function comm()
    {
        return $this->hasMany('Brand_cate','id','c_id');
    }


    /**
     * 删除信息
     * @param $id
     */
    public function delSer($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '品牌删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }





    /**
     * 插入信息
     * @param $param
     */
    public function insertBrand($param)
    {
        try{

            $c_id=$param['c_id'];
            $cha=implode(',',$c_id);

            $data["brand"] = $param['name'];
            $data['information']=$param['information'];
            $data["img"] = $param['img'];
            $data["status"] =$param['status'];
            $data["c_id"] =$cha;

            //$result = $this->save($data);
            $result=$this->save($data);

            if(false === $result){
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '品牌添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }


    /**
     * 编辑信息
     * @param $param
     */
    public function updatebrand($param)
    {
        try{

            $c_id=$param['c_id'];
            $cha=implode(',',$c_id);
            $data["brand"] = $param['name'];
            $data["img"] = $param['img'];
            $data["status"] =$param['status'];
            $data["information"] =$param['content'];
            $data["c_id"] =$cha;

            $result = $this->allowField(true)->save($data, ['id' => $param['id']]);
            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '品牌编辑成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [getOneArticle 根据id获取一条信息]
     * @author [标匠] [Technical team]
     */
    public function getOne($id)
    {
        return $this->where('id', $id)->find();
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
     * [getAllCate 获取全部分类]
     * @author [标匠] [Technical team]
     */
    public function getAllCate()
    {
        return $this->order('id asc')->select();
    }
}










