<?php 
/**
 * 
 */
class LoginAction extends Action
{
	public function check(){
    	$user=M('Tb_user');
        $_POST['pwd']=md5($_POST['pwd']);
    	if(md5(strtolower($_POST['fcode']))==$_SESSION['verify']){
    		$row=$user->where($_POST)->find();
            if($row){
                if($row['dongjie']==0){
                    $_SESSION['username']=$row['name'];
                    $_SESSION['user_id']=$row['id'];
                     $_SESSION['num']=0;
                    $this->success('登录成功!',U('Index/index'));
                }else{
                    $this->error('该用户应被冻结!',U('Index/index'));
                }
            }else{
                $this->error('账号或密码错误!',U('Index/index'));
            }
    	}else{
            $this->error('验证码不正确!',U('Index/index'));
    	}
    	
    }

    public function logout(){
    	$_SESSION=array();
    	setcookie('PHPSESSID','',time()-3600,'/');
    	session_destroy();

    	$this->success('退出成功!',U('Index/index'));
    }
}






 ?>