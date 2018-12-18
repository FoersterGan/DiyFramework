<?php

require_once 'other/restapi.php';
//导入server层中的数据数据
$file_name=scandir('server');
foreach ($file_name as $k=>$v)
{
    if($v!='.' && $v!='..' && $v!="")
    {
        require_once 'server/'.$v;
    }
}


