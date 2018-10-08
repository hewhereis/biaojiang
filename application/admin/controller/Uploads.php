<?php

namespace app\admin\controller;
use think\Controller;
use think\File;
use think\Request;
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;
use Qiniu\Storage\UploadManager;

class Uploads extends Controller
{
	//图片上传
    public function upload(){
       $file = request()->file('file');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/images');
       if($info){
            echo $info->getSaveName();
        }else{
            echo $file->getError();
        }
    }

    //会员头像上传
    public function uploadface(){
       $file = request()->file('file');
       $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/face');
       if($info){
            echo $info->getSaveName();
        }else{
            echo $file->getError();
        }
    }
	
	     //处理上传的主方法
    public function dsupload()
    {
        $file = request()->file('file');
        require_once APP_PATH . '/../vendor/vendor/autoload.php';

        // 需要填写你的 Access Key 和 Secret Key
        $accessKey = config('ACCESSKEY');
        $secretKey = config('SECRETKEY');
        // 构建鉴权对象
        $auth = new Auth($accessKey, $secretKey);

        // 要上传的空间
        $bucket = config('BUCKET');

        // 生成上传 Token
        $token = $auth->uploadToken($bucket);

        // 要上传文件的本地路径
        $filePath = $file->getRealPath();

        $ext = pathinfo($file->getInfo('name'), PATHINFO_EXTENSION);  //后缀
     
        // 上传到七牛后保存的文件名
        $key = substr(md5($file->getRealPath()) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;

        // 初始化 UploadManager 对象并进行文件的上传
        $uploadMgr = new UploadManager();

        // 调用 UploadManager 的 putFile 方法进行文件的上传
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
        if ($err !== null) {
           var_dump($err);
        } else {
            //echo $bucket . '/' . $key;  带储存空间名称
            echo  $key;
        }
    }

}