<?php
include('includes/header.php');
$db = buildDBObject();
?>


<div class=\"jumbotron\">

<?php
$CartFarms = $_SESSION['Farms'];
$totals = $_SESSION['total'];
$subtotal = 0;
foreach($totals as $total){
  $subtotal+=$total;
}
foreach($CartFarms as $CartFarm){
  $db->where('FarmID', $CartFarm);
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
          
          echo "</div>";
  }
}
echo "Total: $".$subtotal;
echo "<br /><a href=\"cartClear.php\">Clear Cart</a>
<form name=\"_xclick\" action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">
<input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
<input type=\"hidden\" name=\"business\" value=\"me@mybusiness.com\">
<input type=\"hidden\" name=\"currency_code\" value=\"USD\">
<input type=\"hidden\" name=\"item_name\" value=\"Teddy Bear\">
<input type=\"hidden\" name=\"amount\" value=\"12.99\">
<input type=\"image\" src=\"http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif\" border=\"0\" name=\"submit\" alt=\"Make payments with PayPal - it's fast, free and secure!\">
</form>";
include('includes/footer.php');

?>
