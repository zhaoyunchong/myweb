<?php
// 本类由系统自动生成，仅供测试用途
class UserAction extends Action {
    public function index(){
    	 // echo C('DB_NAME');获取数据的名字
         $user=D('User');//Model类操作数据库的类

         // try{
         //   $user->startTrans();
         //   $user->delete(6);
         //   $user->delete(7);
         //   $user->deletee(8);
         //   $user->commit();
         //   echo "删除成功!";
         // } catch(Exception $e){
         //   echo "删除失败!";
         //   $user->rollback();
         // }    
         $rows=$user->where('id<95')->select();

         // echo "<pre>";
         // print_r($rows);
         // echo "</pre>";
         $this->assign('rows',$rows);//把$row分配到模板上去
  	     $this->display();
   }
 
   public function delete(){
       $id=$_GET['id'];
       $user=M('user');
       $row=$user->where('id in(109,110,111)')->delete();//删除之后返回的是影响行数
       echo $row;
       // if($row){
       // 	 // $this->error('删除成功!',U('index'));
       // 	 $this->success('删除成功!',U('index'));
       // 	 // 以上的俩种方法的跳转,中间会有个三秒的过度界面，使用重定向可以去掉过度界面
       // 	 // $this->redirect('index');
       // }else{
       // 	 $this->error('删除失败!',U('index'));
       // }

   }

   public function drop(){
   	   $id=$_GET['id'];
   	   $user=M('user');
   	   $row=$user->delete($id);
   	   if($row){
   	   	  // $this->success('删除成功!',U('index'));在ajax中不能跳转 而是返回一个状态值
   	   	 $arr['status']=1;
   	   	 $arr['info']="删除成功!";

   	   	 echo json_encode($arr);//json_encode 转换成json字符串
   	   }
   }

   public function show(){
   	 $this->display();
   }

   public function add(){
      $this->display();
   }

   public function insert(){
      // echo "<pre>";
      // print_r($_SESSION);
      // echo "</pre>";
      // exit;
      $user=M('User');//**M 前面没有new ***M()只是一个公共方法不是一个类
      // $user->say();
      // exit;
      if($user->create()){
        $user->add();
        $this->success('插入数据成功!',U('index'));
        // echo $user->getLastSql();
      }else{
        $err=$user->getError();
        $str='';
        foreach($err as $error){
          $str.=$error.'<br>';
        }        
        // echo "<pre>";
        // print_r($str);
        // echo "</pre>";
        $this->success($str,U('add'));
      }
      // $this->password=md5($_GET['pass']); 可以使用这种方法对密码进行加密
      // $user->time=time();//这里给类添加变量不是用$this 因为不是给 User类添加属性的 time()时间戳函数
      // echo "<pre>";
      // print_r($user);
      // echo "</pre>";
      // exit;

      // if($user->add()){
      //   // echo $user->getLastSql();  返回最后一次操作数据库的sql语句
      //   $this->success('插入数据成功!',U('index'));
      // }
   }

   public function edit(){
      $db=M('User');
      $rows=$db->find($_GET);

      $this->assign("rows",$rows);
      $this->display();
   } 
   
    public function update(){
      $db=M('User');
      $db->create();

      if($db->save()){
         $this->success("修改成功!",U('index'));
      }
    }

    public function delall(){
       $user=D('User');
       $cond=join(',',$_POST['del']);
       // echo $cond;
       // exit;
       
       if($user->delete($cond)){ //$this->delete('1,2,3');删除ID为 1，2，3的数据
         $this->success("删除成功!",U('index'));
       }
    }

    public function vcode(){
      import('ORG.Util.Image');
      Image::buildImageVerify();
      // Image::GBVerify();
    }

}
