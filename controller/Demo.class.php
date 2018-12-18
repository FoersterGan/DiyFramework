<?php
namespace app;

class Demo extends Common
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
    private $_allowResources = ['index'];


    public function __construct()
    {
        $switch=false;
        parent::__construct($this->_allowRequestMethods,$this->_allowResources,$switch);
    }

    public function index()
    {
        echo 'this is Demo ';
    }
}