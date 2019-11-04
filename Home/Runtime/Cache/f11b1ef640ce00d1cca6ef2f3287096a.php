<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/bs/css/bootstrap.min.css">
	<script src="__PUBLIC__/bs/js/jquery.min.js"></script>
	<script src="__PUBLIC__/bs/js/bootstrap.min.js"></script>
	<style>
		tr,td,th{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
        <h1 class="page-header">
        	TP框架
        </h1>
        <div class="panel panel-primary">
        	<div class="panel-heading">
        		用户展示
        	</div>
        </div>
        <button class="btn btn-info">获取用户</button>
	</div>
</body>
<script>
  $('button').click(function(){
  	 $.get('__URL__/index',function(r){
  	 	 $('.panel-heading').after(r);
  	 });
  });
</script>
</html>