<?php
namespace app;


use app\server\Demos;
use app\server\Indexs;

class Index extends Common
{
    public function abc()
    {
        $ret=Indexs::bbq();
        echo $ret;
    }

    public function gril()
    {
      $ret=Demos::ddo();
      echo $ret;
    }

}