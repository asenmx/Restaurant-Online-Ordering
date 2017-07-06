<?php
session_start();
if(!isset($_SESSION['id'])){
	require("login.php");
}

else{
	if(isset($_GET['logout'])){
		session_destroy();
		echo"<script>location.href='index.php';</script>";
	}
	require"Models/Admin.php";
$admin=new Admin();
require"views/header.php";
if(isset($_GET["page"])&&($_GET["page"]!="")){
	require"views/".$_GET["page"].".php";
}
else{
	require("views/default.php");
}
require"views/footer.php";
}
?>