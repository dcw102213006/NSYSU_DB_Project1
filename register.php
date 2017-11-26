<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>會員註冊</title>
<style>

.banner {
	width: 80%;	
}

.container{
	padding-top: 3%;
	text-align: center;
	margin-bottom: 10%;
}
#btn{
	margin-top: 5%;
	background-color: #3A385B;
	cursor: pointer;
	color: #FCFCFC;
	width: 60px;
	height: 40px;
	border: none;
	border-radius: 10px;
	box-shadow: 0 4px #999;
}

#btn_c{
	margin-top: 5%;
	background-color: #EF4A4A;
	cursor: pointer;
	color: #FCFCFC;
	width: 60px;
	height: 40px;
	border: none;
	border-radius: 10px;
	box-shadow: 0 4px #999;
	margin-left: 1%;
}
</style>
</head>

<body>
<div class="container">
<img src="banner.jpg" alt="banner" class="banner"/>
<div>

<h1 align="center"><b>註冊成為會員</b></h1>

<div class="container" align="center">
<form id="registerForm" action="register.php" method="post">	
	<label><b>姓名:</b></label>
	<input id="username" type="text" name="username" required="" /><br><br>
    <label><b>信箱:</b></label>
	<input id="email" type="email" name="email" required="" /><br><br>
    <label><b>帳號:</b></label>
	<input id="account" type="text" name="account" required=""/><br><br>
    <label><b>密碼:</b></label>
	<input id="password" type="password" name="password" required=""/><br><br>
    <input id="btn" type="submit" value="註冊">
    <input id="btn_c" type="reset" value="重置">
</form>    
</div>
<?php
	require 'Oracle_connect.php';
	if(isset($_POST['username'])&&isset($_POST["email"])&&isset($_POST['account'])&&isset($_POST['password'])){

	$name="'".trim($_POST['username'])."'";
	$email="'".trim($_POST['email'])."'";
	$account="'".trim($_POST['account'])."'";
	$password="'".trim($_POST['password'])."'";
	$sql="Select * From MEMBER WHERE EMAIL=$email OR ACCOUNT=$account ";
	$stmt = oci_parse($db_link, $sql);                 
    oci_execute($stmt);
    if($row=oci_fetch_row($stmt)) {
        	echo "<script>alert('EMAIL或帳號已有人使用過');</script";
    }
    else{   	
    	$sql="SELECT MID FROM MEMBER ORDER BY MID DESC";
    	$stmt = OCI_Parse($db_link, $sql);
    	oci_execute($stmt);
    		if($row = oci_fetch_row($stmt)){
              	 $num=preg_replace('/[^\d]/','',$row[0])+1;  //取出最後一個註冊的人的MID再加一
             	 $mid="'".trim("C".$num)."'";
             	 $sql="INSERT INTO MEMBER (MID,MNAME,EMAIL,ACCOUNT,PASSWORD) VALUES ($mid,$name,$email,$account,$password)";
             	 $stmt=OCI_Parse($db_link,$sql);
             	 OCI_Execute($stmt);
             	 echo "<script>alert('註冊成功，將在按下確認後跳轉頁面'); location.href = 'login.php';</script>";
           	}
           	else{
               	 echo "<script>alert('select error!');</script>";
           	}
    		
	}
}
?>

	 
</body>
</html>