<?php 
/**
 * 
 */
class ShopAction extends LockAction
{
	public function index(){
		$title="商品管理";
		$this->assign('title',$title);
		$this->display();
	}
	public function show(){
		$title="商品管理";
		$this->assign('title',$title);
		import('ORG.Util.Page');
        $db=M();

        $sql="select count(*) as tot from tb_shangpin";
        $row=$db->query($sql);
        $tot=$row[0]['tot'];

        $page=new Page($tot,5);

        $sql="select *from tb_shangpin limit {$page->firstRow},{$page->listRows}";
        $rows=$db->query($sql);

        $show=$page->show();
        // $show="这个是分页类";
        $this->assign('show',$show);
                
        $this->assign('rows',$rows);
		$this->display();
	}
	public function edit(){
		$title="商品管理";
		$this->assign('title',$title);
		$user=M('Tb_shangpin');
		$rows=$user->find($_GET['id']);
        $this->assign('rows',$rows);
		$this->display();
	}
	public function insert(){
        $title="商品管理";
		$this->assign('title',$title);
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/Uploads/';// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
		    $this->error($upload->getErrorMsg());
		    
		}else{// 上传成功 获取上传文件信息
		    $info =  $upload->getUploadFileInfo();
		} // 保存表单数据 包括附件数据
		$User = M("Tb_shangpin"); // 实例化User对象
		$User->create(); // 创建数据对象
		$pinpai=$_POST['pinpai'];
		switch ($pinpai) {
			case '小米':
				$User->typeid=4;
				break;
			case '华为':
				$User->typeid=8;
				break;
		}
		$User->img = $info[0]['savename']; // 保存上传的照片根据需要自行组装
		$User->add(); // 写入用户数据到数据库
		$this->success('商品添加成功！');
	}

	public function change(){
		$title="商品管理";
		$this->assign('title',$title);
		$user=M('Tb_shangpin');
        $user->create();
		if($user->save()){
			$this->success('修改成功!',U('show'));
		}
	}

    public function drop(){
       $title="商品管理";
	   $this->assign('title',$title);
   	   $id=$_GET['id'];
   	   $user=M('Tb_shangpin');
   	   $row=$user->delete($id);
   	   if($row){
   	   	  // $this->success('删除成功!',U('index'));在ajax中不能跳转 而是返回一个状态值
   	   	 $arr['status']=1;
   	   	 $arr['info']="删除成功!";
   	   	 echo json_encode($arr);//json_encode 转换成json字符串
   	   }
   }

   public function showgoods(){
   	    $user=M();
        $mingcheng=$_POST['mingcheng'];
        $sql="select * from tb_shangpin where mingcheng like '%{$mingcheng}%'";
        if($rows=$user->query($sql)){
             $this->assign('rows',$rows);
        }else{
            $this->error('此商品不存在!',U('index'));
        }
        $this->display();
   }
}

 ?>