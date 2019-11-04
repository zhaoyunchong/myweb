<?php 
class UserModel extends Model{
	protected $patchValidate=true;

	protected $_validate=array(
		 array('repassword','password','输入的俩次密码不一致!',0,'confirm'),
		);
}
 ?>