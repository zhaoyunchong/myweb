<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($title); ?></title>
    <link rel="shortcut icon" href="../Public/img/1.png">
	<link rel="stylesheet" href="__PUBLIC__/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/css/index.css">
    <script src="../Public/js/index.js"></script>
	<script src="__PUBLIC__/bs/js/jquery.min.js"></script>
	<script src="__PUBLIC__/bs/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/bs/js/holder.min.js"></script>
    <style>
        footer{
            padding-left: 400px;
            background-color: #000;
            height:30px;
        }
        footer a{
            line-height: 30px;
            text-decoration: none;
            color:#fff;
            margin-left: 30px;
        }
        footer a:hover{
            text-decoration: none;
            color:#ccc;
        }
        /*body{
            background-color: #aaf;
        }*/
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar navbar-inverse navbar-fixed">
            <div class="navbar-header">
                <a href="__APP__/Index/index" class="navbar-brand"><span class="glyphicon glyphicon-plane"></span>网站首页</a>
                <button class="navbar-toggle collapsed" data-toggle='collapse' data-target='#mynav'>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>      
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="mynav">   
                <ul class="nav navbar-nav navbar-right">
                    <?php  if(!$_SESSION['user_id']){ echo "<li><a href='javacript:' data-toggle='modal' data-target='#myModal1'><span class='glyphicon glyphicon-flag'></span>登陆</a></li>"; }else{ echo "<li><a href='javascript:'><span class='glyphicon glyphicon-flag'></span>用户:{$_SESSION['username']}</a></li>"; echo "<li><a href='__APP__/Login/logout'><span class='glyphicon glyphicon-flag'></span>注销</a></li>"; } ?>
                    <!-- <li><a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"><?php echo ($_SESSION['user_id']); ?></a></li> -->
                    <li><a href="" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus">注册</a></li>
                    <li><a href="__APP__/User/index"><span class="glyphicon glyphicon-user"></span> 个人中心</a></li>
                    <li><a href="__APP__/Shop/index"><span class="glyphicon glyphicon-shopping-cart"></span>购物车<span class="badge"><?php echo ($_SESSION['num']); ?></span></a></li>
                </ul>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="__APP__/Login/check" method='post' id="changepwd">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-center" id="myModalLabel">用户登陆</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">用户名:</label>
                            <input type="text" class="form-control" name='name' required placeholder="请输入用户名">
                        </div>
                        <div class="form-group">
                            <label for="">密码:</label>
                            <input type="password" id="pwd" class="form-control" name='pwd' required placeholder="请输入密码">
                        </div>
                        <div class="form-group">
                            <label for="">验证码:</label>
                            <img src="__APP__/Index/vcode" alt="" onclick="this.src='__APP__/Index/vcode/'+Math.random()">
                        </div>
                        <div class="form-group">
                            <label for="">验证码:</label>
                            <input type="text" class="form-control" required name="fcode">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="登陆">
                            <input type="reset" class="btn btn-danger" value="重置">
                        </div>
                    </div>
                </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="__APP__/Zhuce/insert" method='post' id="changepwd">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-center" id="myModalLabel">用户注册</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">用户名:</label>
                            <input type="text" class="form-control" name='name' required placeholder="请输入用户名">
                        </div>
                        <div class="form-group">
                            <label for="">密码:</label>
                            <input type="password" id="pwd" class="form-control" name='pwd' required minlength="6" placeholder="请输入密码">
                        </div>
                        <div class="form-group">
                            <label for="">输入确认密码:</label>
                            <input type="password" id="repwd" class="form-control" name='repwd' required placeholder="请重新输入一次密码">
                        </div>
                        <div class="form-group">
                            <label for="">输入手机号:</label>
                            <input type="text" id="repwd" class="form-control" name='tel' required placeholder="请输入正确的手机号格式" pattern="/^1[3578][01379]\d{8}|1[34578][01256]\d{8}|(134[012345678]\d{7}|1[34578][012356789]\d{8})$/g">
                        </div>
                        <div class="form-group">
                            <label for="">验证码:</label>
                            <img src="__APP__/Index/vcode" alt="" onclick="this.src='__APP__/Index/vcode/'+Math.random()">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required name="fcode" placeholder="请输入验证码">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="注册">
                            <input type="reset" class="btn btn-danger" value="重置">
                        </div>
                    </div>
                    <div class="modal-footer">
                    <p style="color:#f00" class="pull-left">请小主人一定要保管好你的密码!</p>
                    </div>
                </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div style="height: 5px;"></div>
        
        
    <link rel="stylesheet" type="text/css" href="../Public/css/goods.css" />
    <div class="header">
        <a href="__APP__/Index/index">首页</a>
        <span>>><?php echo ($rows['pinpai']); ?></span>
        <span>>><?php echo ($rows['mingcheng']); ?></span>
    </div>
    <table class="table table-scriped table-bordered">
    	<tr>
    		<th>图片</th>
    		<th>简介</th>
    		<th>库存数量</th>
    		<th>加入购物车</th>
    	</tr>
    	<tr>
    		<td>
    			<img src="__PUBLIC__/uploads/<?php echo ($rows['img']); ?>" alt="">
    		</td>
    		<td>
    			<?php echo ($rows['jianjie']); ?>
    		</td>
    		<td>
    			<?php echo ($rows['shuliang']); ?>
    		</td>
    		<td>
    			<a href="__APP__/Shop/insert/id/<?php echo ($rows['id']); ?>" class="btn btn-primary btn-lg">加入购物车</a>
    		</td>
    	</tr>
    </table>
    <div class="pinglun">
    	<div class="ping">
    		<span>商品评论:</span>
    	</div>
    	<div class="content">
            
            <?php
 if(!$prows){ echo "<br>"; echo "<p>该商品暂无评论!</p>"; echo "<hr>"; }else{ ?>
            <?php $__FOR_START_21388__=0;$__FOR_END_21388__=$tot;for($i=$__FOR_START_21388__;$i < $__FOR_END_21388__;$i+=1){ ?><br>
                <div class="row">
                    <div class="col-md-2">
                        <?php echo ($arr1[$i]); ?>用户说:
                    </div>
                    <div class="col-md-8">
                        <?php echo ($arr2[$i]); ?>
                        <span class="pull-right">评价时间:<?php echo (date('Y-m-d h:i:s',$arr3[$i])); ?></span>
                    </div>
                </div>
                <hr><?php } ?>
            <?php
 } ?>
    	</div>
    </div>

        
        <footer style="margin-top: 8px;">
            <a href="">关于我们</a>
            <a href="">联系我们</a>
            <a href="">产品中心</a>
            <a href="">公司地图</a>
        </footer>
    </div>
</body>
<script>
    $('.carousel').carousel({interval: 3000});
</script>
</html>