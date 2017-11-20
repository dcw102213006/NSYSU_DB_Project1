<!DOCTYPE html>
<html lang="en">
<head>
  <title>Let's Swap!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="index_style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//f2e.cloudcdn.biz/cdn_lib/react@15.6.1/react.min.js"></script>
  <script src="//f2e.cloudcdn.biz/cdn_lib/react@15.6.1/react-dom.min.js"></script>




<style>
div.gallery { /*圖片的外框大小*/
    border: 5px solid #FFF;
}

div.gallery:hover {
    border: 3px solid #FFF;
}

div.gallery img {
    width: 100%;
    height: auto;
}

div.desc { /* Add desc...區塊的大小*/
    padding: 15px;
    text-align: center;
	background-color: #FCFCFC
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
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
</style>
</head>
<body class="body">
<aside class="loginside" align="right">
<?php

  require 'Oracle_connect.php';
 
  if(!isset($_SESSION['uname'])){//若使用者尚未登入
	  header('Location:login.php');
  }
  else{
	   echo $_SESSION['uname'].'您好!'.'<a href="logout.php">登出</a>' ;
  }
?>
</aside>

<div class="container" align="center">
  <aside class="side1">
  	<form action="">
    <img src="title.png" width="208" height="83" alt="" align="center"/>
  	<input id="search-box" type="text" name="search-box"/>
    </form>
    
    <div class="w3-container" align="right">
		<div class="w3-dropdown-hover">
        <img class="w3-btn w3-circle w3-image w3-jumbo" src="img_fjords.jpg" >
        <div class="w3-dropdown-content w3-bar-block w3-border">
        <a href="profile.php?id=<?php echo $uid?>" class="w3-bar-item w3-button">個人檔案</a>
        <a href="#" class="w3-bar-item w3-button">我的願望清單</a>
        </div>
    </div>
</div>

  </aside>
  
  
  <div class="container type" align="center">
  
    <div class="btn-group btype" role="group">
      <div class="btn-group" role="group">
        <button id="btnDropdown1" type="button" class="btn btn-default dropdown-toggle B1" data-toggle		="dropdown" aria-expanded="false">服飾<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="btnDropdown1">
          <li><a href="#">女生</a></li>
          <li><a href="#">男生</a></li>
        </ul>
      </div>
      <div class="btn-group" role="group">
        <button id="btnDropdown1" type="button" class="btn btn-default dropdown-toggle B2" data-toggle="dropdown" aria-expanded="false">鞋類<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="btnDropdown1">
          <li><a href="#">女生</a></li>
          <li><a href="#">男生</a></li>
        </ul>
      </div>
      <button type="button" class="btn btn-default B3">生活用品</button>
      <button type="button" class="btn btn-default B4">3C</button>
      <button type="button" class="btn btn-default B5">書本</button>
      <button type="button" class="btn btn-default B6">文具</button>
    </div>
  </div>
  
  
<div id="wall" align="center">
  <div class="responsive">
  	  <div class="gallery">
    <a target="_blank" href="img_fjords.jpg">
      <img src="img_fjords.jpg" alt="Trolltunga Norway" width="256" height="256">
    </a>
    <div class="desc">Add a description of the image here <br>
    <button type="button" class="btn btn-sm btn-default like">
 <!-- 統計回傳讚數  <? php
	?>-->
    
    </div>
 		</div>
</div>

<div class="responsive">
		<div class="gallery"> 
    <a target="_blank" href="img_fjords.jpg">
      <img src="img_fjords.jpg" alt="Trolltunga Norway" width="256" height="256">
    </a>
    <div class="desc">Add a description of the image here <br>
    <button type="button" class="btn btn-sm btn-default like"></button>
    </div>
		</div> 
</div>

<div class="responsive">
		  <div class="gallery">
    <a target="_blank" href="img_fjords.jpg">
      <img src="img_fjords.jpg" alt="Trolltunga Norway" width="256" height="256">
    </a>
    <div class="desc">Add a description of the image here <br>     
    <button type="button" class="btn btn-sm btn-default like"></button>
    </div>
 		</div>
</div>
  
      
  </div>
  
  
<?php 
for ($x = 0; $x <= 12; $x++) {
    echo "<div class='gallery'></div>";
} 
?>
      
    </div>
  
  </div>
</div>

<div class="container-fluid post" align="center">
  <button type="button" class="btn w3-circle w3-white w3-xlarge">+</button>
</div>
</body>
</html>
