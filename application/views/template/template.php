<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
    
    <!-- Custom styles for this template -->
    <link href="<?php echo c('css_path_url'); ?>creative.min.css" rel="stylesheet">

    <!-- Slick -->
    <link href="<?php echo c('css_path_url'); ?>slick.css" rel="stylesheet">
    <link href="<?php echo c('css_path_url'); ?>slick-theme.css" rel="stylesheet">

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
             <li class="nav-item dropdown">
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
                        <li class="divider"></li>
                        <!-- <li>
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                           <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                        </li> -->
                     </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <header class="masthead parallax-window-header" data-parallax="scroll" data-image-src="assets/img/header.gif">
      <div class="container logo-12 my-auto text-center">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <img src="assets/img/logo-1.png" class="logo-1" width="444px;" height="auto;" alt="" title="" media-simple="true">
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h1 class="section-heading">AHOY STORY</h1>
            <hr class="light my-4">
            <p class="text-muted align-center pb-3 mbr-fonts-style display-7"><br>We are a team of young passionate foodies and workaholics who combined their entrepreneurial ideas to create a company with a dream of revolutionizing the street food industry!<br><strong><br></strong><strong>We are eager to help passionate entrepreneurs kick-start your own businesses and give ‘Wheels to your Dreams’.&nbsp;</strong><br><strong><br></strong>We value our clients and their resources. The joy of creating unique concepts and helping entrepreneurs succeed is our fuel to throttle ahead ! We thrive on a collaborative and creative work culture where we work with a handpicked team who are experts in what they do.&nbsp;We boast of incredible happy customers and client testimonials which we are happy to share with you. We promise to be with you throughout your journey. Whether you are looking to start a new business, own a food truck, or are looking for new ideas, we are here for you to make a difference and we call ourselves, <br></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 text-center">
                  <strong>Wheels Ahoy !</strong><br><strong>
                    Your Passion Curators</strong>
                <div class="social-list pl-0 mb-0">
                    <a href="http://www.instagram.com/wheelsahoy/" target="_blank">
                        <i class="fab fa-instagram" style="color: rgb(255, 127, 40);" media-simple="true"></i>
                    </a>
                    <a href="http://www.facebook.com/wheelsahoyUAE/" target="_blank">
                        <i class="fab fa-facebook-f" style="color: rgb(255, 127, 40);" media-simple="true"></i>
                    </a>
                    <a href="http://twitter.com/wheelsahoy" target="_blank">
                        <i class="fab fa-twitter" style="color: rgb(255, 127, 40);" media-simple="true"></i> 
                    </a>
                    <a href="https://www.linkedin.com/company/wheels-ahoy" target="_blank">
                        <i class="fab fa-linkedin-in" style="color: rgb(255, 127, 40);" media-simple="true"></i>
                    </a>
                    <a href=" " target="_blank">
                        
                    </a>
                    <a href=" " target="_blank">
                        
                    </a>
                </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-3 col-sm-6">
            <a class="portfolio-box" href="assets/img/1-1024x768-800x600.png">
              <img class="img-fluid" src="assets/img/1-1024x768-800x600.png" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <img class="img-zoom" src="assets/img/zoom.png" alt="">
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-sm-6">
            <a class="portfolio-box" href="assets/img/2-1024x768-800x600.jpg">
              <img class="img-fluid" src="assets/img/2-1024x768-800x600.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="portfolio-box-caption-content">
                  <img class="img-zoom" src="assets/img/zoom.png" alt="">
                </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-sm-6">
            <a class="portfolio-box" href="assets/img/3-1024x768-800x600.jpg">
              <img class="img-fluid" src="assets/img/3-1024x768-800x600.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="portfolio-box-caption-content">
                  <img class="img-zoom" src="assets/img/zoom.png" alt="">
                </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-sm-6">
            <a class="portfolio-box" href="assets/img/4-1024x768-800x600.jpg">
              <img class="img-fluid" src="assets/img/4-1024x768-800x600.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="portfolio-box-caption-content">
                  <img class="img-zoom" src="assets/img/zoom.png" alt="">
                </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="section-heading">AHOY SERVICES</h1>
            <hr class="my-4">
            <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">Tell us about yourself and we’ll tell you how we can help!!!</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-3 col-md-6">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/buildings-1-1920x1080.png" alt="">
              <h4> <strong>You are a Community/Commercial Developer</strong></h4>
              <div  class="service-para">
              <p class="text-muted mb-0">You have a beautiful space where you image placing food trucks/ trailers/containers to serve your community or commercial centre/building???<br><strong>Ahoy, we are here!!!</strong><br>Once we understand the demographics of the community, we select food concepts which will be ideal for the location and activate the set-up. We have experienced event conceptualisers in our team who ensure we create an event with never a dull moment.<strong><br></strong><br></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/tent-1-1920x1080.png" alt="">
              <h4><strong>You are an Event Organizer&nbsp;</strong></h4>
              <div  class="service-para">
              <p class="text-muted mb-0">You have an event around the corner and want to bring in Food Trucks??<br><strong>Ahoy, we are here!!!</strong><br>Our ‘Wheels Federation’ Community has a network of over 30 trucks across UAE serving unique and mouth-watering food concepts. The food trucks vary in size and cuisines helping you choose what suits your event no matter what the genre is.<strong><br></strong><br></p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/street-food-small-1920x1080.png" alt="">
              <div  class="service-para">
              <h4> <strong>You are looking to start a Street Food Business</strong></h4>
              <p class="text-muted mb-0">Are you looking to start a street food business? <br><strong>Ahoy, we are here!!!</strong><br>Get in touch with one of our team member for a cup of coffee where we will discuss about your concept and share our experience and industry insights. We get how much money and effort you will be investing to start your own venture and we will help you get started and continue to be with you until the day you turn that sign-board which says ‘Open For Business’!<br></p>
             </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/hino-van-small-1920x1080.png" alt="">
              <h4> <strong>You are looking to Own a food truck</strong></h4>
              <div  class="service-para">
              <p class="text-muted mb-0">Have you always dreamt of owning a food truck of your own and serving delicious food on the go? <br><strong>Ahoy, we are here!!!</strong><br>Tell us what you have in mind and we will recommend trucks and trailers which will be ideal for your business concept and which will be matching your budget and foremost, help you generate revenue and make profit out of the business.
              <br>Honestly, we have seen far too many food trucks fail than succeed in this region and we can tell both horror and beautiful stories to help you make an informal decision rather than just pushing you to make a sale!
              <br></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-4 col-md-4">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/truck-small-1920x1080.png" alt="">
              <h4> <strong>You are a food truck
                </strong><div><strong>owner
                </strong></div></h4>
              <div  class="service-para">
              <p class="text-muted mbr-fonts-style display-7">You have a food truck?? You need a location?? <br><strong>Ahoy, we are here!!!</strong><br>We have built the largest database of a variety of events and permanent locations for you (residential and commercial / long term or short term). And we rigorously keep on populating it.<br></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/catering-re-1920x1080.png" alt="">
              <h4><strong>You are looking for a catering service for your Party/Event?</strong></h4>
              <div  class="service-para">
              <p class="text-muted mbr-fonts-style display-7">Are you looking for a caterer for your prestigious party/event? <br><strong>Ahoy, we are here!!!</strong><br>No matter what the size or genre of the party/event is, we can cater to your guests with scrumptious food of any cuisine from East to West.  We take extra care on meeting the highest of standards on hygiene and quality, yet perfectly fitting your pocket. &nbsp;<br></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/smile-small-1920x1080.png" alt="">
              <div  class="service-para">
              <h4><strong>You are just a
                </strong><div><strong>passer-by
                </strong></div></h4>
              <p class="text-muted mbr-fonts-style display-7">Hey, are you a bit clueless about what you want?? We know you can't resist the idea of setting up your own business. The question is, do you have the passion and energy to get into the race?? <br><strong>Ahoy, we are here!!!</strong><br>We have in store tons of opportunities, locations, events and concepts! Let's sit over a cup of coffee to discuss, debate and get to know each other. Who knows, you might become an owner of one of Ahoy manufactured food truck/kiosk or you will create a new business concept you always wished to do. If nothing comes out of it, we part as friends and stay in touch!!<br></p>
             </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    

    <section id="truck-services">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="section-heading">WHAT WE HAVE FOR YOU</h1>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row text-center">
            <div class="col-lg-1">
          </div>
          <div class="col-lg-2">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/1-1-640x360.png" alt=""> 
            </div>
          </div>
          <div class="col-lg-2">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/2-1-640x360.png" alt=""> 
            </div>
          </div>
          <div class="col-lg-2">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/3-1-640x360.png" alt=""> 
            </div>
          </div>
          <div class="col-lg-2">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/4-1-640x360.png" alt=""> 
            </div>
          </div>
          <div class="col-lg-2">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/5-1-640x360.png" alt=""> 
            </div>
          </div>
          <div class="col-lg-1">
          </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-1">
          </div>
          <div class="col-lg-2">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/6-1-640x360.png" alt="">  
            </div>
          </div>
          <div class="col-lg-2">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/7-1-640x360.png" alt="">  
            </div>
          </div>
          <div class="col-lg-2">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/8-1-640x360.png" alt=""> 
            </div>
          </div>
          <div class="col-lg-2">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/9-1-640x360.png" alt="">
            </div>
          </div>
          <div class="col-lg-2">
            <div class="service-box mt-5 mx-auto">
              <img class="img-fluid" src="assets/img/10-1-640x360.png" alt=""> 
            </div>
          </div>
          <div class="col-lg-1">
          </div>
        </div>

      </div>
    </section>

    <section id="clients">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="section-heading">CLIENTS</h1>
            <hr class="my-4">
            <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
          </div>
          <div class="container">

            <h4><strong>OUR BUILDER CLIENTS</strong></h4>
            <div class="row clients-list">
              <div class="col-lg-3">
                <img src="assets/img/clientlogo-sample.png" class="img-responsive">
                <h1>Name</h1>
                <h2>Company Name</h2>
              </div>
              <div class="col-lg-3">
                <img src="assets/img/clientlogo-sample.png" class="img-responsive">
                <h1>Name</h1>
                <h2>Company Name</h2>
              </div>
              <div class="col-lg-3">
                <img src="assets/img/clientlogo-sample.png" class="img-responsive">
                <h1>Name</h1>
                <h2>Company Name</h2>
              </div>
              <div class="col-lg-3">
                <img src="assets/img/clientlogo-sample.png" class="img-responsive">
                <h1>Name</h1>
                <h2>Company Name</h2>
              </div>
            </div>
            <br><br><br>
            <h4><strong>OUR TRUCK CLIENTS</strong></h4>
            <div class="row clients-list">
              <div class="col-lg-3">
                <img src="assets/img/clientlogo-sample.png" class="img-responsive">
                <h1>Name</h1>
                <h2>Company Name</h2>
              </div>
              <div class="col-lg-3">
                <img src="assets/img/clientlogo-sample.png" class="img-responsive">
                <h1>Name</h1>
                <h2>Company Name</h2>
              </div>
              <div class="col-lg-3">
                <img src="assets/img/clientlogo-sample.png" class="img-responsive">
                <h1>Name</h1>
                <h2>Company Name</h2>
              </div>
              <div class="col-lg-3">
                <img src="assets/img/clientlogo-sample.png" class="img-responsive">
                <h1>Name</h1>
                <h2>Company Name</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="testimonials">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="section-heading">TESTIMONIALS</h1>
            <hr class="my-4">
            <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
          </div>
          <div class="container">

            <div id="carouselContent" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active text-center p-4">
                      <div class="tm">
                        <h4 class="text-uppercase"><strong>HEADING</strong></h4>  
                        <p>Is a long established fact that a reader will be distracted by the r using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it loo</p>
                        <p><img src="./assets/img/userprofile-sample.png" class="img-circle" ></p>
                        <p><strong>Name</strong></p>
                      </div>
                  </div>
                  <div class="carousel-item text-center p-4">
                      <div class="tm">
                        <h4 class="text-uppercase"><strong>HEADING</strong></h4>  
                        <p>Will be distracted by the r using Lorem Ipsum is that it has a more-or-lessill be distracted by the r using Lorem Ipsum is that it has a more-or-laking it loo</p>
                        <p><img src="./assets/img/userprofile-sample.png" class="img-circle" ></p>
                        <p><strong>Name</strong></p>
                      </div>
                  </div>
                  
              </div>
              <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
                  <span class="tm-left" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                  <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
                  <span class="tm-right" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                  <span class="sr-only">Next</span>
              </a>
            </div>



          </div>
        </div>
      </div>
    </section>


    <section id="blogs">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="section-heading">BLOGS</h1>
            <hr class="my-4">
            <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
          </div>
          <div class="container">
              <div class="well">
                  <div class="media">
                    <a class="pull-left" href="#">
                    <img class="media-object" src="./assets/img/blog-sample.png">
                  </a>
                  <div class="media-body blog-body">
                    <h4 class="media-heading blog-head"><strong>Blog name</strong></h4>                      
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.</p>
                      <a href="">Read More</a>
                   </div>
                </div>
              </div>

              <div class="well">
                  <div class="media">
                    <a class="pull-left" href="#">
                    <img class="media-object" src="./assets/img/blog-sample.png">
                  </a>
                  <div class="media-body blog-body">
                    <h4 class="media-heading blog-head"><strong>Blog name</strong></h4>                      
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis 
            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
            Aliquam in felis sit amet augue.</p>
                      <a href="">Read More</a>
                   </div>
                </div>
              </div>
              
          </div>
        </div>
      </div>
    </section>

    <section id="events">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="section-heading">EVENTS</h1>
            <hr class="my-4">
            <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
          </div>
          <div class="container">
              
              <div class="event1">
                  <img src="https://picsum.photos/285/200/?image=0&random" alt="First slide">
                  <img src="https://picsum.photos/285/200/?image=1&random" alt="First slide">
                  <img src="https://picsum.photos/285/200/?image=2&random" alt="First slide">
                  <img src="https://picsum.photos/285/200/?image=3&random" alt="First slide">
                  <img src="https://picsum.photos/285/200/?image=2&random" alt="First slide">
                  <img src="https://picsum.photos/285/200/?image=3&random" alt="First slide">
              </div>


          </div>
        </div>
      </div>
    </section>

    <div class="parallax-window" data-parallax="scroll" data-image-src="assets/img/header.gif"></div>
    <!-- <div class="parallax"></div> -->

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="section-heading text-uppercase">TALK TO AHOY</h1><hr>
            <p class="text-muted mb-0">You feel we can be helpful to you? Then say AHOY and talk to us.
            And see how we can be your passion curators.<br>Fill the below form or call<strong>+971 58 500 AHOY (2469)</strong><br>or drop in a mail at  <strong>info@wheelsahoy.com</strong><br></p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                 </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
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
    <script>
      $('.event1').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4
      });
          
    </script>
  </body>

</html>

