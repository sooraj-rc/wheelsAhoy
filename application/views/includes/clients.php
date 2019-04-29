<style>
    #clients img{margin: auto !important;}
</style>
<section id="clients">
    <div class="container-fluid">
        <div class="container">
            <div class="col-lg-12 text-center">
                <h1 class="section-heading">CLIENTS</h1>
                <hr class="my-4">
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
            </div>
            <div class="col-md-12">

                <h4><strong>OUR BUILDER CLIENTS</strong></h4>
                <div class="clients-list c1">
                    <?php foreach($__clients_builder as $bc) { ?>
                    <div class="col-lg-3">
                        <img src="<?php url('assets/uploads/clients/'.$bc['logo']) ?>" class="img-responsive" width="200">
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
                        <img src="<?php url('assets/uploads/clients/'.$tc['logo']) ?>" class="img-responsive" width="200">
                        <h1><?php echo $tc['client_name'] ?></h1>
                        <h2><?php echo $tc['company_name'] ?></h2>
                    </div>
                    <?php } ?>                            
                </div>
            </div>
        </div>
    </div>
</section>