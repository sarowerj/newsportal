<!-- Left Navigation Start-->
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/admin/dist/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $username; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="treeview <?php echo($meta == 'dashboard') ? 'active' : '';?>">
                <a href="<?php echo base_url(); ?>admin">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview <?php echo($meta == 'category') ? 'active' : '';?>">
                <a href="<?php echo base_url(); ?>admin">
                    <i class="fa fa-puzzle-piece"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview <?php echo($active == 'all_categories') ? 'active' : '';?>">
                        <a href="<?= base_url(); ?>admin/all_categories">
                            <i class="fa fa-circle"></i> <span>All Categories</span>
                        </a>
                    </li>
                    <li class="treeview <?php echo($active == 'newCategory') ? 'active' : '';?>">
                        <a href="<?php echo base_url(); ?>admin/new_category">
                            <i class="fa fa-circle"></i> <span>Add New Category</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview <?php echo($meta == 'tag') ? 'active' : '';?>">
               <a href="javascript:void(0)">
                    <i class="fa fa-map-signs"></i> <span>Tags</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview <?php echo($active == 'all_tags') ? 'active' : '';?>">
                        <a href="<?= base_url(); ?>admin/all_tags">
                            <i class="fa fa-circle"></i> <span>All Tags</span>
                        </a>
                    </li>
                    <li class="treeview <?php echo($active == 'new_tag') ? 'active' : '';?>">
                        <a href="<?php echo base_url(); ?>admin/new_tag">
                            <i class="fa fa-circle"></i> <span>Add New Tag</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview <?php echo($meta == 'newsPost') ? 'active' : '';?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-edit"></i> <span>News Post</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview <?php echo($active == 'all_newsposts') ? 'active' : '';?>">
                        <a href="<?= base_url(); ?>admin/all_newsposts">
                            <i class="fa fa-circle"></i> <span>All News Posts</span>
                        </a>
                    </li>
                    <li class="treeview <?php echo($active == 'newsPost') ? 'active' : '';?>">
                        <a href="<?php echo base_url(); ?>admin/new_newspost">
                            <i class="fa fa-circle"></i> <span>New News Post</span>
                        </a>
                    </li>
                    <li class="treeview <?php echo($active == 'newsPostInTrash') ? 'active' : '';?>">
                        <a href="<?php echo base_url(); ?>admin/all_trash_newsposts">
                            <i class="fa fa-circle"></i> <span>Trash</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview <?php echo($meta == 'appearance') ? 'active' : '';?>">
                <a href="<?php echo base_url(); ?>admin">
                    <i class="fa fa-edit"></i> <span>Appearance</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview <?php echo($active == 'menus') ? 'active' : '';?>">
                        <a href="<?= base_url(); ?>admin/menus">
                            <i class="fa fa-circle"></i> <span>Menus</span>
                        </a>
                    </li>
                    <li class="treeview <?php echo($active == 'new_page') ? 'active' : '';?>">
                        <a href="<?php echo base_url(); ?>admin/new_page">
                            <i class="fa fa-circle"></i> <span>Add New Page</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php echo($meta == 'media') ? 'active' : '';?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-file-image-o"></i> <span>Media</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview <?= ($active == 'all_media') ? 'active' : ''; ?>">
                        <a href="<?= base_url(); ?>admin/all_media">
                            <i class="fa fa-circle"></i> <span>All Media</span>
                        </a>
                    </li>
                    <li class="treeview <?= ($active == 'new_media') ? 'active' : ''; ?>">
                        <a href="<?= base_url(); ?>admin/new_media">
                            <i class="fa fa-circle"></i> <span>Add New Media</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php echo($meta == 'ad_manager') ? 'active' : '';?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-bullhorn" aria-hidden="true"></i> <span>Ad Manager</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview <?= ($active == 'all_ad') ? 'active' : ''; ?>">
                        <a href="<?= base_url(); ?>admin/all_ad">
                            <i class="fa fa-circle"></i> <span>All Advertisement</span>
                        </a>
                    </li>
                    <li class="treeview <?= ($active == 'new_ad') ? 'active' : ''; ?>">
                        <a href="<?= base_url(); ?>admin/new_ad">
                            <i class="fa fa-circle"></i> <span>Add New Advertisement</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview <?php echo($meta == 'options') ? 'active' : '';?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-cog"></i> <span>Options</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview <?= ($active == 'options') ? 'active' : ''; ?>">
                        <a href="<?= base_url(); ?>admin/site_options">
                            <i class="fa fa-circle"></i> <span>Site Options</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="bottom_button"><a href="#"> <i class="fa fa-database"></i>Update Database</a></li>
        </ul>
    </section>
</aside>