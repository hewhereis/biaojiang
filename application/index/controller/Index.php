<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index()
    {
		  /*
		*头部消息
		*/
        $uid=session('id');
		$ds_where['receive_id']=$uid;
		$ds_where['status']='0';
		$carr=Db::name("message_reminder")->where($ds_where)->count();//统计当前登录者未读消息
		$this->assign('carr',$carr);
		
      /**
       * 首页bananer图
       * @var unknown $list
       */
       $list = Db::name('ad')->select();
       $wheres['status']=1;
	   $wheres['closed']=0;
       $num = Db::name('ad')->where($wheres)->count();
       $this->assign('length',$num);
        foreach ($list as $v){
            if($v['status']==1){
                $ad = Db::name('ad')->field('images,id')->where($wheres)->order('orderby desc')->select();
                $m = Db::name('ad')->min('id'); 
            }
        }
        $this->assign('ad',$ad);
        $this->assign('m',$m);
        
          
        /**
         * 首页新闻
         * @var unknown
         */ 
	   $news1 =Db::name('article')->where(['cate_id'=>21,'status'=>1,'is_tui'=>1])->order('views desc')->limit(8)->select();
	   $news2 =Db::name('article')->where(['cate_id'=>2,'status'=>1,'is_tui'=>1])->order('views desc')->limit(8)->select();
	   $news3 =Db::name('article')->where(['cate_id'=>3,'status'=>1,'is_tui'=>1])->order('views desc')->limit(8)->select();
	   $news4 =Db::name('article')->where(['cate_id'=>21,'status'=>1,'is_tui'=>1])->order('views desc')->limit(8)->select();
	   $this->assign('news1',$news1);
	   $this->assign('news2',$news2);
	   $this->assign('news3',$news3);
	   $this->assign('news4',$news4);
	   

	   /**
	    * 服务类型
	    */
 	   $service = Db::name('service')->order('sort')->where('status','1')->select();
       $num =  Db::name('service')->count();
       $this->assign('num',$num);
       $this->assign('service',$service);
 
		 /**
		  *  首页优秀师傅
		  */
	 
		$join = [
            ['bj_users_worker','bj_users_worker.uid = bj_users_recommend.uid','LEFT'],


        ];
        $lists=Db::name('users_recommend')->where('status',1)->field('bj_users_recommend.*,bj_users_worker.real_name as u_name')->join($join)->order('bj_users_recommend.id  desc')->limit(6)->select();
        $this->assign('list',$lists);


		 
 	
		return $this->fetch('index');
    }
	
	public function  defa()
	{
			$service = Db::name('service')->field('id')->order('sort')->where('status','1')->select();
			$id=$service[0]['id'];
			$cate = Db::name('category')->where('find_in_set('.$id.',s_id)')->select();
			
			return json(array('cate'=>$cate,'id'=>$id,'code'=>'200'));
	
	}


	public function  linkage()
	{
		//  获取接收过来的id
		  if(request()->isAjax()){
			 $id =input('post.id');	
			 $arr=array();
				 if($id==2){										
					 $cate_id = Db::name('category')->field('id')->where('find_in_set('.$id.',s_id)')->select();					 
 				  foreach($cate_id as $key=>$val){				     				     
		           $cate = Db::name('commodity')->where('find_in_set('.$val['id'].',c_id)')->select(); 
		           foreach ($cate as $com){
		               $arr[] = $com;  		               
		               }		          
  		           }	 
  		           foreach ($arr as $k=>$v){
  		               $v=join(',',$v); //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
  		               $temp[$k]=$v;
  		           }
  		           $temp=array_unique($temp); //去掉重复的字符串,也就是重复的一维数组
  		           foreach ($temp as $k => $v){
  		               $array=explode(',',$v); //再将拆开的数组重新组装
  		               //下面的索引根据自己的情况进行修改即可
  		               $temp2[$k]['id'] =$array[0];
  		               $temp2[$k]['name'] =$array[1];
  		               $temp2[$k]['img'] =$array[2];  		               
  		           }
					 return json(array('cate'=>$temp2,'code'=>'200'));      
				 }else{
					 $cate = Db::name('category')->where('find_in_set('.$id.',s_id)')->select();
					 return json(array('cate'=>$cate,'code'=>'200'));
				 }   
		 }
	 	 
			
	}
	
	
	
	
	
	
}
