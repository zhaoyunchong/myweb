<?php 
define('APP_NAME', 'Home');
define('APP_PATH', './Home/');
define('APP_DEBUG', 'true');//缓存缺点 数据更新不及时，debug会生成日志，这是一种开发模式。会有缓存加快数据的访问速度，这种情况是调试模式开启
include "./ThinkPHP/ThinkPHP.php";
// $pdo=new PDO('mysql:host=localhost;dbname=city','root','zhao1996');
// $pdo->exec('set names utf8');
// $_GET['pdo']=$pdo;

 ?>