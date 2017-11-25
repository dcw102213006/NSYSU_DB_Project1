<!DOCTYPE html>
<html lang="en">
<head>
  <title>Let's Swap!</title>
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
  <script src="Select_Object_Content.js"></script>




<style>
div.gallery {
    margin: 2%;
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
    width:80%;
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
	<form action="">
    <img src="title.png" alt="" width="198" height="84" class="tp" />
  	<input id="search-box" type="text" name="search-box"/>
    </form>
    
<aside class="loginside" align="right">
<?php

  require 'Oracle_connect.php';
  
  if(!isset($_SESSION['uname'])){//若使用者尚未登入
      
	  header('Location:login.php');
  }
  else{
       $uid=$_SESSION['uid'];
	   echo $_SESSION['uname'].'您好!'.'<a href="logout.php">登出</a>' ;
  }
?>
</aside>
</div>

<<<<<<< HEAD
  </aside>
  
  <div class="fixed w3-container post" align="center">
  <a href="post.php?id=<?php echo $uid?>"><button class="button" >POST</button></a>
</div>

  <div class="container type" align="center">
  
=======
<div class="container group" align="center">
       
>>>>>>> ed2088116b4b753ade9d8ab87266294d9715b110
    <div class="btn-group btype" role="group">
      <div class="btn-group" role="group">
        <button id="btnDropdown1" type="button" class="btn btn-default dropdown-toggle B1" data-toggle="dropdown" aria-expanded="false" >服飾<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="btnDropdown1">
          <li><a onclick="select(1)">女生</a></li>
          <li><a onclick="select(2)">男生</a></li>
        </ul>
      </div>
      <div class="btn-group" role="group">
        <button id="btnDropdown1" type="button" class="btn btn-default dropdown-toggle B2" data-toggle="dropdown" aria-expanded="false" >鞋類<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="btnDropdown1">
          <li> <a onclick="select(3)">女生</a></li>
          <li> <a onclick="select(4)">男生</a></li>
        </ul>
      </div>
      <button type="button" class="btn btn-default B3"  onclick="select(5)">生活用品</button>
      <button type="button" class="btn btn-default B4" onclick="select(6)">3C</button>
      <button type="button" class="btn btn-default B5" onclick="select(7)">書本</button>
      <button type="button" class="btn btn-default B6" onclick="select(8)">文具</button>
    </div>
    
        <div class="w3-container profile" align="right">
		<div class="w3-dropdown-hover">
        <img class="w3-circle w3-image w3-jumbo" src="img_fjords.jpg" >
        <div class="w3-dropdown-content w3-bar-block w3-border">
        <a href="#" class="w3-bar-item w3-button">個人檔案</a>
        <a href="#" class="w3-bar-item w3-button">我的願望清單</a>
        </div>
    </div>
  </div>
 
  
<div id="wall" align="center">
      
</div>
  
      
</div>
  
  

      
    </div>
  
  </div>
</div>


<div id="myModal" class="modal"  >
  <span class="close">&times;</span>
  <div class="modal-content" id="text_area" style="">
    <img class="modal-content" id="img01" style="float:left"  >
    
  </div>
  
  
 
  
</div>

<<<<<<< HEAD


=======
<div class="fixed w3-container post" align="center">
  <a href="post.php?id=<?php echo $uid?>"><button class="button" >POST</button></a>
</div>
>>>>>>> ed2088116b4b753ade9d8ab87266294d9715b110
</body>


<script>
function select(type){
    document.location.href="index.php?type="+type;
}
   
</script>




</html>
