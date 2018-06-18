<?php

require_once('model/adminModel.php');

class adminController {

	public function __construct()
    {
        $this->adminModel = new adminModel();
    }

    public function collectReadProduct() {
		$app = $this->adminModel->readProduct();
		include 'view/admin/admin.php';
	}

	public function collectReadProducts() {
		$app = $this->adminModel->readProducts();
		include 'view/admin/admin.php';
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

			$app = $this->adminModel->updateProduct($code, $name, $desc, $price, $brand, $pcolor, $platform, $image);

			$msg = 'Product: ' . $name . ' is succesvol geupdate.';
			// header('Location: index.php?op=readall&msg=' . $msg);

			exit();
		} else {
			$id = $_GET['id'];
			$app = $this->adminModel->readProduct($id);
			include('view/update.php');
		}
	}

	public function collectDeleteProduct() {
			$id = $_GET['id'];
			$app = $this->adminModel->deleteProduct($id);
			$msg = 'Row ' . $id . ' is succesvol gedelete';
			// header('Location: index.php?op=readall&msg=' . $msg);
			exit();
	}

}