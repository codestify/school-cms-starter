<?php   
    // for daynamic menu
    $link = explode('/', $_SERVER['PHP_SELF'] );
    $page = $link[1];
?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="author" content="Md. Shahriar Hosen, hosen.shahriar.cse@gmail.com">
        <title>.:: Creative School ::.</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" href="img/favicon.png" type="images/x-icon"/>
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
<!--navbar-->
<section>
    <nav class="navbar custom-nav">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img class="img-responsive" src="img/logo.png" alt="">
      </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a <?php if($page == 'index.php'){echo 'class="active-menu"';}?>  href="index.php">Home</a></li>
        <li><a <?php if($page == 'academics.php'){echo 'class="active-menu"';}?> href="academics.php">ACADEMICS</a></li>
        <li><a <?php if($page == 'admission.php'){echo 'class="active-menu"';}?> href="admission.php">ADMISSION</a></li>
        <li><a <?php if($page == 'curriculam.php'){echo 'class="active-menu"';}?> href="curriculam.php">Curriculam</a></li>
        <li><a <?php if($page == 'about.php'){echo 'class="active-menu"';}?> href="about.php">ABOUT US </a></li>
        <li><a <?php if($page == 'contact.php'){echo 'class="active-menu"';}?> href="contact.php">CONTACT US</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navbar-->
</section>