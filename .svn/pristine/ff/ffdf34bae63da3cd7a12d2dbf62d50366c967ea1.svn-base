<div class="alert alert-success alert-dismissible alert_msg saved" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Success!</strong> New Tag added successfully.
</div>
<main class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="content_header">
                <h3>All Tags </h3>
            </div>
            <div class="main_content all_tags">
                <table class="table table-striped table-bordered" id="all_tags_list">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th width="50px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_data as $single_data) {
                            ?>
                            <tr>
                                <td><a href="<?= base_url(); ?>admin/edit_tag/<?= $single_data->id ?>" ><?php echo $single_data->tag_name; ?></a></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/edit_tag/<?= $single_data->id ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-3">
            <div class="content_header">
                <h3>&nbsp;</h3>
            </div>
            <div class="all_tags">
                <span class="hints">
                    <h4>What is tags? </h4>
                    Title tags are often used on search engine results pages (SERPs) to display preview snippets for a given page, and are important both for SEO and social sharing. The title element of a web page is meant to be an accurate and concise description of a page's content.
                </span>
            </div>
            <div class="content_header">
                <h3>&nbsp;</h3>
            </div>
            <div class="all_tags">
                <span class="hints">
                    <h4>Why use tags? </h4>
                    Title tags are often used on search engine results pages (SERPs) to display preview snippets for a given page, and are important both for SEO and social sharing. The title element of a web page is meant to be an accurate and concise description of a page's content.
                </span>
            </div>
            <div class="content_header">
                <h3>&nbsp;</h3>
            </div>
            <div class="all_tags">
                <span class="hints">
                    <h4>Example </h4>
                    দেশী খবর, বিদেশী খবর, তাজা খবর, খেলা খবর, বিনোদন জগত ইত্যাদি 
                </span>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#all_tags_list').DataTable({
            "order": [[0, "desc"]]
        });

<?php
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == "success") {
        ?>
                $('.alert_msg.saved').show().delay(3000).fadeTo("fast", 0);
        <?php
    } else if ($_SESSION['status'] == "deleted") {
        ?>
                $('.alert_msg.deleted').show().delay(3000).fadeTo("fast", 0);
        <?php
    } else if ($_SESSION['status'] == "success_updated") {
        ?>
                $('.alert_msg.updated').show().delay(3000).fadeTo("fast", 0);
        <?php
    }
}
?>
    });
</script>

