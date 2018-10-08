<?php

namespace app\admin\controller;
use app\admin\model\UserModel;
use app\admin\model\UserType;
use think\Db;

class User extends Base
{

    /**
     * [index 用户列表]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function index(){

        $key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['username'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('admin')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new UserModel();
        $lists = $user->getUsersByWhere($map, $Nowpage, $limits);
        foreach($lists as $k=>$v)
        {
            $lists[$k]['last_login_time']=date('Y-m-d H:i:s',$v['last_login_time']);
        }    
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
    }


    /**
     * [userAdd 添加用户]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function userAdd()
    {
        if(request()->isAjax()){

            $param = input('post.');
            $param['password'] = md5(md5($param['password']) . config('auth_key'));
            $user = new UserModel();
            $flag = $user->insertUser($param);
            $accdata = array(
                'uid'=> $user['id'],
                'group_id'=> $param['groupid'],
            );
            $group_access = Db::name('auth_group_access')->insert($accdata);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $role = new UserType();
        $this->assign('role',$role->getRole());
        return $this->fetch();
    }


    /**
     * [userEdit 编辑用户]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function userEdit()
    {
        $user = new UserModel();

        if(request()->isAjax()){

            $param = input('post.');
            if(empty($param['password'])){
                unset($param['password']);
            }else{
                $param['password'] = md5(md5($param['password']) . config('auth_key'));
            }
            $flag = $user->editUser($param);
            $group_access = Db::name('auth_group_access')->where('uid', $user['id'])->update(['group_id' => $param['groupid']]);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        $id = input('param.id');
        $role = new UserType();
        $this->assign([
            'user' => $user->getOneUser($id),
            'role' => $role->getRole()
        ]);
        return $this->fetch();
    }


    /**
     * [UserDel 删除用户]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function UserDel()
    {
        $id = input('param.id');
        $role = new UserModel();
        $flag = $role->delUser($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }



    /**
     * [user_state 用户状态]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function user_state()
    {
        $id = input('param.id');
        $status = Db::name('admin')->where('id',$id)->value('status');//判断当前状态情况
        if($status==1)
        {
            $flag = Db::name('admin')->where('id',$id)->setField(['status'=>0]);
            return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
        }
        else
        {
            $flag = Db::name('admin')->where('id',$id)->setField(['status'=>1]);
            return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
        }
    
    }
//    订单管理
    public function adduser_sa(){
        $key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['bj_orders.order_number'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('orders')->where($map)->where('bj_orders.status','2')->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
		$where['a.status']='2';
		$field='a.*';
		$list=Db::name("orders")->alias('a')->field($field)->where($where)->where($map)->page($Nowpage, $limits)->order('a.id desc')->select();  
		foreach($list as $k=>$v)
        {
            $list[$k]['create_time']=date('Y-m-d H:i:s',$v['create_time']);
        }  	
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($list);
        }
        return $this->fetch();
    }
    public function adduser_saxiusa(){
        $m=input("get.m");
        if(empty($m)){
            $m=1;
        }
        $flag= Db::table('bj_orders')
            ->where('status','<',4)->where('status',">",1)
            ->page("$m,10")
            ->select();
        if(!empty(input("post.key"))){
            $flag=array();
            $order=input("post.key");
            $where['order_number']=$order;
            $flag = Db::name('orders')->where($where)->select();
            
        }
        foreach ($flag as $key=>$va){
            $flag[$key]['start_time']=date("Y-m-d H:i:s",$flag[$key]['start_time']);
        }
        return json($flag);
    }
    public function adduser_saxiu(){
        $id=input("post.id");
      
       $list=Db::name("orders")->field('step_type')->where('id',$id)->find(); 
	   if($list['step_type']==1){
				$data['status'] = 3;
                $data['master_status'] = 3;
                $data['step_number'] =6;
                $data['work_step_number'] =2;
				$ds_order=Db::name("orders")->where('id',$id)->update($data);
				if($ds_order){
					return ['code' => 200, 'data' => '', 'msg' => 'OK'];
				}else{
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}
	   }else if($list['step_type']==2){
				$data['status'] = 3;
                $data['master_status'] = 3;
                $data['step_number'] =6;
                $data['work_step_number'] =5;
				$ds_order=Db::name("orders")->where('id',$id)->update($data);
				if($ds_order){
					return ['code' => 200, 'data' => '', 'msg' => 'OK'];
				}else{
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}
		   
	   }else if($list['step_type']==3){
				$data['status'] = 3;
                $data['master_status'] = 3;
                $data['step_number'] =6;
                $data['work_step_number'] =2;
				$ds_order=Db::name("orders")->where('id',$id)->update($data);
				if($ds_order){
					return ['code' => 200, 'data' => '', 'msg' => 'OK'];
				}else{
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}
		   
	   }else if($list['step_type']==4){
				$data['status'] = 3;
                $data['master_status'] = 3;
                $data['step_number'] =6;
                $data['work_step_number'] =5;
				$ds_order=Db::name("orders")->where('id',$id)->update($data);
				if($ds_order){
					return ['code' => 200, 'data' => '', 'msg' => 'OK'];
				}else{
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}
		   
	   }else if($list['step_type']==5){
				$data['status'] = 3;
                $data['master_status'] = 3;
                $data['step_number'] =3;
                $data['work_step_number'] =2;
				$ds_order=Db::name("orders")->where('id',$id)->update($data);
				if($ds_order){
					return ['code' => 200, 'data' => '', 'msg' => 'OK'];
				}else{
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}
		   
	   }else if($list['step_type']==6){
				$data['status'] = 3;
                $data['master_status'] = 3;
                $data['step_number'] =6;
                $data['work_step_number'] =2;
				$ds_order=Db::name("orders")->where('id',$id)->update($data);
				if($ds_order){
					return ['code' => 200, 'data' => '', 'msg' => 'OK'];
				}else{
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}
		   
	   }else if($list['step_type']==7){
				$data['status'] = 3;
                $data['master_status'] = 3;
                $data['step_number'] =6;
                $data['work_step_number'] =5;
				$ds_order=Db::name("orders")->where('id',$id)->update($data);
				if($ds_order){
					return ['code' => 200, 'data' => '', 'msg' => 'OK'];
				}else{
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}
		   
	   }
	   else if($list['step_type']==8){
				$data['status'] = 3;
                $data['master_status'] = 3;
                $data['step_number'] =6;
                $data['work_step_number'] =2;
				$ds_order=Db::name("orders")->where('id',$id)->update($data);
				if($ds_order){
					return ['code' => 200, 'data' => '', 'msg' => 'OK'];
				}else{
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}
		   
	   }
	   else if($list['step_type']==9){
				$data['status'] = 3;
                $data['master_status'] = 3;
                $data['step_number'] =6;
                $data['work_step_number'] =5;
				$ds_order=Db::name("orders")->where('id',$id)->update($data);
				if($ds_order){
					return ['code' => 200, 'data' => '', 'msg' => 'OK'];
				}else{
					return ['code' => 0, 'data' => '', 'msg' => '-1'];
				}
		   
	   }
	  
       
   


    }

}