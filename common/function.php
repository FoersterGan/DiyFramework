<?php

//加载Log4php类库
include_once(dirname(__FILE__).'/log4php/Logger.php');
$path_logger=include_once(dirname(__FILE__).'/config.php');
//初始化配置
Logger::configure($path_logger);

//开启session会话
session_start();

//加载数据库类1
//include_once (dirname(__FILE__).'/databases.php');

const __XDEBUG = false;
const __AUTH = false;


/**过滤字符串中的所有空格
 * @param $str 字符串
 * @return mixed
 */
function myTrim($str)
{
    $search = array("\n","\r","\t");
    $replace = array("","","","","");
    return str_replace($search, $replace, $str);
}

/**
 * 列表删除验证
 * @param $num 删除编号
 * @param $old_list 已存在数据列表
 * @param $key   删除编号key值
 * @return bool
 */
function delete_group_map($num,$old_list,$key)
{

    foreach($old_list as $k=>$v)
    {
        $old_list_num[]=$v[$key];
    }
    $ret=in_array($num,$old_list_num);
    return $ret;
}

/**
 * @param $status
 * @param $code
 * @param $message
 * @param $data
 */
function return_array($status,$code,$message,$data)
{
    header('HTTP/1.1 '.$status);

    $_return_array=[];
    $_return_array['code']=$code;
    $_return_array['message']=$message;
    $_return_array['data']=$data;
    echo json_encode($_return_array);die();

}

function IS_IP($ip)
{
    if (preg_match('/^((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1 -9]?\d))))$/', $ip)) {
        return true;
    } else {
        return false;
    }
}

function IS_LOCAL_IP($ip)
{
//    return preg_match('/^(127\.|10\.|192\.168|172\.(1[6-9]|2|3[01]))/', $ip);
    return preg_match('/^(127\.|10\.|192\.168|172\.(1[6-9]|2[0-9]{1,1}|3[01])\.)/', $ip);
}
//桥的打量配置


function get_curl($url)
{
    //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
//        curl_setopt($curl, CURLOPT_HEADER, 1);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //执行命令
    $data = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    return $data;
}
