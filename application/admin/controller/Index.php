<?php
namespace app\admin\controller;
use think\Config;
use think\Loader;
use think\Db;
/**
* 后台主页控制器
*/
class Index extends Base
{
	
	/**
     * [indexPage 后台首页]
     * @author [标匠] [Technical team]
     */

	function index()
	{
		return $this->fetch('/index');
	}
	public function indexPage()
    {
       ;
        return $this->fetch('index');
    }
	
	 /**
     * 清除缓存
     */
    public function clear() {
        if (delete_dir_file(CACHE_PATH) || delete_dir_file(TEMP_PATH)) {
            return json(['code' => 1, 'msg' => '清除缓存成功']);
        } else {
            return json(['code' => 0, 'msg' => '清除缓存失败']);
        }
    }
	
	
	

	
}