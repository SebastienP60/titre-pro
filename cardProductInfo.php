<?php
session_start();
include 'config.php';
include 'models/products.php';
include 'controllers/cardProductInfoController.php';
include 'header.php';
?>
<form class="mb-5" method="GET" enctype="multipart/form-data">
    <div class="container text-center">
        <div class="row">
            <div id="imgProd" class="col-12">
                <p class="mt-4 mb-4" id="nameProd"><?= $infoProduct->name ?></p>
                <img class="img-fluid" src="<?= $infoProduct->picture ?>" />
                <div class="row" id="descriptionProd">
                    <div class="col-6">
                        <ol class="mt-5 mb-5">
                            <li><?= htmlspecialchars_decode($infoProduct->description) ?></li>
                        </ol>
                    </div>
                    <div class="col-6 my-auto">
                        <ul>
                            <li>Réf : <?= $infoProduct->reference ?></li>
                            <li>Puissance : <?= $infoProduct->energy ?></li>
                            <li class="mt-5" id="priceProd"><?= $infoProduct->price ?> €</li>
                        </ul>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</form>
<div class="text-center mb-5">
    <button type="submit" class="btn btn-success"><a href="listProductsForUsers.php?t=<?= $infoProduct->t ?>">Retour</a></button>
</div>
<?php
include 'footer.php';
?>