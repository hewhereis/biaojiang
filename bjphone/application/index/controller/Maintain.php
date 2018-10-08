<?php
namespace app\index\controller;
use think\Controller;
class Maintain extends Controller {
  //店铺维修
    public function index() {
        return $this->fetch();
    }
 //订单定标
    public function selection() {

        return $this->fetch("selection");
    }
//新增加项目
    public function page() {
        return $this->fetch("page");
    }
//客户信息
    public function kehuxinxi() {
        return $this->fetch("kehuxinxi");
    }
//筛选师傅
    public function shaixuan() {
        return $this->fetch("shaixuan");
    }
//客户咨询主任师傅
    public function yanzheng() {
        return $this->fetch("yanzheng");
    }
//评价客户
    public function pingjiakehu() {
        return $this->fetch("pingjiakehu");
    }
 //评价师傅
  public function pingjiashifu() {
         return $this->fetch("pingjiashifu");
     }
// 师傅订单状态
    public function shifudingdanzhuanvgtai() {
        return $this->fetch("shifudingdanzhuanvgtai");
    }
//客户订单状态
    public function kehudingdanzhuangtai() {
        return $this->fetch("kehudingdanzhuangtai");
    }

 // 维修报告
     public function weixiubaogao() {
         return $this->fetch("weixiubaogao");
     }
  // 服务信息
      public function fuwuxingxi() {
          return $this->fetch("fuwuxingxi");
      }
  // 服务信息修改
     public function fuwuxingxixiugai() {
          return $this->fetch("fuwuxingxixiugai");
     }
 // 客户首页
    public function kehushouye() {
         return $this->fetch("kehushouye");
    }
 // 我的订单
    public function wodedingdan() {
         return $this->fetch("wodedingdan");
    }
 // 师傅首页
     public function shifushouye() {
          return $this->fetch("shifushouye");
     }
 // 师傅资料
     public function shifuziliao() {
          return $this->fetch("shifuziliao");
     }
 // 诚信保证金
     public function chengxinbaozhengjin() {
          return $this->fetch("chengxinbaozhengjin");
     }
 // 个人信息
     public function gerenxinxi() {
          return $this->fetch("gerenxinxi");
     }
 // 诚信保障金
     public function chengxinbaozheng() {
          return $this->fetch("chengxinbaozheng");
     }
 // 我的钱包
     public function wodeqianbao() {
          return $this->fetch("wodeqianbao");
     }
 // 紧急联系电话
     public function jinjilianxi() {
          return $this->fetch("jinjilianxi");
     }
 // 密码管理
      public function mimaguanli() {
           return $this->fetch("mimaguanli");
      }
 // 修改昵称
      public function nicheng() {
           return $this->fetch("nicheng");
      }
 // 我的银行卡
      public function wideyinhangka() {
           return $this->fetch("wideyinhangka");
      }

}