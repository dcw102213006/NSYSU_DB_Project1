<?PHP
    session_start();
    $db_link = oci_connect("GROUP4","teamnumber04","(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=140.117.69.58)(PORT=1521))(CONNECT_DATA=(SID=ORCL)))",'UTF8');
    //if (!$db_link) { die("資料連結失敗！"); }
    //else{ echo "OK"; }
	
	

?>
