
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
<head>
    <title>Храната на Асен</title>

    <!-- мета-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

    <!-- css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- google font -->
    <link rel='stylesheet' href='css/fonts.css'>
    
    <!-- js -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.js"></script>


 
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="120" >
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div id="menu" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header visible-xs">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><h2>Храната на Асен</h2></a>
            </div><!-- navbar-header -->

        <div id="navbar" class="navbar-collapse collapse">
            <div class="hidden-xs" id="logo">
            <a href="index.php">
                <img src="img/logo.png" alt="">
            </a></div>

            <ul class="nav navbar-nav " >
                <li><a href="index.php#story">За нас</a></li>
                <li <?php if(isset($_GET['page'])&&$_GET['page']=='contact') { echo "class='active'"; } ?>
                ><a href="index.php?page=contact">Контакти</a></li>
                <li><a href="index.php#chefs">Готвачи</a></li>
                <li <?php if(isset($_GET['page'])&&$_GET['page']=='reservation') { echo "class='active'"; } ?>><a href="index.php?page=reservation">Резервация</a></li>


                
                
                <li <?php if(isset($_GET['page'])&&$_GET['page']=='menu') { echo "class='active'"; } ?>><a href="index.php?page=menu">Меню</a></li>
                <!--<li><a href="#special-offser">Special Offers</a></li>-->
                <li <?php if(isset($_GET['page'])&&$_GET['page']=='cart') { echo "class='active'"; } ?>style="background-color:green"><a href="index.php?page=cart"><strong>
                Количка :</strong> &nbsp;<?= $_SESSION['sum'] ?> лв</a></li>
                
                <!--fix for scroll spy active menu element-->
                <li style="display:none;"><a href="#header"></a></li>

            </ul>
        </div><!--/.navbar-collapse -->
        </div><!-- container -->
    </div><!-- menu -->

    <!-- /#header -->
