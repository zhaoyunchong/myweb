<?php 
/**
 * 
 */
class UserAction extends LockAction
{
	public function index(){
		$user=M('Tb_dingdan');
		$xiadanren=$_SESSION['username'];
		$rows=$user->where("xiadanren='{$xiadanren}'")->select();
		$this->assign('rows',$rows);
		$this->display();
	}

	   public function ding(){
        $user=M('Tb_dingdan');
        $dingdanhao=$_GET['dingdanhao'];
        $user2=M('Tb_shangpin');
        $rows=$user->where("dingdanhao='{$dingdanhao}'")->find();
        $shangpin=$rows['spc'];
        $shuliang=$rows['slc'];
        $arr=explode('@', $shangpin);
        $arr1=explode('@', $shuliang);
        $tot=sizeof($arr);
        for($i=0;$i<$tot;$i++){
            $row=$user2->find($arr[$i]);
            $arr2[]=$row['mingcheng'];
            $arr3[]=$row['jiage'];
        }
        $this->assign('tot',$tot);
        $this->assign('rows',$rows);
        $this->assign('arr2',$arr2);
        $this->assign('arr1',$arr1);
        $this->assign('arr3',$arr3);
        $this->display();
    }
    public function change(){
    	$id=$_GET['id'];
    	$user=M('Tb_dingdan');
    	$str="确认收货";
    	$user->zt=$str;
    	$user->where("id={$id}")->save();
    	$this->redirect('index');
    }

    public function delete(){
    	$id=$_GET['id'];
    	$user=M('Tb_dingdan');
    	$user->delete($id);
    	$this->redirect('index');
    }
    public function pinglun(){
    	$user=M('Tb_dingdan');
        $id=$_GET['id'];
        $user2=M('Tb_shangpin');
        $rows=$user->where("id={$id}")->find();
        $shangpin=$rows['spc'];
        $shuliang=$rows['slc'];
        $arr=explode('@', $shangpin);
        $tot=sizeof($arr);
        for($i=0;$i<$tot;$i++){
            $row=$user2->find($arr[$i]);
            $arr1[]=$row['img'];
            $arr2[]=$row['mingcheng'];
            $arr3[]=$row['id'];
        }
        $this->assign('tot',$tot);
        $this->assign('rows',$rows);
        $this->assign('arr1',$arr1);
        $this->assign('arr2',$arr2);
        $this->assign('arr3',$arr3);
        $this->display();
    }

    public function ping(){
        $spid=$_GET['spid'];
        $this->assign('spid',$spid);
    	$this->display();
    }
    public function saveping(){
        $user_id=$_SESSION['user_id'];
        $user=M('Tb_pingjia');
        $user->create();
        $user->userid=$user_id;
        $user->time=time();
        if($user->add()){
           $this->success('评价成功!',U('index'));
        }else{
            echo $user->getLastSql();
        }
    }
    public function changepwd(){
        $id=$_SESSION['user_id'];
        $pwd=md5($_POST['pwd']);
        $newpwd=md5($_POST['newpwd']);
        $user=M('Tb_user');
        $rows=$user->find($id);
        if($rows['pwd']==$pwd){
            $user->create();
            $user->pwd=$newpwd;
            $user->where("id={$id}")->save();
            $this->success('恭喜小主人密码修改成功!下次登陆请用新密码进行登陆！',U('index'));
        }else{
            $this->error('旧密码输入错误！',U('index'));
        }


          

    }
	
}





 ?>