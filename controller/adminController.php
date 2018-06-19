<?php

require_once('model/adminModel.php');
require_once('dataHandler.php');

class adminController {

	public function __construct()
    {
        $this->adminModel = new adminModel();
        $this->dataHandler = new dataHandler();
    }

    public function collectCreateProduct() {
    	if(isset($_POST["create"])) {
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
			
			if($sale == 'ja') {
				$sale = 1;
			} else {
				$sale = 0;
			}

			$sql = 'INSERT INTO products (ean_code, product_name, product_description, product_price, product_brand, product_color, product_platform, product_image, sale, sale_price) VALUES ("'. $code .'", "'.$name.'", "'.$desc.'", "'.$price.'", "'.$brand.'", "'.$pcolor.'", "'.$platform.'", "'.$image.'", "'.$sale.'", "'.$sprice.'")';
			$app = $this->dataHandler->createData($sql);
    	} else {
    		$app = $this->adminModel->createProduct();
    	}

    	
    	return $app;
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