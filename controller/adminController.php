<?php

require_once('model/adminModel.php');

class adminController {

	public function __construct()
    {
        $this->adminModel = new adminModel();
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
			$sale = $_POST['sale'];
			$sprice = $_POST['sale_price'];

			$app = $this->adminModel->updateProduct($code, $name, $desc, $price, $brand, $pcolor, $platform, $image, $sale, $sprice);
			exit();
		} else {
			$id = $_GET['pid'];
			$sql = 'SELECT * FROM products WHERE product_id = "$id"';
			$app = $this->adminModel->collectReadProduct($sql);
	        include 'view/admin/admin.php';
	        exit();
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