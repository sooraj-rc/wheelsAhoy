<style>
.listbox{
    border: #ecf0f5 solid;
    border-radius: 10px;
    padding: 10px;
}
</style>
<div class="content-wrapper" style="min-height: 946px !important;">
    <section class="content-header">
        <h1> List Stocks</h1>
        <ol class="breadcrumb">
            <li><a href="<?php url('admin'); ?>"><i class="fa fa-dashboard"></i> </a></li>
            <li><a href="<?php url('admin/stocks');?>">List stocks </a></li>
            <li class="breadcrumb-item active">Stocks</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-warning">
            <div class="box-header">                
                <div class="form-group">
                    <?php include('alert-message.php'); ?>
                    <a href="<?php url('admin/stocks/add'); ?>" class="btn btn-info pull-right">Add Stocks</a>
                </div>
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

