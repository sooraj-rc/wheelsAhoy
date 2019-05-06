<style type="text/css">
    #cke_1_template{
        height: 700px !important;
    }
    #template_ifr{
        height: 628px !important;
    }
</style>
<div class="content-wrapper" style="min-height: 946px !important;">
    <section class="content-header">
        <h1> <?php if(!empty($servicedata)){ echo 'Edit Service';}  else { echo 'Add Service';} ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php url('admin/services');?>">List services </a></li>
            <li class="breadcrumb-item active"><?php if(!empty($servicedata)){ echo 'Edit Service'; } else {  echo 'Add Service'; } ?></li>
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
                    <form role="form" method="POST" action="<?php if(!empty($servicedata)) {$mode = 'edit';} else {$mode = 'add';} url('admin/services/'.$mode); ?>" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Service Title <span class="error">*</span>: </label>
                            <input type="text" value="<?php echo $servicedata['title'] ?>"  class="form-control" name="title" placeholder="Service Title" required>                                            
                        </div>
                        <div class="form-group">
                            <label>Service Description</label>
                            <textarea class="form-control textarea2" name="descr" placeholder=""><?php echo $servicedata['descr'] ?></textarea>                                            
                        </div>
                        
                        <div class="form-group">
                            <label>Service Image: </label>
                            <input type="file" class="form-control" name="service_image" placeholder="Service Image">
                                           
                            <?php if(!empty($servicedata['service_image'])) { ?>
                            <img src="<?php echo_image('uploads/services/'.$servicedata['service_image']) ?>" class="img-responsive" width="250">
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label>Show contact button: </label>
                            <input type="checkbox" value="1" name="btn_status" <?php if($servicedata['btn_status'] == 1) echo 'checked'; ?>>
                        </div>
                        
                        <div class="box-footer">
                            <?php if(!empty($servicedata)) { ?>
                            <input type="hidden" name="id" value="<?php echo $servicedata['id']; ?>">
                            <input type="hidden" name="service_image" value="<?php echo $servicedata['service_image']; ?>">
                            <input type="hidden" name="mode" value="edit">
                            <?php } else { ?>
                            <input type="hidden" name="mode" value="add">
                            <?php } ?>
                            <button type="submit" class="btn btn-info pull-right">
                                <?php if(!empty($servicedata)) { ?> Update Service <?php } else { ?> Add New Service <?php } ?>
                            </button>                                    
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

