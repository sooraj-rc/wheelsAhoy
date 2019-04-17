<div class="content-wrapper" style="min-height: 946px !important;">
    <section class="content-header">
        <h1> <?php if(!empty($$clientsdata)){ echo 'Edit Clients';}  else { echo 'Add Clients';} ?></h1>
        <ol class="breadcrumb">
            <li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php url('admin/services');?>">List services </a></li>
            <li class="breadcrumb-item active"><?php if(!empty($clientsdata)){ echo 'Edit Clients'; } else {  echo 'Add Clients'; } ?></li>
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
                    <form role="form" method="POST" action="<?php if(!empty($clientsdata)) {$mode = 'edit';} else {$mode = 'add';} url('admin/clients/'.$mode); ?>" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Client Name <span class="error">*</span>: </label>
                            <input type="text" value="<?php echo $clientsdata['client_name'] ?>"  class="form-control" name="client_name" placeholder="Client Name" required>                                            
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" value="<?php echo $clientsdata['company_name'] ?>"  class="form-control" name="company_name" placeholder="Company Name" required>                                            
                        </div>
                        
                        <div class="form-group">
                            <label>Client Logo </label>
                            <input type="file" class="form-control" name="logo" placeholder="Client Logo">
                                           
                            <?php if(!empty($clientsdata['logo'])) { ?>
                            <img src="<?php echo_image('uploads/clients/'.$clientsdata['logo']) ?>" class="img-responsive" width="250">
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <input type="radio" name="flag" value="builder"> Builder Clients 
                            <input type="radio" name="flag" value="truck"> Truck Clients 
                        </div>
                        
                        <div class="box-footer">
                            <?php if(!empty($clientsdata)) { ?>
                            <input type="hidden" name="id" value="<?php echo $clientsdata['id']; ?>">
                            <input type="hidden" name="logo" value="<?php echo $clientsdata['logo']; ?>">
                            <input type="hidden" name="mode" value="edit">
                            <?php } else { ?>
                            <input type="hidden" name="mode" value="add">
                            <?php } ?>
                            <button type="submit" class="btn btn-info pull-right">
                                <?php if(!empty($clientsdata)) { ?> Update Client <?php } else { ?> Add New Client <?php } ?>
                            </button>                                    
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

