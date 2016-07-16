<?php
$error = $this->session->flashdata('error');
$success = $this->session->flashdata('success');
if ($error) {
    ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $error; ?>
    </div>
<?php }if ($success) { ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $success; ?>
    </div>
<?php } ?>