<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WheelsAhoy</title>
  <link rel="shortcut icon" href="assets/img/wheels-ahoy-png-compressed-favicon-128x128.png" type="image/x-icon">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <!-- <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  <!-- Slick -->
  <link href="<?php echo c('css_path_url'); ?>slick.css" rel="stylesheet">
  <link href="<?php echo c('css_path_url'); ?>slick-theme.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo c('css_path_url'); ?>creative.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Wheels Ahoy</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Ahoy Story</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Ahoy Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#stocks">Ahoy Market</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#clients">Clients</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#testimonials">Testimonials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#blogs">Blogs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#events">Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Talk TO Ahoy</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead parallax-window-header" data-parallax="scroll" data-image-src="assets/img/header.gif">
    <div class="container logo-12 my-auto text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <img src="assets/img/logo-1.png" class="logo-1 img-fluid" width="444px;" height="auto;" alt="" title="" media-simple="true">
        </div>
      </div>
    </div>
  </header>

  <?php echo $content; ?>

  <div class="parallax-window" data-parallax="scroll" data-image-src="assets/img/header.gif"></div>
  <!-- <div class="parallax"></div> -->

  <?php $this->load->view('includes/contact.php'); ?>

  <section class="footer">
    <div class="container">
      <div class="col-lg-12 text-center">
        <p class="copyRight">
          © Copyright 2018 Ahoy Middle East FZ LLC - All Rights Reserved
        </p>
      </div>
    </div>
  </section>
  <a href="tel:+971585002469" id="fixedbutton" class="btn btn-primary "><i class="fa fa-phone" aria-hidden="true"></i> Call us</a>  <!-- d-block d-sm-none -->                  
  <input type="hidden" value="<?php url(); ?>" id="baseURL">
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo c('js_path_url'); ?>slick.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo c('js_path_url'); ?>creative.min.js"></script>
  <script src="<?php echo c('js_path_url'); ?>parallax.js"></script>
  <script src="<?php echo c('js_path_url'); ?>jquery.validate.min.js"></script>
  <script src="<?php echo c('js_path_url'); ?>site.js"></script>
  <script>
    
  </script>
</body>

</html>