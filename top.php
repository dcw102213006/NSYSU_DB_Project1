<!DOCTYPE html>
<html lang="en">
<head>
  <title>排行榜</title>
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
  <script src="topten.js"></script>
</head>
<style>
.body{
	background-color: #E09416;
}
.selfdesc{
	height: 100%;
	padding: 50px;
}

</style>
<body>
<div class="body">

<div class="w3-container w3-blue-gray topbar" align="left">
    
    <div class="right">
	<?php
  	require 'Oracle_connect.php';
  
  	if(!isset($_SESSION['uname'])){//若使用者尚未登入
      
	  header('Location:login.php');
  		}
  	else{
       $uid=$_SESSION['uid'];
	    echo '<div id="user_logout">'.$_SESSION['uname'].'您好!</div>'.'<div id="logout_a"><a href="logout.php">登出</a></div>' ;
  		}
	?>  
	</div>
    
    <form action="itemsearch.php" method=POST>
		<a href="index.php">
			<img src="title.png" alt="title" width="124" height="56" class="tp" />
		</a>
		<input id="search-box" type="text" name="search-box"/>
		<button type="submit" class="sb">搜尋</button> 
    </form>
    
<div class="topnav" id="myTopnav">
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
       <a id="mobile_icon" href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
   </div>
   
   </div>
   
   	<div class="side">
	<div class="w3-dropdown-hover profile">
        <div id="profile_img"><img class="w3-circle w3-image w3-xlarge" src="head.png" style="width=56" height="56"></div>
        <div class="w3-dropdown-content w3-bar-block droplist">
        <img class="w3-bar-item w3-blue-gray s" style="height:5">
        <a href="profile.php?id=<?php echo $uid; ?>" class="w3-bar-item w3-button">個人檔案</a>
        <a href="top.php" class="w3-bar-item w3-button">排行榜</a>
        </div>
      </div>
      </div>
</div>

	    <div class="container selfdesc" align="center">

		<h1><b>TOP 10</b></h1>


			<?php

  
    
   	$sql="SELECT COUNT(*),l.OID,l.MID,o.ONAME from LIKERECORD l,OBJECT o
		  WHERE l.oid=o.oid AND l.mid=o.mid
		  GROUP BY l.oid,l.mid,o.oname
		  ORDER BY COUNT(*) DESC";
	$stmt=oci_parse($db_link, $sql);
	oci_execute($stmt);
	$o_count=array();
	$o_name=array();
	while($row=oci_fetch_row($stmt)){
		array_push($o_count,$row[0]);
		array_push($o_name,$row[3]);
	}
	for($i=0;$i<10;$i++)
	echo '<div class="rank" style="margin-top: 10px"><b>第'.($i+1).'名:</b><div>'.$o_name[$i].'<br>(讚數:'.$o_count[$i].')'.'</div>';
?>
			</div>
          
		
			

</div>
</body>
</html>