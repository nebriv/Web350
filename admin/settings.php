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
    var maintenanceMode = document.getElementById("maintenanceMode").value;
    var maintenanceMessage = document.getElementById("maintenanceMessage").value;
    var xhr;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var data = "what=" + "maintenance" + "&maintenanceMode=" + maintenanceMode + "&maintenanceMessage=" + maintenanceMessage;
    xhr.open("POST", "http://csa.nebriv.com/admin/save.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhr.send(data);

    xhr.onreadystatechange = display_data;
    function display_data() {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          document.getElementById("maintenanceMessages").innerHTML = xhr.responseText;
        } else {
          document.getElementById("maintenanceMessages").innerHTML = xhr.responseText;
        }
      }
    }
  }

  function saveRegistration(){
    var registrationRequired = document.getElementById("registrationRequired").value;
    var registrationOpen = document.getElementById("registrationOpen").value;
    var AdminApprovalRequired = document.getElementById("AdminApprovalRequired").value;
    
    var xhr;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var data = "what=" + "registration" + "&registrationRequired=" + registrationRequired + "&registrationOpen=" + registrationOpen + "&AdminApprovalRequired=" + AdminApprovalRequired;
    alert(data)
    xhr.open("POST", "http://csa.nebriv.com/admin/save.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhr.send(data);

    xhr.onreadystatechange = display_data;
    function display_data() {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          document.getElementById("registrationMessages").innerHTML = xhr.responseText;
        } else {
          document.getElementById("registrationMessages").innerHTML = xhr.responseText;
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
              <div name="maintenanceMessages" id="maintenanceMessages"></div>
              <form method='post' class="form-horizontal" role="form">
                <div class="checkbox">
                  <label>
                    <?php
                      if ($site->maintenanceEnabled()){
                         echo '<input type="checkbox" id="maintenanceMode" name="maintenanceMode" value="0" checked>
                        Maintenance Mode Enabled';
                      }else{
                          echo '<input type="checkbox" id="maintenanceMode" name="maintenanceMode" value="1">
                        Maintenance Mode Enabled';
                      }
                      ?>
                  </label>
                </div>
                  <textarea name="maintenanceMessage" id="maintenanceMessage" class="form-control" rows="3"><?php echo $site->MaintenanceModeMessage(); ?>
                  </textarea>
              <br>
              <button type="button" class="btn btn-primary btn-sm" onclick="saveMaintenance()">Save Changes</button>
              </form>
              </div>
            </div>
          <div class="row">
            <div class="col-md-1"></div>
              <div class="well col-md-4"><h4>User Registration Settings</h4>
              <div name="registrationMessages" id="registrationMessages"></div>
              <form method='post' class="form-horizontal" role="form">
                <div class="checkbox">
                  <label>
                    <?php
                      if ($site->registrationOpen()){
                         echo '<input type="checkbox" id="registrationOpen" name="registrationOpen" value="1" checked>
                        Registration Open';
                      }else{
                          echo '<input type="checkbox" id="registrationOpen" name="registrationOpen" value="0">
                        Registration Open';
                      }
                    ?>
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <?php
                      if ($site->registrationRequired()){
                         echo '<input type="checkbox" id="registrationRequired" name="registrationRequired" value="1" checked>
                        Registration Required';
                      }else{
                          echo '<input type="checkbox" id="registrationRequired" name="registrationRequired" value="0">
                        Registration Required';
                      }
                    ?>
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <?php
                      if ($site->AdminApprovalRequired()){
                         echo '<input type="checkbox" id="AdminApprovalRequired" name="AdminApprovalRequired" value="1" checked>
                        Require Administrator Approval of New User Accounts';
                      }else{
                          echo '<input type="checkbox" id="AdminApprovalRequired" name="AdminApprovalRequired" value="0">
                        Require Administrator Approval of New User Accounts';
                      }
                    ?>
                  </label>
                </div>
                <br>
                <button type="button" class="btn btn-primary btn-sm" onclick="saveRegistration()">Save Changes</button>
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