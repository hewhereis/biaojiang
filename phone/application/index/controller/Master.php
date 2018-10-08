<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use app\index\model\MasterModel;
class Master extends Base
{
	/**
	 * 师傅个人资料
	 */
	public function master_information($wid,$order_number,$dd){
		$param = input();
		if(empty($param['start'])){
        $getmaster = new MasterModel();
        $masters = $getmaster->master_information($wid);//师傅个人资料

		$master = new Api();
		$master = $master->all_score($wid);//师傅的综合评分

        $datas = $getmaster->datas($wid);
        //查找全部评论数
	    $all = Db::name('order_comments')->where('adopt_id',$wid)->count();
	    //查找好评数量
	    $good =  Db::name('order_comments')->where('adopt_id='.$wid. '&& master_manifestation=1')->count();
	    //查找中评数量
	    $secondary =  Db::name('order_comments')->where('adopt_id='.$wid. '&& master_manifestation=0')->count();
	    //查找差评数量
	    $bad =  Db::name('order_comments')->where('adopt_id='.$wid. '&& master_manifestation=-1')->count();
	    //默认全部评论
	    $defaults = $getmaster->all_commit($wid);
	    //查找图片
	    $tupian = $getmaster->tupian($wid);
	   
	    //查看咨询费用
	    if($dd==3){
	    	$consult_pay = Db::name('orders')->where('order_number',$order_number)->value('amount_consulting');
	    	
	    	$this->assign('consult_pay',$consult_pay);
	    }else{
           $this->assign('consult_pay','');
	    }
		$this->assign('master',json_encode($master));
		$this->assign('masters',json_encode($masters));
		$this->assign('datas',json_encode($datas));
		$this->assign('all',json_encode($all));
		$this->assign('good',json_encode($good));
		$this->assign('secondary',json_encode($secondary));
		$this->assign('bad',json_encode($bad));
		$this->assign('defaults',json_encode($defaults));
		$this->assign('wid',$wid);
		$this->assign('dd',$dd);
		$this->assign('order_number',$order_number);
		return view('shifuxingxi');
	  }else{
	  	     $datas['adopt_id']=$wid;
             $total =Db::name('order_comments')->where($datas)->count();
             $totals=$total;
             $start=$param['start'];
             $defaults=Db::name('order_comments')->where($datas)->order('create_time desc')->limit($start,6)->select(); 
             foreach ($defaults as $key => $value) {
	    	   $defaults[$key]['create_time'] = date('Y-m-d H:i',$value['create_time']);
	         }
             return(array( 'result'=>$defaults,'status'=>1, 'totals'=>$totals ,'msg'=>'获取成功！'));
	    }
	}
	/**
	 * 全部评论
	 */
	public function getComment(){
		$param = input();
		$getmaster = new MasterModel();
		$list = $getmaster->getcomment($param);
		return json($list);
	}
}