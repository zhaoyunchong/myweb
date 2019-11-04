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
        
        
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                
                <div class="item active">
                        <img src="__PUBLIC__/message/<?php echo ($active); ?>">
                </div>
                <?php if(is_array($mrows2)): $i = 0; $__LIST__ = $mrows2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mrow2): $mod = ($i % 2 );++$i;?><div class="item">
                        <img src="__PUBLIC__/message/<?php echo ($mrow2['img']); ?>">
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
             </a>
        </div>

        <div class="xiaomi">
            <div class="title"> 
            <h3><span>1F</span><em>小米手机</em></h3>
            </div>
            <div class="rong">
                <div class="zuo">
                    <a href="javascript:"> <img width="240" height="535" src="../Public/img/10.jpg">
                    </a>
                </div>
                <div class="you">  
                    <?php if(is_array($xiaomi)): $i = 0; $__LIST__ = $xiaomi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mi): $mod = ($i % 2 );++$i;?><div class="good">
                        <a  href="__APP__/Goods/index/id/<?php echo ($mi['id']); ?>"> 
                        <img width="100" height="164" src="__PUBLIC__/uploads/<?php echo ($mi['img']); ?>" > 
                        </a>
                        <a class="good-jie" href="__APP__/Goods/index/id/<?php echo ($mi['id']); ?>"><?php echo ($mi['mingcheng']); ?>
                        </a>
                        <a class="money"  href="__APP__/Goods/index/id/<?php echo ($mi['id']); ?>"  title="小米9 6GB+128GB"><?php echo ($mi['jiage']); ?>元
                        </a>
                        <span class="good-biao"></span>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        
        <div class="xiaomi">
            <div class="title"> 
            <h3><span>2F</span><em>华为手机</em></h3>
            </div>
            <div class="rong">
                <div class="zuo">
                    <a href="javascript:"> <img width="240" height="535" src="../Public/img/11.jpg">
                    </a>
                </div>
                <div class="you">  
                    <?php if(is_array($huawei)): $i = 0; $__LIST__ = $huawei;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hua): $mod = ($i % 2 );++$i;?><div class="good">
                        <a  href="__APP__/Goods/index/id/<?php echo ($hua['id']); ?>"> 
                        <img width="100" height="164" src="__PUBLIC__/uploads/<?php echo ($hua['img']); ?>" > 
                        </a>
                        <a class="good-jie" href="__APP__/Goods/index/id/<?php echo ($hua['id']); ?>"><?php echo ($hua['mingcheng']); ?>
                        </a>
                        <a class="money"  href="__APP__/Goods/index/id/<?php echo ($hua['id']); ?>"  title="小米9 6GB+128GB"><?php echo ($hua['jiage']); ?>元
                        </a>
                        <span class="good-biao"></span>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>

            <br>
            <div style="margin-bottom: 0px;">
            <img src="__PUBLIC__/message/ads1.jpg" alt="" style="width: 100%">
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