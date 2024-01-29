
<!-- page content -->
<div class="right_col" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3><?= _WEBSITE_TITLE ?></h3>
        </div>
        <!-- /form phone number -->
        <form action="<?= _APPFOLDER ?>" method="POST" class="form-horizontal form-label-left ajaxForm" data-target="#dashboard_root">
            <div class="title_right">
                <div class="col-md-8 col-sm-8 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="hidden" name="phone_check"/>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="User's phone number..." value="00909033097969"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
    <!-- /form phone number -->
    <div class="clearfix"></div>


    <div id="dashboard_root">

    </div>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header"> 
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save">Save changes</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->
