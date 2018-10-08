<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use app\admin\model\RefundModel;
class Refund extends Controller
{    
    /**
     * [refund_order description]
     * 
     * @return [type] [description]
     */
	public function platom_index(){
		$key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['order_number'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = Db::name('refund_platform')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new RefundModel();
        $lists = $user->platom_index($map, $Nowpage, $limits);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
       return $this->fetch();
	}
	public function platom_index_ajax(){
		$order_number = input('post.order_number');
		$list = Db::name('refund_platform')->where('order_number',$order_number)->update(['status'=>1]);
		if($list || $list==0){
           return json(['code'=>200,'msg'=>'已解决']);
		}else{
           return json(['code'=>0,'msg'=>'提交出现点小问题']);
		}
	}

}