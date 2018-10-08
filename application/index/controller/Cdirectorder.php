<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28/028
 * Time: 15:05
 */

namespace app\index\controller;
use app\admin\controller\User;
use think\Controller;
use think\Config;
use app\index\model\Users;
use think\Db;


class Cdirectorder extends Base
{
    public function index()
    {
        return $this->fetch("index");
    }
}