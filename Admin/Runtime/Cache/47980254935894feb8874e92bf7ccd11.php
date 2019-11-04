<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>后台管理系统登录界面</title>
<link rel="stylesheet" href="__PUBLIC__/bs/css/bootstrap.min.css">
<style>
        *{
            font-family: 微软雅黑;
        }
        .panel{
            width:500px;
            position: absolute;
            top:50%;
            left:50%;
            margin-top:-165px;
            margin-left:-250px;
        }
</style>
</head>

<body style="background:url(../Public/img/bg.jpg) no-repeat;">
    
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <h1>后台管理登录:</h1>
                </div>
            </div>
            <div class="panel-body">
                <form action="__URL__/check" method='post'>
                    <div class="form-group">
                        <label for=""><span class='glyphicon glyphicon-user'></span> 用户名:</label>
                        <input type="text" class="form-control" placeholder='请输入管理员账号' required="账号不能为空!" name="username">
                    </div>
                    <div class="form-group">
                        <label for=""><span class='glyphicon glyphicon-asterisk'></span> 密码:</label>
                        <input type="password" class="form-control" placeholder='请输入密码' required="密码不能为空!" name="password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="登录" class='btn btn-primary btn-lg'>
                        <input type="reset" value="重置" class='btn btn-danger btn-lg'>
                    </div>
                </form>
            </div>  
        </div>
    </div> 
</body>
</html>