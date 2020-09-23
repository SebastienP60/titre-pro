<?php
session_start();
include 'config.php';
include 'models/products.php';
include 'models/subcategory.php';
include 'models/types.php';
include 'controllers/listProductsForUsersController.php';
include 'header.php';
?>
<?php
if(isset($message)){ ?>
    <div class="jumbotron mt-5 text-center">
        <p><?= $message ?></p>
    </div>
<?php } else { ?>
    <form method="GET" enctype="multipart/form-data">
        <div class="row container-fluid">
            <h1 class="mx-auto mb-5" id="titlePage"><?= isset($listProd[0]->tn) ? ($listProd[0]->tn) : '' ?></h1>
            <div class="card-deck mb-5">
                <?php $i = 0; ?>
                <?php foreach($listProd as $prod){ ?>
                    <?php $i++; ?>
                    <div class="card">
                        <img class="card-img-top" src="<?= $prod->picture ?>" alt="picture" />
                        <div class="card-body">
                            <h5 class="card-title"><?= $prod->name ?></h5>
                            <p>Réf : <?= $prod->reference ?></p>
                            <p id="priceProd"><?= $prod->price ?> €</p>
                            <a href="cardProductInfo.php?id=<?= $prod->id ?>" class="btn btn-success">En savoir +</a>
                        </div>
                    </div>
                    <?php if($i % 4 == 0){ ?>
                        </div>
                        <div class="card-deck mb-5">
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </form>
 <?php } ?>
<?php include 'footer.php'; ?>