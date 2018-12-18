<?php
namespace app;


use app\server\Demos;
use app\server\Indexs;

class Index extends Common
{
    /**
     * 允许请求的 HTTP 方法
     * @var array
     */
    private $_allowRequestMethods = ['POST','GET'];
    /**
     * 允许请求的资源列表
     * @var array
     */
    private $_allowResources = ['abc','gril'];


    public function __construct()
    {
        $switch=false;
        parent::__construct($this->_allowRequestMethods,$this->_allowResources,$switch);
    }

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