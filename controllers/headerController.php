<?php
// $category = new categoryName();
// $showTypeNames = $category->getTypeNames();
// $showSubType1 = $category->getSubTypes(1);
// $showSubType2 = $category->getSubTypes(2);

if(isset($_GET['action'])){
    if($_GET['action'] == 'disconnect'){
        session_destroy();
        header('location:index.php');
        exit;
    }
}