<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>會員註冊</title>
<style>

.banner {
	width: 100%;	
}

.container{
	padding-top: 3%;
	text-align: center;
	margin-bottom: 10%;
}
#btn{
	margin-top: 5%;
	background-color: #3A385B;
	color: #FCFCFC;
	width: 60px;
	height: 40px;
	border: none;
	border-radius: 10px;
	box-shadow: 0 4px #999;
}

#btn_c{
	margin-top: 5%;
	background-color: #EF4A4A;
	color: #FCFCFC;
	width: 60px;
	height: 40px;
	border: none;
	border-radius: 10px;
	box-shadow: 0 4px #999;
	margin-left: 1%;
}
</style>
</head>

<body>
<div class="container">
<img src="banner.jpg" alt="banner" class="banner"/>
<div>

<h1 align="center"><b>註冊成為會員</b></h1>

<div class="container" align="center">
	<label><b>姓名:</b></label>
	<input id="username" type="text" name="username"/><br><br>
    <label><b>信箱:</b></label>
	<input id="email" type="text" name="email"/><br><br>
    <label><b>帳號:</b></label>
	<input id="account" type="text" name="account"/><br><br>
    <label><b>密碼:</b></label>
	<input id="password" type="text" name="password"/><br><br>
    <button id=btn type="submit"><b>註冊</b></button>
    <button id=btn_c type="submit"><b>取消</b></button>
    
</div>

	 
</body>
</html>