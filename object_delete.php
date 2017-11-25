<?php
header('Content-Type: application/json; charset=UTF-8');
require 'Oracle_connect.php';
if(!isset($_SESSION['uname'])){//若使用者尚未登入
	  echo "錯誤!尚未登入";
}
else{
	$oid=$_GET['oid'];
	$uid="'".$_SESSION['uid']."'";
	$sql="Delete From OBJECT WHERE OID=$oid and mid=$uid ";                  //刪除所選之照片
	$stmt = oci_parse($db_link, $sql);
     if(!$stmt) {
        echo "<h1>ERROR – Could not parse SQL statement.</h1>";
        exit;
    }
    else{
    oci_execute($stmt);
    //unlink($src);                                                   //本地端檔案也一並刪除
    echo json_encode(array('delete_status'=>'刪除成功'));
    return;
	}
}
	


?>