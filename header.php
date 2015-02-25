<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="ico/favicon.ico">

    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo( 'template_url' ); ?>/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo bloginfo( 'template_url' ); ?>/css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>

  <body>

    <section id="top-menu">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>Historical, Culturally Diverse, Standards-Based Art Lessons to Inspire Young Artists</p>
          </div>
          <div class="col-sm-6 menu">
            <ul class="list-inline">
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Student Gallery</a></li>
              <li class="social"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
              <li class="social"><a href="#"><i class="fa fa-twitter-square"></i></a></li>
              <li class="social"><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
              <li>
                <form class="search" action="#">
                  <input type="submit" name="" value="">
                  <input type="search" placeholder="Search">
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- top-menu -->

    <section class="navbar " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><img src="/wp-content/uploads/2015/02/logo.png" alt=""></a>
        </div>
        <div class="contact-us"><i class="fa fa-phone"></i> Call Us Today! <strong>(949) 215-1064</strong></div>
        <div class="clearfix"></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">About <span class="caret"></span></a></li>
            <li><a href="#">How it Works <span class="caret"></span></a></li>
            <li><a href="#">Artist Units</a></li>
            <li><a href="#">Common Core <span class="caret"></span></a></li>
            <li><a href="#">Contact Us</a></li>
            <li class="pricing"><a href="#">Get Pricing</a></li>
          </ul>
          <ul class="list-unstyled menu-top visible-xs">
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Student Gallery</a></li>
              <li class="social"><a href="#"><i class="fa fa-facebook-square"></i></a><a href="#"><i class="fa fa-twitter-square"></i></a><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
              <li>
                <form class="search" action="#">
                  <input type="submit" name="" value="">
                  <input type="search" placeholder="Search">
                </form>
              </li>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </section><!-- navbar -->
