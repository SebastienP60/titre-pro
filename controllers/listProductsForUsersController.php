<?php 
$product = new product();

if(!empty($_GET['t'])) {
    $type = new types();
    $type->id = $_GET['t'];
    if($type->checkTypeExistById()){
        $listProd = $product->getListProductsByType($type->id);
        if(count($listProd) == 0){
            $message = 'Aucun produits n\'existe pour ce type';
        }
    } else {
        $message = 'Aucun produits n\'existe pour ce type';
    }
}else if (!empty($_GET['find'])){
    $product->reference = htmlspecialchars($_GET['find']);
    $listProd = $product->searchReferenceProduct();
    if(count($listProd) == 0){
        $message = 'Aucun produits n\'existe pour cette recherche';
    }
} else {
    $listProd = $product->getProductsList();
}

