<?php
// +----------------------------------------------------------------------
// | 标匠	标匠考题标签
// +----------------------------------------------------------------------
// | Copyright (c) 
// +----------------------------------------------------------------------
// | Licensed 
// +----------------------------------------------------------------------
// | Author: 
// +----------------------------------------------------------------------
namespace app\admin\controller;
use think\Db;
use app\admin\model\ExamtagsModel;

class Examtags extends Base
{

    /**
     * [index 考题标签列表]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function index(){
    	$key = input('key');
        $map = [];
        if($key&&$key!=="")
        {
            $map['name'] = ['like',"%" . $key . "%"];          
        }       
        $Nowpage = input('get.page') ? input('get.page'):1;
        $limits = config('list_rows');// 获取总条数
        $count = Db::name('exam_tags')->where($map)->count();//计算总页面
        $allpage = intval(ceil($count / $limits));
        $user = new ExamtagsModel();
        $lists = $user->getExamTagsWhere($map, $Nowpage, $limits);
        $this->assign('Nowpage', $Nowpage); //当前页
        $this->assign('allpage', $allpage); //总页数 
        $this->assign('val', $key);
        $this->assign('count', $count);
        if(input('get.page'))
        {
            return json($lists);
        }
        return $this->fetch();
    }

    /**
     * [examtags 添加一条考题标签 ]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function add_examtags(){
        if(request()->isAjax()){
            $add = new ExamtagsModel();
            $addContent = input();
            $flag = $add -> insterTags($addContent);
            return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
        }else{
            $this->success('走错路了！',$this->request->domian());
        }
    }


    /**
     * [examtags 修改一条考题标签 ]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function edit_examtags(){
        $edit = new ExamTagsModel();
        if(request()->isAjax()){
            $pram = input();
            $flag = $edit -> updateTags($pram);
            return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
        }
        $id=input('param.id');
        $this->assign('tags',$edit->getOne($id));
        return $this->fetch();
    }

    /**
     * [examtags 删除一条考题标签 ]
     * @return [type] [description]
     * @author [标匠] [Technical team]
     */
    public function del_examtags(){

        $id = input('param.id');
        $del = new ExamTagsModel();
        $flag = $del->delTags($id);
        return json(['code'=>$flag['code'],'data'=>$flag['data'],'msg'=>$flag['msg']]);
    }

    //修改状态
    public function examtags_state(){
        $id = input('param.id');
        //获取当前状态值
        $state = DB::name('exam_tags')->where(array('id'=>$id))->value('status');
           if($state==1){
                $flag = DB::name('exam_tags')->where(array('id'=>$id))->setField(['status'=>0]);
                return json(['code'=>1,'data'=>$flag['datas'],'msg'=>'已关闭']);
           }else{
                $flag =DB::name('exam_tags')->where(array('id'=>$id))->setField(['status'=>1]);
                return json(['code'=>2,'data'=>$flag['data'],'msg'=>'已开启']);
           } 
    }
}
