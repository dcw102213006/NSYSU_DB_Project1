<?php
header('Content-Type: application/json; charset=UTF-8');
require 'Oracle_connect.php';
if(!isset($_SESSION['uname'])){//若使用者尚未登入
	  echo "錯誤!尚未登入";
}
	
	$liker="'".$_SESSION['uid']."'";
	if(isset($_GET['type'])){
		$type="'".$_GET['type']."'";
		$sql="select * from object o ,LIKERECORD l where  o.cid=$type and l.oid=o.oid and l.mid=o.mid and L.lid=$liker";
	}
	else{
		$sql="select * from object o ,LIKERECORD l where  l.oid=o.oid and l.mid=o.mid and l.lid=$liker and l.mid=$liker";
	}
	$stmt = oci_parse($db_link, $sql);
	oci_execute($stmt);
	$otimestamp=array();
	while($row = oci_fetch_row($stmt)){
		array_push($otimestamp, $row[8]);
	}
	$json = array(
        "otimestamp" => $otimestamp,
            
    );
    echo json_encode($json);
?>