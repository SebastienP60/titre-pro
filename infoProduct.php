<?php
session_start();
include 'models/products.php';
include 'controllers/infoProductController.php';
include 'header.php';
?>
<form method="GET" enctype="multipart/form-data">
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
<?php
include 'footer.php';
?>