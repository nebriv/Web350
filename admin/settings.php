<?php
include('includes/header.php');
?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Site Settings</h1>

          <h3 class="sub-header">Basic Settings</h3>
          <div class="row">
            <div class="col-md-1"></div>
              <div class="col-md-4">
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="siteName" class="col-sm-3 control-label">Site Name</label>
                    <div class="col-sm-9">
                      <input class="form-control" id="siteName" value='<?php echo $site->siteName(); ?>'>
                    </div>
                  </div>
                 <div class="form-group">
                    <label for="siteName" class="col-sm-3 control-label">Site URL</label>
                    <div class="col-sm-9">
                      <input class="form-control" id="siteName" value='<?php echo $site->siteURL(); ?>'>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          <h3 class="sub-header">Administration Settings</h3>
          <div class="row">
            <div class="col-md-1"></div>
              <div class="well col-md-4"><h4>Maintenance Mode</h4>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Enable Maintenance Mode
                  </label>
                </div>
                  <textarea class="form-control" rows="3"><?php echo $site->MaintenanceModeMessage(); ?>
                  </textarea>
              <br>
              <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
              </div>
            </div>
          <div class="row">
            <div class="col-md-1"></div>
              <div class="well col-md-4"><h4>User Registration Settings</h4>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                      Require registration before checkout
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Require user validates email address
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    Require Administrator Approval of New User Accounts
                  </label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
              </div>
          </div>

          <div class="row">
            <div class="col-md-1"></div>
              <div class="well col-md-4"><h4>Backup/Restore Settings</h4>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Backup Database
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    Restore Database
                  </label>
                  <div class="form-group">
                      <label for="exampleInputFile">Database File Upload</label>
                      <input type="file" id="exampleInputFile">
                      <p class="help-block">Upload your .SQL file here to restore the database.</p>
                    </div>
                </div>
              <br>
              <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
              </div>
          </div>
        </div>


        </div>
<?php
include('includes/footer.php');
?>