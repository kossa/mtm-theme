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
            <p><?php echo getOption('site_tagline') ?></p>
          </div>
          <div class="col-sm-6 menu">
            <ul class="list-inline">
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Student Gallery</a></li>
              <?php if (getOption('facebook_url')): ?>
                <li class="social"><a href="#"><i class="fa fa-facebook-square"></i></a></li>
              <?php endif ?>
              <?php if (getOption('twitter_url')): ?>
                <li class="social"><a href="#"><i class="fa fa-twitter-square"></i></a></li>
              <?php endif ?>
              <?php if (getOption('pinterest_url')): ?>
                <li class="social"><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
              <?php endif ?>
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
          <a class="navbar-brand" href="<?php echo bloginfo( 'url' ); ?>"><img src="<?php echo getOption('logo_url') ?>" alt=""></a>
        </div>
        <div class="contact-us"><i class="fa fa-phone"></i> Call Us Today! <strong><?php echo getOption('phone_number') ?></strong></div>
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
              <li class="social">
              <?php if (getOption('facebook_url')): ?>
                <a href="#"><i class="fa fa-facebook-square"></i></a>
              <?php endif ?>
              <?php if (getOption('twitter_url')): ?>
                <a href="#"><i class="fa fa-twitter-square"></i></a>
              <?php endif ?>
              <?php if (getOption('pinterest_url')): ?>
                <a href="#"><i class="fa fa-pinterest-square"></i></a></li>
              <?php endif ?>
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
