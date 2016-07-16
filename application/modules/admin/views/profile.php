<main class="content profile">
    <div class="row">
        <div class="col-md-12">
            <div class="content_header">
                <h3>User Profile</h3>
            </div>
            <div class="main_content">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/admin/dist/user2-160x160.jpg" alt="User profile picture">
                                <h3 class="profile-username text-center"><?= $username; ?></h3>
                                <p class="text-muted text-center"><?= $email; ?></p>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Total Article</b> <a class="pull-right">1,322</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Total Published</b> <a class="pull-right">543</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Reporter From</b> <a class="pull-right">2 Years</a>
                                    </li>
                                </ul>

                                <a href="https://www.facebook.com" target="_blank" class="btn btn-primary btn-block"><b>Follow on Facebook</b></a>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                    <div class="col-md-9">
                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">About Me</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                                <p class="text-muted">Chapai Nawabganj, Rajshahi</p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                                <p>
                                    <span class="label label-danger">Sports</span>
                                    <span class="label label-success">Political</span>
                                </p>

                                <hr>

                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>