<div class="content-wrapper" style="min-height: 946px !important;">
    <section class="content-header">
        <h1> <?php if(!empty($testidata)){ echo 'Edit Testimonial';}  else { echo 'Add Testimonial';} ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php url('admin/testimonials');?>">List Testimonial </a></li>
            <li class="breadcrumb-item active"><?php if(!empty($testidata)){ echo 'Edit Testimonial'; } else {  echo 'Add Testimonial'; } ?></li>
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
                    <form role="form" method="POST" action="<?php if(!empty($testidata)) {$mode = 'edit';} else {$mode = 'add';} url('admin/testimonials/'.$mode); ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Heading</label>
                            <input type="text" value="<?php echo $testidata['title'] ?>"  class="form-control" name="title" placeholder="Heading" required>                                            
                        </div>
                        <div class="form-group">
                            <label>Testimonial <span class="error">*</span>: </label>
                            <textarea class="form-control textarea2" name="testimonial" placeholder=""><?php echo $testidata['testimonial'] ?></textarea>                                                                                     
                        </div>
                        <div class="form-group">
                            <label>User Name <small>(Testimonial by)</small></label>
                            <input type="text" value="<?php echo $testidata['by_name'] ?>"  class="form-control" name="by_name" placeholder="User Name" required>                                            
                        </div>
                        
                        <div class="form-group">
                            <label>User Image </label>
                            <input type="file" class="form-control" name="by_image" placeholder="User Image">
                                           
                            <?php if(!empty($testidata['by_image'])) { ?>
                            <img src="<?php echo_image('uploads/testimonial/'.$testidata['by_image']) ?>" class="img-responsive" width="250">
                            <?php } ?>
                        </div>                        
                        
                        <div class="box-footer">
                            <?php if(!empty($testidata)) { ?>
                            <input type="hidden" name="id" value="<?php echo $testidata['id']; ?>">
                            <input type="hidden" name="by_image" value="<?php echo $testidata['by_image']; ?>">
                            <input type="hidden" name="mode" value="edit">
                            <?php } else { ?>
                            <input type="hidden" name="mode" value="add">
                            <?php } ?>
                            <button type="submit" class="btn btn-info pull-right">
                                <?php if(!empty($testidata)) { ?> Update Testimonial <?php } else { ?> Add New Testimonial <?php } ?>
                            </button>                                    
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

