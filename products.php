<?php
include 'header.php';
include 'models/products.php';
include 'controllers/productsController.php';
?>
<h1 id="addProduct">Ajout d'un produit</h1>
    <!-- On crée une ternaire pour afficher le message d'erreur si il existe -->
    <p><?= isset($addProductMessage) ? $addProductMessage : '' ?></p>
    <div class="container text-center" id="productForm">
        <form method="POST" action="account.php">
            <fieldset>
                <div class="form-group">
                    <label for="name">Nom du produit : </label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Nom du produit" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" />
                    <p><?= isset($formErrors['name']) ? $formErrors['name'] : '' ?></p>
                </div>        
                <div class="form-group">
                    <label for="reference">Référence du produit : </label>
                    <input class="form-control" type="text" id="reference" name="reference" placeholder="Référence du produit" value="<?= isset($_POST['reference']) ? $_POST['reference'] : '' ?>" />
                    <p><?= isset($formErrors['reference']) ? $formErrors['reference'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="descriptionTextarea">Description du produit : </label>
                    <textarea class="form-control" type="text" id="descriptionTextarea" name="descriptionTextarea" placeholder="Description du produit" value="<?= isset($_POST['description']) ? $_POST['description'] : '' ?>" ></textarea>
                    <p><?= isset($formErrors['description']) ? $formErrors['description'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="price">Prix du produit : </label>
                    <input class="form-control" type="text" id="price" name="price" placeholder="Prix du produit" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>" />
                    <p><?= isset($formErrors['price']) ? $formErrors['price'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="picture">Image(s) du produit : </label>
                    <input class="form-control" type="text" id="picture" name="picture" placeholder="Image(s) du produit" value="<?= isset($_POST['picture']) ? $_POST['picture'] : '' ?>"/>
                    <p><?= isset($formErrors['picture']) ? $formErrors['picture'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="energy">Puissance en joules : </label>
                    <input class="form-control" type="text" id="energy" name="energy" placeholder="Puissance en joules" value="<?= isset($_POST['energy']) ? $_POST['energy'] : '' ?>" />
                    <p><?= isset($formErrors['energy']) ? $formErrors['energy'] : '' ?></p>
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
                    <button type="submit" name="addProduct">Ajoutez un produit</button>
                </div>
            </fieldset>
        </form>
    </div>
<?php
include 'footer.php';
?>