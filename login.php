<!DOCTYPE html>
<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
<div id="content">
<h2>Login Form</h2>

<form action="login.php" method="Post">
  <div class="banner">
      <div class="fixed-bg">
   
      </div>
  </div>
  <div class="container">
    <label><b>Username</b></label>
    <input type="text" id="uname" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" id="pwd" placeholder="Enter Password" name="pwd" required>
        
    <button type="submit">Login</button>
   
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</div>
</body>
</html>
