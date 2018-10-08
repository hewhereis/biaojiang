<?php
//======================================================
//============                        ==================
//============     学习培训控制器     ==================
//============                        ==================
//======================================================

namespace app\index\controller;
use think\Controller;
use think\Db;
use app\Common\model\GetModel;
use app\index\model\StudytrainModel;

class Studytrain extends Base{
    
    public function _initialize()
    {
        parent::_initialize();
        $id = session('id');        
        $type = GetModel::getUser($id,'type');//获取类型
        if($type != 2){
            echo "您不是师傅";
            exit;
        }

    }

    /**
     * [index 标匠学习中心]
     * @return [view] []
     */
    public function index(){
        $id = GetModel::getSessionId();
        $masterinfo = Db::name('users')->where('id',$id)->value('img');//获取头像
            $num =Db::name('exam_record')->where('uid',$id)->count();//考试次数
            $Gwhere= ['uid'=>$id,'exam_score'=>['>=','60']];
            $Gnum =Db::name('exam_record')->where($Gwhere)->count();//通过次数
            $examTag = Db::name('exam_tags')->select();
            $this->assign('tag',$examTag);//考题标签
            $this->assign('headerImg',$masterinfo);//头像
            $this->assign('num',$num);//次数
            $this->assign('Gnum',$Gnum);//次数
    	return $this->fetch();
    }

    /**
     * [exam_select 考试选择]
     * @return [lists] [json] [考题标题和id]
     */
    public function exam_select(){
    	$id = GetModel::getSessionId();
    	$type = GetModel::getUser($id,'type');//获取类型

    		$masterinfo = Db::name('users')->where('id',$id)->value('img');//获取头像
            $num =Db::name('exam_record')->where('uid',$id)->count();//考试次数
            $Gwhere= ['uid'=>$id,'exam_score'=>['>=','60']];
    		$Gnum =Db::name('exam_record')->where($Gwhere)->count();//通过次数
            $examTag = Db::name('exam_tags')->select();
            $this->assign('tag',$examTag);//考题标签
    		$this->assign('headerImg',$masterinfo);//头像
            $this->assign('num',$num);//次数
    		$this->assign('Gnum',$Gnum);//次数

            $key = input();
            // var_dump($key);
            $map['level']='';
            $map['tags_id']='';
            if($key&&$key!==''){    
                if($key['tags_id']!=''){
                    $map['tags_id'] = $key['tags_id'];
                }
                if($key['level']!=''){
                    $map['level'] = $key['level'];
                }
            }
            $this->assign('level2',$map['level']);
            $this->assign('tags_id',$map['tags_id']);
            $page = input('page') ? input('page'):1;
            $limits = 5;
            if($map['level']=='' || $map['tags_id']==''||$map['level']==-1 || $map['tags_id']==-1){
                $map='';
            }
            $count = Db::name('exam_group')->where($map)->count();//计算总个数
            $allpage = intval(ceil($count / $limits));//计算分几页
            $this->assign('count',$allpage);
            $lists = Db::name('exam_group')->field('id,group_title')->where($map)->page($page, $limits)->order('id')->select();
            if(input('page')){
                return json($lists);
            }
    		return $this->fetch();

    }

    /*
        [proceed_exam($examGroupId)][进行考试]
    */
        public function proceed_exam($examGroupId){
            $id = GetModel::getSessionId();
            if(request()->isAjax()){
            $addwhere=['uid'=>$id,'exam_group_id'=>input('proceed_exam'),'create_time'=>time()];
            $examRecordId=Db::name('exam_record')->insertGetId($addwhere);
                $scort = 0;
                $param = input();
                // exit;
                $exam = Db::name('exam_group')->where('id',input('proceed_exam'))->value('exam_ids');//当前题组信息
                $examids = explode(',',$exam);//列出题目id
                array_pop($examids);sort($examids);//排序 
                foreach(json_decode($param['data']) as $key => $value){
                    // var_dump($value);
                    // echo $key;
                    foreach($examids as $k => $v){
                        // var_dump($v);
                        // var_dump($k);
                        $examidsK = $k+1;
                        if($key == $examidsK) {
                            $Correct = Db::name('exam')->where('id',$v)->value('correct');//找到该题的答案
                            if($value == $Correct){
                                $scort = $scort+1;
                            }
                        }
                    }
                }
                
                if($scort != 0){
                    $scort = floor($scort/count($examids)*100);
                }else{
                   $scort =0;
                }

                if($scort>=0 || $scort<=100){
                    $flag = Db::name('exam_record')->where('id',$examRecordId)->update(['exam_score'=>$scort]);
                    if($flag){
                        return json(['code'=>200,'data'=>$scort,'msg'=>'交卷成功']);
                    }else{
                        return json(['code'=>0,'data'=>$scort,'msg'=>'交卷成功']);
                    }
                }

                exit;
            }
            $realName = GetModel::getUser($id,'real_name');//找出真是姓名
            $headimg = GetModel::getUser($id,'img');//查询出头像
            $this->assign('realname',$realName);//真实姓名
            $this->assign('headimg',$headimg);//头像
            $examGroupType = Db::name('exam_group')->where('id',$examGroupId)->value('type');
            $exam = Db::name('exam_group')->where('id',$examGroupId)->find();//当前题组信息

            if($exam['exam_ids']=='' && $exam['type']!=2){
                // return json(["code"=>302,"data"=>'',"msg"=>'当前试卷还没题目,我们会尽快添加,感谢您的支持!'])
                 $this->success('当前试卷还没题目,我们会尽快添加,感谢您的支持!', '/studytrain/exam_select');
            }
            exit;
            if($examGroupType == 2){

                $infos = Db::name('exam_group')->field('subtags,examnum')->where('id',$examGroupId)->find();
                $infos['subtags'] = explode(',',$infos['subtags']);
                $exam['count'] =$infos['examnum'];//计算个数
                $allExams = Db::name('exam')->where('tags','in',$infos['subtags'])->select();
                if($exam['count'] >= count($allExams) ){
                    $infos['examnum'] = count($allExams);
                }
                $exam['count'] = count($allExams);
                shuffle($allExams);
                foreach($allExams as $ks=>$vs){
                    $allExam[$ks] = $vs;
                }
                $firstExam =  $allExam[0];
            }else{
                
                $examids = explode(',',$exam['exam_ids']);//列出题目id
                array_pop($examids);sort($examids);//排序 
                $exam['count'] =count($examids);//计算个数
                $exam['exam_ids'] =$examids;
                $firstExam = Db::name('exam')->where('id',$examids['0'])->find();//找到第一题
                $allExam = Db::name('exam')->where('id','in',$examids)->select();//找到全部的题
                
            }
                $this->assign('firstExam',$firstExam);//第一个题目
                $this->assign('exam',$exam);//题组
                $this->assign('allExam',json_encode($allExam));//题组
                $this->assign('ids',$examGroupId);//题组id
            return $this->fetch();
        }

        public function Examsuccess($s){
            $s = input();
            $this->assign('s',$s['s']-1000000001);
            return $this->fetch();
        }

        public function proceed_exam_select($examGroupId,$o){
            $this->assign('ordernumber',$o);
            $id = GetModel::getSessionId();
            if(request()->isAjax()){
            $addwhere=['uid'=>$id,'exam_group_id'=>input('proceed_exam'),'create_time'=>time()];
            $examRecordId=Db::name('exam_record')->insertGetId($addwhere);
                $scort = 0;
                $param = input();
                // var_dump($param);
                $exam = Db::name('exam_group')->where('id',input('proceed_exam_select'))->value('exam_ids');//当前题组信息
                $examids = explode(',',$exam);//列出题目id
                array_pop($examids);sort($examids);//排序 
                //[$value == 用户传过来的答案 || $key 和 $k == 题序]
                foreach(json_decode($param['data']) as $key => $value){
                    foreach($examids as $k => $v){
                        $examidsK = $k+1;
                        if($key == $examidsK) {
                            $Correct = Db::name('exam')->where('id',$v)->value('correct');//找到该题的答案
                            if($value == $Correct){
                                $scort = $scort+1;
                            }
                        }
                    }
                }
                $info = Db::name('orders')->where('order_number',$o)->field('service_type_id')->find();
                $scort = floor($scort/count($examids)*100);
                if($scort<60){
                    return json(['code'=>100,'data'=>$scort, 'service'=>$info['service_type_id'], 'msg'=>'抱歉你的考试不及格!']);
                }else{
                    return json(['code'=>200,'data'=>$scort,'service'=>$info['service_type_id'], 'msg'=>'恭喜您通过了测试！']);

                }
                exit;
                
            }
            $realName = GetModel::getUser($id,'real_name');//找出真是姓名
            $headimg = GetModel::getUser($id,'img');//查询出头像
            $this->assign('realname',$realName);//真实姓名
            $this->assign('headimg',$headimg);//头像
            $exam = Db::name('exam_group')->where('id',$examGroupId)->find();//当前题组信息
            $examids = explode(',',$exam['exam_ids']);//列出题目id
            array_pop($examids);sort($examids);//排序 
            $exam['count'] =count($examids);//计算个数
            $exam['exam_ids'] =$examids;
            $firstExam = Db::name('exam')->where('id',$examids['0'])->find();//找到第一题
            $allExam = Db::name('exam')->where('id','in',$examids)->select();//找到全部的题
            $this->assign('firstExam',$firstExam);//个数
            $this->assign('exam',$exam);//题组
            $this->assign('allExam',json_encode($allExam));//题组
            $this->assign('ids',$examGroupId);//题组id
            return $this->fetch();

        }
}