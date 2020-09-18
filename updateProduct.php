<?php
session_start();
include 'models/category.php';
include 'models/products.php';
include 'controllers/updateProductController.php';
include 'header.php';
?>
<h1 id="updateProduct">Modifier un produit</h1>
    <!-- On crée une ternaire pour afficher le message d'erreur si il existe -->
    <p><?= isset($addProductMessage) ? $addProductMessage : '' ?></p>
    <div class="container text-center" id="updateProductForm">
        <form class="w-75 mx-auto" method="GET" action="#" enctype="multipart/form-data">
        <fieldset>
                <div class="form-group" id="nameProduct">
                    <label for="name">Nom du produit : </label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Nom du produit" value="<?= isset($_GET['name']) ? $_GET['name'] : $product->name ?>" />
                    <p class="text-danger"><?= isset($formErrors['name']) ? $formErrors['name'] : '' ?></p>
                </div>        
                <div class="form-group">
                    <label for="reference">Référence du produit : </label>
                    <input class="form-control" type="text" id="reference" name="reference" placeholder="Référence du produit" value="<?= isset($_GET['reference']) ? $_GET['reference'] : $product->reference ?>" />
                    <p class="text-danger"><?= isset($formErrors['reference']) ? $formErrors['reference'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="descriptionMCE">Description du produit : </label>
                    <textarea class="form-control" type="text" id="descriptionMCE" name="description" placeholder="Description du produit" ></textarea>
                    <p class="text-danger"><?= isset($formErrors['description']) ? $formErrors['description'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="price">Prix du produit : </label>
                    <input class="form-control" type="text" id="price" name="price" placeholder="Prix du produit" value="<?= isset($_GET['price']) ? $_GET['price'] : $product->price ?>" />
                    <p class="text-danger"><?= isset($formErrors['price']) ? $formErrors['price'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="file">Image(s) du produit : </label>
                    <input class="form-control" type="file" name="picture" id="picture" value="<?= isset($_GET['picture']) ? $_GET['picture'] : $product->picture ?>" />
                    <p class="text-danger"><?= isset($formErrors['picture']) ? $formErrors['picture'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="energy">Puissance du produit : </label>
                    <input class="form-control" type="text" id="energy" name="energy" placeholder="Puissance en joules" value="<?= isset($_GET['energy']) ? $_GET['energy'] : $product->energy ?>" />
                    <p class="text-danger"><?= isset($formErrors['energy']) ? $formErrors['energy'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="selectCategory">Catégorie du produit</label>
                    <select class="form-control mx-auto" id="selectCategory" onchange="choiceCategory(this, 'selectSubcategory')" name="selectCategory">
                    <option disabled selected></option>
                    <!-- Avec la boucle on parcours tout le tableau-->
                        <?php foreach($categoryList as $allListCategory){ ?>
                    <option value="<?= $allListCategory->id ?>"><?= $allListCategory->name ?></option>
                        <?php } ?>
                    </select>
                    <p class="text-danger"><?= isset($formErrors['selectCategory']) ? $formErrors['selectCategory'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="selectSubcategory">Sous-Categorie de produit</label>
                    <select class="form-control mx-auto" id="selectSubcategory" onchange="choiceCategory(this, 'selectType')" name="selectSubcategory">
                    <option disabled selected></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectType">Type de produit</label>
                    <select class="form-control mx-auto" id="selectType" onchange="choiceCategory(this, 'selectSubtype')" name="selectType">
                    <option disabled selected></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectSubtype">Sous-type de produit</label>
                    <select class="form-control mx-auto" id="selectSubtype" name="selectSubtype">
                    <option disabled selected></option>
                    </select>
                </div>    
                <div class="button">
                    <button type="submit" name="updateProduct">Modifiez le produit</button>
                </div>
            </fieldset>
        </form>
    </div>
<?php
include 'footer.php';
?>