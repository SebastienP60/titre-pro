<?php
//Déclaration du tableau des erreurs
$formErrors = array();
//Déclaration de l'expression régulière pour les mots de passe
$regexPassword = '%^(([a-z]|[A-Z]|[0-9]|&|\?|!|#|@)+){8,32}$%';
//Si le formulaire pour se connecter à son compte est rempli
if(isset($_POST['myIdentity'])){
    //On instencie dans une variable l'objet de notre model usersAccount
    $user = new user(); 

    if(!empty($_POST['mail'])){
        if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL )){
            $user->mail = htmlspecialchars($_POST['mail']);
        }else{
            $formErrors['mail'] = 'Votre adresse mail doit être de la forme : jean.dupont@moi.fr';
        }
    }else{
        $formErrors['mail'] = 'Veuillez renseigner votre adresse mail';
    }

    if(!empty($_POST['password'])){
        if(preg_match($regexPassword,$_POST['password'])){
            $user->password = $_POST['password'];
        }else{
            $formErrors['password'] = 'Minimum 8 caractères présents 1 fois minimum : AZer12&!';
        }
    }else{
        $formErrors['password'] = 'Veuillez choisir un mot de passe';
    }
    if (empty($formErrors)){
        //Vérification que le mot de passe saisi correspond au Hash
        $hash = $user->getUserHashPassword();
        if(password_verify($user->password, $hash)){
            //On stocke dans une variable la méthode permettant de récupérer les infos de l'utilisateur
            $userProfil = $user->getInfoUserAccount();
            //On appel les sessions
            $_SESSION['profil']['id'] = $userProfil->id;
            $_SESSION['profil']['lastname'] = $userProfil->lastname;
            $_SESSION['profil']['firstname'] = $userProfil->firstname;
            $_SESSION['profil']['id_ahl115_roles'] = $userProfil->id_ahl115_roles; 
            
         if($_SESSION['profil']['id_ahl115_roles'] == 1){
             //On redirige vers la page de l'administrateur
            header('Location: products.php');
            exit;
            } else {
            //Sinon redirige vers la page index si c'est l'utilisateur qui se connecte
            header('Location: index.php');
            exit;            
        }      

        } else {
            $formErrors['mail'] = 'Identifiants incorrects.';
            $formErrors['password'] = 'Identifiants incorrects.';
        }
    }
}   