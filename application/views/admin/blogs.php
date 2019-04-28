<style>
	.listbox {
		border: #ecf0f5 solid;
		border-radius: 10px;
		padding: 10px;
	}
	.scroll{
		height: 170px;
    	overflow: scroll;
    	overflow-x: auto;
	}
</style>
<link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/switch.css">
<div class="content-wrapper" style="min-height: 946px !important;">
	<section class="content-header">
		<h1> List Blogs</h1>
		<ol class="breadcrumb">
			<li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
			<li><a href="<?php url('admin/testimonials'); ?>">List Blogs </a></li>
			<li class="breadcrumb-item active">Blogs</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-warning">
			<div class="box-header">
				<div class="form-group">
					<?php include('alert-message.php'); ?>
					<a href="<?php url('admin/blogs/add'); ?>" class="btn btn-info pull-right">Add New Blog</a>
				</div>
				<table class="">
					<tr>
						<td style="vertical-align: top;"><h4 style="margin: 0px;">Blog section status is website: &nbsp;&nbsp;&nbsp;</h4></td>
						<td>
						<label class="switch">
							<input value="<?php $web_settings['blog_status'] ?>" name="blog_status" class="link-onoff" <?php if($web_settings['blog_status'] == 1) echo 'checked'; ?> type="checkbox">
							<div class="slider round"></div>
						</label>
						</td>
					</tr>
				</table>
			</div>

			<div class="box-body">
				<?php foreach ($blogs as $blog) { ?>                    
                    <div class="col-md-6 listbox" style="margin-bottom: 10px;">
                        
                        <div class="col-md-4">
                            <img src="<?php echo_image('uploads/blogs/' . $blog['blog_image']); ?>" class="img-responsive" width="150">
                        </div>
                        <div class="col-md-8">
                            <div class="pull-right">
                                <a href="<?php url('admin/blogs/edit/' . $blog['id']); ?>" class="label label-info">Edit</a>
                                <a href="<?php url('admin/blogs/delete/' . $blog['id']); ?>" class="label label-danger" onclick="return confirm('Are you want to delete this service?');">Delete</a>
							</div>
							
							<div class="clearfix"></div>
							<br>
                            <div class="scroll">
								<h4><?php echo $blog['blog_title'] ?></h4>
								<?php echo $blog['blog_content'] ?>
							</div>
                        </div>
                    </div>                                                                    
				<?php } ?>

			</div>
		</div>
	</section>
</div>
