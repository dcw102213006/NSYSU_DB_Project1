<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>會員登入</title>
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
<?php
header("Content-Type:text/html; charset=utf-8");
$uname=isset($_POST['uname'])?$_POST['uname']:'';
$pwd=isset($_POST['pwd'])?$_POST['pwd']:'';

require 'Oracle_connect.php';
if(  $uname  ){
    $uname="'".trim($uname)."'";
    $pwd="'".trim($pwd)."'";//強制將字串加上quote,Oracle預設將不加quote的字串強制轉成大寫字母,會引發sql的語句error
    
  //sql:從MEMBER資料表檢查此帳號密碼是否存在
  $sql ="select * from MEMBER where Account=$uname and Password=$pwd ";
    $stmt = OCIParse($db_link, $sql);
    if(!$stmt) {
        echo "<h1>ERROR – Could not parse SQL statement.</h1>";
        exit;
    }
  else{
      try {
            if(!@OCIExecute($stmt))throw new Exception();//例外事件,可能為使用者輸入惡意字串
    
        else{
                //以下為使用者輸入正常的字串
              if($row = oci_fetch_row($stmt)){
            $_SESSION['uname']=$row[1];
          $_SESSION['uid']=$row[0];
              header('Location:index.php');
        
    
              }
              else{
                echo '無此帳號!';
              }
        }
      }
      catch(Exception $e){//SQL command not properly ended 
        echo '無此帳號!';
      }
    }
}

?>
<body>
<div class="container">
<img src="banner.jpg" alt="banner" class="banner"/>
<div>
<form action="login.php" method="Post">
<h1 align="center"><b>登入</b></h1>
  <div class="container">
    <label><b>帳號:</b></label>
    <input type="text" id="uname" placeholder="Enter Account" name="uname" required><br><br>

    <label><b>密碼:</b></label>
    <input type="password" id="pwd" placeholder="Enter Password" name="pwd" required><br><br>
        
    <button type="submit" id="btn">登入</button>
    <button type="button" id="btn_c" onclick="javascript:location.href='register.php'">註冊</button>
   
  </div>

</body>
</html>




