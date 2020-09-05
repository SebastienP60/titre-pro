<?php
include 'header.php';
include 'models/products.php';
include 'controllers/productsController.php';
?>
<h1 id="addProduct">Ajout d'un produit</h1>
    <!-- On crée une ternaire pour afficher le message d'erreur si il existe -->
    <p><?= isset($addProductMessage) ? $addProductMessage : '' ?></p>
    <div class="container text-center" id="productForm">
        <form class="w-75 mx-auto" method="POST" action="#">
            <input type="search" name="find" placeholder="Rechercher une référence" />
            <input type="submit" value="Rechercher" />
            <fieldset>
                <div class="form-group">
                    <label for="name">Nom du produit : </label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Nom du produit" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" />
                </div>        
                <div class="form-group">
                    <label for="reference">Référence du produit : </label>
                    <input class="form-control" type="text" id="reference" name="reference" placeholder="Référence du produit" value="<?= isset($_POST['reference']) ? $_POST['reference'] : '' ?>" />
                </div>
                <div class="form-group">
                    <label for="descriptionTextarea">Description du produit : </label>
                    <textarea class="form-control" type="text" id="descriptionTextarea" name="descriptionTextarea" placeholder="Description du produit" value="<?= isset($_POST['description']) ? $_POST['description'] : '' ?>" ></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Prix du produit : </label>
                    <input class="form-control" type="text" id="price" name="price" placeholder="Prix du produit" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>" />
                </div>    
                <div class="form-group">
                    <label for="picture">Image(s) du produit : </label>
                    <input class="form-control" type="text" id="picture" name="picture" placeholder="Image(s) du produit" value="<?= isset($_POST['picture']) ? $_POST['picture'] : '' ?>"/>
                </div>    
                <div class="form-group">
                    <label for="energy">Puissance du produit : </label>
                    <input class="form-control" type="text" id="energy" name="energy" placeholder="Puissance en joules" value="<?= isset($_POST['energy']) ? $_POST['energy'] : '' ?>" />
                </div>
                <div class="form-group">
                    <label for="selecCategoriesOfProduct">Catégorie du produit</label>
                    <select class="form-control" id="selecCategoriesOfProduct">
                    <option disabled selected></option>
                    <!-- Avec la boucle on parcours tout le tableau-->
                        <?php foreach($listCategoriesProduct as $allListCategoriesProduct){ ?>
                    <option value="<?= $allListCategoriesProduct->id ?>"><?= $allListCategoriesProduct->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selecSubcategoriesOfProduct">Sous Categorie de produit</label>
                    <select class="form-control" id="selecSubcategoriesOfProduct">
                    <option disabled selected></option>
                    <!-- Avec la boucle on parcours tout le tableau-->
                        <?php foreach($listSubcategoriesProduct as $alllistSubcategoriesProduct){ ?>
                    <option value="<?= $alllistSubcategoriesProduct->id ?>"><?= $alllistSubcategoriesProduct->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selecTypeOfProduct">Type de produit</label>
                    <select class="form-control" id="selecTypeOfProduct">
                    <option disabled selected></option>
                    <!-- Avec la boucle on parcours tout le tableau-->
                        <?php foreach($listTypeProduct as $allTypeProduct){ ?>
                    <option value="<?= $allTypeProduct->id ?>"><?= $allTypeProduct->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectSubtypeOfProduct">Sous-type de produit</label>
                    <select class="form-control" id="selectSubtypeOfProduct">
                    <option disabled selected></option>
                    <!-- Avec la boucle on parcours tout le tableau-->
                        <?php foreach($listSubtypeProduct as $allSubtypeProduct){ ?>
                    <option value="<?= $allSubtypeProduct->id ?>"><?= $allSubtypeProduct->name ?></option>
                        <?php } ?>
                    </select>
                </div>    
                <div class="button">
                    <button type="submit" name="addProduct">Ajoutez le produit</button><!--Ce bouton doit envoyer sur la page correspondante au produits via son nom ou id-->
                    <button type="submit" name="updateProduct">Modifiez le produit</button>
                    <button type="submit" name="deleteProduct">Supprimez le produit</button>
                </div>
            </fieldset>
        </form>
    </div>
<?php
include 'footer.php';
?>