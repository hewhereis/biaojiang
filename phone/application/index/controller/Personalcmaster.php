<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/22/022
 * Time: 16:38
 */

namespace app\index\controller;

use app\index\model\PersonalcenterModel;
class Personalcmaster extends Base
{
  public function index(){
      $core = new PersonalcenterModel();
      $uid=session('id');
      $type=session('type');
      $this->assign('customer',$core->customer_home($uid,$type));
      return $this->fetch("index");
  }
}