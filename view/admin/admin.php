<?php require_once('assets/custom/template/header.php'); ?>

<div class="container">
    <div class="table-responsive mb-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <?php foreach($app as $key => $value): ?>
                        <th><?= $key; ?></th>
                    <?php endforeach; ?>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php echo '<pre>'; var_dump($app); ?>

                <tr>
                    <td><?= $value["product_id"]; ?></td>
                    <td><?= $value["ean_code"]; ?></td>
                    <td><?= $value["product_name"]; ?></td>
                    <td>&euro;<?= number_format($value["product_price"], 2, ',', ' '); ?></td>
                    <td><?= $value["product_description"]; ?></td>
                    <td><button class='btn btn-primary' type='submit'><a href="?action=read&id=<?= $value["product_id"] ?>" style='color: white;'>Update</a></button>
                    <button class='btn btn-primary' type='submit'><a href="?action=read&id=<?= $value["product_id"] ?>" style='color: white;'>Delete</a></button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once('assets/custom/template/footer.php'); ?>