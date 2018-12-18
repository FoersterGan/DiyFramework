<?php

header("Content-type: text/html; charset=utf-8");
//屏蔽提示类型错误
error_reporting(E_ALL & ~E_NOTICE) ;
ini_set('error_log', 'log/error_log/php_errors.log');
ini_set('date.timezone', 'Asia/Shanghai');
require_once 'common/function.php';

require_once 'autoload.php';
/**
 * 加载控制器
 */

spl_autoload_register(function ($class_name) {
    $class_arr=explode('\\',$class_name);

    if(file_exists(__DIR__.'/controller/'.$class_arr[1].'.class.php'))
    {
        require __DIR__.'/controller/'.$class_arr[1].'.class.php';
    }

});

/**
 * 获取当前路径
 */
$path=$_SERVER["PATH_INFO"];

//判断当前路径是否存在
//index.php/class/method
if($path==null)
{
    $controller='app\\Login';
    $method='login';
    $p=new $controller();
}else{

    $path=ltrim($path, "/");//去除开头的"/"   如"/Center/tiaozhuan"==>Center/tiaozhuan
    $path=explode('/',$path);//使用“/”，将一个字符串分割成两个字符串 如“Center/tiaozhuan”===>array(2) { [0]=> string(6) "Center" [1]=> string(9) "tiaozhuan" }
    /**
     * 验证类是否存在
     * $path[0]  class
     * $path[1]  method
     * 如果出现了第三个参数则表示path错误
     */

    if(count($path)>2)
    {
        echo '请勿进行非法操作';
        return false;
    }
    if(class_exists('app\\'.$path[0])){
        $class=$path[0];
        $class="app\\$class";
        $p=new $class();
        if(method_exists($p,$path[1])){
            $method=$path[1];
        }else{
            echo '方法名不存在';
            return false;
        }
    }else{
        echo $path[0].'类名不正确';
        return false;
    }

}
//访问当前方法
$p->$method();