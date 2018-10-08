<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Comment extends Controller
{
 /**
  * 师傅评价客户
  */
  public function master_comment($order_number){
  	return view('pingjiakehu');
  }
	

}