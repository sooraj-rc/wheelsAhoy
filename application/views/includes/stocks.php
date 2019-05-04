<section id="stocks">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="section-heading">AHOY STOCKS</h1>
                <hr class="my-4">
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">Tell us about yourself and we’ll tell you how we can help!!!</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            <?php foreach($__stocks as $stock) {  ?>
        
            <div class="col-lg-3 col-md-6">
                <div class="service-box mt-5 mx-auto">
                    <img class="img-fluid" src="<?php url('assets/uploads/stocks/'.$stock['stock_image']); ?>" alt="">
                    <h4> <strong><?php echo $stock['title'] ?></strong></h4>
                    <div class="service-para">
                        <?php echo $stock['descr'] ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>
    
</section>