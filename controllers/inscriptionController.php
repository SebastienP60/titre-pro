<?php
//Déclaration du tableau des erreurs
$formErrors = array();
//Déclaration de l'expression régulière pour les mots de passe
$regexPassword = '%^(([a-z]|[A-Z]|[0-9]|&|\?|!|#|@)+){8,32}$%';
//Si le formulaire est validé
if(isset($_POST['myIdentity'])){
    //On instencie dans une variable l'objet de notre model usersAccount
    $user = new user(); 

    if(!empty($_POST['mail'])){
        if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL )){
            $user->mailAddress = htmlspecialchars($_POST['mail']);
        }else{
            $formErrors['mail'] = 'Votre adresse mail doit être de la forme : jean.dupont@moi.fr';
        }
    }else{
        $formErrors['mail'] = 'Veuillez renseigner votre adresse mail';
    }

    if(!empty($_POST['password'])){
        if(preg_match($regexPassword,$_POST['password'])){
            $user->password = htmlspecialchars($_POST['password']);
        }else{
            $formErrors['password'] = 'Minimum 8 caractères présents 1 fois minimum : AZer12&!';
        }
    }else{
        $formErrors['password'] = 'Veuillez choisir un mot de passe';
    }

    if (empty($formErrors)){
        if($user->checkUserAccountExist()){
            header('location: myAccount.php');
        } else {
                $addUserAccountMessage = 'Le compte n\'existe pas.';
            }    
        }
}