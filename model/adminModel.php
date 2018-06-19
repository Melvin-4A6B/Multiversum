<?php

require_once('controller/dataHandler.php');

//Work in progres

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

    public function collectReadProduct($sql) {
		$app = $this->dataHandler->readData($sql);
        include 'view/admin/admin.php';
        exit();
	}

	public function collectReadProducts() {
        $sql = "SELECT * FROM products";
		$app = $this->dataHandler->readAllData($sql);
        include 'view/admin/admin.php';
        exit();
	}

    public function createProduct() {

    }

    public function updateProduct() {
        $id = $_GET['id'];
        $app = $this->dataHandler->readAllData($sql);
        include('view/admin.php');
        exit();

    }

	public function deleteProduct() {
		$id = $_GET['id'];
        $app = $this->dataHandler->deleteData($id);
        include('view/admin.php');
        exit();       
	}

}