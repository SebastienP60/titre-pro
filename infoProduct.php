<?php
session_start();
include 'config.php';
include 'models/products.php';
include 'controllers/infoProductController.php';
include 'header.php';
?>
<form class="mb-5" method="GET" enctype="multipart/form-data">
    <div class="row container-fluid">
        <div id="allInfoProd" class="col-6">
            <ul class="text-center mt-5 mb-5">
                <li>Nom : <?= $infoProduct->name ?></li>
                <li>Référence : <?= $infoProduct->reference ?></li>
                <li>Description : <?= htmlspecialchars_decode($infoProduct->description) ?></li>
                <li>Puissance : <?= $infoProduct->energy ?></li>
                <li>prix <?= $infoProduct->price ?> €</li>
            </ul>
        </div>
        <div id="imgProd" class="col-6">
            <img class="img-fluid" src="<?= $infoProduct->picture ?>" />
        </div>
    </div>
</form>
<div class="text-center mb-5">
    <button type="submit" class="btn btn-success"><a href="products.php">Retour</a></button>
</div>
<?php
include 'footer.php';
?>