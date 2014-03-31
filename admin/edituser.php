<?php
include('includes/header.php');



$db = buildDBObject();
$edituser = new User();
$edituser->buildObject($_GET['username']);


?>

<script>
  function saveUser(){

    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var password2 = document.getElementById('password2').value;
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;

    var xhr;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var data = "what=" + "userprofile" +  "&username=" + username + "&email=" + email + "&password=" + password + "&password2=" + password2 + "&fname=" + fname + "&lname=" + lname;
    xhr.open("POST", "http://csa.nebriv.com/admin/save.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhr.send(data);

    xhr.onreadystatechange = display_data;
    function display_data() {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          document.getElementById("userMessages").innerHTML = xhr.responseText;
        } else {
          document.getElementById("userMessages").innerHTML = xhr.responseText;
        }
      }
    }
  }
</script>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Users and Permissions</h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="perms.php">Users and Permissions</a></li>
            <li class="active">Editting User</li>
          </ol>
          <div class="col-md-4 pull-left">
          <h3 class="sub-header">User Authentication</h3>
          <div id='userMessages'></div>
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="username" class="col-sm-4 control-label">Username</label>
                <div class="col-sm-8">
                  <input type="username" class="form-control" id="username" value='<?php echo $edituser->getUsername(); ?>'>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-4 control-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="email" value='<?php echo $edituser->getEmail(); ?>'>
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="password" placeholder="New Password">
                </div>
                <p class="help-block">Leaving this blank will not modify the user's password.</p>
              </div>
              <div class="form-group">
                <label for="password2" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="password2" placeholder="New Password Again">
                </div>
              </div>
              <div class="form-group">
                <label for="role" class="col-sm-4 control-label">User Role</label>
                <div class="col-sm-8">
                <?php
                  $roles = $edituser->getRoles();
                  echo '
                    <select class="form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  ';


                  ?>
                </div>
              </div>
            <h3 class="sub-header">User Profile</h3>
              <div class="form-group">
                <label for="fname" class="col-sm-4 control-label">First Name</label>
                <div class="col-sm-8">
                  <input type="fname" class="form-control" id="fname" value='<?php echo $edituser->getFirstName(); ?>'>
                </div>
              </div>
              <div class="form-group">
                <label for="lname" class="col-sm-4 control-label">Last Name</label>
                <div class="col-sm-8">
                  <input type="lname" class="form-control" id="lname" value='<?php echo $edituser->getLastName(); ?>'>
                </div>
              </div>
              <br>
              <button type="button" class="btn btn-primary btn-sm" onclick="saveUser()">Save Changes</button>
            </form>
          </div>


          <div class="col-md-7 pull-left">
            <h3 class="sub-header">User Sessions</h3>
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
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

<?php
include('includes/footer.php');
?>