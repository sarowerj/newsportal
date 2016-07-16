<main class="content category_manager">
    <div class="content_header">
        <h3>Category manager <a href="<?php echo base_url(); ?>admin/new_category" class="btn btn-primary btn-xs">Add New Category</a></h3>
    </div>
    <div class="main_content">
        <div class="row">
            <div class="col-sm-3">
                <div class="box box-default widget all_categories">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Categories</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <h5>Select Your Category</h5>
                        <div class="category_list">
                            <?php for ($i = 0; $i <= 10; $i++) { ?>
                                <div class="item">
                                    <input type="radio" name="category_name" id="category_<?php echo $i; ?>" class="css_checkbox"/>
                                    <label for="category_<?php echo $i; ?>">Category <?php echo $i; ?></label>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="add_btn text-right">
                            <a href="#" class="btn btn-primary">Add to Category</a>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- End Widget-->
            </div>
            <div class="col-sm-9">
                <div class="box box-default widget all_categories">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Categories</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <h5>Just drag and drop category to make sub category or parrent category.</h5>
                        <ul class="category_list_shorted" id="sTree2">
                            <li id="item_a" data-module="a">
                                <div>Item a 
                                    <a href="#" class="open_icon">
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <span class="details">
                                        aasdfasdf
                                    </span>
                                </div>
                            </li> 
                            <li id="item_c" data-module="c">
                                <div>Item c - c block disallows inserting items from other blocks</div>
                                <ul class="">
                                    <li id="item_c1" data-module="c">
                                        <div>Item c1</div>
                                    </li>
                                    <li id="item_c2" data-module="c">
                                        <div>Item c2</div>
                                    </li>
                                    <li id="item_c3" data-module="c">
                                        <div>Item c3</div>
                                    </li>
                                    <li id="item_c4" data-module="c">
                                        <div>Item c4</div>
                                    </li>
                                    <li id="item_c5" data-module="c">
                                        <div>Item c5</div>
                                    </li>
                                </ul>
                            </li>
                            <li id="item_d" data-module="d">
                                <div>Item d</div>
                                <ul class="">
                                    <li id="item_d1" data-module="d">
                                        <div>Item d1</div>
                                    </li>
                                    <li id="item_d2" data-module="d">
                                        <div>Item d2</div>
                                    </li>
                                    <li id="item_d3" data-module="d">
                                        <div>Item d3</div>
                                    </li>
                                    <li id="item_d4" data-module="d">
                                        <div>Item d4</div>
                                    </li>
                                    <li id="item_d5" data-module="d">
                                        <div>Item d5</div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="add_btn text-right">
                            <input type="submit" value="Save Category" class="btn btn-primary save_category" />
                        </div>
                        <pre id="result" style="display:none;">
                            
                        </pre>
                    </div><!-- /.box-body -->
                </div><!-- End Widget-->
            </div>
        </div>
    </div>
</main>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/category_listing.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-sortable-lists/jquery-sortable-lists.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var options = {
            opener: {
                active: false,
                as: 'html', // or "class" or skip if using background-image url
                close: '', // <i class="fa fa-minus red"></i> or 'fa fa-minus' or './imgs/Remove2.png'
                open: '', // <i class="fa fa-plus"></i> or 'fa fa-plus' or './imgs/Add2.png'
                openerCss: {
                    'display': 'inline-block', // Default value
                    'float': 'left', // Default value
                    'width': '18px',
                    'height': '18px',
                    'margin-left': '-35px',
                    'margin-right': '5px',
                    'background-position': 'center center', // Default value
                    'background-repeat': 'no-repeat' // Default value
                },
                // or like a class. Note that class can not rewrite default values. To rewrite defaults you have to do it through css object.
                openerClass: 'yourClassName'
            }
        }
        $('#sTree2').sortableLists(options);
    })

    $('.save_category').on('click', function () {
        $('#result').show();
        $('#result').text($('#sTree2').sortableListsToArray());
        console.log($('#sTree2').sortableListsToArray());
    });
</script>