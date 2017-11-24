

<?php
header("Content-Type:text/html; charset=utf-8");


    require 'Oracle_connect.php';
    if(!isset($_SESSION['uname'])){//若使用者尚未登入
        echo"錯誤!尚未登入";
    }
    else{
	  
    
	  
        $uid="'".$_SESSION['uid']."'";
        
        //宣告陣列
        $oid=array();
        $oname=array();
        $odec=array();
        $opic=array();
        
	   
	  
        //sql:select 物品 文章
        $sql ="select * from Object ";
        $stmt = OCIParse($db_link, $sql);
        if(!$stmt) {
          echo "<h1>ERROR – Could not parse SQL select statement.</h1>";
          exit;
        }
        else{

           OCIExecute($stmt);

            
                
           while($row = oci_fetch_row($stmt)){
              array_push($oid,$row[0]);//取得物品id
              array_push($oname,$row[1]);//取得
              array_push($odec,$row[2]);//取得物品敘述
              array_push($opic,$row[3]);//取得圖片路徑
              
           }
           
        }
        
        //回傳訊息給前端
        $json = array(
            "oid" => $oid,
            "oname" =>$oname,
            "odec" =>$odec,
            "opic" =>$opic
        );
        echo json_encode($json);

	   
    
	  
        
	   
    }

?>


