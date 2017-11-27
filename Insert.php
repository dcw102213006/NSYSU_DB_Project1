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
        $obj_category="'".$_POST['obj_category']."'";
        $time=strtotime("now");//發文的時間戳計
	   
	  
        //sql:select 物品id
        $sql ="select Max(oid)+1 , Count(*) from Object where Mid=$uid ";
        $stmt = OCIParse($db_link, $sql);
        if(!$stmt) {
          echo "<h1>ERROR – Could not parse SQL select statement.</h1>";
          exit;
        }
        else{

           OCIExecute($stmt);

            
                
           if($row = oci_fetch_row($stmt)){
              if($row[0]==null)$oid=1;
              else $oid=$row[0];
              $index=$row[1];
              echo $oid;
           }
           else{
               echo 'select error!';
           }
        }
	    
	   
    
	  
        //sql:insert into Object
        $sql="INSERT into Object (oid,oname,odescription,cid,mid,opicture,otimestamp) values ($oid,$obj_name,$obj_dec,$obj_category,$uid,$img_title,$time)";
        $stid = oci_parse($db_link, $sql);
        //echo $sql;
        oci_execute($stid); // The row is committed and immediately visible to other users 
        //回傳訊息給前端
        $json = array(
            "oid" => $oid,
            "index" =>$index
            
        );
        echo json_encode($json);

	   
    }
?>
