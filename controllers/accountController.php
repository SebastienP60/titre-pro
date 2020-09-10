<?php
//Controller pour ajouter un nouvel utilisateur
//Déclaration du tableau des erreurs
$formErrors = array();
//Déclaration de l'expression régulière pour le nom et le prénom de l'utilisateur
$regexName = '%^([A-Z]{1}[A-ÿ]+)([\-\ ]{1}[A-Z]{1}[A-ÿ]+)*$%';
//Déclaration de l'expression régulière pour la vérification du numéro de téléphone
$regexPhone = '%^((0|\+33 ?)[1-9])([ -.]?)(([0-9]{2})([ -.]?)){4}$%';
//Déclaration de l'expression régulière pour les mots de passe
$regexPassword = '%^(([a-z]|[A-Z]|[0-9]|&|\?|!|#|@)+){8,32}$%';

//Si le formulaire est validé
if(isset($_POST['createMyAccount'])){
    //On instencie dans une variable l'objet de notre model usersAccount
    $user = new user(); 
    //On vérifie que le champ du nom de famille est correctement rempli et si il n'est pas vide
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

    if(!empty($_POST['password'])){
        if(preg_match($regexPassword,$_POST['password'])){
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }else{
            $formErrors['password'] = 'Minimum 8 caractères présents 1 fois minimum : AZer12&!';
        }
    }else{
        $formErrors['password'] = 'Veuillez choisir un mot de passe';
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
        if(!$user->checkUserAccountExist()){
            if($user->addUserAccount()){
                $script = '$(\'#confirmSubscribe\').modal({show:true})';
            } else {
                $addUserAccountMessage = 'Votre compte n\'a pas été enregistré.';
            }    
        } else {
            $addUserAccountMessage = 'Le compte existe déjà.';
        }
    }
}
