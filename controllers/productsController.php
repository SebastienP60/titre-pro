<?php

//Traitement de la demande AJAX
//Vérifie si l'ajax est envoyé
if(isset($_POST['idFirstSelect'])){
    //On vérifie que l'on a bien envoyé des données en POST
    if(!empty($_POST['idFirstSelect'])){
        if($_POST['secondSelect'] == 'selectSubcategory'){
            //On inclut le bon fichier car dans ce contexte il n'est pas connu.
            include_once '../config.php';
            include_once '../models/subcategory.php';
            $subcategoryListQuery = new subcategory();
            $subcategoryListQuery->id_ahl115_categories = $_POST['idFirstSelect'];
            //Le echo sert à envoyer la réponse au JS
            echo json_encode($subcategoryListQuery->subcategoryList());
        } elseif($_POST['secondSelect'] == 'selectType'){
            include_once '../config.php';
            include_once '../models/types.php';
            $typesListQuery = new types();
            //Méthode pour remplir le type selon l'id de la sous catégorie
            $typesListQuery->id_ahl115_subcategories = $_POST['idFirstSelect'];
            echo json_encode($typesListQuery->typesList());
        } elseif($_POST['secondSelect'] == 'selectSubtype'){
            include_once '../config.php';
            include_once '../models/subtypes.php';
            $subtypesListQuery = new subtypes();
            $subtypesListQuery->id_ahl115_types = $_POST['idFirstSelect'];
            echo json_encode($subtypesListQuery->subtypesList());
        }
    }
} else {
    if(!isset($_SESSION['profil']) || $_SESSION['profil']['id_ahl115_roles'] != 1){ 
       // header("Location: index.php");
        //exit;
    }
    
    //Ouverture modal pour supprimer un produit
    if(isset($_POST['deleteProduct'])){
        $product = new product();
        $product->id = $_POST['deleteId'];
        $deleteProduct = $product->deleteProduct();
    } 
    
    $product = new product();
    $category = new category();

    $categoryList = $category->categoryList();
    
    if(!empty($_POST['selectSubtype'])){
            //On instancie un nouvel objet sous-type pour accèder à la méthode de vérification (checkSubtypeExistById)
            $subtype = new subtypes();
            //On met dans l'attribut id de l'objet l'id du sous-type parce que checkSubtypeExistById en a besoin
            //L'id vient du select dans le formulaire
            $subtype->id = $_POST['selectSubtype'];
            //Si le sous-type existe dans la bdd...(renvoie 0 si non et 1 si oui - count)
            if($subtype->checkSubtypeExistById()){
                //On donne à la méthode getListProductsBySubtype l'id dont elle a besoin (id du sous type)
                $product->id_ahl115_subtypes = $subtype->id;
                //On stocke le résultat qui est la liste des produits par sous-type
                $productsList = $product->getListProductsBySubtype();
            } else {
                $selectErrors['subtype'] = 'Veuillez sélectionner un sous-type dans la liste';
            }
        } else if(!empty($_POST['selectType'])) {
            $type = new types();
            $type->id = $_POST['selectType'];

            if($type->checkTypeExistById()){
            $productsList = $product->getListProductsByType($type->id);
        } else {
                $selectErrors['type'] = 'Veuillez sélectionner un type dans la liste';
        }
        } else if(!empty($_POST['selectSubcategory'])) {
            $subcategories = new subcategory();
            $subcategories->id = $_POST['selectSubcategory'];

            if($subcategories->checkSubcategoryExistById()){
                $productsList = $product->getListProductsBySubcategory($subcategories->id);
            } else {
                $selectErrors['subcategory'] = 'Veuillez sélectionner une sous-catégorie dans la liste';
            }
        } else if(!empty($_POST['selectCategory'])) {
            $categories = new category();
            $categories->id = $_POST['selectCategory'];

            if($categories->checkCategoryExistById()){
                $productsList = $product->getListProductsByCategory($categories->id);
            } else {
                $selectErrors['category'] = 'Veuillez sélectionner une catégorie dans la liste';
            } 
    }else { 
        $productsList = $product->getProductsList();
    }
}
     
?>

