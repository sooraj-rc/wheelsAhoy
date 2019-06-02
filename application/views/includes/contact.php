<!-- Contact -->
<section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="section-heading text-uppercase">TALK TO AHOY</h1>
          <hr>
          <p class="text-muted mb-0">You feel we can be helpful to you? Then say AHOY and talk to us.
            And see how we can be your passion curators.<br>Fill the below form or call <br><strong style="color:#ff7f28">+971 58 500 AHOY (2469)</strong><br>or drop in a mail at <strong style="color:#ff7f28">info@wheelsahoy.com</strong><br></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-10 mx-auto text-center">
        <?php if (f('success_message') != '') { ?>                                     
            <div class="alert alert-success alert-dismissible fade show">
                <?php echo f('success_message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> 
            </div>                                                    
        <?php } ?>
          <form id="contactForm" name="sentMessage" method="POST" enctype="multipart/form-data" action="<?php url('postContact') ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <select name="contact_for_id" id="contact_for_id" class="form-control" style="height: 70px;">
                    <option value="">Contact us regarding *</option>
                    <option value="1">I want to build a food truck</option>                    
                    <option value="2" data-flag="sell">I want to sell my food truck</option>                    
                    <option value="3">I want food truck in my event</option>                    
                    <option value="4">Others</option>                    
                  </select>       
                  <input type="hidden" id="contact_for" name="contact_for" value="">      
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group" id="truck_imageID" style="display:none; float:left;">
                  <input type="file" id="truck_image" name="truck_images[]"  placeholder="Truck Image" multiple >
                  <br><small style="float: left;">Please press Ctrl key to choose multiple images</small>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
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
                  <input class="form-control" id="phone" name="phone" type="text" placeholder="Your Phone *" >
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <select name="country" id="country" class="form-control countrySelect2" style="height: 70px;">
                    <option value="">Select your location</option>
                    <?php foreach($__countries as $country) { ?>
                      <option value="<?php echo $country['nicename'] ?>"><?php echo $country['nicename'] ?></option>
                    <?php } ?>
                  </select>
                  
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea class="form-control" id="message" name="message" placeholder="Your Message *" style="line-height: 1.5 !important; height: 130px;"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group" id="agreeID" style="display:none;">
                  <input type="checkbox" name="agree_img-show" id="agreeImgShow" checked> By clicking this button you agree that you have no objection in displaying the images you 
have provided, in our website. We will return them when we sell your truck successfully <i class="far fa-smile-wink" style="color: #f57f2a;"></i>
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