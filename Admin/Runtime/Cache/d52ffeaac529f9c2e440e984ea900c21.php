<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo ($title); ?></title>
	<link rel="shortcut icon" href="../Public/img/1.png">
	<link rel="stylesheet" href="__PUBLIC__/bs/css/bootstrap.min.css">
	<script src="__PUBLIC__/bs/js/jquery.min.js"></script>
	<script src="__PUBLIC__/bs/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/bs/js/holder.min.js"></script>
	<style>
		*{
			font-family: 微软雅黑;
		}
        .navbar-inverse .navbar-brand{
			color:#fff;
		}
        td,th{
        	text-align: center;
        }
	</style>
</head>
<body>
	<div class="container">
		<!-- 导航菜单 -->
		<nav class="navbar navbar-inverse">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="__APP__/Index/index">后台管理系统</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="__ROOT__/index.php"><span class='glyphicon glyphicon-star-empty'></span>站点首页</a></li>
		        <li><a href="#"><span class='glyphicon glyphicon-user'></span>Admin</a></li>
		        <li><a href="javacript:" data-toggle="modal" data-target="#myModal"><span class='glyphicon glyphicon-cog'></span>修改密码</a></li>
		        <li><a href="__APP__/Login/logout" onclick='return confirm("您确认退出吗?")'><span class='glyphicon glyphicon-off'></span>安全退出</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
         
        <!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <form action="__APP__/User/edit" method='post' id="changepwd">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">修改管理员密码:</h4>
		      </div>
		      <div class="modal-body">
		      	    <div class="form-group">
						<label for="">输入原密码:</label>
						<input type="password" class="form-control" name='pwd' required placeholder="请输入原密码">
					</div>
					<div class="form-group">
						<label for="">输入新密码:</label>
						<input type="password" id="pwd" class="form-control" name='password' required minlength="3" placeholder="请输入新密码">
					</div>
					<div class="form-group">
						<label for="">输入确认密码:</label>
						<input type="password" id="repwd" class="form-control" name='repassword' required minlength="3" placeholder="请重新输入一次新密码">
					</div>
					<input type="hidden" name="id" value="<?php echo ($id); ?>">	      		
		      </div>
		      <div class="modal-footer">
		      	<p style="color:#f00" class="pull-left">请小主人保管好你的密码!</p>
		        <button class="btn btn-primary change" type="submit">
		        	<span class="glyphicon glyphicon-edit"></span> 确认更改</input>
		        </button>
		      </div>
		      </form>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!-- 后台内容 -->
		<div class="row">
			<div class="col-md-2">

			    <div class="list-group User">
					<a href="javascript:" class="list-group-item active"><span class='glyphicon glyphicon-user'></span> 用户管理: <span class='glyphicon glyphicon-chevron-down pull-right right_more'></span></a>
					<a href="__APP__/User/index" class="list-group-item">用户信息管理</a>
				</div>	

				<div class="list-group Shop">
					<a href="javascript:" class="list-group-item active"><span class='glyphicon glyphicon-fire'></span> 商品管理:<span class='glyphicon glyphicon-chevron-down pull-right right_more'></span></a>
					<a href="__APP__/Shop/index" class="list-group-item usershow">添加商品</a>
					<a href="__APP__/Shop/show" class="list-group-item useradd">查看商品</a>
				</div>	

				<div class="list-group Order">
					<a href="javascript:" class="list-group-item active"><span class='glyphicon glyphicon-shopping-cart'></span> 订单管理:<span class='glyphicon glyphicon-chevron-down pull-right right_more'></span></a>
					<a href="__APP__/Order/index" class="list-group-item">编辑订单</a>
				</div>	

				<div class="list-group Mesage">
					<a href="javascript:" class="list-group-item active"><span class='glyphicon glyphicon-envelope'></span> 信息管理: <span class='glyphicon glyphicon-chevron-down pull-right right_more'></span></a>
					<a href="__APP__/Mesage/show" class="list-group-item">广告管理</a>
					<a href="__APP__/Mesage/add" class="list-group-item">上传广告</a>
					<a href="__APP__/Mesage/pinglun" class="list-group-item">评论管理</a>
				</div>	
			</div>

			<div class="col-md-10 rightinfo">
				
	<form class="form-inline" action="__URL__/showgoods" method="post">
        <div class="form-group">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input type="text" class="form-control" placeholder="请输入商品名称" required="" name="mingcheng">
        </div>
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
    </form> 
	<table class="table table-striped table-bordered table-hover">
		<div class="row">
    	    <div class="col-md-9">
    		    <h3 class="page-header" style="text-align: center; color: #000;margin-top:0px;">
    	        查看商品信息
                </h3> 
    	   </div>
        </div>
		<tr>
			<th>编号</th>
			<th>名称</th>
			<th>图片</th>
			<th>价格</th>
			<th>库存</th>
			<th>更改</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($row['id']); ?></td>
				<td><?php echo ($row['mingcheng']); ?></td>
				<td><img src="__PUBLIC__/uploads/<?php echo ($row['img']); ?>" alt="" width="88px" height="51px"></td>
				<td><?php echo ($row['jiage']); ?></td>
				<td><?php echo ($row['shuliang']); ?></td>
				<td><a href="__URL__/edit/id/<?php echo ($row['id']); ?>" class="btn btn-info">编辑</a></td>
				<td><a href="javacript:>" class="btn btn-danger del" idx="<?php echo ($row['id']); ?>">删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<span class="pull-right">总共<?php echo ($show); ?></span>
	<script>
		$('.del').click(function(){
		  obj=$(this);
          id=$(this).attr('idx');
          $.get('__URL__/drop',{'id':id},function(r){
          	   if(r.status==1){
                window.location="__URL__/show";
                alert(r.info)
          	   	obj.parent().parent().hide();
          	   }
          },'json');
	});
	</script>

			</div>
		</div>
	</div>
</body>
<script>
$('.list-group-item').hide();
$('.list-group-item.active').show();
$('.list-group-item.active').first().nextAll().show();


$('.list-group-item.active').click(function(){
	$(this).nextAll().toggle();
   
});
$('.list-group-item.active .list-group-item').click(function(){
	// $(this).nextAll().toggle();
   
});


$('.change').click(function(){
	pwd=$('#pwd').val();
	repwd=$('#repwd').val()
	if(!(pwd==repwd)){
		alert('新密码和确认密码不一致');
		return false;
	}
});

cls='<?php echo tp_url_module();?>';
 $('.'+cls).children().show();
</script>
</html>