<?php
include('includes/header.php');
?>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Users and Permissions</h1>
<ol class="breadcrumb">
  <li><a href="index.php">Dashboard</a></li>
  <li class="active">Users and Permissions</li>
</ol>
          <div class="row">
            <table class="table table-striped table-hover">
              <tr>
                <th><input type="checkbox" value=""></th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Farm</th>
              </tr>
              <?php
                $db = buildDBObject();
                $Products = [];
                $ProductIDs = $db->rawQuery('SELECT ProductID from Products');
                
                $ProductIDs = $ProductIDs[0];
                print_r($ProductIDs);
                foreach ($ProductIDs as $productID){
                    $row = new Product();
                    
                    $row->buildObject($productID);

                    echo "
              <tr>
                <td><input type='checkbox' value=''></td>
                <td>";echo $row->getName(); echo "</td>
                <td>";echo $row->getDescription(); echo "</td>
                <td>";echo $row->getPrice(); echo "</td>
                <td>";echo $row->getQuantity(); echo "</td>
                <td>";echo $row->getFarmName(); echo "</td>
                <td><a href='editproduct.php?product=".$row->getID()."'>Edit</a></td>
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