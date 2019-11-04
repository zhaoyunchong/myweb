<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/bs/css/bootstrap.min.css">
	<script src="__PUBLIC__/bs/js/jquery.min.js"></script>
	<script src="__PUBLIC__/bs/js/bootstrap.min.js"></script>
</head>
<body>
     <div class="container">
		<h1 class="page-header">用户修改</h1>
		<form action="__URL__/update" method="post">
			<div class="form-group">
				<label for="">用户名:</label>
				<input type="text" class="form-control" value="<?php echo ($rows['username']); ?>" name="username">
			</div>
			<div class="form-group">
				<label for="">密码:</label>
				<input type="text" class="form-control" value="<?php echo ($rows['age']); ?>" name="age">
			</div>
			<div class="form-group">
				<input type="submit" value="提交" class='btn btn-primary'>
				<input type="reset" value="重置" class='btn btn-danger'>
			</div>
			<input type="hidden" name="id" value="<?php echo ($rows['id']); ?>"> 
		</form>
 
	</div>	
</body>
</html>