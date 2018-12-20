<?php

spl_autoload_register('load');


function load($class)
{
    $arr=explode("\\",$class);
    if($arr[1]=='other')
    {
        require_once 'other/'.$arr[2].'.php';
    }
    if(preg_match('/server/',$class))
    {
        if($arr[2]!='' && isset($arr[2]))
        {
            require_once 'server/'.$arr[2].'.php';
        }
    }

}