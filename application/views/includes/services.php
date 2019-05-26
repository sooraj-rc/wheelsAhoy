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
            <?php 
                $total_service = count($__services);
                $coln = 3; $i = 0;
                foreach($__services as $service) {  
                    
                        if($total_service % 4 == 0){ 
                            $coln = 3; 
                        }
                        else{                            
                            $rem = $total_service % 4;
                            if($i >= $total_service - $rem){
                                if($rem == 3){
                                    $coln = 4;
                                } elseif ($rem == 2){
                                    $coln = 6;
                                } else if($rem == 1){
                                    $coln = 12;
                                }
                            }
                        }
            ?>
        
            <div class="col-lg-<?php echo $coln; ?> col-md-6">
                <div class="service-box mt-5 mx-auto">
                    <img class="img-fluid" src="<?php url('assets/uploads/services/'.$service['service_image']); ?>" alt="">
                    <h4> <strong><?php echo $service['title'] ?></strong></h4>
                    <div class="service-para">
                        <?php echo $service['descr'] ?>
                    </div>
                    <?php if($service['btn_status'] == 1) { ?> <br>
                        <a href="#contact" class="btn btn-primary js-scroll-trigger">Contact Us</a>
                    <?php } ?>
                </div>
            </div>
            <?php $i++; } ?>
            
        </div>
    </div>
    
</section>