<?php
//-----------------------------------------
//@project 核单报告
//@time    2017-11-17
//-----------------------------------------


namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\NuclearModel;
class Nuclear extends Controller
{
	/**
	 * [master_nuclear description]
	 * 师傅填写核单报告
	 * @order_number 订单号
	 * @return [type] [description]
	 */
   public function master_nuclear($order_number){
   	    $list = new NuclearModel();
   	    $list = $list->master_nuclear($order_number);
   	    $this->assign('order_number',$order_number);
   	    $this->assign('result',json_encode($list));
        return $this->fetch();
   }
   /**
    * 师傅提交过来的AJAX
    */
   public function submit_nuclear(){
   	   $param = input();
   	   $list = new NuclearModel();
   	   $list = $list->submit_nuclear($param);
       return json(['code'=>$list['code'],'msg'=>$list['msg']]);
   }
    /**
     * 客户看到的核单报告页面
     */
    public function customer_nuclear($order_number){
    	$list = new NuclearModel();
    	$list = $list->customer_nuclear($order_number);
    	$this->assign('order_number',$order_number);
    	$this->assign('result',json_encode($list));
        return $this->fetch();
    }
    /**
     * 客户提交的签名AJAX
     */
    public function submit_sign(){
    	$param = input();
    	$order_number = $param['order_number'];
    	$user_signature_id = Db::name('touching_report')->where('order_number',$order_number)->field('user_signature_id')->select();

      if($user_signature_id[0]['user_signature_id']){
        $data['is_ok'] = 1;
        Db::name('touching_report')->where('order_number',$order_number)->update($data);
        $list = new NuclearModel();
        $list = $list-> submit_sign($order_number);
        return json(['code'=>200,'msg'=>'提交成功']);
      }else{
        return json(['code'=>0,'msg'=>'你还没有签名']);
      }
    }
    /**
     * 客户报告有问题
     */
    public function report_error($order_number){
    	$this->assign('order_number',$order_number);
    	return view('baogaoyouwenti');
    }
    /**
     * [feedback description]
     * 客户反馈内容
     * @return [type] [description]
     */
    public function feedback(){
        $param = input();
        $param['uid'] = session('id');
        $list = new NuclearModel();
        $list = $list->feedback_message($param);
        return json(['code'=>$list['code'],'msg'=>$list['msg']]);
    }
    /**
     * 客户签字
     */
    public function nuclear_sign($order_number){

      $this->assign('order_number',$order_number);
      return view('index');
    }
    /**
     * 客户签字ajax
     */
    public function nuclear_sign_ajax(){
       $order=input("post.order");
       $id=input("post.id");
       $res= Db::name("touching_report")->where("order_number",$order)->update(['user_signature_id'=>$id]);
       if($res){
         $data=["code"=>200,"msg"=>"签字成功"];
       }else{
         $data=["code"=>400,"msg"=>"签字失败"];
      }
      return json($data);
    }
}