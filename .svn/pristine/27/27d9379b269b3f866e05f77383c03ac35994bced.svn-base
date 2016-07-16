<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
<div class="tab-pane active" id="tab_a">
    <fieldset>
        <legend>Theme Option </legend>
        <div class="col-sm-12">
            <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>cms/save_theme_option">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="background_color">Background Color</label>  
                    <div class=" col-sm-7 col-xs-12">
                        <input type="hidden" value="1" name="theme_form" />
                        <div class="input-group my-colorpicker2">
                            <input type="text" id="background_color" value="<?php if (isset($theme_bg)) echo $theme_bg; ?>" name="background_color" type="text" placeholder="Background Color" class="form-control">
                            <div class="input-group-addon">
                                <i></i>
                            </div>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="font_color">Font Color</label>  
                    <div class=" col-sm-7 col-xs-12">

                        <div class="input-group my-colorpicker2">
                            <input type="text" id="font_color" value="<?php if (isset($theme_font)) echo $theme_font; ?>" name="font_color" type="text" placeholder="Font Color" class="form-control">
                            <div class="input-group-addon">
                                <i></i>
                            </div>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="paragraph_color">Paragraph Color</label>  
                    <div class=" col-sm-7 col-xs-12">

                        <div class="input-group my-colorpicker2">
                            <input type="text" id="paragraph_color" value="<?php if (isset($theme_p)) echo $theme_p; ?>" name="paragraph_color" type="text" placeholder="paragraph Color" class="form-control">
                            <div class="input-group-addon">
                                <i></i>
                            </div>
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->
                </div>
                

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>  
                    <div class="col-sm-7 col-xs-12">
                        <input type="submit" class="btn btn-primary pull-right" value="Save" />
                    </div>
                </div>

            </form>
        </div>
    </fieldset>
</div>
<!-- bootstrap color picker -->
<script src="<?php echo base_url(); ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script>
    $(function () {
        $(".my-colorpicker2").colorpicker();

    });
</script>