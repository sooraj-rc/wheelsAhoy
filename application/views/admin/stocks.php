<style>
.listbox{
    border: #ecf0f5 solid;
    border-radius: 10px;
    padding: 10px;
}
</style>
<link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/switch.css">
<div class="content-wrapper" style="min-height: 946px !important;">
    <section class="content-header">
        <h1> List Market</h1>
        <ol class="breadcrumb">
            <li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php url('admin/stocks');?>">List market </a></li>
            <li class="breadcrumb-item active">Market</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">                
                <div class="form-group">
                    <?php include('alert-message.php'); ?>
                    <a href="<?php url('admin/stocks/add'); ?>" class="btn btn-info pull-right">Add Market</a>
                </div>
                <table class="">
					<tr>
						<td style="vertical-align: top;"><h4 style="margin: 0px;">Market section status in website: &nbsp;&nbsp;&nbsp;</h4></td>
						<td>
						<label class="switch">
							<input value="<?php $web_settings['stock_status'] ?>" name="stock_status" class="link-onoff" <?php if($web_settings['stock_status'] == 1) echo 'checked'; ?> type="checkbox">
							<div class="slider round"></div>
						</label>
						</td>
					</tr>
				</table>
            </div>

            <div class="box-body">
                
                <?php foreach($stocks as $sto){ ?>
                    <div class="col-md-3 text-center">
                        <div class="listbox">
                            <div class="pull-right">
                                <a href="<?php url('admin/stocks/edit/'.$sto['id']); ?>" class="label label-info">Edit</a>
                                <a href="<?php url('admin/stocks/delete/'.$sto['id']); ?>" class="label label-danger" onclick="return confirm('Are you want to delete this stock?');">Delete</a>
                            </div>
                            <img src="<?php echo_image('uploads/stocks/'.$sto['stock_image']); ?>" class="img-responsive">
                            <h3><?php echo $sto['title']; ?></h3>
                            <p><?php echo $sto['descr'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>

