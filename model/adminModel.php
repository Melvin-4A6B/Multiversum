<?php

require_once('controller/dataHandler.php');

//Work in progress

class adminModel {

    public $html;

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
        $this->html = '
        <form action="" method="POST">
            <div class="form-group">
                <label for="ean_code">EAN</label>
                <input class="form-control" type="text" name="ean_code" placeholder="EAN Code" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_name">Naam</label>
                <input class="form-control" type="text" name="product_name" placeholder="Product naam" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_description">Beschrijving</label>
                <textarea class="form-control" name="product_description" style="resize: none;">Productbeschrijving..</textarea>
            </div>
            <div class="form-group">
                <label for="product_price">Prijs</label>
                <input class="form-control" type="decimal" name="product_price" placeholder="Prijs" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_brand">Merk</label>
                <input class="form-control" type="text" name="product_brand" placeholder="Merk" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_color">Kleur</label>
                <input class="form-control" type="text" name="product_color" placeholder="Kleur" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_platform">Platform</label>
                <input class="form-control" type="text" name="product_platform" placeholder="Platform" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="product_image">Afbeelding</label>
                <input class="form-control" type="file" name="product_image" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="sale">Aanbieding</label>
                <input type="radio" name="sale" value="ja">
                <label for="ja">Ja</label>
                <input type="radio" name="sale" value="nee">
                <label for="nee">Nee</label>
            </div>
            <div class="form-group">
                <label for="sale_price">Aanbiedingsprijs</label>
                <input class="form-control" type="decimal" name="sale_price" placeholder="Aanbiedingsprijs" autocomplete="off" required>
            </div>
            <input class="btn btn-success form-control" type="submit" value="create" name="create">
        </form>
        ';

        return $this->html;


    }

    public function updateProduct($updateProduct) {
        $this->html = '
        <form action="" method="POST">
            <div class="form-group">
                <label for="ean_code">EAN</label>
                <input class="form-control" type="text" value="'.$updateProduct['ean_code'].'" name="ean_code" placeholder="EAN Code" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_name">Naam</label>
                <input class="form-control" type="text" value="'.$updateProduct['product_name'].'" name="product_name" placeholder="Product naam" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_description">Beschrijving</label>
                <textarea class="form-control" name="product_description" value="'.$updateProduct['product_description'].'" style="resize: none;"></textarea>
            </div>
            <div class="form-group">
                <label for="product_price">Prijs</label>
                <input class="form-control" type="decimal" value="'.$updateProduct['product_price'].'" name="product_price" placeholder="Prijs" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_brand">Merk</label>
                <input class="form-control" type="text" value="'.$updateProduct['product_brand'].'" name="product_brand" placeholder="Merk" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_color">Kleur</label>
                <input class="form-control" type="text" value="'.$updateProduct['product_color'].'" name="product_color" placeholder="Kleur" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_platform">Platform</label>
                <input class="form-control" type="text" value="'.$updateProduct['product_platform'].'" name="product_platform" placeholder="Platform" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="product_image">Afbeelding</label>
        
                <input class="form-control" type="file" name="product_image" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="sale">Aanbieding</label>
                <input type="radio" name="sale" value="ja">
                <label for="ja">Ja</label>
                <input type="radio" name="sale" value="nee">
                <label for="nee">Nee</label>
            </div>
            <div class="form-group">
                <label for="sale_price">Aanbiedingsprijs</label>
                <input class="form-control" value="'.$updateProduct['sale_price'].'" type="decimal" name="sale_price" placeholder="Aanbiedingsprijs" autocomplete="off">
            </div>
            <input class="btn btn-success form-control" type="submit" value="Update" name="update">
        </form>
        ';

        return $this->html;
     }

	public function deleteProduct() {
		$id = $_GET['pid'];
        $app = $this->dataHandler->deleteData($id);
        include('view/admin.php');
        exit();       
	}

}