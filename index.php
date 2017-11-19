<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/index_style.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <script src="//f2e.cloudcdn.biz/cdn_lib/react@15.6.1/react.min.js"></script>
    <script src="//f2e.cloudcdn.biz/cdn_lib/react@15.6.1/react-dom.min.js"></script>
    <script src="/bundles/jquery?v=JzhfglzUfmVF2qo-weTo-kvXJ9AJvIRBLmu11PgpbVY1"></script>

</head>
<body class="body">
<?php
  
  require 'Oracle_connect.php';
  
  if(!isset($_SESSION['uname'])){//若使用者尚未登入
	  header('Location:login.php');
  }
  else{
	   $uid=$_SESSION['uid'];
		
	   echo '<td align="center">'.$_SESSION['uname'].'您好!'.'<a href="logout.php" >登出</a>' ;
  }
?>
<div class="container" align="right">
  <aside class="side1" >
  	<h1 align="center">Let's Swap!</h1>
    
    <li class="secnav-right__profile file" >
    <a href="profile.php?id=<?php echo $uid?>"><span><img src="head.png" width="64" height="64" alt=""/></span></a>
    <div class="subnav subnav--profile subnav--cart-file">
        <div class="subnav--profile__content">
            <div class="profile">
                <div class="nanoscroll__content">
				<a class="subnav--cart__btn" href="">個人檔案</a>
                </div>
            </div>
        </div>
        <div class="subnav--cart__ft">
            <a class="subnav--cart__btn" href="">我的願望清單</a>
        </div>
    </div>
    <!-- /subnav--cart -->
    </li>

  </aside>
  <div class="jumbotron type">
  
    <div class="btn-group btype" role="group">
      
      <div class="btn-group" role="group">
        <button id="btnDropdown1" type="button" class="btn btn-default dropdown-toggle B1" data-toggle="dropdown" aria-expanded="false">服飾<span class="caret"></span></button>
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
  
  
  <div id="wall">
  
  
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
      
    </div>
  
  
</body>
</html>
