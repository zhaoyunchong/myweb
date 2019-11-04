<?php 
/**
 * 
 */
class MesageAction extends LockAction
{
	public function add(){
		$this->display();
	}

	public function insert(){
		$title="信息管理";
		$this->assign('title',$title);
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/message/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
		    $this->error($upload->getErrorMsg());
		    
		}else{// 上传成功 获取上传文件信息
		    $info =  $upload->getUploadFileInfo();
		    $file1=$info[0]['savepath'].$info[0]['savename'];
		    $file2=$info[0]['savepath'].'t_'.$info[0]['savename'];
            $file3=$info[0]['savename'];
		    $file4='t_'.$info[0]['savename'];
		    import('ORG.Util.Image');
		    Image::thumb($file1,$file2,'',260,50);
		    $User = M("Tb_message"); // 实例化User对象
		    $User->create(); // 创建数据对象
		    $User->img = $file3; // 保存上传的照片根据需要自行组装
		    $User->simg = $file4; // 保存上传的照片根据需要自行组装
		    $User->add(); // 写入用户数据到数据库
		    $this->success('广告图片上传成功！');
		} // 保存表单数据 包括附件数据
	}
	public function show(){
	   $user=M('Tb_message');
	   $rows=$user->limit(6)->select();
	   $this->assign('rows',$rows);
       $this->display();
	}
	public function drop(){
       $title="信息管理";
	   $this->assign('title',$title);
   	   $id=$_GET['id'];
   	   $user=M('Tb_message');
   	   $row=$user->delete($id);
   	   if($row){
   	   	  // $this->success('删除成功!',U('index'));在ajax中不能跳转 而是返回一个状态值
   	   	 $arr['status']=1;
   	   	 $arr['info']="删除成功!";
   	   	 echo json_encode($arr);//json_encode 转换成json字符串
   	   }
   }

   public function pinglun(){
   	    $title="信息管理";
		$this->assign('title',$title);
		import('ORG.Util.Page');
        $db=M();
        $sql="select count(*) as tot from tb_pingjia";
        $row=$db->query($sql);
        $tot=$row[0]['tot'];
        $page=new Page($tot,3);
        $sql="select tb_shangpin.mingcheng, tb_user.name, tb_pingjia.* from tb_pingjia,tb_shangpin,tb_user where tb_pingjia.userid=tb_user.id and tb_pingjia.spid=tb_shangpin.id limit {$page->firstRow},{$page->listRows}";
        $rows=$db->query($sql);
        $show=$page->show();
        $this->assign('show',$show);
        $this->assign('rows',$rows);
		$this->display();
   }

   public function showpinglun(){
   	 $id=$_GET['id'];
   	 $user=M('tb_pingjia');
   	 $rows=$user->find($id);
   	 $this->assign('rows',$rows);
   	 $this->display();
   }
   public function delete(){
   	   $title="信息管理";
	   $this->assign('title',$title);
   	   $id=$_GET['id'];
   	   $user=M('Tb_pingjia');
   	   $row=$user->delete($id);
   	   if($row){
   	   	  // $this->success('删除成功!',U('index'));在ajax中不能跳转 而是返回一个状态值
   	   	 $arr['status']=1;
   	   	 $arr['info']="删除成功!";
   	   	 echo json_encode($arr);//json_encode 转换成json字符串
   	   }
   }

}








 ?>