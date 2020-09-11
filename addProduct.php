<?php
session_start();
include 'models/category.php';
include 'models/products.php';
include 'controllers/productsController.php';
include 'header.php';
?>
<h1 id="addProduct">Ajout d'un produit</h1>
    <!-- On crée une ternaire pour afficher le message d'erreur si il existe -->
    <p><?= isset($addProductMessage) ? $addProductMessage : '' ?></p>
    <div class="container text-center" id="productForm">
        <form class="w-75 mx-auto" method="POST" action="products.php" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group" id="nameProduct">
                    <label for="name">Nom du produit : </label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Nom du produit" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['name']) ? $formErrors['name'] : '' ?></p>
                </div>        
                <div class="form-group">
                    <label for="reference">Référence du produit : </label>
                    <input class="form-control" type="text" id="reference" name="reference" placeholder="Référence du produit" value="<?= isset($_POST['reference']) ? $_POST['reference'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['reference']) ? $formErrors['reference'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="descriptionTextarea">Description du produit : </label>
                    <textarea class="form-control" type="text" id="description" name="description" placeholder="Description du produit" value="<?= isset($_POST['description']) ? $_POST['description'] : '' ?>" ></textarea>
                    <p class="text-danger"><?= isset($formErrors['description']) ? $formErrors['description'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="price">Prix du produit : </label>
                    <input class="form-control" type="text" id="price" name="price" placeholder="Prix du produit" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['price']) ? $formErrors['price'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="file">Image(s) du produit : </label>
                    <input class="form-control" type="file" name="picture" id="picture" value="<?= isset($_POST['picture']) ? $_POST['picture'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['picture']) ? $formErrors['picture'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="energy">Puissance du produit : </label>
                    <input class="form-control" type="text" id="energy" name="energy" placeholder="Puissance en joules" value="<?= isset($_POST['energy']) ? $_POST['energy'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['energy']) ? $formErrors['energy'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="selectCategoriesOfProduct">Catégorie du produit</label>
                    <select class="form-control" id="selectCategoriesOfProduct" onchange="choiceCategory(this, 'selectSubcategoriesOfProduct')" name="selectCategoriesOfProduct">
                    <option disabled selected></option>
                    <!-- Avec la boucle on parcours tout le tableau-->
                        <?php foreach($categoryList as $allListCategoriesProduct){ ?>
                    <option value="<?= $allListCategoriesProduct->id ?>"><?= $allListCategoriesProduct->name ?></option>
                        <?php } ?>
                    </select>
                    <p class="text-danger"><?= isset($formErrors['selectCategoriesOfProduct']) ? $formErrors['selectCategoriesOfProduct'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="selectSubcategoriesOfProduct">Sous Categorie de produit</label>
                    <select class="form-control" id="selectSubcategoriesOfProduct" onchange="choiceCategory(this, 'selectTypeOfProduct')" name="selectSubcategoriesOfProduct">
                    <option disabled selected></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectTypeOfProduct">Type de produit</label>
                    <select class="form-control" id="selectTypeOfProduct" onchange="choiceCategory(this, 'selectSubtypeOfProduct')" name="selectTypeOfProduct">
                    <option disabled selected></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectSubtypeOfProduct">Sous-type de produit</label>
                    <select class="form-control" id="selectSubtypeOfProduct" name="selectSubtypeOfProduct">
                    <option disabled selected></option>
                    </select>
                </div>    
                <div class="button">
                    <button type="submit" name="addProduct">Ajoutez le produit</button><!--Ce bouton doit envoyer sur la page correspondante au produits via son nom ou id-->
                    <button type="submit" name="updateProduct"><a href="updateProduct.php">Modifiez un produit</a></button>
                    <button type="submit" name="deleteProduct"><a href="deleteProduct.php">Supprimez un produit</a></button>
                </div>
            </fieldset>
        </form>
    </div>
<?php
include 'footer.php';
?>