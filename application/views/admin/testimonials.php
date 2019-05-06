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
		<h1> List Testimonials</h1>
		<ol class="breadcrumb">
			<li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
			<li><a href="<?php url('admin/testimonials'); ?>">List Testimonials </a></li>
			<li class="breadcrumb-item active">Testimonials</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-warning">
			<div class="box-header">
				<div class="form-group">
					<?php include('alert-message.php'); ?>
					<a href="<?php url('admin/testimonials/add'); ?>" class="btn btn-info pull-right">Add Testimonial</a>
				</div>
				<table class="">
					<tr>
						<td style="vertical-align: top;"><h4 style="margin: 0px;">Testimonial section status in website: &nbsp;&nbsp;&nbsp;</h4></td>
						<td>
						<label class="switch">
							<input value="<?php $web_settings['testimonial_status'] ?>" name="testimonial_status" class="link-onoff" <?php if($web_settings['testimonial_status'] == 1) echo 'checked'; ?> type="checkbox">
							<div class="slider round"></div>
						</label>
						</td>
					</tr>
				</table>
			</div>

			<div class="box-body">
				<?php foreach ($testimonials as $testi) { ?>
					<div class="col-md-3 text-center">
						<div class="listbox">
							<div class="pull-right">
								<a href="<?php url('admin/testimonials/edit/' . $testi['id']); ?>" class="label label-info">Edit</a>
								<a href="<?php url('admin/testimonials/delete/' . $testi['id']); ?>" class="label label-danger" onclick="return confirm('Are you want to delete this service?');">Delete</a>
							</div>							
							<h3><?php echo $testi['title']; ?></h3>
							<p><?php echo $testi['testimonial'] ?></p>
							<p><b><?php echo $testi['by_name'] ?></b></p>
							<img src="<?php echo_image('uploads/testimonial/' . $testi['by_image']); ?>" class="img-responsive img-circle" width="75">
						</div>
					</div>
				<?php } ?>

			</div>
		</div>
	</section>
</div>
