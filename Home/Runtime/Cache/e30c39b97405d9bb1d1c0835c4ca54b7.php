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
        
        
    <style>
      tr,td,th{
        text-align: center;
      }
    </style>
    <!-- 后台内容 -->
    <div class="row">
            <div class="col-md-2">
                <ul class="list-group">
                    <a href="javacript:" class="list-group-item active abc">查看订单</a>
                    <a href="javascript:" class="list-group-item abc">修改密码</a>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="dingdan">
                    <?php  if(!$rows){ echo "<div class='goods'>没有订单，请您先购物，<a href='__APP__/Index/index' class='btn btn-success'>购物</a></div>"; }else{ ?>
                    <table class="table table-striped table-hover table-bordered">
                        <tr>
                            <th>订单号</th>
                            <th>下单时间</th>
                            <th>订单状态</th>
                            <th>确认收货</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                                <td><a href="__URL__/ding/dingdanhao/<?php echo ($row['dingdanhao']); ?>" class="btn btn-success"><?php echo ($row['dingdanhao']); ?></a></td>
                                <td><?php echo (date('Y-m-d',$row['time'])); ?></td>
                                <td><?php echo ($row['zt']); ?></td>
                                <td>
                                <?php  if($row['zt']!="确认收货"){ echo "<a href='__URL__/change/id/{$row['id']}' class='btn btn-primary'> 确认收货</a>"; } else{ echo "<a href='__URL__/pinglun/id/{$row['id']}' class='btn btn-primary'> 评论</a>"; } ?>
                                </td>
                                 <td><a href="__URL__/delete/id/<?php echo ($row['id']); ?>" class="btn btn-danger">删除订单</a></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <?php
 } ?> 
                </div>  
                <div class="dingdan">
                  <form action="__URL__/changepwd" class="form-horizontal" method="post">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">输入原密码:</label>
                      <div class="col-sm-6">
                      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="请输入旧密码" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">输入新密码:</label>
                      <div class="col-sm-6">
                      <input type="password" class="form-control" id="newpwd" name="newpwd" placeholder="请输入新密码" required="" minlength="6">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">输入确认密码:</label>
                      <div class="col-sm-6">
                      <input type="password" class="form-control" id="rpwd" name="repwd" placeholder="请重新输入一次新密码" required="">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label"></label>
                      <div class="col-sm-6">
                        <input type="submit" value="确认修改" class="btn btn-primary">
                        <input type="reset" value="重新填写" class="btn btn-danger">
                      </div>
                    </div> 
                </form>
              </div>
            </div>
          </div>
    <script>
     $('input:submit').click(function(){
        newpwd=$('#newpwd').val();
        repwd=$('#rpwd').val();
        if(!(repwd==newpwd)){
           alert('俩次密码不一致!');
           return false;
        }
     });
     $('.list-group-item.abc').click(function(){
     $('.list-group-item').removeClass('active');
     $(this).addClass('active');

     idx=$(this).index('.list-group-item');
     $('.dingdan').hide();
     $('.dingdan').eq(idx).show();
      });
      $('.dingdan').hide();
      $('.dingdan').first().show();
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