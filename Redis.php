<?php
namespace Redis;

use Config;
use RedisHelp;
include 'config/Redis.php';
include 'RedisHelp.php';
//redis控制操作类
class Redis
{
	/**
     * 实例数组
     * @var array
     */
    protected static $instance = array();

    /**
    *获取实例
    */
    public static function instance($config_name='default')
    {
    	if(empty(self::$instance[$config_name])){

            if(!isset(\Config\Redis::$$config_name)){
                echo "\\Config\\Redis::$config_name not set\n";
                throw new \Exception("\\Config\\Redis::$config_name not set\n");
            }

            $db = \Config\Redis::$$config_name;

            //print_r($db);

            //$db = \Config\Redis::$$config_name;
           $config = \Config\Redis::${$db['db']};

           //print_r($config);
            //print_r($config);
            $config['db_config'] = $config_name;
            //print_r($config);
            self::$instance[$config_name] = new \RedisHelp\RedisHelp($config['host'], $config['port'], $config['time_out'], $config['password'],$config['db_config']);
        }

        return self::$instance[$config_name];
    }
}
?>