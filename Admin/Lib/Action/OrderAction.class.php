<?php 
/**
 * 
 */
class OrderAction extends LockAction
{
    public function index()
    {   
    	$title="订单管理";
		$this->assign('title',$title);
    	import('ORG.Util.Page');
        $db=M();
        $sql="select count(*) as tot from tb_dingdan";
        $row=$db->query($sql);
        $tot=$row[0]['tot'];
        $page=new Page($tot,5);
        $sql="select *from tb_dingdan limit {$page->firstRow},{$page->listRows}";
        $rows=$db->query($sql);

        $show=$page->show();
        // $show="这个是分页类";
        $this->assign('show',$show);
                
        $this->assign('rows',$rows);
		$this->display();
    }
    public function look(){
        $user=M('tb_dingdan');
        $user2=M('Tb_shangpin');
        $id=$_GET['id'];
        $rows=$user->find($id);
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

    public function dingdan(){
        $user=M('tb_dingdan');
        $dingdanhao=$_POST['dingdanhao'];
        if($rows=$user->where("dingdanhao='{$dingdanhao}'")->find()){
             $this->assign('rows',$rows);
        }else{
            $this->error('此订单不存在!',U('index'));
        }
        $this->display();
    }

    public function edit(){
        $title="商品管理";
        $this->assign('title',$title);
        $user=M('Tb_dingdan');
        $rows=$user->find($_GET['id']);
        $this->assign('rows',$rows);
        $this->display();
    }

    public function change(){
        $title="订单管理";
        $this->assign('title',$title);
        $user=M('Tb_dingdan');
        $user->create();
        if($user->save()){
            $this->success('修改成功!',U('index'));
        }
    }

    public function delete(){
        $title="订单管理";
        $this->assign('title',$title);
        $user=M('tb_dingdan');
        if($user->delete($_GET['id'])){
            $this->success('删除成功!',U('index'));
        }
    }


}






 ?>