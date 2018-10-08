<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\InvoiceModel;
use think\Db;
class Invoice extends Controller
{
	/**
	 * [invoice_liebiao description]
	 * 发票列表页面
	 * @return [type] [description]
	 */
	public function invoice_liebiao(){
        $key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['order_number'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = Db::name('invoice')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new InvoiceModel();
        $lists = $user->invoice_liebiao($map, $Nowpage, $limits);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        if(input('get.page'))
        {
            return json($lists);
        }
		return view('index');
	}

	/**
	 *  点击开票
	 */
	public function invoice_liebiao_ajax(){
		$order_number = input();
		$list = Db::name('orders')->where('order_number',$order_number['order_number'])->update(['fapiao'=>1]);
		$lists = Db::name('invoice')->where('order_number',$order_number['order_number'])->update(['status'=>1]);
		if($list){
			return json(['code'=>200]);
		}
	}
	/**
	 * 退票信息
	 */
	public function invoice_tui(){
		$key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['order_number'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = 10;// 获取总条数
        $count = Db::name('invoice_tui')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new InvoiceModel();
        $lists = $user->invoice_tui($map, $Nowpage, $limits);
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
	 * 退票ajax
	 */
     public function invoice_tui_ajax(){
     	$order_number = input();
		$lists = Db::name('invoice_tui')->where('order_number',$order_number['order_number'])->update(['status'=>1]);
		if($lists){
			return json(['code'=>200]);
		}
     }
}