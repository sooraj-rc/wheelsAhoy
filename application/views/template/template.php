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
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
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
      <a class="navbar-brand js-scroll-trigger" href="#page-top">WheelsAhoy</a>
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
            <a class="nav-link js-scroll-trigger" href="#contact">Talk TO Ahoy</a>
          </li>
          <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login
              </a>
                <ul class="dropdown-menu dropdown-menu-right" style="padding: 15px;min-width: 250px;margin-top: 15px;">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                       <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                       <label class="sr-only" for="exampleInputPassword2">Password</label>
                                       <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                    </div>
                                    <div class="checkbox">
                                       <label>
                                       <input type="checkbox"> Remember me
                                       </label>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                        <li class="divider"></li> -->
          <!-- <li>
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                        </li> -->
          <!-- </ul>
            </li> -->
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

  <!-- Contact -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="section-heading text-uppercase">TALK TO AHOY</h1>
          <hr>
          <p class="text-muted mb-0">You feel we can be helpful to you? Then say AHOY and talk to us.
            And see how we can be your passion curators.<br>Fill the below form or call<strong>+971 58 500 AHOY (2469)</strong><br>or drop in a mail at <strong>info@wheelsahoy.com</strong><br></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-10 mx-auto text-center">
          <form id="contactForm" name="sentMessage" method="POST">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="phone" name="phone" type="tel" placeholder="Your Phone *" >
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <select name="country" id="country" class="form-control" style="height: 70px;">
                    <option value="">Select your location</option>
                    <?php foreach($__countries as $country) { ?>
                      <option value="<?php echo $country['nicename'] ?>"><?php echo $country['nicename'] ?></option>
                    <?php } ?>
                  </select>
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea class="form-control" id="message" name="message" placeholder="Your Message *"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div id="success"></div>
              <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
            </div>
        </div>
        </form>
      </div>
    </div>
    </div>
  </section>
  <section class="footer">
    <div class="container">
      <div class="col-lg-12 text-center">
        <p class="copyRight">
          © Copyright 2018 Ahoy Middle East FZ LLC - All Rights Reserved
        </p>
      </div>
    </div>
  </section>
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