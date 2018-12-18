<?php
namespace app\other;
class restapi
{
    /**
     * 常用状态码
     * @var array
     */
    private $_statusCodes = [
        200 => 'OK',
        204 => 'No Content',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        500 => 'Server Internal Error'
    ];
    /**
     * 请求方法
     * @var string
     */
    private $_requestMethod;

    /**
     * 请求的资源名称
     * @var string
     */
    private $_resourceName;

    /**
     * 初始化请求方法
     */
    public function _setupRequestMethod($_allowRequestMethods)
    {

        $this->_requestMethod=$_SERVER['REQUEST_METHOD'];
        if(!in_array($this->_requestMethod,$_allowRequestMethods))
        {
            $this->_error_respons(405);
        }

    }

    /**
     * 初始化请求资源
     *
     */
    public function _setupResource($_allowResources)
    {
        $path = $_SERVER['PATH_INFO'];
        $params = explode('/', $path);
        $this->_resourceName = isset($params[2]) ? $params[2] : '';
        if (!in_array($this->_resourceName, $_allowResources)) {
            $this->_error_respons(404);
        }
    }

    /**
     * 错误响应
     * @param $code 状态码
     */
    public function _error_respons($code)
    {
        header('HTTP/1.1 ' . $code . ' ' . $this->_statusCodes[$code]);
        header('Content-type:application/json;charset=utf-8');
        die();
    }
}