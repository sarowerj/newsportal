<div class="alert_messages">
    <div class="alert alert-warning alert-dismissible alert_msg error" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> 
        <?php
        if (isset($_SESSION['error_message'])) {
            echo $_SESSION['error_message'];
        }
        ?>
    </div>
    <div class="alert alert-success alert-dismissible alert_msg success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Category updated successfully.
    </div>

    <div class="alert alert-success alert-dismissible alert_msg parent_desc" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Success!</strong> Parent and description updated successfully.
    </div>
</div>

<main class="content all_articles">
    <div class="row">
        <div class="col-md-6">
            <?php
            if (isset($current_data[0])) {
                ?>
                <?php echo form_open('admin/update_categories'); ?>
                <div class="content_header">
                    <h3>Add New Category</h3>
                    <?php
                    $name = array(
                        'name' => 'name',
                        'id' => 'name',
                        'value' => 'FF',
                        'placeholder' => 'Name',
                        'value' => $current_data[0]->name,
                        'class' => 'form-control',
                        'required' => 'required',
                        'autocomplete' => 'off'
                    );
                    $slug = array(
                        'name' => 'slug',
                        'id' => 'slug',
                        'placeholder' => 'Slug',
                        'value' => $current_data[0]->slug,
                        'class' => 'form-control',
                        'required' => 'required',
                        'disabled' => ''
                    );
                    $description = array(
                        'name' => 'description',
                        'id' => 'description',
                        'placeholder' => 'Description',
                        'value' => $current_data[0]->description,
                        'class' => 'form-control',
                        'rows' => '5'
                    );
                    ?>
                    <div class="form-group">
                        <?php echo form_label('Name', 'name'); ?>
                        <?php echo form_input($name); ?>
                        <input type="hidden" name="id" value="<?= $current_data[0]->id ?>" />
                        <span class="hints">The name is how it appears on your site.</span>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <?php echo form_input($slug); ?>
                        <span class="hints">The "slug" is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</span>
                    </div>
                    <div class="form-group">
                        <label for="parent">Parent</label>
                        <select name="parent" id="parent" class="form-control" >
                            <option value="0">None</option>
                            <?php foreach ($all_data as $single_data) { ?>
                                <option value="<?php echo $single_data->id; ?>" <?php
                                if ($current_data[0]->parent_id == $single_data->id) {
                                    echo 'selected';
                                };
                                ?>><?php echo $single_data->name; ?></option>
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
                        <input type="submit" value="Upadate Category" name="add_new_cat_btn" class="btn btn-primary" />
                    </div>
                </div>
                <?php
                echo form_close();
            } else {
                echo "Sorry! No category selected.";
            }
            ?>
        </div> 
    </div>
</main>
<script type="text/javascript">
    $(document).ready(function () {
<?php if (isset($_SESSION['parent_desc'])) { ?>
            $('.alert_msg.parent_desc').fadeIn().delay(3000).fadeOut("fast", 0);
<?php } ?>

<?php if (isset($_SESSION['success_message'])) { ?>
            $('.alert_msg.success').fadeIn().delay(3000).fadeOut("fast", 0);
<?php } ?>

<?php if (isset($_SESSION['error_message'])) { ?>
            $('.alert_msg.error').fadeIn().delay(3000).fadeOut("fast", 0);
<?php } ?>
    });
</script>

