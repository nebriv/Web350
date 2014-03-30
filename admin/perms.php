<?php
include('includes/header.php');
?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Users and Permissions</h1>

          <div class="row">
            <table class="table table-striped table-hover">
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

                    echo "
              <tr>
                <td><input type='checkbox' value=''></td>
                <td>";echo $row->getUsername(); echo "</td>
                <td>";echo $row->getFullName(); echo "</td>
                <td>";echo $row->getEmail(); echo "</td>
                <td>";echo $row->getRolesAsStrings(); echo "</td>
                <td><a href='edituser.php?username=$user['UserID']>Edit</a></td>
              </tr>
                    ";
                  }
                  
                }

              ?>
            </table>
          </div>


        </div>

<?php
include('includes/footer.php');
?>