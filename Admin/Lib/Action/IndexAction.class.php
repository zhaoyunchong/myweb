<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends LockAction {
    public function index(){
    	$id=$_SESSION['admin_userid'];
    	$this->assign('id',$id);
    	$this->display();
    }
}