<?php
header('Content-Type: application/json; charset=UTF-8');
require 'Oracle_connect.php';
if(!isset($_SESSION['uname'])){//若使用者尚未登入
	  echo "錯誤!尚未登入";
}
else{
	$oid="'".$_GET['oid']."'";
	$mid="'".$_GET['omid']."'";
	$liker="'".$_SESSION['uid']."'";
	$sql="SELECT * From LIKERECORD WHERE OID=$oid and mid=$mid and lid=$liker ";      //搜尋按讚紀錄
	$stmt = oci_parse($db_link, $sql);
     if(!$stmt) {
        echo "<h1>ERROR – Could not parse SQL statement.</h1>";
        exit;
    }
    else{
    oci_execute($stmt);
    	if(!$row=oci_fetch_row($stmt)){
    		$sql="INSERT INTO LIKERECORD (OID,MID,LID) VALUES ($oid,$mid,$liker)";   //無紀錄則增加
    		$stmt=oci_parse($db_link, $sql);
    		oci_execute($stmt);
    		exit;
    	}
    	else{
    		$sql="DELETE FROM LIKERECORD WHERE OID=$oid AND MID=$mid";				//有紀錄則刪除
    		$stmt=oci_parse($db_link, $sql);
    		oci_execute($stmt);
    		exit;
    	}
	}
}
	


?>