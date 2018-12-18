<?php
namespace app;
use app\server\logins;
class Login
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
    private $_allowResources = ['AuthLogin'];

    private $_return_array=array(
        'code'=>'',
        'message'=>'',
        'data'=>'',
    );

    public function __construct()
    {
        $api=new other\restapi();
        $api->_setupRequestMethod($this->_allowRequestMethods);
        $api->_setupResource($this->_allowResources);
    }

    public function AuthLogin()
    {
        $get_front=json_decode(file_get_contents('php://input'),true);
        $cpass=$get_front['password'];
        if(!empty($cpass))
        {
            $ret=logins::loginHanle($cpass);
            if($ret['message']==1)
            {
                $token=array(
                    'token'=>$ret['token'],
                );
                return_array(200,10001,'密码验证成功',$token);
            }else{

                return_array(403,12001,'password error','');
            }
        }else {
            return_array(400,12002,'password param error','');
        }
    }
}