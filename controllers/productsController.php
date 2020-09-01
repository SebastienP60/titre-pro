<?php
//Controller pour ajouter un nouveau produit
//On instencie dans une variable l'objet de notre model products
$product = new product(); 
$listSubtypeProduct = $product->getListSubtypeProduct();
//Si le formulaire est validé
if(isset($_POST['addProduct'])){
        if(!$user->checkProductExist()){
            if($user->addNewProduct()){
                $addProductMessage = 'Le produit a été ajouté.';
            } else {
                $addProductMessage = 'Le produit n\'a pas été enregistré.';
            }    
        } else {
            $addProductMessage = 'Le produit existe déjà.';
        }
    }
