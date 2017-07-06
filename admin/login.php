<?php if(isset($_POST["login"])){
	require "Models/Admin.php";
	$admin=new Admin();
	$error=$admin->login($_POST);


}
?>
<style>

.container{
	margin:0 auto;
	padding:0;
	text-align:center;
	margin-top:10%;
	font-family: arial;
	background-color:#ddd;
	width:40%;
	height:40%;
	padding:10px;
	line-height: 30px;


}
label{
	font-weight: normal;
}
input{
	height: 30px;
	margin:5px;
	padding:5px;


}
input[type="submit"]{
	margin-top:20px;
	background-color: #a8d;
	border-radius: 5px;
	border-color:#000;
	font-style:italic;
	padding:5px;
	width:100px;
	cursor:pointer;
}
input[type="submit"]:hover{
	background-color:#fff;
}
.errors{
	font-size:14px;
}








</style>

<div class="container">
<div class="content">
<form method="post">
<label> Потребителско име</label><br>
<input type="text" name="login" placeholder="Потребителско име">
<br>
<label>Парола</label>
<br> <input type="password" name="password" placeholder="Парола ">
<br>
<input type="submit" value="Вход">


</form>
<div class="errors">
<?php if(isset($error)){
	echo $error;

}
?>
</div>

	
</div>