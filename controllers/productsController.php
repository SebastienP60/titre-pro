<?php


//Traitement de la demande AJAX
if(isset($_POST['idFirstSelect'])){
    //On vérifie que l'on a bien envoyé des données en POST
    if(!empty($_POST['idFirstSelect'])){
        if($_POST['secondSelect'] == 'selectSubcategoriesOfProduct'){
        //On inclut les bons fichiers car dans ce contexte ils ne sont pas connu.
            include_once '../models/subcategoriesProducts.php';
            $subcategorieProduct = new subcategoryProduct();
            $subcategorieProduct->id_ahl115_categories = $_POST['idFirstSelect'];
            //Le echo sert à envoyer la réponse au JS
            echo json_encode($subcategorieProduct->getListSubcategoriesProduct());
        } elseif($_POST['secondSelect'] == 'selectTypeOfProduct'){
            include_once '../models/typesProducts.php';
            $typeProduct = new types();
            //Méthode pour remplir le type selon l'id de la sous catégorie
            $typeProduct->id_ahl115_subcategories = $_POST['idFirstSelect'];
            echo json_encode($typeProduct->getListTypeProduct());
        } elseif($_POST['secondSelect'] == 'selectSubtypeOfProduct'){
            include_once '../models/subtypesProducts.php';
            $subtypeProduct = new subtypes();
            $subtypeProduct->id_ahl115_types = $_POST['idFirstSelect'];
            echo json_encode($subtypeProduct->getListSubtypeProduct());
        }
    }else{
        echo 2;
    }
} else {
    //Controller pour ajouter un nouveau produit
    //On instencie dans une variable l'objet de notre model products
    $product = new product();
    $categorieProduct = new categoryProduct();
    $listCategoriesProduct = $categorieProduct->categoriesProducts();
    var_dump($selectCategoryProduct);
    $subcategorieProduct = new subcategoryProduct();
    $selectSubcategorieProduct = $subcategorieProduct->getListSubcategoriesProduct(); 
    //Si le formulaire est validé
    if(isset($_POST['addProduct'])){
        if(!$product->checkProductExist()){
            if($product->addNewProduct()){
                $addProductMessage = 'Le produit a été ajouté.';
            } else {
                $addProductMessage = 'Le produit n\'a pas été ajouté.';
            }
        } else {
            $addProductMessage = 'Le produit existe déjà.';
        }
    }
}