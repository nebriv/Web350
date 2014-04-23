<?php
include('includes/header.php');
?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Product Management</h1>
<ol class="breadcrumb">
  <li><a href="index.php">Dashboard</a></li>
  <li class="active">Product Overview</li>
</ol>
          <div class="row">
            <table class="table table-striped table-hover">
              <tr>
                <th><input type="checkbox" value=""></th>
                <th>Farm Name</th>
                <th>Address</th>
                <th>Image</th>
                <th>Edit</th>
              </tr>
              <?php
                $db = buildDBObject();

                $FarmIDs = $db->rawQuery('SELECT FarmID from Farms');
                foreach ($FarmIDs as $farm){
                    $row = new Farm();
                    $id = $farm["FarmID"];
                    $row->buildObject($id);

                    echo "
              <tr>
                <td><input type='checkbox' value=''></td>
                <td>";echo $row->getName(); echo "</td>
                <td>";echo $row->getAddress(); echo "</td>
                <td>";echo $row->getImage(); echo "</td>
                <td><a href='editfarm.php?farm=".$row->getID()."'>Edit</a></td>
              </tr>
                    ";
                  
                }

              ?>
            </table>
          </div>


        </div>

<?php
include('includes/footer.php');
?>