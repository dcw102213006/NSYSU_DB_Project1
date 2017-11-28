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
  <script src="fileupload.js"></script>

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
       display:none;
   }
   #logout_a{
       float:right;
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


	<div class="space" align="center"><!--用來控制wall的overflow的區塊-->


		<div id="wall" align="center">
      
		</div>
  
      
	</div>
  
  

      
    </div>
  
  </div>
</div>
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

<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <div class="modal-content" id="text_area">
    <img class="modal-content" id="img01" style="float:left; width:512px; height:512px">
    <!--用白色的DIV裝整個圖片包含敘述部分-->
	<div id="img_info" style="background-color:white; width:800px; height:512px">
		<div id="obj_cont" align="left" style="float: left; width:200px; height:500px; margin-left:50px; margin-top:20px">
		</div>
	</div>
  </div>
  
  
 
  
</div>

<div class="fixed w3-container post" align="center">
  
  <button  type="button" class="button btn-info btn-lg" data-toggle="modal" data-target="#myModal2">PO文</button>
</div>



  <button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2" style="display:none">Open Modal</button>
  
  <!-- PO文 Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
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
