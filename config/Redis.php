<?php
namespace Config;
// redis的配置文件
class Redis
{
	public static $default=array(
		"host"=>"192.168.1.122",//redis服务器ip
		"port"=>"6388",	//端口
		"password"=>"123456", //密码验证
		"time_out"=>3, //链接时长
		);

	public static $user = array(
        "db"=>'default', //使用的连接
    );
}
?>