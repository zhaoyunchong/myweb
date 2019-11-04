<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/bs/css/bootstrap.min.css">
	<script src="__PUBLIC__/bs/js/jquery.min.js"></script>
	<script src="__PUBLIC__/bs/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/bs/js/holder.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="page-header">
			用户注册
		</h1>
		<form action="__URL__/insert" method="post">
			<div class="form-group">
				<label for="">用户名:</label>
				<input type="text" class="form-control" required name="username">
			</div>
			<div class="form-group">
				<label for="">密码:</label>
				<input type="text"  class="form-control" required name="password">
			</div>
			<div class="form-group">
				<label for="">确认密码:</label>
				<input type="text" class="form-control" required name="repassword">
			</div>
			<div class="form-group">
				<label for="">邮箱:</label>
				<input type="text" class="form-control" required name="email">
			</div>
			<div class="form-group">
				<label for="">验证码:</label>
				<img src="__URL__/vcode" alt="" onclick="this.src='__URL__/vcode/'+Math.random()">
			</div>
			<div class="form-group">
				<label for="">验证码:</label>
				<input type="text" class="form-control" required name="fcode">
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="提交">
				<input type="reset" class="btn btn-danger" value="重置">
			</div>
		</form>
	</div>
</body>
</html>