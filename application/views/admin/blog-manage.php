<div class="content-wrapper" style="min-height: 946px !important;">
    <section class="content-header">
        <h1> <?php if(!empty($blogdata)){ echo 'Edit Blog';}  else { echo 'Add Blog';} ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php url('admin/blogs');?>">List Blog </a></li>
            <li class="breadcrumb-item active"><?php if(!empty($blogdata)){ echo 'Edit Testimonial'; } else {  echo 'Add Blog'; } ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">                
                <div class="form-group">
                    <?php include('alert-message.php'); ?>
                </div>
            </div>
            <?php //p($servicedata); ?>
            <div class="box-body">
                <div class="col-md-8 col-md-offset-2">
                    <form role="form" method="POST" action="<?php if(!empty($blogdata)) {$mode = 'edit';} else {$mode = 'add';} url('admin/blogs/'.$mode); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Blog Title</label>
                            <input type="text" value="<?php echo $blogdata['blog_title'] ?>"  class="form-control" name="blog_title" placeholder="Blog Title" required>                                            
                        </div>
                        <div class="form-group">
                            <label>Blog Content <span class="error">*</span>: </label>
                            <textarea class="form-control textarea2" name="blog_content" placeholder=""><?php echo $blogdata['blog_content'] ?></textarea>                                                                                     
                        </div>                        
                        
                        <div class="form-group">
                            <label>Blog Image </label>
                            <input type="file" class="form-control" name="blog_image" placeholder="Blog Image">
                                           
                            <?php if(!empty($blogdata['blog_image'])) { ?>
                            <img src="<?php echo_image('uploads/blogs/'.$blogdata['blog_image']) ?>" class="img-responsive" width="250">
                            <?php } ?>
                        </div>                        
                        
                        <div class="box-footer">
                            <?php if(!empty($blogdata)) { ?>
                            <input type="hidden" name="id" value="<?php echo $blogdata['id']; ?>">
                            <input type="hidden" name="blog_image" value="<?php echo $blogdata['blog_image']; ?>">
                            <input type="hidden" name="mode" value="edit">
                            <?php } else { ?>
                            <input type="hidden" name="mode" value="add">
                            <?php } ?>
                            <button type="submit" class="btn btn-info pull-right">
                                <?php if(!empty($blogdata)) { ?> Update Blog <?php } else { ?> Add New Blog <?php } ?>
                            </button>                                    
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </section>
</div>

