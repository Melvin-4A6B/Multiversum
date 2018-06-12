<?php

require_once('controller/dataHandler.php');

class adminModel {

	public function __construct()
    {
        $this->dataHandler = new dataHandler();
    }

    public function displayAdmin()
    {
        $app = $this->collectReadProducts();
        include 'view/admin/admin.php';
        exit();
    }

    public function collectReadProduct() {
		$app = $this->dataHandler->readData();
        include 'view/admin/admin.php';
        exit();
	}

	public function collectReadProducts() {
        $sql = "SELECT * FROM products";
		$app = $this->dataHandler->readAllData($sql);
        include 'view/admin/admin.php';
        exit();
	}

	public function collectUpdateProduct() {
		if(isset($_POST["update"])) {
			$code = $_POST['ean_code'];
			$name = $_POST['product_name'];
			$desc = $_POST['product_description'];
			$price = $_POST['product_price'];
			$brand = $_POST['product_brand'];
			$pcolor = $_POST['product_color'];
			$platform = $_POST['product_platform'];
			$image = $_POST['product_image'];

			$app = $this->dataHandler->updateData($code, $name, $desc, $price, $brand, $pcolor, $platform, $image);
		} else {
			$id = $_GET['id'];
			$app = $this->dataHandler->readProduct($id);
            include('view/admin.php');
            exit();
		}
	}

	public function collectDeleteProduct() {
			$id = $_GET['id'];
            $app = $this->dataHandler->deleteData($id);
            include('view/admin.php');
            exit();       
	}

}