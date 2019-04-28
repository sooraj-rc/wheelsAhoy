<style>
	.listbox {
		border: #ecf0f5 solid;
		border-radius: 10px;
        padding: 10px;ma
        margin-bottom: 10px;
	}
</style>
<link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/switch.css">
<div class="content-wrapper" style="min-height: 946px !important;">
    <section class="content-header">
        <h1> Manage Portfolio </h1>
        <ol class="breadcrumb">
            <li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>            
            <li class="breadcrumb-item active">Manage Portfolio</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">                
                <div class="form-group">
                    <?php include('alert-message.php'); ?>
                </div>
                <!-- <table class="">
                    <tr>
                        <td style="vertical-align: top;"><h4 style="margin: 0px;">Event section status is website: &nbsp;&nbsp;&nbsp;</h4></td>
                        <td>
                        <label class="switch">
                            <input value="<?php $web_settings['event_status'] ?>" name="event_status" class="link-onoff" <?php if($web_settings['event_status'] == 1) echo 'checked'; ?> type="checkbox">
                            <div class="slider round"></div>
                        </label>
                        </td>
                    </tr>
                </table> -->
                <h4>Upload Portfolio</h4>
            </div>
            <?php //p($servicedata); ?>
            <div class="box-body">
                
                <div class="col-md-8 col-md-offset-2">
                    <form method="post" class="dropzone" action="<?php url('admin/portfolio/upload') ?>"></form>   
                    <br>
                    <a href="<?php url('admin/portfolio') ?>" class="btn btn-info">Upload</a>               
                </div>
                <div class="clearfix"></div>
                <br>
                <form method="post" action="">
                <h4>List Portfolio Images</h4>
                <!-- <div class="pull-right">
                    <input type="checkbox" name="event_ids[]"> Select All 
                    <button type="submit" class="btn btn-danger">Delete</button> 
                </div> -->
                                
                <div class="row">
                    <?php 
                    foreach ($portfolio as $pf) {                     
                    ?>                    
                        <div class="col-md-3" style="margin-bottom: 10px;">
                            <div class="listbox">                        
                                <a href="<?php url('admin/portfolio/delete/' . $pf['id']); ?>" class="label label-danger pull-right" onclick="return confirm('Are you want to delete this image?');">Delete</a><br>
                                <img src="<?php echo_image('uploads/portfolio/' . $pf['image']); ?>" class="img-responsive" width="200">
                            </div>
                        </div>
                    <?php                    
                    } 
                    ?>
                </div>
                
                </form>
            </div>
        </div>
    </section>
</div>

