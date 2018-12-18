<?php

spl_autoload_register('load');

function load($class)
{

    $arr_model=['Demos','Indexs'];
    $arr=explode("\\",$class);

    if($arr[1]=='other')
    {
        require_once 'other/'.$arr[2].'.php';
    }

    if(in_array($arr[2],$arr_model))
    {

        require_once 'server/'.$arr[2].'.php';
    }
}


