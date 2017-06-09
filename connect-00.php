<?php

try {
	//dsn的书写及里面的内容
	$dsn = 'mysql:host=localhost;dbname=test;charset=utf8';
	//连接数据库首先得创建一个PDO对象，必须传递参数为“dsn、用户名、用户密码”
	$pdo = new PDO($dsn,'root','123456');
	//如果连接成功执行下面的代码
	echo '连接成功<br />';
} catch (PDOException $e) {
	//连接失败捕获异常，会在下面打印出错误代号及错误信息
	echo $e->getCode() . ':' . $e->getMessage() . '<br />';
	echo '连接失败<br />';
}

$name = 'xiaoming';
$province = '河北';
$age = 21;
$sex = 1;
$gid = 3;
//函数quote为字符串添加 引号
$name = $pdo->quote($name);
$province = $pdo->quote($province);

// var_dump($province);
// 编写sql语句
 $sql = "insert into user(username,province,age,sex,gid) values($name,$province,$age,$sex,$gid)";
// $sql = "update user set sex=0 where username='xiaoming'";
// $sql = "delete from user where username='xiaoming'";
// $sql = "select username from user where id=4";

//函数exec为执行sql语句
$result = $pdo->exec($sql);

//返回值：成功返回为受影响的行数，失败返回false
// var_dump($result);

//获取错误代码
var_dump($pdo->errorCode());
//获取错误信息数组
var_dump($pdo->errorInfo());
//获取最后插入数据的ID
var_dump($pdo->lastInsertId());
//获取支持的数据库驱动数组
var_dump($pdo->getAvailabledrivers());