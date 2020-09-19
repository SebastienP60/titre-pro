<?php
$product = new product();
$product->id = $_GET['id'];
$infoProduct = $product->getInfoProductById();

    if(!isset($_SESSION['profil']) || $_SESSION['profil']['id_ahl115_roles'] != 1){ 
        header("Location: index.php");
        exit;
    } 
       //Controller pour modifier un produit
    //Déclaration du tableau des erreurs
    $formErrors = array();
    //Si le formulaire est validé
    if(isset($_POST['updateProduct'])){
        // //On instencie dans une variable l'objet de notre model products
        // $product = new product();

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
                    if($product->checkProductExist()){
                        if($product->updateInfoProduct()){
                            header('Location: products.php');
                            exit;
                        } else {
                            $updateProductMessage = 'Le produit n\'a pas été modifié.';
                        }
                    }
                }
        }
    }
    $categoryListQuery = new category();
    $categoryList = $categoryListQuery->categoryList();
