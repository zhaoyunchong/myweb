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
        
        
    <link rel="stylesheet" type="text/css" href="../Public/css/shop.css" />
    <div class="header">
       <p class="text-center">我的购物车</p>
    </div>
    <div style="height: 5px;"></div>
    <?php  $tot=0; if(!$_SESSION['shop']){ echo "<div class='goods'>您还未购买任何商品，请先购物，<a href='__APP__/Index/index' class='btn btn-success'>购物</a></div>"; }else{ ?>
    <form action="__URL__/dingdan">
    <table class="table table-striped table-hover table-bordered">
        <tr>
            <th>商品名称</th>
            <th>库存</th>
            <th>商品数量</th>
            <th>价格</th>
            <th>小计</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i; $tot+=$row['jiage']*$row['num']; ?>
            <tr>
                <td><?php echo ($row['mingcheng']); ?></td>
                <td><?php echo ($row['shuliang']); ?></td>
                <td>
                    <a href="__URL__/cut/id/<?php echo ($row['id']); ?>" class="btn btn-primary">-</a>
                    <span id="shuliang"><?php echo ($row['num']); ?></span>
                    <a href="__URL__/add/id/<?php echo ($row['id']); ?>" class="btn btn-primary">+</a>
                </td>
                <td class="jiage"><?php echo ($row['jiage']); ?></td>
                <td class="xiaoji"><?php echo ($row['num']*$row['jiage']); ?></td>
                <td><a href="__URL__/delete/id/<?php echo ($row['id']); ?>" class="btn btn-danger">移除</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="gouwu">
        <a href="__APP__/Index/index" class="btn btn-success">继续购物</a>
        <button type="submit" class="btn btn-primary">去收银台</button>
        <a href="__URL__/delall" class="btn btn-danger">清空购物车</a>
        <span class="pull-right">总计 <span id="zongji"><?php echo ($tot); ?></span>元</span>
    </div>
    </form>
    <?php
 } ?>
    <script>
        $('.shuliang').change(function(){
            zongji=0;
            idx=$(this).index('.shuliang');
            jiage=$('.jiage').eq(idx).html();
            shuliang=$(this).val();
            // <{}>=shuliang;
            xiaoji=jiage*shuliang;
            $('.xiaoji').eq(idx).html(xiaoji);
            $('.xiaoji').each(function(){
                xiaoji=$(this).html();
                zongji=parseInt(xiaoji)+zongji;
                $('#zongji').html(zongji);
           });
        });
    </script>

        
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