<?php
include('includes/header.php');
$db = buildDBObject();
?>


<div class=\"jumbotron\">

<?php
$CartFarms = $_SESSION['Farms'];
$totals = $_SESSION['totals'];
$subtotal = 0;
foreach($totals as $total){
  $subtotal+=$total;
}
foreach($CartFarms as $CartFarm){
  $db->get('FarmID', $CartFarm)
  $farms = $db->get('Farms');
  foreach($farms as $farm){
  	echo "<div class=\"caption\">
          <h3>".$farm['Name']."</h3>
          <p>";
          $db->where('FarmID', $farm['FarmID']);
          $products = $db->get('Products');
          foreach($products as $product){
          	echo $product['Name']." $".$product['Price']."<br />";
          }
          echo "Total: $".$subtotal;
          echo "</div>";
  }
}
include('includes/footer.php');

?>
