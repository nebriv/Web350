<?php

class Farm {

	function __construct($id = NULL, $name = NULL, $address = NULL, $address = NULL, $image = NULL){
		
		$this->FarmID = $id;
		$this->Name = $name;
		$this->Address = $address;
		$this->Image = $image;

		$db = buildDBObject();
	}

	function __destruct(){
		$db = NULL;
	}

	function buildObject($id){
		$db = buildDBObject();
		$db->where("FarmID", $id);
		$farm = $db->get("Farms", 1);
		if (!empty($farm)){
			$farm = $farm[0];
			$this->FarmID = $farm["FarmID"];
			$this->Name = $farm["Name"];
			$this->Address = $farm["Address"];
			$this->Image = $farm["Image"];
			return True;
		}else{
			return False;
		}
	}

	function getID(){
		return $this->FarmID;
	}

	function getName(){
		return $this->Name;
	}

	function getAddress(){
		return $this->Address;
	}

	function getImage(){
		return $this->Image;
	}

	function getFarmsArray(){
		$db = buildDBObject();
		$farms = $db->get('Farms'); //contains an array of all users
		return $farms;
	}

	function setID($newid){
		$this->FarmID = $newid;
	}

	function setName($newName){
		$this->Name = $newName;
	}

	function setAddress($newAddress){
		$this->Address = $newAddress;
	}

	function setImage($newImage){
		$this->Image = $newImage;
	}

	function setQuantity($newQuantity){
		$this->QuantityAvailable = $newQuantity;
	}

	function setFarmID($newFarmID){
		$this->FarmID = $newFarmID;
	}

}

?>