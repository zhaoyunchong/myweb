<?php 
/**
 * 
 */
class ShopAction extends LockAction
{
	public function index(){
		$rows=$_SESSION['shop'];
		$this->assign('rows',$rows);
		$this->display();
	}

	public function dingdan(){
		$title="购物车";
		$this->assign('title',$title);
		$pdo=db();
		$sql="select * from s_province";
        $smt=$pdo->query($sql);
        $rows=$smt->fetchAll(PDO::FETCH_ASSOC);
        $this->assign('rows',$rows);
		$this->display();
	}
	public function getcity(){
		$pdo=db();
        $pid=$_GET['pid'];
		$sql="select * from s_city where ProvinceID={$pid}";
		$smt=$pdo->query($sql);
		$rows=$smt->fetchAll(PDO::FETCH_ASSOC);
		echo "<option>--选择市--</option>";
		foreach($rows as $row){
			echo "<option value='{$row['CityID']}'>{$row['CityName']}</option>";
		}
	}
	public function getstrict(){
		$pdo=db();
		$cid=$_GET['cid'];
		$sql="select * from s_district where CityID={$cid}";
		$smt=$pdo->query($sql);
		$rows=$smt->fetchAll(PDO::FETCH_ASSOC);
		echo "<option>--选择区--</option>";
		foreach($rows as $row){
			echo "<option value='{$row['DistrictID']}'>{$row['DistrictName']}</option>";
		}
	}

	public function insert(){
		$user=M('Tb_shangpin');
		$id=$_GET['id'];
		$rows=$user->find($id);
		if($rows['shuliang']>0){
		  	$_SESSION['shop'][$id]=$rows;
		  	$_SESSION['shop'][$id]['num']=1;
		  	$_SESSION['num']++;
            $this->success('加入购物车成功!',U('index'));
		}else{
			$this->error('小主人你选择的商品库存不足了！请选择其他商品',U('Index/index'));
		}
	}

	public function add(){
		$id=$_GET['id'];
		$_SESSION['shop'][$id]['num']++;
		if($_SESSION['shop'][$id]['num']>$_SESSION['shop'][$id]['shuliang']){
			$_SESSION['shop'][$id]['num']=$_SESSION['shop'][$id]['shuliang'];
			$this->error('你购买的商品数量已达上限!',U('index'));
		}else{
            $this->redirect('index');
		}
	}
	public function cut(){
		$id=$_GET['id'];
		$_SESSION['shop'][$id]['num']--;
		if($_SESSION['shop'][$id]['num']<1){
			$_SESSION['shop'][$id]['num']=1;
			$this->error('您购买的商品数量已达最低限度!',U('index'));
		}else{
            $this->redirect('index');
		}
	}
    
    public function delete(){
    	$id=$_GET['id'];
    	unset($_SESSION['shop'][$id]);//unset清除session中的数据
    	$_SESSION['num']--;
    	$this->redirect('index');
    }

    public function delall(){
    	$_SESSION['shop']=array();
    	$_SESSION['num']=0;
    	$this->redirect('index');
    }

    public function savedingdan(){
    	$db=db();
    	$sql="select s_province.ProvinceName,s_city.CityName,s_district.DistrictName from s_province,s_city,s_district where s_province.ProvinceID={$_POST['sheng']} and s_city.CityID={$_POST['shi']} and s_district.DistrictID={$_POST['qu']}";
    	$smt=$db->query($sql);
		$rows=$smt->fetchAll(PDO::FETCH_ASSOC);
    	foreach ($rows as $row) {
    		$arr=$row;
    	}
    	$add=implode('', $arr);
    	$add.=$_POST['xiangxi'];
    	$code=time().mt_rand();
        $user_id=$_SESSION['user_id'];
        $tot=0;
        $abc=abc();
        foreach ($_SESSION['shop'] as $shop) {
        	   $arr1[]=$shop['id'];
        	   $arr2[]=$shop['num'];
               $tot+=$shop['jiage']*$shop['num'];
        	   $st=$shop['shuliang']-$shop['num'];
			   $sqlStock="update tb_shangpin set shuliang='{$st}' where id={$shop['id']}";	
			   $abc->exec($sqlStock);
        }
        $length=sizeof($arr1);
        if($length==1){
             $str1=$arr1[0];
             $str2=$arr2[0];
        }else{
        	$str1=implode('@', $arr1);
            $str2=implode('@', $arr2);
        }
        $user=M('Tb_dingdan');
        $user->create();
        $user->dingdanhao=$code;
        $user->spc=$str1;
        $user->slc=$str2;
        $user->dizhi=$add;
        $user->time=time();
        $str3="未做任何处理";
        $user->xiadanren=$_SESSION['username'];
        $user->zt=$str3;
        $user->total=$tot;
        if($user->add()){
        	$_SESSION['shop']=array();
        	$_SESSION['num']=0;
        	$this->success('订单提交成功！',U('User/index'));
        }else{
        	$this->error('订单提交失败!',U('index'));
        }

    }
}





 ?>