<?php
namespace app;

class Common
{
    protected $form_front;


    protected $_return_array=array(
        'code'=>'',
        'message'=>'',
        'data'=>'',
    );
    public function __construct()
    {
        $get_front=json_decode(file_get_contents('php://input'),true);
        if(empty($get_front))
        {
            $get_front=$_POST;
        }
        $get_token=$get_front['token'];
        $user_token=$_SESSION['user_token'];
        $token_time=$_SESSION['user_token_expire'];
        $switch=false;
        if($switch)
        {
            if($get_token!=$user_token || empty($get_token))
            {
                return_array(401,12003,'token is null','-1');
            }
        }

        $this->form_front=$get_front;
    }

}