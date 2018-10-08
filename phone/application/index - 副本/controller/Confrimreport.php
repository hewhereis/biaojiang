<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\ConfrimreportModel;
class Confrimreport extends Controller
{
   	/**
   	 * 师傅维修报告页面
   	 */
   	public function master_reports($order_number){
         $lists = new ConfrimreportModel();
         $list = $lists->master_reports($order_number);
         
         $this->assign('list',json_encode($list));
         $this->assign('order_number',$order_number);
         $arr = Db::name('master_report')->where('order_number',$order_number)->find();
         if(empty($arr)){
         	return view('master_reports');
         }else{
         	$update_images = $lists->update_master_reports($order_number);
         	$mentouzhao = $update_images[0]['doorpics'];
         	$qianshoudan = $update_images[0]['signrecvpics'];
         	$quanjing = $update_images[0]['overviewpics'];
         	$details = $update_images[0]['detials'];
         	$update = $update_images['imgs'];
         	$beforepics = $update_images[0]['beforepics'];
         	$afterpics = $update_images[0]['afterpics'];
         	$is_ok = $update_images[0]['is_ok'];
         	$user_sign = $update_images[0]['qianming'];
         	$this->assign('update_images',json_encode($update_images));
         	$this->assign('mentouzhao',json_encode($mentouzhao));
         	$this->assign('qianshoudan',json_encode($qianshoudan));
         	$this->assign('quanjing',json_encode($quanjing));
         	$this->assign('update',json_encode($update));
         	$this->assign('details',json_encode($details));
         	$this->assign('beforepics',json_encode($beforepics));
         	$this->assign('afterpics',json_encode($afterpics));
         	$this->assign('is_ok',json_encode($is_ok));
         	$this->assign('user_sign',json_encode($user_sign));
         	return view('update_master_reports');
         }
         
   	}

	/**
	 * 师傅提交确认报告
	 */
	public function submit_reports(){
      $param = input();
      var_dump($param);
      die;

      $param['wid'] = 22;//session('id');
      $list = new ConfrimreportModel();
      $list = $list->submit_reports($param);
      return json(['code'=>$list['code'],'msg'=>$list['msg']]);
	}
    /**
     * 维修前后的图片加入图片表
     */
    public function img(){
    	$urls = input('post.urls');
    	$data = Db::name('imgs')->insertGetId(['image'=>$urls]);
    	if($data){
            return json(array('code'=>200,'datas'=>$data));
        }else{
             return json(array('code'=>0,'msg'=>'上传图片失败哦'));
        }
    }
    /**
     * 客户维修报告页面
     */
    public function customer_reports($order_number){
    	 $lists = new ConfrimreportModel();
         $list = $lists->master_reports($order_number);
         $img = $lists->customer_img($order_number);
         
         $this->assign('list',json_encode($list));
         $this->assign('order_number',$order_number);
         $this->assign('img',json_encode($img));
         return view('customer_reports');
    }
    /**
     * [customer_reportse description]
     * 签名页面
     * @param  [type] $order_number [description]
     * @return [type]               [description]
     */
    public function customer_reportse($order_number){
    	 $lists = new ConfrimreportModel();
         $list = $lists->master_reports($order_number);
         $img = $lists->customer_img($order_number);
         $this->assign('list',json_encode($list));
         $this->assign('order_number',$order_number);
         $this->assign('img',json_encode($img));
         return view('index');
    }
      //图片上传功能  --- 签名的
    public function submit_reports2(){
      $order=input("post.order");
      $id=input("post.id");
      $res= Db::name("master_report")->where("order_number",$order)->update(['user_sign'=>$id]);
      if($res){
      	$data=["code"=>200,"msg"=>"签字成功"];
      }else{
	    $data=["code"=>400,"msg"=>"签字失败"];
      }
      return json($data);
    }
    /**
     * 客户确认维修报告AJAX
     */
    public function confrim_reports(){
    	$order_number = input('post.order_number');
    	$sign = Db::name('master_report')->where('order_number',$order_number)->field('user_sign')->find();
    	if(empty($sign['user_sign'])){
    		return json(['code'=>0,'msg'=>'请先签字，在提交']);
    	}
    	$data['is_ok']=1;
    	$list = Db::name('master_report')->where('order_number',$order_number)->update($data);
    	if($list || $list==0){
    		return json(['code'=>200,'msg'=>'提交成功']);
    	}else{
            return json(['code'=>0,'msg'=>'提交出现点问题']);
    	}
    }
    /**
     * 维修确认表有问题
     */
    public function problem($order_number){
    	$this->assign('order_number',$order_number);
    	return view('baogaoyouwenti');
    }
    /**
     * 确认表有问题AJAX
     */
    public function problem_ajax(){
    	$param = input();
    	$param['uid'] = session('id');
    	//查询出师傅ID
     	$wid = Db::name('orders')->where('order_number',$param['order_number'])->value('worker_id');
     	$data['message_type'] = 1;
     	$data['source_id'] = $param['uid'];
     	$data['receive_id'] = $wid;
     	$data['content'] = '您的订单客户反馈的内容是：'.$param['content'];
     	$data['link'] = $param['link'];
     	$data['sending_time'] = date('Y-m-d H:i:s',time());
     	$result = Db::name('message_reminder')->insert($data);
     	if(!empty($result)){
     		return ['code'=>200,'msg'=>'反馈成功'];
     	}else{
     		return ['code'=>0,'msg'=>'反馈出现点小问题哦'];
     	 }
    }
    /**
     * 确认码
     */
    public function querenma_ajax(){
    	$param = input();
    	$querm = Db::name('orders')->where('order_number',$param['order_number'])->field('querenma')->find();
    	if($param['querenma']==$querm['querenma']){
    		 $step = Db::name('orders')->where('order_number',$param['order_number'])->field('step_type')->find();
             if($step['step_type']==1){   
               $data['work_step_number']='6';
             }else if($step['step_type']==2){
               $data['work_step_number']='9';
             }
    		$data['end_time'] = time();
    		Db::name('orders')->where('order_number',$param['order_number'])->update($data);
            return json(['code'=>200,'msg'=>'']);
    	}else{
    		return json(['code'=>0,'msg'=>'确认码输入错误']);
    	}
    }
   
}