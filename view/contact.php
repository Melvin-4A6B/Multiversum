<?php require_once('assets/custom/template/header.php'); ?>

<div class="container">

    <div class="card my-5">
        <h5 class="card-header">Neem contact op</h5>
        <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label for="naam">Naam</label>
                <input type="text" class="form-control" name="naam" placeholder="Naam">
            </div>
            <div class="form-group">
                <label for="email">E-mail adres</label>
                <input type="email" class="form-control" name="email" placeholder="E-mail adres">
            </div>
            <div class="form-group">
                <label for="onderwerp">Onderwerp</label>
                <input type="text" class="form-control" name="onderwerp" placeholder="Onderwerp">
            </div>
            <div class="form-group">
                <label for="bericht">Uw bericht</label>
                <textarea class="form-control no-resize" name="bericht" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Neem contact op</button>
        </form>
        </div>
    </div>
</div>

<?php require_once('assets/custom/template/footer.php'); ?>