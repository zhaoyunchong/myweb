<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends LockAction {
    public function index(){
        $id=$_SESSION['admin_userid'];
        $this->assign('id',$id);
        $title="用户管理";
        $this->assign('title',$title);
        import('ORG.Util.Page');
        $db=M();

        $sql="select count(*) as tot from tb_user";
        $row=$db->query($sql);
        $tot=$row[0]['tot'];

        $page=new Page($tot,3);

        $sql="select *from tb_user limit {$page->firstRow},{$page->listRows}";
        $rows=$db->query($sql);

        $show=$page->show();
        // $show="这个是分页类";
        $this->assign('show',$show);
                
        $this->assign('rows',$rows);

        $this->display();
    }

    public function changestate(){
        $user=M('Tb_user');
        $id=$_GET['id'];
        $rows=$user->select($id);
        // echo "<pre>";
        // print_r($row);
        // echo "</pre>";
        foreach($rows as $row){
            $arr[]=$row['dongjie'];
        }
        $flat=$arr[0];
        if($flat==0){
             $sql="update tb_user set dongjie=1 where id={$id}";
        }
        if($flat==1){
             $sql="update tb_user set dongjie=0 where id={$id}";
        }
        $db=M();
        if($db->execute($sql)){
            $this->redirect('index');
        }else{
            echo $db->getLastSql();
            exit;
            $this->error('修改失败',U('index'));
        }
    }

    public function edit(){
        $user=D("Tb_admin");
        $pwd=$_POST['pwd'];
        $id=$_POST['id'];
        $row=$user->where($id)->select();
        $olpwd=$row[0]['password'];
        if($pwd==$olpwd){
               $user->create(); 
               $user->save();
               $this->success('修改成功!',U('index'));
        }else{
            $this->error('原密码输入错误!',U('index'));
        }     
    }
    public function showuser(){
        $user=M('Tb_user');
        $username=$_POST['name'];
        if($rows=$user->where("name='{$username}'")->find()){
             $this->assign('rows',$rows);
        }else{
            $this->error('不存在此用户!',U('index'));
        }
        $this->display();
    }
    public function del(){
        $user=M('Tb_user');
        $cond=join(',',$_POST['del']);
        if($user->delete($cond)){ 
         $this->success("删除成功!",U('index'));
       }
    }

}