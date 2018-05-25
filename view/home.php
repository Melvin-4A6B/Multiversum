<?php require_once('assets/custom/template/header.php'); ?>

<div class="container">
    <div class="jumbotron">
    <h1 class="display-4">Hello, world!</h1>
    <p class="lead"><?= $home; ?></p>
    <hr class="my-4">
    <p>De tekst hierboven word uit de variable `home` gehaald die we aanmaken via de `displayHome` method in de `homeModel` model</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">Nutteloze button</a>
    </div>
</div>

<?php require_once('assets/custom/template/footer.php'); ?>