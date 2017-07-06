<?php
session_start();
$_SESSION['foods']=!isset($_SESSION['foods'])?array():$_SESSION['foods'];
$_SESSION['sum']=!isset($_SESSION['sum'])?0:$_SESSION['sum'];
//var_dump($_SESSION); die();
//session_destroy();
require"Models/User.php";
$user=new User();

require"views/header.php";


if(isset($_GET["page"])&&($_GET["page"]!="")){
	require"views/".$_GET["page"].".php";
}
else{
	require("views/default.php");
}


require"views/footer.php";



?>