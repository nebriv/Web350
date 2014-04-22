<?php

class Product {

	function __construct($id = NULL, $sku = NULL, $name = NULL, $description = NULL, $price = NULL, $quantity = NULL, $farmid = NULL){
		
		$this->ProductID = $id;
		$this->SKU = $sku;
		$this->Name = $name;
		$this->Description = $description;
		$this->Price = $price;
		$this->QuantityAvailable = $quantity;
		$this->FarmID = $farmid;

		$db = buildDBObject();
	}

	function __destruct(){
		$db = NULL;
	}

	function buildObject($id){
		$db = buildDBObject();
		$db->where("ProductID", $id);
		$product = $db->get("Products", 1);
		if (!empty($user)){
			//$product = $product[0];
			$this->ProductID = $product["ProductID"];
			$this->SKU = $product["SKU"];
			$this->Name = $product["Name"];
			$this->Description = $product["Description"];
			$this->Price = $product["Price"];
			$this->QuantityAvailable = $product["QuantityAvailable"];
			$this->FarmID = $product["FarmID"];
			return True;
		}else{
			return False;
		}
	}

	function getID(){
		return $this->ProductID;
	}

	function getSKU(){
		return $this->SKU;
	}

	function getName(){
		return $this->Name;
	}

	function getDescription(){
		return $this->Description;
	}

	function getPrice(){
		return $this->Price;
	}

	function getQuantity(){
		return $this->QuantityAvailable;
	}

	function getFarmID(){
		return $this->FarmID;
	}

	function getFarmName(){
		$db = buildDBObject();
		$db->where("FarmID", $this->FarmID);
		$farm = $db->get("Farms", 1);
		print_r($farm);
		$farm = $farm[0];

		return $farm["Name"];
	}

	function setID($newid){
		$this->ProductID = $newid;
	}

	function setSKU($newsku){
		$this->SKU = $newsku;
	}

	function setName($newName){
		$this->Name = $newName;
	}

	function setDescription($newDescription){
		$this->Description = $newDescription;
	}

	function setPrice($newPrice){
		$this->Price = $newPrice;
	}

	function setQuantity($newQuantity){
		$this->QuantityAvailable = $newQuantity;
	}

	function setFarmID($newFarmID){
		$this->FarmID = $newFarmID;
	}

}

?>