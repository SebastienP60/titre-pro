<?php
session_start();
include 'config.php';
include 'models/products.php';
include 'controllers/listProductsForUsersController.php';
include 'header.php';
?>
<form method="GET" enctype="multipart/form-data">
    <div>
        <h1 class=""><?= isset($_GET['id']) ?></h1>
    </div>
    <div class="row container-fluid">
        <div class="card-deck">
            <?php $i = 0; ?>
    <?php foreach($listProd as $prod){ ?>
        <div class="card">
            <img class="card-img-top" src="<?= $prod->picture ?>" alt="" />
            <div class="card-body">
                <p>Nom : <?= $prod->name ?></p>
                <p>Référence : <?= $prod->reference ?></p>
                <p>prix <?= $prod->price ?> €</p>
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <?php 
        $i++; 
        if($i % 4 == 0){
            ?>
                </div>
                <div class="card-deck">
            <?php
        }
        ?>
    <?php } ?>
    </div>
    </div>
</form>
<?php
include 'footer.php';
?>