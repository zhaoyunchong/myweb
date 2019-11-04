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
       <span style="margin-left: 20px">
         <a href="__URL__/index" style="color:#fff">返回>></a>
       </span>
       <span style="margin-left: 300px;color:#fff">收货人信息</span>
    </div>
    <div style="height: 5px;"></div>
    <form action="__URL__/savedingdan" class="form-horizontal" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">收货人姓名:</label>
            <div class="col-sm-6">
               <input type="text" class="form-control" id="inputEmail3" name="shouhuoren" placeholder="请输入收货人名字" required="">
            </div>
        </div> 
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">地址:</label>
            <div class="col-sm-6">
               省:
               <select name="sheng" id="province">
                <option value="">--选择省--</option>
                <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option value="<?php echo ($row['ProvinceID']); ?>"><?php echo ($row['ProvinceName']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>   
              市:
              <select name="shi" id="city">
                <option value="">--选择市--</option>
            </select>
              区：
              <select name="qu" id="district">
                <option value="">--选择区--</option>
            </select>
            </div>
        </div> 
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">详细地址:</label>
            <div class="col-sm-6">
               <input type="text" class="form-control" id="inputEmail3" name="xiangxi" placeholder="请输入详细的地址" required="">
            </div>
        </div> 
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">联系电话:</label>
            <div class="col-sm-6">
               <input type="text" class="form-control" id="tel" name="tel" placeholder="请输入联系电话" required="" pattern="[0-9]{11}">
            </div>
        </div> 
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">送货方式:</label>
            <div class="col-sm-6">
               <select class="form-control" name="shff">
                  <option>京东</option>
                  <option>顺丰</option>
                  <option>圆通</option>
                  <option>申通</option>
                  <option>百事</option>
                  <option>韵达</option>
              </select>
            </div>
        </div> 
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">支付方式:</label>
            <div class="col-sm-6">
               <select class="form-control" name="zfff">
                  <option>货到付款</option>
                  <option>银行汇款</option>
              </select>
            </div>
        </div> 
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户留言:</label>
            <div class="col-sm-6">
               <textarea name="leaveword" id="" cols="" rows="" style="width: 460px;height: 166.6px;resize: none;"></textarea>
            </div>
        </div> 
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label"></label>
            <div class="col-sm-6">
               <input type="submit" value="提交订单" class="btn btn-primary">
               <input type="reset" value="重写订单" class="btn btn-danger">
            </div>
        </div> 
     </form>
     <script>
        //得到市
$('#province').change(function(){
    pid=this.value;
    $.get('__URL__/getcity',{pid:pid},function(r){
        $('#city').html(r);
    });
});

$('#city').change(function(){
    cid=this.value;
    $.get('__URL__/getstrict',{cid:cid},function(r){
        $('#district').html(r);
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