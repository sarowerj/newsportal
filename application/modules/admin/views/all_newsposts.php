<script type="text/javascript" src="<?php echo base_url() . 'assets/plugins/bootstrap-switch-master/dist/js/bootstrap-switch.min.js' ?>"></script>
<div class="alert_messages">
    <div class="alert alert-success alert-dismissible alert_msg breaking_status_updated" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="message"></div>
    </div>
    <div class="alert alert-danger alert-dismissible alert_msg breaking_status_not_updated" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="message"><strong>Sorry!</strong> Something wrong. Please try again.</div>
    </div>
</div>
<main class="content all_articles">
    <div class="content_header">
        <h3>All News Posts <a href="<?php echo base_url(); ?>admin/new_newspost" class="btn btn-primary btn-xs">Add New Article</a></h3>
    </div>
    <div class="main_content all_newsposts">
        <div id="teacher-area">
        </div>
        <div class="row" id="pagination-area">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                    Showing <span id="start"></span> to <span id="end"></span> of <span id="total"></span> Students
                </div>
            </div>
            <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    <ul class="pagination" id="page_number">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    function ajax_pagination(target_page) {
        $('#start').html(1);
        $('#end').html(limit);
        $('.loading-img').show();
        $('#pagination-area').show();
        var teacher_list = '<table class="table table-striped table-responsive table-bordered">' +
                '<tbody><tr>' +
                '<th width="50">Sr No</th>' +
                '<th width="300">News Title</th>' +
                '<th width="90">Author</th>' +
                '<th width="250">Categories</th>' +
                '<th>Date</th>' +
                '<th>Time</th>' +
                '<th width="50">Breaking</th>' +
                '<th>Status</th>' +
                '</tr>';
        var limit = 10;
        var offset = (target_page - 1) * limit;
        var posts = $.ajax({
            type: 'POST',
            url: base_url + 'admin/get_newpost_list',
            async: false,
            dataType: 'json',
            data: {offset: offset, limit: limit},
        }).responseJSON;
        if (posts[0] != '')
        {
            $('.loading-img').hide();
            var datastring = posts[0];
            total = posts[1].total;
            $.each(datastring, function (index, value) {
                if (value.breaking == 'on') {
                    var breaking = 'checked';
                } else {
                    var breaking = '';
                }
                last_row = (offset + index + 1);
                teacher_list += '<tr><td>' + (offset + index + 1) + '</td>' +
                        '<td> <a href="<?php echo base_url(); ?>/admin/edit_newspost/' + value.id + '">' + value.title + '</a></td>' +
                        '<td>' + value.article_author + '</td>' +
                        '<td width="100">' + value.category + '</td>' +
                        '<td>' + value.date + '</td>' +
                        '<td>' + value.time + '</td>' +
                        '<td><input class="switch" data-id="' + value.id + '" type="checkbox" name="breaking_news" ' + breaking + '></td>' +
                        '<td width="50">' + value.status + '</td>';
            });
            teacher_list += '</tbody></table>';
            $('#teacher-area').html(teacher_list);

            if (target_page == 1) {
                $('.paginate_button_num').first().addClass('active');
                $('.paginate_button_prev').addClass('disabled');
            } else {
                $('.paginate_button_prev').removeClass('disabled');
            }
            last_num = $('.paginate_button_num').last().text();
            if (target_page == last_num) {
                $('.paginate_button_next').addClass('disabled');
            } else {
                $('.paginate_button_next').removeClass('disabled');
            }

            $('#start').html((offset + 1));
            $('#end').html(last_row);
            $('#total').html(total);
        }

        /*Activate switch button on ajax result*/
        $(".switch").bootstrapSwitch();

        /*Save breaking status on changing switch from all newspost page*/
        $('.switch').on('switchChange.bootstrapSwitch', function (event, state) {
            var id = $(this).attr('data-id');
            var status = '';
            if (state == true) {
                var status = 'on';
            } else {
                var status = '';
            }
            $.ajax({
                url: base_url + 'admin/breakingStatus',
                type: 'post',
                dataType: 'text',
                data: {status: status, id: id},
                success: function (data) {
                    /*Show hide success alert message for switch on.*/
                    if (data == 'success_on') {
                        $('.alert_msg.breaking_status_updated').removeClass('alert-warning');
                        $('.alert_msg.breaking_status_updated').addClass('alert-success');
                        $('.alert_msg.breaking_status_updated').show().delay(3000).fadeOut("fast", 0);
                        $('.alert_msg.breaking_status_updated .message').html('<strong>Success!</strong> This news post marked as breaking news.');
                    }
                    /*Show hide success alert message for switch off.*/
                    else if (data == 'success_off') {
                        $('.alert_msg.breaking_status_updated').removeClass('alert-success');
                        $('.alert_msg.breaking_status_updated').addClass('alert-warning');
                        $('.alert_msg.breaking_status_updated').show().delay(3000).fadeOut("fast", 0);
                        $('.alert_msg.breaking_status_updated .message').html('<strong>Success!</strong> This news post marked as not breaking news.');
                    }
                    /*Show message, if happen any error to mark as breaking.*/
                    else {
                        $('.alert_msg.breaking_status_not_updated').show().delay(3000).fadeOut("fast", 0);
                    }
                }
            });
        });
        return (total / limit);
    }
    function pagination_number(total) {
        var pagination = '<li class="paginate_button_prev previous disabled" id="example2_previous">' +
                '<a href="javascript:void(0)">Previous</a>' +
                '</li>';
        for (var i = 0; i < (total); i++) {
            if (i == 0) {
                var active = 'active';
            } else {
                var active = '';
            }
            pagination += '<li class="paginate_button_num ' + active + '"><a href="javascript:void(0)">' + (i + 1) + '</a></li>';
        }
        /*Cheecking is page only one.*/
        if (total == 1) {
            pagination += '<li class="paginate_button_next next disabled" id="example2_next">';
            pagination += '<a href="javascript:void(0)">Next</a></li>';
        } else {
            pagination += '<li class="paginate_button_next next " id="example2_next">';
            pagination += '<a href="javascript:void(0)" dd>Next</a></li>';
        }
        $('#page_number').html(pagination);
    }

    $(document).ready(function () {

        total = ajax_pagination(1);
        pagination_number(total);
        $('.paginate_button_num').click(function () {
            var target_page = $(this).text().trim();
            ajax_pagination(target_page);
            $('.paginate_button_num').removeClass('active');
            $(this).addClass('active');
        });
        $('.paginate_button_next').click(function () {
            if ($('.paginate_button_next').hasClass('disabled')) {
                alert('Bad Click! no Pages');
                return false;
            }
            var target_page = parseInt($('.pagination').find('.active').text().trim());
            target_page = (target_page + 1);
            var active = $('.pagination .active');
            $('.paginate_button_num').removeClass('active');
            active.next().addClass('active');
            ajax_pagination(target_page);
        });
        $('.paginate_button_prev').click(function () {
            if ($('.paginate_button_prev').hasClass('disabled')) {
                alert('Bad Click! no Pages');
                return false;
            }
            var target_page = parseInt($('.pagination').find('.active').text().trim());
            target_page = (target_page - 1);
            var active = $('.pagination .active');
            $('.paginate_button_num').removeClass('active');
            active.prev().addClass('active');
            ajax_pagination(target_page);
        });
    });
</script>