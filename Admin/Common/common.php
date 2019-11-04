<?php 	
//这段函数的作用是为了得到url中模块，因为在模板中使用$_GET['_URL_']得到url中模块时在分页类中使用show方法时这个值获取不到，所以用这个函数来代替在分页情况下的Index/index母板中获取url中module的方法!
function tp_url_module(){
	$path=$_SERVER['PATH_INFO'];
	$arr=explode('/',$path);
	$module=$arr[1];                
	return $module;
}
?>
