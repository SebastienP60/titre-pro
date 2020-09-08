<?php


//Traitement de la demande AJAX
if(isset($_POST['idCategory'])){
    //On vérifie que l'on a bien envoyé des données en POST
    if(!empty($_POST['idCategory'])){
        //On inclut les bons fichiers car dans ce contexte ils ne sont pas connu.
        include_once '../models/subcategoriesProducts.php';
        $subcategorieProduct = new subcategoryProduct();
        $subcategorieProduct->id_ahl115_categories = $_POST['idCategory'];
        //Le echo sert à envoyer la réponse au JS
        echo json_encode($subcategorieProduct->getListSubcategoriesProduct());
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