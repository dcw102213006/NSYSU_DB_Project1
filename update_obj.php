<?php
//update_obj.php:修改文章內容
	
	require 'Oracle_connect.php';
	if(!isset($_SESSION['uname'])){//若使用者尚未登入
      
	  //header('Location:login.php');
  	}
  	else{
            
        $uid="'".trim($_SESSION['uid'])."'";
         $uname=   $_SESSION['uname'];//user name
        
        
        $oid="'".trim($_POST['oid'])."'";
        $oname="'".trim($_POST['obj_name'])."'";
        $obj_dec="'".trim($_POST['obj_dec'])."'";
        $sql="UPDATE object SET oname=$oname ,odescription=$obj_dec where OID=$oid and mid=$uid";
        $stmt=oci_parse($db_link, $sql);
        oci_execute($stmt);
        
        if(!$stmt) {
            echo "<h1>ERROR – Could not parse SQL statement.</h1>";
            exit;
        }
        else{
        
            
            echo  "Success";
        }
    }
?>