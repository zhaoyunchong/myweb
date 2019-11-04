<?php 
define('APP_NAME', 'Admin');
define('APP_PATH', './Admin/');
define('APP_DEBUG', 'true');//缓存缺点 数据更新不及时，debug会生成日志，这是一种开发模式。会有缓存加快数据的访问速度，这种情况是调试模式开启

include "ThinkPHP/ThinkPHP.php";
 ?>