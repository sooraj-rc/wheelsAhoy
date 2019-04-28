<section class="p-0" id="portfolio">
    <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
            <?php foreach($__portfolio as $pf) { ?>
                <div class="col-lg-3 col-sm-6">
                    <a class="portfolio-box" href="<?php url('assets/uploads/portfolio/'.$pf['image']) ?>">
                        <img class="img-fluid" src="<?php url('assets/uploads/portfolio/'.$pf['image']) ?>" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <img class="img-zoom" src="assets/img/zoom.png" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</section>