<?php 
namespace app\index\widget;

use think\Controller;
use think\Db;

class Widgets extends Controller{
    
    public function renderCitySelect($data=[]){
        
        $default=[
            'style'=>'form-group col-xs-6 col-sm-4',
            'name'=>['province','city','country'],
        ];
        
        $provinces=Db::name('location_province')->select();
        $this->assign('provinces',$provinces);
        $this->assign('data',array_merge($default,$data));
        return $this->fetch('public/city_select');
    }
}

