<?php
namespace app\index\controller;
use think\Controller;
class Indexlp extends Controller
{
    public function liuyanpeishifu(){
        
        return $this->fetch();
    }
    public function qiangdan(){
                
       return $this->fetch();
     }
    public function kehu_zixunzhurenshifu(){
        
      return $this->fetch();
    }
    public function kehu_shigongbaogaoqueren(){
        
      return $this->fetch();
    }
    public function shifu_weixiubaogao(){
        
      return $this->fetch();
    }
    public function shifu_weixiubaogaotianxie(){
        
      return $this->fetch();
    }
    public function hedanbaogao(){
        
      return $this->fetch();
    }
    public function hedanbaogaobiao(){
        
      return $this->fetch();
    }
}