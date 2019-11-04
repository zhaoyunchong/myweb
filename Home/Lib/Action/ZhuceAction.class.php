<?php 

/**
 * 
 */
class ZhuceAction extends Action
{
	public function insert(){
		$user=M('Tb_user'); 
        $validate = array(
            array('name','','该用户名称已经存在！',0,'unique',1), 
            array('tel','','该手机号已经被注册了！',0,'unique',1), 
            array('repwd','pwd','俩次密码不一致!',0,'confirm',1),//验证确认密码是否和密码一致
        );
        if(md5(strtolower($_POST['fcode']))==$_SESSION['verify']){
            if($user->validate($validate)->create())
            {
                $user->dongjie=0;
                $user->regtime=time();
                $user->pwd=md5($_POST['pwd']);
                $user->add();
                $this->success('恭喜小主人！注册成功!',U('Index/index'));
            }else{
                $err=$user->getError();  
                $this->error($err,U('Index/index'));
            }
        }else{
            $this->error('验证码不正确!',U('Index/index'));
        }    	
    }


}




 ?>