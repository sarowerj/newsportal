<div class="alert_messages">
    <div class="alert alert-danger alert-dismissible alert_msg error" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> <?php
        if (isset($_SESSION['error_message'])) {
            echo $_SESSION['error_message'];
        }
        ?>
    </div>
</div>
<main class="content all_articles">
    <div class="row">
        <div class="col-md-6">
            <?php echo form_open(base_url() . 'admin/save_categories'); ?>
            <div class="content_header">
                <h3>Add New Category</h3>
                <?php
                $name = array(
                    'name' => 'name',
                    'id' => 'name',
                    'placeholder' => 'Name',
                    'value' => '',
                    'class' => 'form-control',
                    'required' => 'required',
                    'rules' => 'required',
                    'autocomplete' => 'off'
                );
                $description = array(
                    'name' => 'description',
                    'id' => 'description',
                    'placeholder' => 'Description',
                    'value' => '',
                    'class' => 'form-control',
                    'rows' => '5'
                );
                $options = array(
                    'small' => 'Small Shirt',
                    'med' => 'Medium Shirt',
                    'large' => 'Large Shirt',
                    'xlarge' => 'Extra Large Shirt',
                );
                ?>
                <div class="form-group">
                    <?php echo form_label('Name', 'name'); ?>
                    <?php echo form_input($name); ?>
                    <span class="hints">The name is how it appears on your site.</span>
                </div>
                <div class="form-group">
                    <label for="parent">Parent</label>
                    <select name="parent" id="parent" class="form-control" >
                        <option value="0">None</option>
                        <?php foreach ($all_data as $single_data) { ?>
                            <option value="<?php echo $single_data->id; ?>"><?php echo $single_data->name; ?></option>
                        <?php } ?>
                    </select>
                    <span class="hints">Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</span>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <?php echo form_textarea($description); ?>
                    <span class="hints">The description is not prominent by default; however, some themes may show it.</span>
                </div>
                <div class="form-group">
                    <input type="submit" value="Add New Category" name="add_new_cat_btn" class="btn btn-primary" />
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
if (isset($_SESSION['error_message'])) {
    ?>$('.alert_msg.error').show().delay(3000).fadeTo("fast", 0);<?php
}
?>
    });
</script>