<section id="testimonials">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="section-heading">TESTIMONIALS</h1>
                <hr class="my-4">
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-7"><?php echo $__testimonial_sub['contents']; ?></p>
            </div>
            <div class="container">

                <div id="carouselContent" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class="carousel-inner" role="listbox">
                        
                        <?php $ti = 0;  foreach($__testimonials as $testi) { ?>
                        <div class="carousel-item text-center p-4 <?php if($ti==0) echo 'active'; ?>">
                            <div class="tm">
                                <h4 class="text-uppercase"><strong><?php echo $testi['title'] ?></strong></h4>
                                <div style="min-height: 150px; height: auto; padding: 30px 0px;"><?php echo $testi['testimonial'] ?></p></div>
                                <p><img src="<?php url('assets/uploads/testimonial/'.$testi['by_image']) ?>" class="rounded-circle" width="75"/p>
                                <p><strong><?php echo $testi['by_name'] ?></strong></p>
                            </div>
                        </div>
                        <?php $ti++; } ?>                        
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