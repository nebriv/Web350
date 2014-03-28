<?php
include('includes/header.php');
?>
<script>
  function saveBasic(){
    var siteName = document.getElementById("siteName").value;
    var siteURL = document.getElementById("siteURL").value;
    var xhr;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var data = "what=" + "basic" + "&siteName=" + siteName + "&siteURL=" + siteURL;
    xhr.open("POST", "http://csa.nebriv.com/admin/save.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhr.send(data);

    xhr.onreadystatechange = display_data;
    function display_data() {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          document.getElementById("basicMessages").innerHTML = xhr.responseText;
        } else {
          document.getElementById("basicMessages").innerHTML = xhr.responseText;
        }
      }
    }
  }

  function saveMaintenance(){
    var siteName = document.getElementById("siteName").value;
    var siteURL = document.getElementById("siteURL").value;
    var xhr;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var data = "what=" + "basic" + "&siteName=" + siteName + "&siteURL=" + siteURL;
    xhr.open("POST", "http://csa.nebriv.com/admin/save.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhr.send(data);

    xhr.onreadystatechange = display_data;
    function display_data() {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          document.getElementById("basicMessages").innerHTML = xhr.responseText;
        } else {
          document.getElementById("basicMessages").innerHTML = xhr.responseText;
        }
      }
    }
  }

</script>    

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Site Settings</h1>

          <h3 class="sub-header">Basic Settings</h3>
          <div name="basicMessages" id="basicMessages"></div>
          <div class="row">
            <div class="col-md-1"></div>
              <div class="col-md-4">
                <form method='post' class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="siteName" class="col-sm-4 control-label">Site Name</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="siteName" name="siteName" value='<?php echo $site->siteName(); ?>'>
                    </div>
                  </div>
                 <div class="form-group">
                    <label for="siteName" class="col-sm-4 control-label">Site URL</label>
                    <div class="col-sm-8">
                      <input class="form-control" id="siteURL" name="SiteURL" value='<?php echo $site->siteURL(); ?>'>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <button type="button" class="btn btn-primary" onclick="saveBasic()">Save Changes</button>
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
                    <?php
                      if ($site->maintenanceEnabled()){
                         echo '<input type="checkbox" id="maintenanceMode" name="maintenanceMode" value="1" checked>
                        Maintenance Mode Enabled';
                      }else{
                          echo '<input type="checkbox" id="maintenanceMode" name="maintenanceMode" value="1">
                        Maintenance Mode';
                      }
                      ?>
                  </label>
                </div>
                  <textarea name="MaintenanceMessage" id="MaintenanceMessage" class="form-control" rows="3"><?php echo $site->MaintenanceModeMessage(); ?>
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