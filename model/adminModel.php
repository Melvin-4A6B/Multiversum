<?php

require_once('controller/dataHandler.php');
require_once('htmlElements.php');

class adminModel {

	public function __construct() 
	{
		$this->dataHandler = new dataHandler();
		$this->htmlElements = new htmlElements();
	}

	public function createProduct($code, $name, $desc, $price, $brand, $pcolor, $platform, $image, $color) { 
	
	try {
		$sql = "INSERT into products(ean_code, product_name, product_description, product_price, product_brand, product_color, product_platform, product_image, color) VALUES ('$code', '$name', '$desc' , '$price', '$brand' ,  '$pcolor' , '$platform', '$image', '$color')";
		$result = $this->dataHandler->createData($sql);
	} catch (Exception $e) {
		throw $e;
	}

		return $result;
	}
	
	public function readProduct() { 

	try {
		$id = $_GET['id'];
		$sql = "SELECT * FROM products WHERE product_id = $id";
		$result = $this->dataHandler->readData($sql);
	} catch (Exception $e) {
		throw $e;
	}

		return $result;
	}

	public function readProducts() { 

	try {
		$result = $this->htmlElements->createTable();

		return $result;

	} catch (Exception $e) {
		throw $e;
	}
	}

	public function updateProduct($code, $name, $desc, $price, $brand, $pcolor, $platform, $image, $color) { 

	try {
		$sql = "UPDATE products SET ean_code = '$code', product_description = '$desc', product_price = '$price', product_brand = '$brand', product_color = '$pcolor', product_platform = '$platform', product_image = '$image', color = '$color' WHERE product_id = $id";
		$result = $this->DataHandler->UpdateData($sql);
	} catch (Exception $e) {
		throw $e;
	}

		return $result;
	}

	public function deleteProduct($id) { 
	try {
		$sql = "DELETE FROM products WHERE product_id = $id";
		$result = $this->DataHandler->DeleteData($sql);
	} catch (Exception $e) {
		throw $e;
	}

		return $result;
	}

}