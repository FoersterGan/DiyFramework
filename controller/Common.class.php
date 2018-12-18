<?php
namespace app;
use app\other\restapi;
class Common
{
    protected $form_front;


    protected $_return_array=array(
        'code'=>'',
        'message'=>'',
        'data'=>'',
    );
    protected function __construct($method,$resouce,$switch=true)
    {
        $this->p=new restapi();//首先一开始则对restapi开启
        $this->p->_setupRequestMethod($method);//判断其请求方法是否正确
        $this->p->_setupResource($resouce);//判断其请求资源是否正确
        $get_front=json_decode(file_get_contents('php://input'),true);
        if(empty($get_front))
        {
            $get_front=$_POST;
        }
        $get_token=$get_front['token'];
        $user_token=$_SESSION['user_token'];
        $token_time=$_SESSION['user_token_expire'];
        if($switch)
        {
            if($get_token!=$user_token || empty($get_token))
            {
                $this->_return_array['code']=12003;
                $this->_return_array['message']='token_is_null';
                $this->_return_array['data']='';
                echo json_encode($this->_return_array);
                $this->p->_error_respons('401');
            }
        }

        $this->form_front=$get_front;
    }

}