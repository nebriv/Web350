<?php
$total = 0;
include('includes/header.php');
$db = buildDBObject();
$farms = $db->get('Farms');

?>


<div class=\"jumbotron\">
<form method=\"post\">

<?php
foreach($farms as $farm){
	echo "<div class=\"columb\">
  <div class=\"col-sm-6 col-md-4\">
    <div class=\"thumbnail\">
    <img src=\"".$farm['Image']."\">
    <div class=\"caption\">
        <h3>".$farm['Name']."</h3>
        <p>";
        $db->where('FarmID', $farm['FarmID']);
        $products = $db->get('Products');
        foreach($products as $product){
        $total += $product['Price'];
        	echo $product['Name']." $".$product['Price']."<br />";
        }
        echo "Total: $".$total;
        echo "</p>
        <p><a href=\"#\" onclick=\"calc()\" class=\"btn btn-primary\" role=\"button\">Add Cart</a></p>
        </div>
       </div>
      </div>
     </div>";
}
?>
<!--
            <label class="checkbox-inline">
                <input type="checkbox" onclick="total += 5" id="EFOCheckbox1" value="5"> Corn ($5)
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" onclick="calc(6)" id="EFOCheckbox2" value="6"> Honey ($6)
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" onclick="calc(5)" id="EFOCheckbox3" value="5"> Red Onion ($5)
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" onclick="calc(6)" id="EFOCheckbox4" value="6"> Zucchini ($6)
        </p>

        <p><a href="#" onclick="calc()" class="btn btn-primary" role="button">Add Cart</a></p>

        <div class="columb">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://www.fairfoodmatters.org/images/VegBasket.jpg" alt="North Vermont Farms">
      <div class="caption">
        <h3>North Vermont Farms</h3>
        <p>
            <label class="checkbox-inline">
                <input type="checkbox" id="NVFCheckbox1" value="tomatoes"> Tomatoes 

            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="NVFCheckbox2" value="beets"> Beets
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="NVFCheckbox3" value="carrots"> Carrots
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="NVFCheckbox4" value="squash"> Squash
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="NVFCheckbox5" value="red onion"> Red Onion
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="NVFCheckbox6" value="corn"> Corn
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="NVFCheckbox7" value="broccoli"> Broccoli
            </label>
        </p>
        <p><a href="#" class="btn btn-primary" method="POST" onclick="selected()" role="button">Add Cart</a></p>
      </div>
    </div>
  </div>
</div>


        <div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://i2.wp.com/www.berea.edu/grow-appalachia/wp-content/blogs.dir/232/files/2013/09/food-basket.jpg?resize=300%2C200" alt="Dakin Farms">
      <div class="caption">
        <h3>Dakin Farms</h3>
        <p>
            <label class="checkbox-inline">
                <input type="checkbox" id="DFCheckbox1" value="corn"> Corn 
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="DFCheckbox2" value="honey"> Honey
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="DFCheckbox3" value="red onion"> Red Onion
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" id="DFCheckbox4" value="zucchini"> Zucchini
        </p>
        </br></br></br>
        <p><a href="#" input type="submit" class="btn btn-primary" role="button">Add Cart</a></p>
      </div>
    </div>
  </div>
</div>
        
      </div>

      <div class="row">
        <div class="col-lg-4">
          <h2>What is Community Supported Agriculture?</h2>
			<p>Community Supported Agriculture is a alternative model for producing and distributing food and other produce throughout a local area. Members are able to subscribe to receive scheduled shipments or pick-up of food tailored to their needs.</p>
        </div>
        <div class="col-lg-4">
          <h2>What is this management system?</h2>
          <p>This management system allows us to quickly and easily update what produce we have available on a weekly basis, and also allows you to modify your orders whenever you would like. By utilizing this system we are able to efficiently and accurately build out your order and get it to you within reasonable time!</p>
       </div>
        <div class="col-lg-4">
          <h2>How can I contribute?</h2>
          <p>If you are a local farmer and would like to contribute to this CSA please send us an email!</p>
          <p><a class="btn btn-primary" href="../contact_us.php" role="button">Contact Us! &raquo;</a></p>
        </div>
      </div>-->
</form>

<?php

include('includes/footer.php');

?>
