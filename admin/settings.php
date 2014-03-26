<?php
include('includes/header.php');
?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Site Settings</h1>

          <h3 class="sub-header">Basic Settings</h3>



          <h3 class="sub-header">Administration Settings</h3>

          <div class="well col-md-4"><h4>Maintenance Mode</h4>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="">
                Enable Maintenance Mode
              </label>
            </div>
              
              <textarea class="form-control" rows="3" cols="70"><?php echo $site->MaintenanceModeMessage(); ?></textarea>
          </div>

            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Option one is this and that&mdash;be sure to include why it's great
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                Option two can be something else and selecting it will deselect option one
              </label>
            </div>


        </div>
<?php
include('includes/footer.php');
?>