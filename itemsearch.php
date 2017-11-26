<?php 
  require 'Oracle_connect.php';
 
  if(!isset($_SESSION['uname'])){//若使用者尚未登入
    header('Location:login.php');
  }
  else{
     echo '<td align="center">'.$_SESSION['uname'].'您好!'.'<a href="logout.php" >登出</a>' ;
  }
?>
<?php
  if(isset($_POST['search-box'])){
    $search=$_POST['search-box'];
    $sql="SELECT OID,ONAME,OPICTURE,MID,OTIMESTAMP FROM Object WHERE ONAME LIKE '%$search%' ";
    $stmt=oci_parse($db_link, $sql);
    oci_execute($stmt);
    $oid=array();
    $oname=array();
    $opicture=array();
    $omid=array();
    $otimestamp=array();
    while($row=oci_fetch_row($stmt)){
      array_push($oid, $row[0]);
      array_push($oname,$row[1]);//取得物品name
      array_push($opicture,$row[2]);//取得物品src
      $mid=preg_replace('/[^\d]/','',$row[3]);
      array_push($omid, $mid);
      array_push($otimestamp, $row[4]);
    }
  /*for($i=0;$i<count($oname);$i++ ){
    echo '<img src='.$opicture[$i].'>';
  }*/
  }
  else{
    echo "沒有POST";
  }

  //output Object and Content
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Personal Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/index_style.css" rel="stylesheet" type="text/css">
  <link href="css/img_modal.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//f2e.cloudcdn.biz/cdn_lib/react@15.6.1/react.min.js"></script>
  <script src="//f2e.cloudcdn.biz/cdn_lib/react@15.6.1/react-dom.min.js"></script>




<style>
div.gallery {
    margin: 40px;
    border: 1px solid #ccc;
    float: left;
    width: 250px;
    height:250px;
}

div.gallery:hover {
    border: 10px solid #FFF;
}

div.gallery img {
    width: 240px;
    height: 240px;
    margin-top:5px;
}

div.desc { /* Add desc...區塊的大小*/
    padding: 15px;
    text-align: center;
  background-color: #FCFCFC
}
#wall{
    width:60%;
}
* {
    box-sizing: border-box;
}

.responsive {
    padding: 0 6px;
    float: left;
    width: 30%;
}

@media only screen and (max-width: 893px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
    .modal-content{
        clear:left;
        margin-right:100px;
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
</style>
</head>
<body class="body">

<div class="w3-container w3-blue-gray topbar">
  <form action="itemsearch.php" method="POST">
    <img src="title.png" alt="" width="198" height="84" class="tp" />
    <input id="search-box" type="text" name="search-box"/>
    <input type="submit">
    </form>
    
<aside class="loginside" align="right">
</aside>
</div>
<div class="container" align="center">
 <div class="container type" align="center">
  <div class="container selfdesc">
  <div class="container desc-text" align="center">
    <?php
  echo "共".count($oname)."項結果";
      ?><br>
    我是李帥，很帥
    </div> 
</div>
 
  </div>
<div id="wall" align="center">
 <?php 
      for($i=0;$i<count($oname);$i++){
                $s1="'".trim($oid[$i])."'";
                $s2="'C".trim($omid[$i])."'";
                $s3="'".trim($_SESSION['uid'])."'";
                $sql="SELECT * From LIKERECORD WHERE OID=$s1 and mid=$s2 and lid=$s3 ";       
                $stmt = oci_parse($db_link, $sql);
                    oci_execute($stmt); 
                    if(!$row=oci_fetch_row($stmt)){
                      echo "<div class='gallery'>"; 
                      echo "<img src=".$opicture[$i]."  id=".$oname[$i]." ;  width: 1000px; height: 741px; >";
                      echo "<div class='desc'><span class='glyphicon glyphicon-heart-empty' id=".$otimestamp[$i]." style='font-size:40px ;cursor:pointer' onclick='likefunction(".$otimestamp[$i].",".$oid[$i].",".$omid[$i].");'></span></div></div>";                    
                    }
                    else{
                      echo "<div class='gallery'>"; 
                      echo "<img src=".$opicture[$i]."  id=".$oname[$i]." ;  width: 1000px; height: 741px; >";
                      echo "<div class='desc'><span class='glyphicon glyphicon-heart-empty' id=".$otimestamp[$i]." style='font-size:40px ;cursor:pointer ;color:red'  onclick='likefunction(".$otimestamp[$i].",".$oid[$i].",".$omid[$i].");'></span></div></div>";
                    }
                
      }                          
?>
</div>
  
      
</div>
  
 </div>

      
    </div>
  

  </div>
</div>


<div id="myModal" class="modal"  >
  <span class="close">&times;</span>
  <div class="modal-content" id="text_area" style="">
    <img class="modal-content" id="img01" style="float:left"  >
    <div id="img_info" style="background-color:white;width:1000px;height:558px"><div id="delete_btn" style="float:right;margin:10px" >...</div></div>
  </div>
  
  
 
  
</div>

<div class="fixed w3-container post" align="center">
</div>
</body>


<script>
function likefunction (otimestamp,oid,omid){

    if(document.getElementById(otimestamp).style.color==""){
      document.getElementById(otimestamp).style.color="red";
    }
    else if (document.getElementById(otimestamp).style.color="red"){
        document.getElementById(otimestamp).style.color="";
    }
    $.ajax({
        url: "like.php?oid="+oid+"&omid=C"+omid ,  //傳值到object_delete.php做SQL運算
        type: "GET",
        dataType:  "json",
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            
        },
        error: function(){
        }           
            
    });     
}


   
</script>




</html>
