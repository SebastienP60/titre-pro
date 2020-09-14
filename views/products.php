<?php
session_start();
include '../models/products.php';
include '../controllers/productsController.php';
include '../header.php';
?>
    <form method="POST">
        <input type="search" name="find" placeholder="Rechercher" />
        <input type="submit" value="valider" />
    </form>
    <div class="form-group">
        <label for="selectSubcategory">Catégorie</label>
        <select class="form-control" id="selectSubcategory" onchange="choiceCategory(this, 'selectType')" name="selectSubcategory">
            <option disabled selected></option>
        </select>
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
                        <td><a href="infoProduct.php"><i class="fas fa-info-circle fa-2x"></i></a></td>
                        <td><a href="updateProduct.php"> <i class="fas fa-pen-square fa-2x"></i></td>
                        <td><a href="deleteproduct.php"><i class="fas fa-trash-alt fa-2x"></i></a></td>
                    </tr>
            <?php } ?>
        </table>

<?php
include '../footer.php';
?>