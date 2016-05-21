<?php

//include 'file1.php';
use Redis;
include 'Redis.php';

//$userCache = Redis::instance('user');
//$user=\Redis\Redis::instance('user');
//$userCache->hset( $array['memberid'], "f_gradeid", $gradeinfo['data']['list'][$i+1]['id']);
$data=array("id"=>88,"name"=>"kinmos");
$redis=\Redis\Redis::instance('user');

//print_r($redis);
$redis->h_insert( 'u_kinmos', $data,10); // 添加数组数据 最后一个参数是过期时间

$field="name";
$redisData=$redis->h_get('u_kinmos',$field);//获取特定列数据 * 代表全部
print_r($redisData);

$redis->hset('u_kinmos','age','20'); //设置数据中某个key的值
$redisData=$redis->h_get('u_kinmos',"*");
print_r($redisData);


//设置字符串
$redis->set( 'hello', 'kinmos' );
//获取redis数据  
$hedata = $redis->get( 'hello');
print_r($hedata);

// 获取多个数据
$redis->h_insert( 'u_kinmo', $data,10);
$fieldArr=array("u_kinmo","u_kinmos");
$datas=$redis->h_gets($fieldArr);

print_r($datas);


$redis->close('user');
?>