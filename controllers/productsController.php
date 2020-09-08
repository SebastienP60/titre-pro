<?php
//Controller pour ajouter un nouveau produit
//On instencie dans une variable l'objet de notre model products
$product = new product();
$listCategoriesProduct = $product->getListCategoriesProduct();
$listSubcategoriesProduct = $product->getListSubcategoriesProduct();
$listTypeProduct = $product->getListTypeProduct();
$listSubtypeProduct = $product->getListSubtypeProduct();
$addProduct = $product->addNewProduct();
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

//Traitement de la demande AJAX
if(isset($_POST['fieldValue'])){
    //On vérifie que l'on a bien envoyé des données en POST
    if(!empty($_POST['fieldValue']) && !empty($_POST['fieldName'])){
        //On inclut les bons fichiers car dans ce contexte ils ne sont pas connu.
        include_once '../models/products.php';
        $product = new product();
        $select = htmlspecialchars($_POST['fieldName']);
        $product->$select = htmlspecialchars($_POST['fieldValue']);
        //Le echo sert à envoyer la réponse au JS
        echo $product->addNewProduct([htmlspecialchars($_POST['fieldName'])]);
    }else{
        echo 2;
    }