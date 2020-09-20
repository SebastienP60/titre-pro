<?php
if(isset($_GET['action'])){
    if($_GET['action'] == 'disconnect'){
        session_destroy();
        header('location:index.php');
        exit;
    }        
}

// if (!empty($_GET['findProd'])){
//     $product->name = htmlspecialchars($_GET['findProd']);
//     $listProd = $product->searchProduct();
//     }
