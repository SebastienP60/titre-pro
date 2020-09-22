<?php
//Controller pour modifier un compte utilisateur
//Déclaration du tableau des erreurs
$formErrors = array();

//Déclaration de l'expression régulière pour le nom et le prénom de l'utilisateur
$regexName = '%^([A-Z]{1}[A-ÿ]+)([\-\ ]{1}[A-Z]{1}[A-ÿ]+)*$%';
//Déclaration de l'expression régulière pour la vérification du numéro de téléphone
$regexPhone = '%^((0|\+33 ?)[1-9])([ -.]?)(([0-9]{2})([ -.]?)){4}$%';
//Déclaration de l'expression régulière pour les mots de passe
$regexPassword = '%^(([a-z]|[A-Z]|[0-9]|&|\?|!|#|@)+){8,32}$%';

$user = new user();
$user->id = $_SESSION['profil']['id'];

if(!$user->checkUserAccountExistById()){
}

//Si le formulaire est validé
if(isset($_POST['updateMyAccount'])){

    //On vérifie que le champ du nom de famille est correctement rempli
    if(!empty($_POST['lastname'])){
        //Si la saisie est conforme à la vérification via la regex on stocke dans la variable $_POST
        if(preg_match($regexName,$_POST['lastname'])){
            $user->lastname = htmlspecialchars($_POST['lastname']);
        //Si la synthaxe est mauvaise on le signale à l'aide d'un message
        }else{
            $formErrors['lastname'] = 'Votre nom doit être de la forme : Dupont';
        }
    //Si le champ n'est pas renseigné au moment d'envoyer le formulaire on signale par un message
    }else{
        $formErrors['lastname'] = 'Veuillez renseigner votre nom de famille';
    }

    if(!empty($_POST['firstname'])){
        if(preg_match($regexName, $_POST['firstname'])){
            $user->firstname = htmlspecialchars($_POST['firstname']);
        }else{
            $formErrors['firstname'] = 'Votre prénom doit être de la forme : Jean';
        }
    }else{
        $formErrors['firstname'] = 'Veuillez renseigner votre prénom';
    }

    if(!empty($_POST['mail'])){
        if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL )){
            $user->mail = htmlspecialchars($_POST['mail']);
        }else{
            $formErrors['mail'] = 'Votre adresse mail doit être de la forme : jean.dupont@moi.fr';
        }
    }else{
        $formErrors['mail'] = 'Veuillez renseigner votre adresse mail';
    }

    if(!empty($_POST['address'])){
        $user->address = htmlspecialchars($_POST['address']);
    }else{
        $formErrors['address'] = 'Veuillez renseigner votre adresse postale';
    }

    if(!empty($_POST['phoneNumber'])){
        if(preg_match($regexPhone, $_POST['phoneNumber'])){
            $user->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        }else{
            $formErrors['phoneNumber'] = 'Le numéro de téléphone doit être de la forme : 01-02-03-04-05';
        }
    }else{
        $formErrors['phoneNumber'] = 'Veuillez renseigner votre numéro de téléphone';
    }

    if(empty($formErrors)){
        if($user->updateMyAccount() ){
            header('Location: profile.php');
            exit;
        } else {
            $addUserAccountMessage = 'Votre compte n\'a pas été modifié .';
        }    
    }
}

if(isset($_POST['updatePassword'])){
    $isPasswordOk = true;
    $user->mail = $_SESSION['profil']['mail'];
    //On récupère le hash de l'utilisateur
    $hash = $user->getUserHashPassword();
    //Si le hash correspond au mot de passe saisi
    if(password_verify($_POST['oldPassword'], $hash)){
        if(empty($_POST['password'])){
            $formErrors['password'] = 'Veuillez entrer votre mot de passe.';
            $isPasswordOk = false;
        } else {
            if(!preg_match($regexPassword,$_POST['password'])){
                $formErrors['password'] = 'Veuillez entrer votre mot de passe.';
                $isPasswordOk = false;
            }
        }

        if(empty($_POST['verifyPassword'])){
            $formErrors['verifyPassword'] = 'Veuillez entrer de nouveau votre mot de passe.';
            $isPasswordOk = false;
        }
        //Si les vérifications des mots de passe sont ok
        if($isPasswordOk){
            if($_POST['verifyPassword'] == $_POST['password']){
                //On hash le mot de passe avec la méthode de PHP
                $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $user->id = $_SESSION['profil']['id'];
                    if(!$user->updatepasswordUser()){
                        $addUserAccountMessage = 'Votre compte n\'a pas été modifié .';
                    }    
                $formMessageSuccess = 'Votre mot de passe à bien été modifié';
            }else{
                $formErrors['password'] = $formErrors['verifyPassword'] = 'Les mots de passe saisis ne sont pas identiques.';
            }
        }
    }
} 


    

$userProfil = $user->getInfoUserAccountById();
