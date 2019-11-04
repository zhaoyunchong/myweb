<?php 

class LockAction extends Action{
	public function _initialize(){
		if(!$_SESSION['user_id']){
			$this->error('请您先登录!',U('Index/index'));
			exit;
		}
	}
}
?>