<?php

require_once 'other/restapi.php';
//导入server层中的类
$file_name=scandir('server');
foreach ($file_name as $k=>$v)
{
    if($v!='.' && $v!='..' && $v!="")
    {
        require_once 'server/'.$v;
    }
}


