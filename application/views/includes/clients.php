<style>
    #clients img{margin: auto !important;
    vertical-align: middle;
    position: absolute;
    top: 0;
    bottom: 0;}
    .cimg{
    width: 210px;
    height: 210px;
    margin: auto;
    position: relative;}
</style>
<section id="clients">
    <div class="container-fluid">
        <div class="container">
            <div class="col-lg-12 text-center">
                <h1 class="section-heading">CLIENTS</h1>
                <hr class="my-4">
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-7"><?php echo $__client_sub['contents']; ?></p>
            </div>
            <div class="col-md-12">

                <h4><strong>OUR BUILDER CLIENTS</strong></h4>
                <div class="clients-list c1">
                    <?php foreach($__clients_builder as $bc) { ?>
                    <div class="col-lg-3">
                        <div class="cimg">
                            <img src="<?php url('assets/uploads/clients/'.$bc['logo']) ?>" class="img-responsive" width="200">
                        </div>
                        <h1><?php echo $bc['client_name'] ?></h1>
                        <h2><?php echo $bc['company_name'] ?></h2>
                    </div>
                    <?php } ?>                                         
                </div>
                <br><br><br>
                <h4><strong>OUR TRUCK CLIENTS</strong></h4>
                <div class="clients-list c2">
                    <?php foreach($__clients_truck as $tc) { ?>
                    <div class="col-lg-3">
                        <div class="cimg">
                            <img src="<?php url('assets/uploads/clients/'.$tc['logo']) ?>" class="img-responsive" width="200">
                        </div>
                        <h1><?php echo $tc['client_name'] ?></h1>
                        <h2><?php echo $tc['company_name'] ?></h2>
                    </div>
                    <?php } ?>                            
                </div>
            </div>
        </div>
    </div>
</section>
<input type="hidden" id="__countc1" value="<?php echo count($__clients_builder); ?>">
<input type="hidden" id="__countc2" value="<?php echo count($__clients_truck); ?>">