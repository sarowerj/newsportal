<div class="alert_messages">
    <div class="alert alert-success alert-dismissible alert_msg updated" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Tag (<span class="tag_name"></span>) updated successfully.
    </div>

    <div class="alert alert-danger alert-dismissible alert_msg update_error" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Tag name must be unique and character length must be under 4 and 30.
    </div>  
</div>

<main class="content edit_tag">
    <div class="row">
        <div class="col-md-6">
            <?php echo validation_errors(); ?>
            <?php echo form_open('admin/update_tag'); ?>
            <div class="content_header">
                <h3>Edit Tag</h3>
                <?php
                $name = array(
                    'name' => 'name',
                    'id' => 'name',
                    'placeholder' => 'Name',
                    'value' => $all_data[0]->tag_name,
                    'class' => 'form-control',
                    'required' => 'required',
                    'autocomplete' => 'off',
                    'rules' => 'required'
                );
                ?>
                <div class="form-group">
                    <?php echo form_label('Name', 'name'); ?>
                    <?php echo form_input($name); ?>
                    <span class="hints">Only <strong>Super Admin</strong> can change this tag name.</span>
                </div>
                <div class="form-group">
                    <input class="tag_fld" type="hidden" name="id" value="<?= $all_data[0]->id ?>" />
                    <input type="submit" value="Update Tag" name="update_tag_btn" class="btn btn-primary" />
                    <a href="<?php echo base_url('admin/all_tags'); ?>" class="btn btn-default cancel_button" >Cancel</a>

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
    if ($_SESSION['status'] == 'update_success') {
        ?>
                $('.tag_name').html($('#name').val());
                $('.alert_msg.updated').fadeIn().delay(3000).fadeOut("fast", 0);
        <?php
    } else if ($_SESSION['status'] == 'update_error') {
        ?>
                $('.alert_msg.update_error').fadeIn().delay(3000).fadeOut("fast", 0);
        <?php
    }
}
?>
    })
</script>
