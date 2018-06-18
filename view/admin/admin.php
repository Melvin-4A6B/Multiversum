<?php require_once('assets/custom/template/header.php'); ?>

<div class="container">
    <div class="table-responsive mb-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>EAN</th>
                    <th>Naam</th>
                    <th>Beschrijving</th>
                    <th>Prijs</th>
                    <th>Merk</th>
                    <th>Kleur</th>
                    <th>Platform</th>
                    <th>Afbeelding</th>
                    <th>Aanbieding</th>
                    <th>Aanbiedings prijs</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($app as $key => $value): ?>
                <tr>
                    <td><?= $value->product_id; ?></td>
                    <td><?= $value->ean_code; ?></td>
                    <td><?= $value->product_name; ?></td>
                    <td><?= ($value->product_description); ?></td>
                    <td>&euro;<?= number_format($value->product_price, 2, ',', ' '); ?></td>
                    <td><?= $value->product_brand; ?></td>
                    <td><?= $value->product_color; ?></td>
                    <td><?= $value->product_platform; ?></td>
                    <td><?= $value->product_image; ?></td>
                    <td><?= $value->sale; ?></td>
                    <td><?= $value->sale_price; ?></td>
                    <td><button class='btn btn-primary' name='update' type='submit'><a href="?p=update&pid=<?= $value->product_id ?>" style='color: white;'>Update</a></button>
                    <button class='btn btn-primary' name='delete' type='submit'><a href="?p=delete&pid=<?= $value->product_id ?>" style='color: white;'>Delete</a></button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once('assets/custom/template/footer.php'); ?>