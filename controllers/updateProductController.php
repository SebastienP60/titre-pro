<?php
//Controller pour modifier un produit
//On instencie dans une variable l'objet de notre model product
$product = new product();
$updateProduct = $product->updateinfoProduct();
//Si le formulaire est validé
if(isset($_POST['updateProduct'])){
        if(!$product->checkProductExist()){
            if($product->updateinfoProduct()){
                $updateProductMessage = 'Le produit à été modifié.';
            } else {
                $updateProductMessage = 'Le produit n\'a pas été modifié.';
            }
        } else {
            $addProductMessage = 'Le produit existe déjà.';
        }
    }
