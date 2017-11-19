<?php
    session_start();
    $_SESSION['uname']=null;//清除使用者登入
	header("Location:login.php");//跳轉至登入頁面
?>