<?php
include('includes/header.php');
?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Users and Permissions</h1>

          <div class="row">
            <table class="table table-striped">
              <tr>
                <th><input type="checkbox" value=""></th>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Edit</th>
              </tr>
              <?php
                $db = buildDBObject();
                $userIDs = [];
                $users = $db->rawQuery('SELECT UserID from Users');
                foreach ($users as $user){
                  if ($user['UserID'] != 0){
                    $row = new User();
                    $row->buildObject($user['UserID']);
                    echo $row->getRolesAsStrings();
                  }
                  
                }

              ?>


              <tr>
                <td><input type="checkbox" value=""></td>
                <td>Nebriv</td>
                <td>Ben V</td>
                <td>nebriv@gmail.com</td>
                <td>Site Administrator</td>
                <td><a href="#">Edit</a></td>
              </tr>
            </table>
          </div>


        </div>

<?php
include('includes/footer.php');
?>