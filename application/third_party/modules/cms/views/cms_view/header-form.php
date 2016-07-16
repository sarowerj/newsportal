<div class="tab-pane active" id="tab_a">
    <fieldset>
        <legend>Header </legend>

        <div class="col-sm-12">
            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>cms/save_header" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="site_title">Site Title</label>  
                    <div class=" col-sm-7 col-xs-12">
                        <input type="hidden" value="1" name="header_form" />
                        <input id="site_title" value="<?php if (isset($header_title)) echo $header_title; ?>" name="site_title" type="text" placeholder="Site Title" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="site_slogan">Site Slogan</label>  
                    <div class=" col-sm-7 col-xs-12">
                        <input id="site_slogan" name="site_slogan" value="<?php if (isset($header_slogan)) echo $header_slogan; ?>" type="text" placeholder="Site Slogan" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="site_favicon">Site Favicon</label>  
                    <div class=" col-sm-7 col-xs-12">
                        <input id="site_favicon" name="site_favicon" type="file" placeholder="Site Favicon" />
                        <?php if (isset($header_logo)) { ?>
                            <img src='<?php echo base_url() . 'uploads/'.$header_logo->opm_value.'small/'.$header_favicon->opt_value; ?>' />
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="site_logo">Site Logo</label>  
                    <div class=" col-sm-7 col-xs-12">
                        <input id="site_logo" name="site_logo" type="file" placeholder="Site Logo" />
                        <?php if (isset($header_favicon)) { ?>
                            <img src='<?php echo base_url() . 'uploads/'.$header_favicon->opm_value.'small/'.$header_logo->opt_value; ?>' />
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="site_favicon"></label>  
                    <div class=" col-sm-7 col-xs-12">
                        <input type="submit" class="btn btn-primary pull-right" value="Save" />
                    </div>
                </div>
            </form>
        </div>
    </fieldset>

</div>