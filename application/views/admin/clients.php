<style>
	.listbox {
		border: #ecf0f5 solid;
		border-radius: 10px;
		padding: 10px;
	}
</style>
<link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/switch.css">
<div class="content-wrapper" style="min-height: 946px !important;">
	<section class="content-header">
		<h1> List Clients</h1>
		<ol class="breadcrumb">
			<li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
			<li><a href="<?php url('admin/clients'); ?>">List clients </a></li>
			<li class="breadcrumb-item active">Clients</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-warning">
			<div class="box-header">
				<div class="form-group">
					<?php include('alert-message.php'); ?>
					<a href="<?php url('admin/clients/add'); ?>" class="btn btn-info pull-right">Add Clients</a>
				</div>
				<table class="">
					<tr>
						<td style="vertical-align: top;"><h4 style="margin: 0px;">Clients section status in website: &nbsp;&nbsp;&nbsp;</h4></td>
						<td>
						<label class="switch">
							<input value="<?php $web_settings['clients_status'] ?>" name="clients_status" class="link-onoff" <?php if($web_settings['clients_status'] == 1) echo 'checked'; ?> type="checkbox">
							<div class="slider round"></div>
						</label>
						</td>
					</tr>
				</table>
			</div>

			<div class="box-body">
				<h3>
					<input type="text" name="client_head_1" value="<?php echo $head_1['contents'] ?>">
					<a href="javascript:;" data-name="client_head_1" class="updateChead btn btn-default">Update</a>
				</h3>  
				<?php foreach ($clients1 as $cli1) { ?>
					<div class="col-md-3 text-center">
						<div class="listbox">
							<div class="pull-right">
								<a href="<?php url('admin/clients/edit/' . $cli1['id']); ?>" class="label label-info">Edit</a>
								<a href="<?php url('admin/clients/delete/' . $cli1['id']); ?>" class="label label-danger" onclick="return confirm('Are you want to delete this service?');">Delete</a>
							</div>
							<img src="<?php echo_image('uploads/clients/' . $cli1['logo']); ?>" class="img-responsive">
							<h3><?php echo $cli1['client_name']; ?></h3>
							<p><?php echo $cli1['company_name'] ?></p>
						</div>
					</div>
				<?php } ?>
					<div class="clearfix"></div>
				<h3>
					<input type="text" name="client_head_2" value="<?php echo $head_2['contents'] ?>">
					<a href="javascript:;" data-name="client_head_2" class="updateChead btn btn-default">Update</a>
				</h3> 
				<?php foreach ($clients2 as $cli2) { ?>
					<div class="col-md-3 text-center">
						<div class="listbox">
							<div class="pull-right">
								<a href="<?php url('admin/clients/edit/' . $cli2['id']); ?>" class="label label-info">Edit</a>
								<a href="<?php url('admin/clients/delete/' . $cli2['id']); ?>" class="label label-danger" onclick="return confirm('Are you want to delete this service?');">Delete</a>
							</div>
							<img src="<?php echo_image('uploads/clients/' . $cli2['logo']); ?>" class="img-responsive">
							<h3><?php echo $cli2['client_name']; ?></h3>
							<p><?php echo $cli2['company_name'] ?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
</div>
