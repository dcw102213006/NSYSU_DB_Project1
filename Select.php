

<?php
header("Content-Type:text/html; charset=utf-8");


    require 'Oracle_connect.php';
    if(!isset($_SESSION['uname'])){//若使用者尚未登入
        echo"錯誤!尚未登入";
    }
    else{
	  
    
	  
        $uid="'".$_SESSION['uid']."'";
        if(isset($_GET['type']))
        {
            $type=$_GET['type'];//物品種類(cid)
            //sql_1:select 物品 文章
            $sql ="select * from object o,MEMBER m where o.mid=m.mid and o.cid=$type";
        }
        else if(isset($_GET['id'] )){
            $id="'".$_GET['id']."'";//PO文者
            //sql_2:select 其他使用者的 文章
            $sql ="select * from object o,MEMBER m where o.mid=m.mid and m.mid=$id";
        }
        else{
            $id="'".$_SESSION['uid']."'";//PO文者
            //sql_3:select 個人網頁的 文章
            $sql ="select * from object o,MEMBER m where o.mid=m.mid and m.mid=$id";
        }
        //宣告陣列
        $oid=array();
        $oname=array();
        $odec=array();
        $opic=array();
        $mname=array();
        $mid=array();
        $otime=array();
	    
          
        
        
        
        
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
              array_push($mname,$row[10]);//取得PO文者名字
              $m=preg_replace('/[^\d]/','',$row[7]);
              array_push($mid, $m);//取得PO文者ID
              array_push($otime,$row[8]);//取得PO文時間戳記
           }
           
        }
        
        //回傳訊息給前端
        $json = array(
            "oid" => $oid,
            "oname" =>$oname,
            "odec"=>$odec,
            "opic" =>$opic,
            "mname" =>$mname,
            "mid"=>$mid,
            "otime" =>$otime,
            
        );
        echo json_encode($json);

	   
    
	  
        
	   
    }

?>


