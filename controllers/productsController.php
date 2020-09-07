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
