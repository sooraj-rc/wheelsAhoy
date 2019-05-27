<section id="blogs">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="section-heading">BLOGS</h1>
                <hr class="my-4">
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-7"><?php echo $__blog_sub['contents']; ?></p>
            </div>
            <div class="container">
                <?php foreach($__blogs as $blog){ ?>
                <div class="well">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="media-object rounded img-thumbnail" src="<?php url('assets/uploads/blogs/'.$blog['blog_image']) ?>">
                        </div>
                        <div class="col-md-8 blog-body">
                            <h4 class="media-heading blog-head"><strong><?php echo $blog['blog_title'] ?></strong></h4>
                            <div class="oldContentShow<?php echo $blog['id'] ?>">
                                <?php echo substr($blog['blog_content'],0,550) ?>...
                            </div>
                            <div class="newContentShow<?php echo $blog['id'] ?>" style="display:none;">
                                <?php echo $blog['blog_content'] ?>
                            </div>
                            <?php if(strlen($blog['blog_content']) > 550) { ?><a href="javascript:;" data-id="<?php echo $blog['id'] ?>" data-flag="more" class="readMore">Read More</a> <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>