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
        <h1> <?php if(!empty($stockdata)){ echo 'Edit Stock';}  else { echo 'Add Stock';} ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php url('admin/services');?>">List services </a></li>
            <li class="breadcrumb-item active"><?php if(!empty($stockdata)){ echo 'Edit Stock'; } else {  echo 'Add Stock'; } ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">                
                <div class="form-group">
                    <?php include('alert-message.php'); ?>
                </div>
            </div>
            <?php //p($stockdata); ?>
            <div class="box-body">
                <div class="col-md-8 col-md-offset-2">
                    <form role="form" method="POST" action="<?php if(!empty($stockdata)) {$mode = 'edit';} else {$mode = 'add';} url('admin/stocks/'.$mode); ?>" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Stock Title <span class="error">*</span>: </label>
                            <input type="text" value="<?php echo $stockdata['title'] ?>"  class="form-control" name="title" placeholder="Service Title" required>                                            
                        </div>
                        <div class="form-group">
                            <label>Stock Description</label>
                            <textarea class="form-control textarea2" name="descr" placeholder=""><?php echo $stockdata['descr'] ?></textarea>                                            
                        </div>
                        
                        <div class="form-group">
                            <label>Stock Image: </label>
                            <input type="file" class="form-control" name="stock_image" placeholder="Stock Image">
                                           
                            <?php if(!empty($stockdata['stock_image'])) { ?>
                            <img src="<?php echo_image('uploads/stocks/'.$stockdata['stock_image']) ?>" class="img-responsive" width="250">
                            <?php } ?>
                        </div>
                        
                        <div class="box-footer">
                            <?php if(!empty($stockdata)) { ?>
                            <input type="hidden" name="id" value="<?php echo $stockdata['id']; ?>">
                            <input type="hidden" name="stock_image" value="<?php echo $stockdata['stock_image']; ?>">
                            <input type="hidden" name="mode" value="edit">
                            <?php } else { ?>
                            <input type="hidden" name="mode" value="add">
                            <?php } ?>
                            <button type="submit" class="btn btn-info pull-right">
                                <?php if(!empty($stockdata)) { ?> Update Stock <?php } else { ?> Add New Stock <?php } ?>
                            </button>                                    
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

