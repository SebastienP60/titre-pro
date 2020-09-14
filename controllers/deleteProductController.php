<?php
//Controller pour ajouter un nouveau produit
//On instencie dans une variable l'objet de notre model products
$product = new product();
$deleteProduct = $product->deleteProduct();
//Si le formulaire est validé
if(isset($_POST['addProduct'])){
        if(!$product->checkProductExist()){
            if($product->deleteProduct()){
                $deleteProductmessage = 'Le produit à été supprimé.';
            } else {
                $deleteProductmessage = 'Le produit n\'a pas été supprimé.';
            }
        } else {
            $addProductMessage = 'Le produit existe déjà.';
        }
    }
