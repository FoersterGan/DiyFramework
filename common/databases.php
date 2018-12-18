<?php
class databases
{
    private $conn;

    public function __construct()
    {
        $dbhost = 'localhost';  // mysql服务器主机地址
        $dbuser = 'root';            // mysql用户名
        $dbpass = '123456';          // mysql用户名密码
        $conn = mysql_pconnect($dbhost, $dbuser, $dbpass);

        if(! $conn )
        {
            die('连接失败: ' . mysql_error());
        }

        $this->conn=$conn;
        mysql_select_db('innodb_yjwt' );
        // 设置编码，防止中文乱码
        mysql_query("set names utf8");

    }

    /**
     * mysql_query_select
     * @param $sql sql语句
     * @param $signal 是否关闭mysql指令
     * @return array
     */
    public function mysql_query_select($sql,$signal=false)
    {
        $retval = mysql_query( $sql );
        if(! $retval )
        {

//            echo'无法读取数据:' . mysql_error();
//            Logger::getRootLogger()->info('无法读取数据:' . mysql_error());
            die();

        }
        while($row = mysql_fetch_array($retval,MYSQL_ASSOC))
        {
            $array[]=$row;
        }

        return $array;
    }

    /**
     * 删除
     * @param $sql      执行删除的sql
     * @param $id       删除的执行条件
     * @param $table    需要删除的表
     * @return array|bool|mysqi_result
     */
    public function mysql_query_delete($sql)
    {
        $retval = mysql_query($sql);
        if(!$retval)
        {
            Logger::getRootLogger()->info('无法删除数据: ' . mysql_error());
            die();
        }
        $res=mysql_affected_rows();  //插入数据返回受影响的行数
        return $res;
    }

    public function mysql_query_add($sql)
    {
        $retval = mysql_query($sql);
        if(! $retval )
        {
            Logger::getRootLogger()->info('无法插入数据'.mysql_error());
            die();
        }
        $res=mysql_affected_rows();  //插入数据返回受影响的行数
        return $res;
    }

    /**
     * 数据新增
     * @param $sql 执行新增的sql语句
     */

    public function mysql_query_update($sql)
    {
        $retval=mysql_query($sql);
        if(!$retval)
        {
            Logger::getRootLogger()->info('无法插入数据'.mysql_error());
            die();
        }
        $res=mysql_affected_rows();  //插入数据返回受影响的行数
        return $res;
    }



}