<?php
namespace app\server;
class logins
{
    public static function loginHanle($cpass)
    {
       return array('message'=>1,'token'=>md5(321));
    }

}