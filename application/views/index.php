<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h2>Post a job <?php echo $data; ?></h2>
<hr>

<form method="POST" action="<?php echo site_url('index.php/jobappln') ?>" enctype="multipart/form-data">
    <div class="col-md-6">
        <?php echo validation_errors(); ?>
        <div class="form-group">
            <label for="Name">Your Name</label>
            <input type="text" class="form-control" name="name" id="Name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="Email">Email address</label>
            <input type="email" class="form-control" id="Email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="coverPage">Cover Page</label>                            
            <textarea name="coverpage" id="coverPage" class="form-control" rows="3" placeholder="Cover page"></textarea>                             
        </div>
        <div class="form-group">
            <label for="Resume">Resume</label>
            <input name=resume type="file" id="Resume">
            <p class="help-block">Please select .pdf/.doc/,docx files</p>
        </div>
        <div class="checkbox">
            <label>
            <input type="checkbox"> Check me out
            </label>
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
    </div>
</form>
            