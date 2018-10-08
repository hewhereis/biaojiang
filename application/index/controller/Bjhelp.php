<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28/028
 * Time: 17:06
 */

namespace app\index\controller;


use think\Controller;

class Bjhelp extends Base
{
    public function index()
    {
        return $this->fetch("index");
    }
}