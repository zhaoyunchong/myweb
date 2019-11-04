<?php 

class LockAction extends Action{
	public function _initialize(){
		if(!$_SESSION['admin_userid']){
			$this->error('请您先登录!',U('Login/index'));
			exit;
		}
	}
}
?>