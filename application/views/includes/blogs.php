<section id="blogs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="section-heading">BLOGS</h1>
                <hr class="my-4">
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-7">Lorem Ipsum is simply dummy text of the printing and typesetting</p>
            </div>
            <div class="container">
                <?php foreach($__blogs as $blog){ ?>
                <div class="well">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="<?php url('assets/uploads/blogs/'.$blog['blog_image']) ?>">
                        </a>
                        <div class="media-body blog-body">
                            <h4 class="media-heading blog-head"><strong><?php echo $blog['blog_title'] ?></strong></h4>
                            <p><?php echo $blog['blog_content'] ?></p>
                            <!-- <a href="">Read More</a> -->
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>