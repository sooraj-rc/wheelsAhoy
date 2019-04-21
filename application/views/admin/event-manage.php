<style>
	.listbox {
		border: #ecf0f5 solid;
		border-radius: 10px;
        padding: 10px;ma
        margin-bottom: 10px;
	}
</style>
<div class="content-wrapper" style="min-height: 946px !important;">
    <section class="content-header">
        <h1> Manage Events</h1>
        <ol class="breadcrumb">
            <li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>            
            <li class="breadcrumb-item active">Manage Events</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">                
                <div class="form-group">
                    <?php include('alert-message.php'); ?>
                </div>
                <h4>Upload Events</h4>
            </div>
            <?php //p($servicedata); ?>
            <div class="box-body">
                
                <div class="col-md-8 col-md-offset-2">
                    <form method="post" class="dropzone" action="<?php url('admin/events/upload') ?>"></form>   
                    <br>
                    <a href="<?php url('admin/events') ?>" class="btn btn-info">Upload</a>               
                </div>
                <div class="clearfix"></div>
                <br>
                <form method="post" action="">
                <h4>List Events</h4>
                <!-- <div class="pull-right">
                    <input type="checkbox" name="event_ids[]"> Select All 
                    <button type="submit" class="btn btn-danger">Delete</button> 
                </div> -->
                <i>To update the flag, click the Upcoming/Past Link</i><div class="clearfix"></div>
                <?php foreach ($events as $eve) { 
                        if($eve['flag'] == 'upcoming') $flag_class = "text-green"; else $flag_class = "text-red";
                    ?>                    
                    <div class="col-md-2" style="margin-bottom: 10px;">
                        <div class="listbox">
                            <small>
                                <a href="javascript:;" class="__eventStatusChange <?php echo $flag_class ?>" data-id="<?php echo $eve['id'] ?>"><b id="flagID<?php echo $eve['id'] ?>"><?php echo $eve['flag'] ?></b></a>
                            </small>
                            <a href="<?php url('admin/events/delete/' . $eve['id']); ?>" class="label label-danger pull-right" onclick="return confirm('Are you want to delete this image?');">Delete</a><br>
                            <img src="<?php echo_image('uploads/events/' . $eve['event_image']); ?>" class="img-responsive" width="150">
                        </div>
                    </div>
                <?php } ?>
                </form>
            </div>
        </div>
    </section>
</div>

