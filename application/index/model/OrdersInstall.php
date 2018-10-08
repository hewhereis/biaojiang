<?php
namespace app\index\model;

use think\Model;
use app\common\model\Location;
use think\Db;
use app\common\model\Orders;

class OrdersInstall extends Model
{

    protected $autoWriteTimestamp = true;

    // 创建时间字段
    protected $createTime = 'created_at';

    // 更新时间字段
    protected $updateTime = 'updated_at';

    public function createInstallation($data)
    {
        $order=10;
        $data=$data['installation'];

        $data['order_id'] = 10;
        $rule=array();
        foreach ($data as $key=>$va){
            if($key=="pre_trans"||$key=="pre_survey"||$key=="requirements"||$key=="requirements"){

            }else if($key=="category"||$key=="commodity"){
                $rule[$key]='require';
            }else{
                $rule[$key]='require';
            }
        }
        $msg = [
            'designation.require'=>'请填写商城名称,designation',
            'contact_name.require'=>'请填写联系人,contact_name',
            'start_at.require'=>'请填写预约开始时间,start_at',
            'contact_phone.require'=>'请填写联系电话,contact_phone',
            'location_ext.require'=>'请填目标安装地址 ,location_ext',
            'location_exta.require'=>'请填目标安装地址 ,location_exta',
            'location_extb.require'=>'请填目标安装地址 ,location_extb',
            'location_extc.require'=>'请填目标安装地址 ,location_extc',
            'brand.require'=>'请填写品牌,brand',
            'category.require'=>'请填写商品大类 ,category',
            'commodity.require'=>'请填写服务小类 ,commodity',
            'trans_address.require'=>'请填写提货地址,trans_address',
            'trans_addressb.require'=>'请填写提货地址,trans_addressb',
            'trans_addressa.require'=>'请填写提货地址,trans_addressa',
            'trans_addressc.require'=>'请填写提货地址,trans_addressc',
            'pre_survey_num.require'=>'请填写勘测单号,pre_survey_num',
            'assistance_mode.require'=>'请选择安装模式,assistance_mode',
            'special_delivery.require'=>'请选择物流提货,special_delivery',
            'self_car.require'=>'请选择是否需要师傅自带板车,self_car',
            'self_deposit.require'=>'请选择是否需要师傅代缴工程押金,self_deposit',

            'Up.require'=>'请选择安装进度计划表,Up',
            'drawings.require'=>'请选择安装图纸,drawings',
            'check_list.require'=>'请选择安装验收单,check_list',

            'self_trash.require'=>'请选择 完工后垃圾处理方式,self_trash',
            'departure_card.require'=>'请选择商场办证,departure_card',
        ];





        $res=$this->allowField(true)->validate($rule,$msg)->save($data);

        if(gettype($res)=="boolean"){
            $ea=explode(",",$this->getError());
            if($ea){

                $das=['code'=>4,'msg'=>$ea[0],'element'=>$ea[1]];
            }
        }else{
            $das=false;
        }


        return $das;
    }

    // 写入订单基本数据
    public function createOrderBase($data)
    {
        $insert = [
            'order_number',
            'owner_id',
            'service_type_id' => 2,
            'owner_name',
            'full_location'
        ];
        $rule = [
        ];
        $model = new Orders();
        if ($model->allowField(true)
            ->auto($insert)
            ->save($data)) {
            return $model;
        }
        return false;
    }
}