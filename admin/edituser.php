<?php
include('includes/header.php');



$db = buildDBObject();
$edituser = new User();
$edituser->buildObject($_GET['username']);


?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Users and Permissions</h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="perms.php">Users and Permissions</a></li>
            <li class="active">Editting User</li>
          </ol>
          <div class="col-md-4 pull-left">
          <h3 class="sub-header">User Authentication</h3>
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
                <label for="inputPassword3" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
                <p class="help-block">Leaving this blank will not modify the user's password.</p>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password Again">
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