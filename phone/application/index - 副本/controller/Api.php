<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Api extends Controller{
     //品牌
     public	function brand(){
        $brand = Db::name('brand_list')->field('id as value,brand as title')->limit(30)->select();
        return $brand;
	}
	//商品大类
	public	function category(){
        $category = Db::name('category')->field('id as value,name as title')->select();
        return $category;
	}
	//商品小类
	public	function commodity(){
        $commodity = Db::name('commodity')->field('id as value,name as title')->select();
        return $commodity;
	}
	//故障概况
	public	function goods(){
       $goods = Db::name('goods')->field('id as value,name as title')->select();
        return $goods;
	}
	/**
	 * 判断是不是缴纳保证金  税率  平台服务费
	 */
	public function getcash($uid){
         //查询发票税率
         $rate = Db::name('config')->where('id',5)->field('value')->find();
         //查询出师傅的平台服务费用
         $platform_service = Db::name('config')->where('id',3)->field('value')->find();//没交保证金的平台服务费
         $platform_services = Db::name('config')->where('id',4)->field('value')->find();//交完保证金的平台服务费
         //查看有没有缴纳保证金
         $cash = Db::name('users_worker')->where('uid',$uid)->field('guarantee')->find();
         if(!empty($cash['guarantee'])){
             $price = $platform_services['value']+$rate['value'];
         }else{
             $price = $platform_service['value']+$rate['value'];
         } 
         return $price;
	}
    /**
     * 师傅综合评分
     * [all_score description]
     * @param  [type] $wid [description]
     * @return [type]      [description]
     */
     public function all_score($wid){
        //查询师傅的综合评分
        $total_core=null;
        $core = Db::name('order_comments')->where('adopt_id',$wid)->field('work_quality,work_speed,service_attitude')->select();
        //师傅接单收到评价的个数
        $num = Db::name('order_comments')->where('adopt_id',$wid)->count();
        foreach ($core as  $val){
          $total_core+=$val['work_quality']+$val['work_speed']+$val['service_attitude'];
        }
        
        if(!empty($num)){
             $master['score'] =round($total_core/$num/3,2);
          }else{
             $master['score']="";
          }
        return $master;
    }



    //  接单数量
    public  function count($worker_id){
        $count = Db::name('orders')->where("worker_id",'=',$worker_id)->count();
        return $count;
    }
    //  师傅技能 id
    public  function work_skill($in){
            $work_skill = Db::name('skills')->field('id as value,skill as title')->where('id','in',$in)->select();
        return $work_skill;
    }
    //  师傅技能 name
    public  function work_skills($name){
            $work_skill = Db::name('skills')->field('id as value,skill as title')->where('skill','like',$name)->find();
        return $work_skill;
    }
    //  服务类型
    public  function service_type_id($in){
            $service_type_id = Db::name('service')->field('id as value,name as title')->where('id','in',$in)->select();
        return $service_type_id;
    }
//  服务类型
    public  function service_type_idss($in){
        $service_type_id = Db::name('service')->field('id as value,name as title')->where('name','like',"%$in%")->find();
        return $service_type_id;
    }
    
    public  function work_skillw(){
        $work_skill = Db::name('skills')->field('id as value,skill as title')->select();
        return $work_skill;
    }
    public  function service_type_ids(){
        $work_skill = Db::name('service')->field('id as value,name as title')->select();
        return $work_skill;
    }
    /**
      * 数组重组
      */
     public function getArray($data,$order_number,$money){
        $keys = array_keys($data);          
        $count1 = count($keys);
        $count2 = count($data[$keys[0]]);        
        for ($i=0; $i < $count2; $i++) {
            for ($j=0; $j < $count1; $j++) {
                $new_arr[$i][$keys[$j]] = $data[$keys[$j]][$i];        
            }
            $new_arr[$i]['order_number'] = $order_number;
            $new_arr[$i]['signature_id'] = $money;
            $new_arr[$i]['create_time'] = time();
        }
        return $new_arr;
     }




       public function submit_reports1(){
        $img=input("post.img");
        $order=input("post.order");

        $time = time();
        $file_data = $img;   
        $folder_id = 6;
        $file_id = $order;
        $types=20; 
         
        $folder_name_array = ['1' => 'ids', '2' => 'company_logo', '3' => 'company_license', '4' => 'legal_person','5'=>'touching','6'=>'signature'];
         // 目录参数只允许这几种
         if( !array_key_exists($folder_id, $folder_name_array) ){
             return json(array('code' => '0', 'msg' => '文件目录不对'));
            return FALSE;
         }
       
        // 文件夹名
        $folder_name = $folder_name_array[$folder_id];
         if (!isset($file_data) || !$file_data) {
             return json(array('code' => '0', 'msg' => '文件不存在'));
             return FALSE;
         }


        // 上传目录路径                    
         $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/';

         $response = json(array('code' => '0', 'msg' =>''));

        // 匹配出图片的格式
       
            // 文件类型
            
            $type = '.png';
            
            // 判断文件类型是否符合要求
            

            //检查是否有该文件夹，如果没有就创建，并给予权限
            if (!file_exists($upload_path)) {
                mkdir($upload_path, 0777);

            }
            $upload_path =ROOT_PATH.'public/'. 'uploads/'. $folder_name .'/'.date('Ymd',$time).'/';
                if(!file_exists($upload_path)){
                    mkdir($upload_path, 0777);
                }
            //文件名                                                                                    
            $file_name = 'biaojiang'.session("id").$types.'_'.md5($time.'f'.$file_id) . ".{$type}";
            
            // 完整路径
            $full_path = $upload_path . $file_name ;               
            $image_url = 'uploads/'.$folder_name .'/'.date('Ymd',$time).'/'. $file_name;  
                          
            // 上传文件                                
            if (file_put_contents($full_path,base64_decode($file_data)))  {
                // 上传成功
                $ids = Db::name('signature')->insertGetId(['image'=>$image_url,'order_number'=>$file_id]);
                if($ids){
                    return json(array('code' => '200', 'msg' => '上传成功','ids' => $ids));
                }
                return json(array('code' => '0', 'msg' => '上传失败'));    
            } else {
                // 错误信息
                return json(array('code' => '0', 'msg' => '上传失败'));    
            }
        }
    
}