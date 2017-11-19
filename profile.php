<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="css/index_style.css" rel="stylesheet" type="text/css">
  <link href="css/img_modal.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
  <script src="fileupload.js"></script>
  <script src="dialog.js"></script>
</head>
<body class="body">
<?php

  require 'Oracle_connect.php';
 
  if(!isset($_SESSION['uname'])){//若使用者尚未登入
	  header('Location:login.php');
  }
  else{
	   echo '<td align="center">'.$_SESSION['uname'].'您好!'.'<a href="logout.php" >登出</a>' ;
  }
?>


<form id="uploadForm" action="upload.php" method="post">
<label>Upload Image File:</label><br/>
<input name="fileToUpload" type="file" class="inputFile"  id="fileToUpload"  accept="image/*"/>
<input type="submit" value="Submit" class="btnSubmit" id="img_submit"/>
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


 

<div class="w3-container">
  

  

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>發布貼文</h2>
      </header>
      <div class="w3-container">
	        <div id="modal_fo">
	        物品名稱:<input type="text" size="10" id="obj_name">
            <textarea rows="30" cols="90" placeholder="對這個物品寫點敘述吧" id="obj_dec" name="obj_dec"></textarea>
                
            
		    <button onclick="declare()" style="float:right" type="button" class="btn btn-info">發布</button>
			</div>
      </div>
	  <div id="mes" style="display:none">
			    <div class="alert alert-success" >
                   <strong>Success!</strong> 發布貼文成功!
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
	 
	 
	$("#img_submit").submit();//上傳圖片
	 
	
	
	
	
	
	
	
     
}

$(document).ready(function(){

   $( "#next_btn" ).click(function() {
       $("#modal_fo").show();
	   $("#mes").hide();
   });

});




</script>






</html>
