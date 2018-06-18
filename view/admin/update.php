<?php require_once('assets/custom/template/header.php'); ?>

<div class="container">
    <div class="row">
		<form action="" method="POST">
			<h1>Update</h1>
			<input type="hidden" name="product_id" value="<?php echo $app->product_id;?>">
			<label>Product type code</label><br>
			<input type="number" name="product_type_code" placeholder="Product type code" required value="<?php echo $products->product_type_code; ?>"><br>
			<label>Supplier id</label><br>
			<input type="number" name="supplier_id" placeholder="Supplier id" required value="<?php echo $products->supplier_id; ?>"><br>
			<label>Product name</label><br>
			<input type="text" name="product_name" placeholder="Product naam" required value="<?php echo $products->product_name; ?>"><br>
			<label>Product prijs</label><br>
			<input type="number" step=".01" name="product_price" placeholder="Product prijs" required value="<?php echo $products->product_price; ?>"><br>
			<label>Details</label><br>
			<input type="text" name="other_product_details" placeholder="Details (niet verplicht)" value="<?php echo $products->other_product_details; ?>"><br><br>
			<input type="submit" value="Update" name="update">
		</form>
    </div>
</div>

<?php require_once('assets/custom/template/footer.php'); ?>