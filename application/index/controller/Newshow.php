<?php
//======================================================
//============                        ==================
//============     新闻展示页控制器     ==================
//============                        ==================
//======================================================
namespace app\index\controller;
use think\Db;
class Newshow extends Base{

    public function show($cate_id,$id){ // 文章展示
        $where = ['a.cate_id'=>$cate_id,'a.id'=>$id];
        $news = Db::name('article')->alias('a')->join('article_cate b','a.cate_id = b.id')->where($where)->field('b.name,a.*')->select();
        $this->assign('news',$news);
        return $this->fetch();
    }
}