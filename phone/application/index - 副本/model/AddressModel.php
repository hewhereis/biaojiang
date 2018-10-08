<?php
namespace app\index\model;
use think\Model;
use think\Db;
class AddressModel extends Model{
	protected $name = 'client_loaction';
	/**
	 * 地址添加到数据表
	 * 
	 */
	public function getaddress($param){
       $data['uid'] = $param['uid'];
       $data['name'] = $param['name'];
       $data['phone'] = $param['phone'];
       $area = explode('-',$param['address_area']);
       $data['province'] = $area[0];
       $data['city'] = $area[1];
       $data['district'] = $area[2];
       $data['location'] = $param['address'];
       $data['default'] = 1;
       //最多添加5个地址
	   if($param['num']>=5){
			return ['code'=>'0','data'=>'','msg'=>'地址最多只能有5个哦！'];
	   }
	   //之前全部的地址都设置成不是默认
	   $info['default'] = 0;
	   $this->where('uid',$param['uid'])->update($info);
       //加入数据表
       $flag = $this->save($data);
       if(empty($flag)){
       	   return ['code'=>0,'data'=>'','msg'=>'添加地址出现点问题哦'];
       }else{
       	   return ['code'=>200,'data'=>'','msg'=>'添加地址成功'];
       }
	}

	/**
	 * 地址管理页面
	 */
	public function address_admin($uid){
		$type = Db::name('users')->where('id',$uid)->value('type');
		if(intval($type) === 1){
			$location = $this->where('uid',$uid)->order('default','desc')->select();
			return $location;
		}else{
			exit;
		}
	}
	/**
	 * 默认地址
	 */
	public function default_address($uid,$id){
       $type = Db::name('users')->where('id',$uid)->value('type');
       //只能是客户
       if(intval($type) === 1){
		 $where = ['default'=>1,'uid'=>$uid];
		 $lid = $this->where($where)->value('id');
		  if($lid != $id){
			$this->save(['default'=>0],['id'=>$lid]);
			$fn = $this->save(['default'=>1],['id'=>$id['id']]);
			if($fn){
				return ['code'=>'200','data'=>'','msg'=>'设置成功！'];
			}else{
				return ['code'=>'0','data'=>'','msg'=>'系统繁忙！'];
			}
		 }else{
			return ['code'=>'200','data'=>'','msg'=>'设置成功！'];
		 }
       }else{
       	exit;
       }
	}
	/**
	 * 删除地址
	 */
	public function delete_address($id){
         $delete = $this->where('id',$id['id'])->delete();
         if($delete){
         	return ['code'=>200,'msg'=>'删除成功'];
         }else{
         	return ['code'=>0,'msg'=>'系统繁忙！'];
         }
	}
	/**
	 * 编辑地址ajax
	 */
	public function edit_address_ajax($param){
		$area = explode(' ',$param['address_area']);
        $param['province'] = $area[0];
        $param['city'] = $area[1];
        $param['district'] = $area[2];
        $param['location'] =$param['location']; 
        $id = $param['id'];
        unset($param['address_area']);
        unset($param['location']);
        unset($param['id']);
        $info = $this->save($param,['id'=>$id]);
        if($info){
        	return ['code'=>200,'msg'=>'编辑成功'];
        }else{
        	return ['code'=>0,'msg'=>'系统错误'];
        }
	}

}