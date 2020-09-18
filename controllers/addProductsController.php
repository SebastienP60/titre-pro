<?php
//Traitement de la demande AJAX
//Vérifie si l'ajax est envoyé
if(isset($_POST['idFirstSelect'])){
    //On vérifie que l'on a bien envoyé des données en POST
    if(!empty($_POST['idFirstSelect'])){
        if($_POST['secondSelect'] == 'selectSubcategory'){
            //On inclut le bon fichier car dans ce contexte il n'est pas connu.
            include_once '../models/subcategory.php';
            $subcategoryListQuery = new subcategory();
            $subcategoryListQuery->id_ahl115_categories = $_POST['idFirstSelect'];
            //Le echo sert à envoyer la réponse au JS
            echo json_encode($subcategoryListQuery->subcategoryList());
        } elseif($_POST['secondSelect'] == 'selectType'){
            include_once '../models/types.php';
            $typesListQuery = new types();
            //Méthode pour remplir le type selon l'id de la sous catégorie
            $typesListQuery->id_ahl115_subcategories = $_POST['idFirstSelect'];
            echo json_encode($typesListQuery->typesList());
        } elseif($_POST['secondSelect'] == 'selectSubtype'){
            include_once '../models/subtypes.php';
            $subtypesListQuery = new subtypes();
            $subtypesListQuery->id_ahl115_types = $_POST['idFirstSelect'];
            echo json_encode($subtypesListQuery->subtypesList());
        }
    }
//Les actions sont faites si l'ajax n'est pas envoyé
} else {
    if(!isset($_SESSION['profil']) || $_SESSION['profil']['id_ahl115_roles'] != 1){ 
        header("Location: index.php");
        exit;
    }
    //Controller pour ajouter un produit
    //Déclaration du tableau des erreurs
    $formErrors = array();
    //Si le formulaire est validé
    if(isset($_POST['addProduct'])){
        //On instencie dans une variable l'objet de notre model products 
        $product = new product();

        //On vérifie que le champ du nom est correctement rempli et si il n'est pas vide
        if(!empty($_POST['name'])){
            $product->name = htmlspecialchars($_POST['name']);
        //Si le champ n'est pas renseigné au moment d'envoyer le formulaire on signale par un message
        } else{
            $formErrors['name'] = 'Veuillez renseigner le nom du produit';
        }
    
        if(!empty($_POST['reference'])){
            $product->reference = htmlspecialchars($_POST['reference']);
        }else{
            $formErrors['reference'] = 'Veuillez renseigner la référence du produit';
        }
        
        if(!empty($_POST['description'])){
            $product->description = htmlspecialchars($_POST['description']);
        }else{
            $formErrors['description'] = 'Veuillez renseigner la description du produit';
        }

        if(!empty($_POST['price'])){
            $product->price = htmlspecialchars($_POST['price']);
        }else{
            $formErrors['price'] = 'Veuillez renseigner le prix du produit';
        }

        // On verifie que le fichier a bien été envoyé.
        if (!empty($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
        // On stock dans $fileInfos les informations concernant le chemin du fichier.
        $fileInfos = pathinfo($_FILES['picture']['name']);
        // On crée un tableau contenant les extensions autorisées.
        $fileExtension = ['png', 'jpg', 'jpeg'];
        // On verifie si l'extension de notre fichier est dans le tableau des extension autorisées.
            if (in_array(strtolower($fileInfos['extension']), $fileExtension)) {
            //On définit le chemin vers lequel uploader le fichier
            $path = 'assets/uploadsImg/';
            //On stocke dans une variable le chemin complet du fichier (chemin + nouveau nom + extension une fois uploadé) Attention : ne pas oublier le point
            $fileFullPath = $path . $_FILES['picture']['name'];
            //move_uploaded_files : déplace le fichier depuis son emplacement temporaire ($_FILES['file']['tmp_name']) vers son emplacement définitif ($fileFullPath)
                if (move_uploaded_file($_FILES['picture']['tmp_name'], $fileFullPath)) {
                //On définit les droits du fichiers uploadé (Ici : écriture et lecture pour l'utilisateur apache, lecture uniquement pour le groupe et tout le monde)
                chmod($fileFullPath, 0644);
                $product->picture = $fileFullPath;
                    } else {
                        $formErrors['picture'] = 'Votre fichier ne s\'est pas téléversé correctement';
                    }
            } else {
            $formErrors['picture'] = 'Votre fichier n\'est pas du format attendu : png, jpg, jpeg';
            }
        } else {
            $formErrors['picture'] = 'Veuillez selectionner un fichier';
        }
        if(!empty($_POST['energy'])){
            $product->energy = htmlspecialchars($_POST['energy']);
        }else{
            $formErrors['energy'] = 'Veuillez renseigner le nombre de joules';
        }

        if(!empty($_POST['selectSubtype'])){
            $product->id_ahl115_subtypes = $_POST['selectSubtype'];
                if(empty($formErrors)){
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

    }
    $categoryListQuery = new category();
    $categoryList = $categoryListQuery->categoryList();
}


