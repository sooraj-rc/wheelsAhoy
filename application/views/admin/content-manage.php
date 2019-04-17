<style type="text/css">
	#cke_1_template {
		height: 700px !important;
	}

	#template_ifr {
		height: 628px !important;
	}
</style>
<?php $page_title = ""; ?>
<div class="content-wrapper" style="min-height: 946px !important;">
	<section class="content-header">
		<h1> <?php if ($flag == 'story') {
					$page_title = 'Update story content';
				}
				echo $page_title; ?></h1>
		<ol class="breadcrumb">
			<li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
			<li><a href="<?php url('admin/services'); ?>">Manage contents </a></li>
			<li class="breadcrumb-item active"><?php echo $page_title; ?></li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-warning">
			<div class="box-header">
				<div class="form-group">
					<?php include('alert-message.php'); ?>
				</div>
			</div>
			<?php
			?>
			<div class="box-body">
				<div class="col-md-8 col-md-offset-2">
					<form role="form" method="POST" action="<?php url('admin/c/' . $flag); ?>" enctype="multipart/form-data">


						<div class="form-group">
							<label>Story Content</label>
							<textarea class="form-control textarea2" name="descr" placeholder=""><?php echo $content['content'] ?></textarea>
						</div>



						<div class="box-footer">
							<?php if (!empty($content)) { ?>
								<input type="hidden" name="id" value="<?php echo $content['id']; ?>">
								<input type="hidden" name="flag" value="<?php echo $flag; ?>">
								<input type="hidden" name="mode" value="edit">
							<?php } ?>
							<button type="submit" class="btn btn-info pull-right">
								Update Content
							</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</section>
</div>
