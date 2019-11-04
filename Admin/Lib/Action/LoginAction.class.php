<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action {
    public function index(){
    	$this->display();
    }

    public function check(){
    	$user=M('Tb_admin');
    	$row=$user->where($_POST)->find();
    	if($row){
    		$_SESSION['admin_username']=$row['username'];
    		$_SESSION['admin_userid']=$row['id'];

    		$this->success('登录成功!',U('Index/index'));
    	}else{
    		$this->error('登录失败!',U('index'));
    	}
    }

    public function logout(){
    	$_SESSION=array();
    	setcookie('PHPSESSID','',time()-3600,'/');
    	session_destroy();

    	$this->success('退出成功!',U('index'));
    }
}