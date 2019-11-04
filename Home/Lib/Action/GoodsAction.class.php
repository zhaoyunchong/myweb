<?php 
/**
 * 
 */
class GoodsAction extends Action
{
	public function index(){
		$id=$_GET['id'];
		$user=M('Tb_shangpin');
		$rows=$user->find($id);
		$this->assign('rows',$rows);
		$db=M('Tb_pingjia');
		$prows=$db->where("spid='{$id}'")->select();
		$this->assign('prows',$prows);
		$user2=M('Tb_user');
		foreach ($prows as $prow) {
			$arr[]=$prow['userid'];
			$arr2[]=$prow['content'];
			$arr3[]=$prow['time'];
		}
		$tot=sizeof($arr);
        for($i=0;$i<$tot;$i++){
            $row=$user2->find($arr[$i]);
            $arr1[]=$row['name'];
        }
        $this->assign('tot',$tot);
		$this->assign('arr1',$arr1);
		$this->assign('arr2',$arr2);
		$this->assign('arr3',$arr3);
		$this->display();
	}
}

 ?>