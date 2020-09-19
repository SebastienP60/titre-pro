<?php
session_start();
include 'config.php';
include 'models/category.php';
include 'models/subcategory.php';
include 'models/subtypes.php';
include 'models/types.php';
include 'models/products.php';
include 'controllers/productsController.php';
include 'header.php';
?>
    <h1>Liste des produits</h1>
    <div class="row">
        <form id="makeYourChoice" class="form-inline container-fluid mb-5" method="POST" action="products.php">
            <label for="selectCategory" class="mr-sm-2">Catégorie : </label>
            <select class="form-control col-2" id="selectCategory" onchange="choiceCategory(this, 'selectSubcategory')" name="selectCategory">
            <option disabled selected>Choisir</option>
            <!-- Avec la boucle on parcours tout le tableau-->
            <?php foreach($categoryList as $allListCategory){ ?>
            <option value="<?= $allListCategory->id ?>"><?= $allListCategory->name ?></option>
                <?php } ?>
            </select>
            <label for="selectSubcategory" class="mr-sm-2 ml-4">Sous-catégorie : </label>
            <select class="form-control col-2" id="selectSubcategory" onchange="choiceCategory(this, 'selectType')" name="selectSubcategory">
                <option disabled selected>Choisir</option>
            </select>
            <label for="selectType" class="mr-sm-2 ml-4">Type : </label>
            <select class="form-control col-2" id="selectType" onchange="choiceCategory(this, 'selectSubtype')" name="selectType">
                <option disabled selected>Choisir</option>
            </select>
            <label for="selectSubtype" class="mr-sm-2 ml-4">Sous-type : </label>
            <select class="form-control col-2" id="selectSubtype" name="selectSubtype">
                <option disabled selected>Choisir</option>
            </select>
    </div>
    <div class="row">
        <div class="offset-5">
            <button class="btn btn-success" type="submit" name="valideChoice" value="">Valider vos choix</button>
        </div>
    </div>
        </form>
    <div class="row">    
        <div class="offset-5">
            <input type="search"  type="text" name="find" placeholder="Rechercher un produit" />
            <button class="btn btn-secondary" type="submit" value="" ><i class="fas fa-binoculars" id="binocular"></i></button>
        </div>
    </div>
        <table class="table table-dark table-striped">
            <tr>
                <th>Nom</th>
                <th>Référence</th>
                <th>Prix</th>
                <th>Informations</th>
                <th>Modification</th>
                <th>Suppression</th>
            </tr>
            <?php
                foreach($productsList as $allProducts){ ?>
                    <tr>
                        <td><?= $allProducts->name ?></td>
                        <td><?= $allProducts->reference ?></td>
                        <td><?= $allProducts->price ?></td>
                        <td><a href="infoProduct.php?id=<?= $allProducts->id ?>"><i class="fas fa-info-circle fa-2x"></i></a></td>
                        <td><a href="updateProduct.php?id=<?= $allProducts->id ?>"><i class="fas fa-pen-square fa-2x"></i></td>
                        <td><button id="supProduct" data-toggle="modal" data-target="#deleteProduct" data-delete="<?= $allProducts->id ?>"><i class="fas fa-trash-alt fa-2x" id="sup"></i></button></td>
                    </tr>
            <?php } ?>
        </table>
<?php 
include 'footer.php';
?>