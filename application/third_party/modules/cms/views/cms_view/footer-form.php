<div class="tab-pane active" id="tab_a">
    <fieldset>
        <legend>Footer </legend>
        <div class="col-sm-12">
            <form class="form-horizontal" method="post" action="<?php echo base_url();?>cms/save_footer">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="copyright">Copyright</label>  
                    <div class=" col-sm-7 col-xs-12">
                        <input type="hidden" value="1" name="footer_form" />
                        <input id="copyright" name="copyright" value="<?php if (isset($copyright)) echo $copyright; ?>" type="text" placeholder="Copyright" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>  
                    <div class=" col-sm-7 col-xs-12">
                        <input type="submit" class="btn btn-primary pull-right" value="Save" />
                    </div>
                </div>

            </form>
        </div>
    </fieldset>
</div>