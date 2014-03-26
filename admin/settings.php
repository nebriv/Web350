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
                    <label for="inputEmail3" class="col-sm-2 control-label">Site Name</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder='<?php echo $site->siteName(); ?>'>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Remember me
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Sign in</button>
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
              </div>
          </div>
        </div>


        </div>
<?php
include('includes/footer.php');
?>