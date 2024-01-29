<!-- /form add notes -->
<form action="<?= _APPFOLDER ?>" method="POST" class="form-horizontal form-label-left ajaxForm" data-target="#dashboard_root">
    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group">

            <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">Prority</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <select name="type" class="form-control i-required" required='required'>
                        <option value='1'>Low</option>
                        <option value='2'>Medium</option>
                        <option value='3'>High</option>
                        <option value='4'>Extreme</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-md-3 col-sm-3 col-xs-3">Data</label>
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <textarea name='data' rows="5" class="form-control i-required" required='required'></textarea>
                </div>
            </div>

            <div class="input-group">
                <input type="hidden" name="add_notes_check" value="1"/>
                <input type="hidden" name="phone_number" class="form-control" value="<?= $phoneNumber ?>"/>

            </div>
        </div>
    </div>
</form>

<!-- /form add notes -->