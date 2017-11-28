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
  <script src="fileupload.js"></script>
  <script src="update_profile.js"></script>




<style>
.space{
	border-spacing: 100% 100%;
	overflow: hidden;
}
div.gallery {
    border: 5px solid #FCFCFC;
    float: left;
	margin:1%;
}
div.gallery img:hover {
    border: 5px solid #FFF;
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
	height: auto;
	left:2%;
	padding:100px;
	margin-top: 20px;
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
<!--
以下為螢幕縮小變成手機menu圖案的css 
-->
.topnav {
  overflow: hidden;
  background-color: #333;
}
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.active {
  background-color: #4CAF50;
  color: white;
}
.topnav .icon {
  display: none;
}
@media screen and (max-width: 1300px) {<!--螢幕寬度1200px以下的css-->
  .topnav button:not(:first-child) {display: none;}
  .btn-group  button{display: none;}
  .topnav a.icon {
    float: right;
    display: block;
    background-color: #eae4e4;
  }
  #mobile_icon{
   color:black;
  
  }
}
@media screen and (max-width: 1300px) {
  .topnav.responsive {position: relative;}
  
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive button {
    float: none;
    display: block;
    text-align: left;
  }
  .group {
    
    width: auto;
    float: right;
    position: fixed;
    top: 80px;
    right: -15px;
    
   }
   .btn-group, .btn-group-vertical{
    position: relative;
    display: inline-block;
    vertical-align: middle;
    width: 50px;
   }
   #user_logout{
       margin-top:-22px;
       clear:left;
   }
}
</style>
</head>
<body class="body">

<div class="w3-container w3-blue-gray topbar" align="left">
    
    <div class="right">
<?php
  require 'Oracle_connect.php';
  
  if(!isset($_SESSION['uname'])){//若使用者尚未登入
      
	  header('Location:login.php');
  }
  else{
       $uid=$_SESSION['uid'];
	   echo '<div id="user_logout">'.$_SESSION['uname'].'您好!'.'<a href="logout.php">登出</a></div>' ;
       if(isset($_GET['id'])) $id=$_GET['id'];
	   else $id=$uid;//網址參數的id
      
       
  }
?>
	</div>
    
    <form action="itemsearch.php" method="POST">
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
</div>


	    <div class="container selfdesc" align="center">
        <img src="head.png" alt="headsticker" id="headsticker" width="128" height="128"/>
            <div class="container desc-text" align="left">
            <?php
            echo $_SESSION['uname'];
            ?>
            <?php if ($uid==$id) echo '<button id="p_edit_btn" class="btn-info btn-lg" data-toggle="modal" data-target="#myModal6">編輯</button>'?>
            <br>
            <br>
            <div id="profile_text"> </div>
            </div> 
		</div>
			
	
        <div id="wall" align="center">
              
        </div>
  
      

 


<div id="myModal" class="modal"  >
  <span id="close" class="close">&times;</span>
  
  <div class="modal-content" id="text_area" style="">
    <img class="modal-content" id="img01" style="float:left"  >
    <div id="img_info" style="background-color:white; width:800px; height:512px"><?php if ($uid==$id) echo '<button id="edit_btn" type="button"  class="btn btn-default dropdown-toggle B1">編輯</button><div id="delete_btn" class="btn btn-default dropdown-toggle B1"   style="float:right;margin:10px" >...</div>' ;?> 
	<div id="obj_cont" align="left" style="float: left; width:150px; height:500px; margin-left:50px; margin-top:20px"></div></div>
  
  </div>
  
  
 
  
</div>


<div class="fixed w3-container post" align="center">
    
  <button  type="button" class="button btn-info btn-lg" data-toggle="modal" data-target="#myModal5">PO文</button>
</div>



  <button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal5" style="display:none">Open Modal</button>
  
  <!-- PO文 Modal -->
  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">發布貼文</h4>
        </div>
        <div class="modal-body" id="delete_msq">
                   
                    <form id="uploadForm" action="upload.php" method="post">
                    <label>上傳物品照片:</label><br/>
                    <input name="fileToUpload" type="file" class="inputFile"  id="fileToUpload"  accept="image/*" style="position:relative
                    align-content:center"/>

                    </form>



                    <div id="img_area">
                    <img id="img" src="">
                    <button onclick="document.getElementById('id01').style.display='block'" id="next_btn" type="button" class="btn btn-success" style="display:none">下一步</button>

                    </div>
                    

                    <div id="myModal" class="modal">
                      <span class="close">&times;</span>
                      <img class="modal-content" id="img01">
                      <div id="caption"></div>
                      
                    </div>


          
                    </div>
                    <div class="modal-footer">
                      
                      
                      <button id="Po_cancel_btn" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
      
    </div>
</div>

<div class="w3-container">
  

  

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>發佈貼文</h2>
      </header>
      <div class="w3-container">
	        <div id="modal_fo">
	        物品名稱: <input type="text" size="10" id="obj_name"><br><br>
          物品種類: <form action="insert.php" method='post'><select name="obj_category" id="obj_category">
                      <option selected value="DEFAULT">選擇一個分類</option>
                      <option value="1">服飾/女生</option>
                      <option value="2">服飾/男生</option>
                      <option value="3">鞋類/女生</option>
                      <option value="4">鞋類/男生</option>
                      <option value="5">生活用品</option>
                      <option value="6">3C</option>
                      <option value="7">書本</option>
                      <option value="8">文具</option>
                   </select>
                   </form>
                  
                
                   <div></div>
          
          <textarea rows="30" cols="90" placeholder="對這個物品寫點敘述吧" id="obj_dec" name="obj_dec"></textarea>
                
           
		    <button onclick="declare()" style="float:right" type="button" class="btn btn-info"  id="img_submit">發佈</button>
			</div>
      </div>
	  <div id="mes" style="display:none">
			    <div class="alert alert-success" >
                   <strong>Success!</strong> 發佈貼文成功!
                </div>
	  </div>
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
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
          
          物品名稱:<input type="text" id="obj_name_edit">
          <br>
          內容:
          <br>
          <textarea rows="20" cols="40" placeholder="對這個物品寫點敘述吧" id="obj_dec_edit" name="obj_dec"></textarea>
                
           
		   <button onclick="edit_request()" style="float:right" type="button" class="btn btn-info"  id="img_submit">更改</button>
        </div>
        <div class="modal-footer">
          <button id="edit_suc" type="button" class="btn btn-default" data-dismiss="modal" style="display:none">success</button>
          
        </div>
      </div>
      
    </div>
  </div>

    <!-- profileupdate Modal -->
  <button id="show_profile_modal" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal66" style="display:none">Open Modal</button>
  <div class="modal fade" id="myModal66" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">編輯個人檔案</h4>
        </div>
        <div class="modal-body" id="delete_msq">
          
          帳號名稱:<input type="text" id="username" style="width: 150px; margin-left: 10px">
          <br>
		  Email:<input type="text" id="email" style="margin-top:10px;margin-left:20px; width: 315px">
          <br><br>
          個人簡介:
          <br>
          <textarea rows="20" cols="40" placeholder="介紹一下自己吧!" id="profile" name="profile" style="margin-top:10px"></textarea>
                
           
		   <button onclick="p_edit_request()" style="float:right" type="button" class="btn btn-info"  id="profile_submit">更改</button>
        </div>
        <div class="modal-footer">
          <button id="p_edit_suc" type="button" class="btn btn-default" data-dismiss="modal" style="display:none">success</button>
          
        </div>
      </div>
      
    </div>
  </div>




</body>

<script>
function declare(){
	 
	 
	$("#uploadForm").submit();//上傳圖片
	 
	
	
	
	
	
	
	
     
}
$(document).ready(function(){
   $( "#next_btn" ).click(function() {
       $("#modal_fo").show();
	   $("#mes").hide();
   });
});
</script>




<script>
function select(type){
    document.location.href="index.php?type="+type;
}
   
</script>



<script>
function myFunction() {
    //按手機menu icon執行以下動作:
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";//展開選單
        $('#mobile_icon').css("right","50px");
        $('.group').css("right","15px");
        
    } else {
       
        x.className = "topnav";//收起選單
       $('.group').css("right","-15px");
    }
}
</script>



</html>