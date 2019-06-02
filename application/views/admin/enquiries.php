<style>
	.listbox {
		border: #ecf0f5 solid;
		border-radius: 10px;
		padding: 10px;
	}

	.scroll {
		height: 170px;
		overflow: scroll;
		overflow-x: auto;
	}
	.timage{
		border: #ccc solid 1px;
    	border-radius: 5px;
    	margin: 3px;
	}
</style>
<link rel="stylesheet" href="<?php echo c('css_path_url'); ?>admin/switch.css">
<div class="content-wrapper" style="min-height: 946px !important;">
	<section class="content-header">
		<h1> List Enquiries</h1>
		<ol class="breadcrumb">
			<li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
			<li><a href="<?php url('admin/testimonials'); ?>">List Enquiries </a></li>
			<li class="breadcrumb-item active">Enquiries</li>
		</ol>
	</section>

	<section class="content">
		<div class="box box-warning">
			<div class="box-header">
				<div class="form-group">
					<?php include('alert-message.php'); ?>
				</div>

			</div>

			<div class="box-body">
				<table class="table" id="enQ">
					<thead>
						<tr>
							<th>#</th>
							<th>Reference #</th>
							<th>Concern</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Country</th>
							<th>Message</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($enquiries as $enq) { ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $enq['reference_id']; ?></td>
								<td>
									<?php echo $enq['contact_for']; ?> <br>
									<?php
									if (!empty($enq['truck_image'])) {
										$timages = explode(',',$enq['truck_image']);
										foreach($timages as $timage){
										?>
										<a href="<?php url('assets/uploads/user-trucks/' . $timage) ?>" target="_new">
											<img src="<?php url('assets/uploads/user-trucks/' . $timage) ?>" class="timage" width="75">
										</a>
									<?php 
										}
									} 
									?>
								</td>
								<td><?php echo $enq['name']; ?></td>
								<td><?php echo $enq['email']; ?></td>
								<td><?php echo $enq['phone']; ?></td>
								<td><?php echo $enq['country']; ?></td>
								<td><?php echo $enq['message']; ?></td>
								<td><?php echo $enq['datetime']; ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>
		</div>
	</section>
</div>