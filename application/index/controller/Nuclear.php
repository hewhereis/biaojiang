<?php
// +----------------------------------------------------------------------
// | 围板搭建单报告
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://bj-wang.com All rights reserved.
// +----------------------------------------------------------------------
// |2017-10-18
// +----------------------------------------------------------------------
// | Author: <@bj-wang.com>
// +----------------------------------------------------------------------
namespace app\index\controller;
use think\Controller;
use think\Db;
class Nuclear extends Base{
    public function coaming_touching($orderIds){
    	 $orderids = $orderIds;	//接收传入进来的订单号
         // 在订单主表找到该订单是否需要核单报告
		$is_bomb= Db::name('orders')->where('order_number',$orderids)->value('is_bomb');
		if($is_bomb == 1){
			$p = null;
			$list = Db::name('touching_report')->where('order_number',$orderids)->find();
			if($list){
				$where = ['order_number'=>$orderids]; // 设置查找条件
				$tou = Db::name('orders_coaming')->where($where)->find(); // 找出数据
			    //判断是围板还是搭建
		       $coaming= Db('orders_coaming')->where('order_number',$orderids)->field('constructdate,dismantledate')->find();
		       if($coaming['constructdate'] && $coaming['dismantledate']){//围板搭建和拆除
		          $tou['name'] = '围板搭建和拆除';
		         
		       }else if($coaming['constructdate']){
		          $tou['name'] = '围板搭建';
		         
		       }else if($coaming['dismantledate']){
		           $tou['name'] = '围板拆除';
		          
		       }

					$tou['content'] = $list['content'];
					$tou['imagesids'] = $list['imagesids'];
					$tou['signature_id'] = $list['signature_id'];
				
				$p = 1;
			}else{
				$where = ['order_number'=>$orderids]; // 设置查找条件
				$tou = Db::name('orders_coaming')->where($where)->find(); // 找出数据
                 //判断是围板还是搭建
		       $coaming= Db('orders_coaming')->where('order_number',$orderids)->field('constructdate,dismantledate')->find();
		       if($coaming['constructdate'] && $coaming['dismantledate']){//围板搭建和拆除
		          $tou['name'] = '围板搭建和拆除';
		         
		       }else if($coaming['constructdate']){
		          $tou['name'] = '围板搭建';
		         
		       }else if($coaming['dismantledate']){
		           $tou['name'] = '围板拆除';  
		       }
					
			}
			
		}else{
			exit;
		}
		$owner_id = Db::name('orders')->where('order_number',$orderIds)->value('owner_id');
		$this->assign('p',$p);
		$this->assign('ordernumber',$orderIds);
		$this->assign('owner_id',$owner_id);
 		$this->assign('tou',$tou);
    	return view('coaming_touching');
    }
    /**
     * [coaming_uplatetouching description]
     * @param  [type] $order_number [description]
     * @return [type]               [description]
     * 编辑核单报告
     */
	public function coaming_uplatetouching($order_number){
		$orderNumber = $order_number;
		$is_bomb= Db::name('orders')->where('order_number',$orderNumber)->value('is_bomb'); 
		if($is_bomb == 1){
			$where = ['order_number'=>$orderNumber]; // 设置查找条件
			$tou = Db::name('orders_coaming')->where($where)->select(); // 找出数据
			foreach ($tou as $k => $v) {
				//判断是围板还是搭建
		       $coaming= Db('orders_coaming')->where('order_number',$orderNumber)->field('constructdate,dismantledate')->find();
		       if($coaming['constructdate'] && $coaming['dismantledate']){//围板搭建和拆除
		          $tou[$k]['name'] = '围板搭建和拆除';
		         
		       }else if($coaming['constructdate']){
		          $tou[$k]['name'] = '围板搭建';
		         
		       }else if($coaming['dismantledate']){
		           $tou[$k]['name'] = '围板拆除';  
		       }
			}
			
		}else{
			$this->success('index/index');
			return ;
		}

		$list = Db::name('touching_report')->where('order_number',$orderNumber)->select();
		foreach($list as $key=>$value){
			$list[$key]['imagesids'] = explode(',',$list[$key]['imagesids']);
			foreach ($list[$key]['imagesids'] as $k => $v) {
				$list[$key]['imagesids'][$k]=Db::name('imgs')->where('id',$v)->value('image');
			}
		}
		foreach ($tou as $x => $y) {
			$list[$x]['l1_category_name'] = $y['name'];
			
		}	
		$this->assign('list',$list);
		
		return $this->fetch('coaming_uplatetouching');
	}
     /**
      * [coaming_client_touching description]
      * @param  [type] $order_number [description]
      * @return [type]               [description]
      * 客户看到师傅填写的核单报告
      */
	 public function coaming_client_touching($order_number){
		$l = Db::name('touching_report')->where('order_number',$order_number)->select();
		if($l){
			$orderNumber = $order_number;
			$is_bomb= Db::name('orders')->where('order_number',$orderNumber)->value('is_bomb'); 
			if($is_bomb == 1){
				$where = ['order_number'=>$orderNumber]; // 设置查找条件
				$tou = Db::name('orders_coaming')->where($where)->select(); // 找出数据
				foreach ($tou as $k => $v) {
					//判断是围板还是搭建
			       $coaming= Db('orders_coaming')->where('order_number',$orderNumber)->field('constructdate,dismantledate')->find();
			       if($coaming['constructdate'] && $coaming['dismantledate']){//围板搭建和拆除
			          $tou[$k]['name'] = '围板搭建和拆除';
			         
			       }else if($coaming['constructdate']){
			          $tou[$k]['name'] = '围板搭建';
			         
			       }else if($coaming['dismantledate']){
			           $tou[$k]['name'] = '围板拆除';  
			       }
				}
			}else{
				$this->success('index/index');
				return ;
			}
	
			$list = Db::name('touching_report')->where('order_number',$orderNumber)->select();
			foreach ($tou as $x => $y) {
				$list[$x]['l1_category_name'] = $y['name'];
				
			}
			$this->assign('list',$list);
			$this->assign('imgurl',Db::name('signature')->where('id',$list[0]['user_signature_id'])->where('order_number',$list[0]['order_number'])->value('image'));
			return $this->fetch('coaming_client_touching');
		  }else{
			 echo "师傅还没提交";
		  }

		}
}