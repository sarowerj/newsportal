<main class="content all_articles">
    <div class="row">
        <div class="col-md-9">
            <div class="content_header">
                <h3>All Categories </h3>
            </div>
            <div class="main_content">
                <table class="table table-striped table-bordered" id="all_articles_list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th width="70px">Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th width="50px">Parent</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_data as $single_data) {
                            ?>
                            <tr>
                                <td><?php echo $single_data->id; ?></td>
                                <td><a href="<?php echo base_url(); ?>admin/edit_category/<?= $single_data->id; ?>"><?php echo $single_data->name; ?></a></td>
                                <td><?php echo $single_data->slug; ?></td>
                                <td><?php echo $single_data->description; ?></td>
                                <td><?php echo $single_data->parent_id; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>admin/edit_category/<?= $single_data->id; ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                                    <button type="button" data-toggle="modal" data-target="#delete_alert" class="btn delete_btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    <input type="hidden" name="cat_id" class="cat_id" value="<?= $single_data->id ?>" />
                                    <input type="hidden" name="cat_name" class="cat_name" value="<?= $single_data->name ?>" />
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="delete_alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete Category</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this <strong><span class="category_name"></span> category?</strong>
                <input type="hidden" name="main_del" id="main_del" value="" />
                <input type="hidden" name="del_name" id="del_name" value="" />
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                <a href="" type="button" class="btn btn-danger main_delete_btn">Delete Category</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
         $('#all_articles_list').DataTable({
         "order": [[0, "desc"]]
         });

        $("#all_articles_list").on("click", ".delete_btn", function () {
            var del_id = $(this).siblings('.cat_id').val();
            var del_name = $(this).siblings('.cat_name').val();
            $('#delete_alert .main_delete_btn').attr('href', '<?= base_url(); ?>admin/delete_category/' + del_id);
            $('#delete_alert .category_name').html(del_name);
        })
    });
</script>

