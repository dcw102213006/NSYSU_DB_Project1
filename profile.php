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
  <script src="Select_Object_Content.js"></script>
  <script src="delete.js"></script>
  <script src="update.js"></script>




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
.modal-backdrop{
    background-color:white;
    Z-index:0;
}
.modal{
    background-color:rgba(199, 194, 194, 0.9);
}
.loader {
  margin-left:150px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
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
       $id=$_GET['id'];//網址參數的id
      
       
  }
?>
</aside>
</div>


<div class="container" align="center">
        <div class="container type" align="center">
        <div class="container selfdesc">
        <img src="head.png" alt="headsticker" id="head"/> <br>
            <div class="container desc-text" align="center">
            <?php
            echo $_SESSION['uname'];
            ?><br>
            我是李帥，很醜
            </div> 
        </div>
         
          </div>
        <div id="wall" align="center">
              
        </div>
  
      
</div>
 


<div id="myModal" class="modal"  >
  <span id="close" class="close">&times;</span>
  
  <div class="modal-content" id="text_area" style="">
    <img class="modal-content" id="img01" style="float:left"  >
    <div id="img_info" style="background-color:white;width:1000px;height:558px"><?php if ($uid==$id) echo '<button id="edit_btn" type="button"  class="btn btn-default dropdown-toggle B1">編輯</button><div id="delete_btn" class="btn btn-default dropdown-toggle B1" data-toggle="dropdown" aria-expanded="false"  style="float:right;margin:10px" >...</div>' ;?> <div id="obj_cont"></div></div>
  <ul class="dropdown-menu" role="menu" aria-labelledby="delete_btn">
          <li><a href="#" onclick="select(1)">女生</a></li>
          <li><a href="#" onclick="select(2)">男生</a></li>
        </ul>
  </div>
  
  
 
  
</div>


<div class="fixed w3-container post" align="center">
  <a href="post.php?id=<?php echo $uid?>"><button class="button" >POST</button></a>
</div>





  <button id="show_delete_modal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" style="display:none">Open Modal</button>
  
  <!-- delete Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">刪除貼文</h4>
        </div>
        <div class="modal-body" id="delete_msq">
          <p id="d_msq1">即將刪除此貼文,刪除後您將看不到此貼文,是否繼續?</p>
          
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#myModal3" onclick="delete_quest()">Check</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <button id="show_delete_modal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3" style="display:none">Open Modal</button>

  <!-- delete Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">刪除貼文</h4>
        </div>
        <div class="modal-body" id="delete_msq">
          
          <p id="d_msq2" >請稍候...</p>
          <div class="loader" id="loader" ></div>
          
        </div>
        <div class="modal-footer">
          <button id="delete_suc" type="button" class="btn btn-default" data-dismiss="modal" style="display:none">success</button>
          
        </div>
      </div>
      
    </div>
  </div>
  
  
  <!-- update Modal -->
  <button id="show_edit_modal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4" style="display:none">Open Modal</button>
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">編輯貼文</h4>
        </div>
        <div class="modal-body" id="delete_msq">
          
          物品名稱:<input type="text" id="obj_name">
          <br>
          內容:
          <br>
          <textarea rows="20" cols="40" placeholder="對這個物品寫點敘述吧" id="obj_dec" name="obj_dec"></textarea>
                
           
		   <button onclick="edit_request()" style="float:right" type="button" class="btn btn-info"  id="img_submit">更改</button>
        </div>
        <div class="modal-footer">
          <button id="delete_suc" type="button" class="btn btn-default" data-dismiss="modal" style="display:none">success</button>
          
        </div>
      </div>
      
    </div>
  </div>





</body>


<script>

   
</script>




</html>
