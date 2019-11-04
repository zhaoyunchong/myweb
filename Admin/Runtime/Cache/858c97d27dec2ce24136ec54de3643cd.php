<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>后台管理系统</title>
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
		      <a class="navbar-brand" href="#">后台管理系统</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#"><span class='glyphicon glyphicon-star-empty'></span>站点首页</a></li>
		        <li><a href="#"><span class='glyphicon glyphicon-user'></span>Admin</a></li>
		        <li><a href="#"><span class='glyphicon glyphicon-cog'></span>修改密码</a></li>
		        <li><a href="login.html" onclick='return confirm("您确认退出吗?")'><span class='glyphicon glyphicon-off'></span>安全退出</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>

		<!-- 后台内容 -->
		<div class="row">
			<div class="col-md-2">

			    <div class="list-group User">
					<a href="javascript:" class="list-group-item active"><span class='glyphicon glyphicon-user'></span> 用户管理: <span class='glyphicon glyphicon-chevron-down pull-right right_more'></span></a>
					<a href="__APP__/User/index" class="list-group-item">用户信息管理</a>
					<a href="javascript:javascript:" class="list-group-item">用户留言管理</a>
					<a href="javascript:" class="list-group-item">更改管理员密码</a>
				</div>	

				<div class="list-group">
					<a href="javascript:" class="list-group-item active"><span class='glyphicon glyphicon-fire'></span> 商品管理:<span class='glyphicon glyphicon-chevron-down pull-right right_more'></span></a>
					<a href="javascript:" class="list-group-item usershow">添加商品</a>
					<a href="javascript:" class="list-group-item useradd">修改商品</a>
					<a href="javascript:" class="list-group-item useradd">商品类别管理</a>
					<a href="javascript:" class="list-group-item useradd">添加商品类别</a>
				</div>	

				<div class="list-group">
					<a href="javascript:" class="list-group-item active"><span class='glyphicon glyphicon-shopping-cart'></span> 订单管理:<span class='glyphicon glyphicon-chevron-down pull-right right_more'></span></a>
					<a href="javascript:javascript:" class="list-group-item">编辑订单</a>
					<a href="javascript:" class="list-group-item">查询订单</a>
				</div>	

				<div class="list-group">
					<a href="javascript:" class="list-group-item active"><span class='glyphicon glyphicon-envelope'></span> 信息管理: <span class='glyphicon glyphicon-chevron-down pull-right right_more'></span></a>
					<a href="javascript:javascript:javascript:" class="list-group-item">公告管理</a>
					<a href="javascript:javascript:" class="list-group-item">添加公告</a>
					<a href="javascript:" class="list-group-item">评论管理</a>
				</div>	
			</div>

			<div class="col-md-10 rightinfo">
				
   <table class="table table-striped table-bordered table-hover">
   	     <tr>
   	     	<th>用户查看</th>
   	     </tr>
   	     <tr>
   	     	<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><td></td><?php endforeach; endif; else: echo "" ;endif; ?>
   	     </tr>
   </table>

			</div>
		</div>
	</div>
</body>
<script>
$('.list-group-item').hide();
$('.list-group-item.active').show();
$('.list-group-item.active').first().nextAll().show();

$('.list-group-item.active').click(function(){
	$('.list-group-item.active').nextAll().hide();
	$(this).nextAll('.list-group-item').show();
});

// $('.list-group-item').hide();
// $('.list-group-item.active').show();
// $('.list-group-item.active').click(function(){
// 	$(this).nextAll().toggle();
// });

// 控制器
// $('.usershow').click(function(){
// 	$('.rightinfo').load('usershow.html');
// });

// $('.useradd').click(function(){
// 	$('.rightinfo').load('useradd.html');
// });
cls='<?php echo ($_GET['_URL_'][0]); ?>';
$('.'+cls).children().show();
</script>
</html>