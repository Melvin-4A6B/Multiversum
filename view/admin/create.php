<?php require_once('assets/custom/template/header.php'); ?>

<div class="container">
    <div class="row">
		<form action="" method="POST">
			<h1>Update</h1>
			<input type="hidden" name="product_id" value="<?php echo $app->product_id;?>">
			<label>Product type code</label><br>
			<input type="number" name="product_type_code" placeholder="Product type code" required><br>
			<label>Supplier id</label><br>
			<input type="number" name="supplier_id" placeholder="Supplier id" required ><br>
			<label>Product name</label><br>
			<input type="text" name="product_name" placeholder="Product naam" required ><br>
			<label>Product prijs</label><br>
			<input type="number" step=".01" name="product_price" placeholder="Product prijs" required><br>
			<label>Details</label><br>
			<input type="text" name="other_product_details" placeholder="Details (niet verplicht)"><br><br>
			<input type="submit" value="Update" name="update">
		</form>
    </div>
</div>

<?php require_once('assets/custom/template/footer.php'); ?>