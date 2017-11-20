<?php
  
  require 'Oracle_connect.php';
  
  if(!isset($_SESSION['uname'])){//若使用者尚未登入
	  echo"錯誤!尚未登入";
  }
    else{
	  
	   $uid="'".$_SESSION['uid']."'";
	   $obj_dec="'".$_POST['obj_dec']."'";
	   $obj_name="'".$_POST['obj_name']."'";
       $img_title="'".$_POST['img_title']."'";
	   
	  
	   //sql:select 物品id
	   $sql ="select Count(*)+1 from Object where Mid=$uid ";
       $stmt = OCIParse($db_link, $sql);
       if(!$stmt) {
          echo "<h1>ERROR – Could not parse SQL select statement.</h1>";
          exit;
        }
	    else{
	   
           OCIExecute($stmt);
		
	    	
                
           if($row = oci_fetch_row($stmt)){
		      $oid=$row[0];
		      echo $oid;
           }
		   else{
               echo 'select error!';
	       }
        }
	    
	   
    
	  
	   //sql:insert into Object
	   $sql="INSERT into Object (oid,oname,odescription,cid,mid,opicture) values ($oid,$obj_name,$obj_dec,1,$uid,$img_title)";
	   $stid = oci_parse($db_link, $sql);
       echo $sql;
       oci_execute($stid); // The row is committed and immediately visible to other users 

	   
  }
?>
