<?php
	header('Content-Type: application/json; charset=UTF-8');
	 require 'Oracle_connect.php';
	  if(!isset($_SESSION['uname'])){//若使用者尚未登入
	  header('Location:login.php');
  	}
  	else{
  		$uid="'".trim($_SESSION['uid'])."'";
  	}
?>
<?php

	$name="'".trim($_POST['username'])."'";
	$email="'".trim($_POST['email'])."'";
	$profile="'".trim($_POST['profile'])."'";
	$sql="UPDATE MEMBER SET mname=$name ,
							email=$email,
							profile=$profile 
		where MID=$uid";
	$stmt=oci_parse($db_link, $sql);
	if(!$stmt) {
        echo "<h1>ERROR – Could not parse SQL statement.</h1>";
        exit;
    }
    else{
	$_SESSION['uname']=$_POST['username'];
	oci_execute($stmt);
	echo json_encode(array('success'=>'修改成功','name'=>$_POST['username'],'email'=>$_POST['email'],'profile'=>$_POST['profile']));
	}
?>