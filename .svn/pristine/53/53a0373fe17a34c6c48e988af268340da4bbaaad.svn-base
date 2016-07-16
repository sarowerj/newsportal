<div class="alert alert-danger alert-dismissible alert_msg not_saved" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> Use a right tag name.
</div>
<main class="content new_tag">
    <div class="row">
        <div class="col-md-6">
            <?php echo form_open('/admin/save_tag'); ?>
            <div class="content_header">
                <h3>Add New Tag</h3>
                <?php
                $name = array(
                    'name'       => 'name',
                    'id'         => 'name',
                    'placeholder'=> 'Name',
                    'value'      => '',
                    'class'      => 'form-control',
                    'required'   => 'required',
                    'rules'      => 'required'
                );
                ?>
                <div class="form-group">
                    <?php echo form_label('Name', 'name'); ?>
                    <?php echo form_input($name); ?>
                    <span class="hints">Use single word to tag name. <span class="text-danger"></span></span>
                </div>
                <div class="form-group">
                    <input type="submit" value="Add New Tag" name="add_new_tag_btn" class="btn btn-primary" />
                </div>
            </div>
            <?php
            echo form_close();
            ?>
        </div> 
    </div>
</main>
<script type="text/javascript">
    $(document).ready(function () {
<?php
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == "error_required") {
        ?>
            $('.alert_msg.not_saved').show().delay(3000).fadeTo("fast", 0);
        <?php
    }
}
?>
    });
</script>
