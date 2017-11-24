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
  <script src="delete.js"></script>
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
<form id="deleteForm" action="object_delete.php" method="GET">
  <img src="uploads/C1003_1511110483.jpg" width="208" height="83" alt="" align="center"><br/>
  <input type="hidden" value="uploads/C1003_1511110483.jpg" id="imgsrc">                  <!--將圖片的SRC傳至Jquery!-->
  <label>Delete Image File:</label><br/>
  <button type='button' id='delete_submit' onclick="DeleteObj()" ">Delete</button>
</form>
<script type="text/javascript">
  function DeleteObj() {
    $("#deleteForm").submit();
} 

</script>

</body>



</html>
