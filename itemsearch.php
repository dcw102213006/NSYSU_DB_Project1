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
    border: 5px solid #FCFCFC;
    float: left;
	margin:1%;
}

div.gallery img:hover {
    border: 10px solid #FFF;
}

div.gallery img {
    width: 235px;
    height: 235px;
}

div.desc { /* Add desc...區塊的大小*/
    padding: 15px;
    text-align: center;
	background-color: #FCFCFC
}
#wall{
    width:100%;
	left:2%;
	padding:100px;
	border-spacing: 100% 100%;
	overflow: hidden;
}
* {
    box-sizing: border-box;
}
.modal-backdrop{
    z-index:0;
    
}
.modal{
   background-color:rgba(218, 207, 207, 0.9);
}
.responsive {
    padding: 0 4px;
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
        clear:both;
		position: absolute;
		top: 50%;
		left: 50%;
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);		
    }
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
.result-text{
	height: 30px;
	margin-top: 10px;
}

</style>
</head>
<body class="body">

<div class="w3-container w3-blue-gray topbar" align="left">
  <div class="right">
  <?php
      echo '<div id="user_logout">'.$_SESSION['uname'].'您好!</div>'.'<div id="logout_a"><a href="logout.php">登出</a></div>' ;
  ?> 
  </div>
    <form action="itemsearch.php" method=POST>
		<a href="index.php">
			<img src="title.png" alt="title" width="124" height="56" class="tp" />
		</a>
		<input id="search-box" type="text" name="search-box"/>
		<button type="submit" class="sb">搜尋</button> 
    </form>
    
    
    <div class="container group" align="center">
     <div class="btn-group btype" role="group" align="center">
      <div class="btn-group" role="group">
        <button id="btnDropdown1" type="button" class="btn btn-default dropdown-toggle B1" data-toggle="dropdown" aria-expanded="false">服飾<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="btnDropdown1">
          <li><a href="#" onclick="select(1)">女生</a></li>
          <li><a href="#" onclick="select(2)">男生</a></li>
        </ul>
      </div>
      <div class="btn-group" role="group">
        <button id="btnDropdown1" type="button" class="btn btn-default dropdown-toggle B2" data-toggle="dropdown" aria-expanded="false">鞋類<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="btnDropdown1">
          <li><a href="#" onclick="select(3)">女生</a></li>
          <li><a href="#" onclick="select(4)">男生</a></li>
        </ul>
      </div>
       <button type="button" class="btn btn-default B3"  onclick="select(5)">生活用品</button>
      <button type="button" class="btn btn-default B4" onclick="select(6)">3C</button>
      <button type="button" class="btn btn-default B5" onclick="select(7)">書本</button>
      <button type="button" class="btn btn-default B6" onclick="select(8)">文具</button>
    </div>
   </div>
   
   	<div class="side">
	<div class="w3-dropdown-hover profile">
        <img class="w3-circle w3-image w3-xlarge" src="head.png" style="width=56" height="56">
        <div class="w3-dropdown-content w3-bar-block droplist">
        <img class="w3-bar-item w3-blue-gray s" style="height:5">
        <a href="profile.php?id=<?php echo $_SESSION['uid']; ?>" class="w3-bar-item w3-button">個人檔案</a>
        <a href="#" class="w3-bar-item w3-button">我的願望清單</a>
        </div>
      </div>
      </div>
    </div>
	

 
  <div class="container selfdesc" style="height:50px">
  <div class="container result-text" align="center">
    <?php
  echo "共".count($oname)."項結果";
      ?><br>
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
<script>
function select(type){
    document.location.href="index.php?type="+type;
}
   
</script>



</html>
