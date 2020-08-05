<?php
//Déclaration du tableau des erreurs
$formErrors = array();
//Déclaration du tableau du champ de saisi de la civilité
$civilityList = array('Mr' => 'Monsieur','Mme' => 'Madame', 'Mlle' => 'Mademoiselle');
//Déclaration de l'expression régulière pour le nom et le prénom de l'utilisateur
$regexName = '%^([A-Z]{1}[A-ÿ]+)([\-\ ]{1}[A-Z]{1}[A-ÿ]+)*$%';
//Déclaration de l'expression régulière pour la vérification du numéro de téléphone
$regexPhone = '%^((0|\+33 ?)[1-9])([ -.]?)(([0-9]{2})([ -.]?)){4}$%';
//Déclaration de l'expression régulière pour les mots de passe
$regexPassword = '%^(([a-z]|[A-Z]|[0-9]|&|\?|!|#|@)+){8,32}$%';
//Si le formulaire est validé
if(isset($_POST['send'])){
    //Si le champ est bien rempli
    if(!empty($_POST['civility'])){
        //Si la valeur est bien présente dans le tableau
        if(in_array($_POST['civility'], $civilityList)){
            $civility = htmlspecialchars($_POST['civility']);
        }else{
            $formErrors['civility'] = 'Une erreur est survenue';
        }
    }else{
        //Sinon on demande à l'utilisateur de faire son choix
        $formErrors['civility'] = 'Veuillez sélectionner une civilité';
    }

    if(!empty($_POST['lastName'])){
        if(preg_match($regexName,$_POST['lastName'])){
            $lastName = htmlspecialchars($_POST['lastName']);
        }else{
            $formErrors['lastName'] = 'Votre nom de famille doit être de la forme : Dupont';
        }
    }else{
        $formErrors['lastName'] = 'Veuillez renseigner votre nom de famille';
    }

    if(!empty($_POST['firstName'])){
        if(preg_match($regexName, $_POST['firstName'])){
            $firstName = htmlspecialchars($_POST['firstName']);
        }else{
            $formErrors['firstName'] = 'Votre prénom doit être de la forme : Jean';
        }
    }else{
        $formErrors['firstName'] = 'Veuillez renseigner votre prénom';
    }

    if(!empty($_POST['mailAddress'])){
        if(filter_var($_POST['mailAddress'], FILTER_VALIDATE_EMAIL )){
            $mailAddress = htmlspecialchars($_POST['mailAddress']);
        }else{
            $formErrors['mailAddress'] = 'Votre adresse mail doit être de la forme jean.dupont@moi.fr';
        }
    }else{
        $formErrors['mailAddress'] = 'Veuillez renseigner votre adresse mail';
    }

    if(!empty($_POST['password'])){
        if(preg_match($regexMail,$_POST['password'])){
            $password = htmlspecialchars($_POST['password']);
        }else{
            $formErrors['password'] = 'Votre mot de passe doit comporter au minimum 8 caractères : AZer12&! et chaque caractères au minimum une fois';
        }
    }else{
        $formErrors['password'] = 'Veuillez choisir un mot de passe';
    }

    if(!empty($_POST['confirmPassword'])){
        $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
    }else{
        $formErrors['confirmPassword'] = 'Votre mot passe doit être identique';
    }

    if(!empty($_POST['address'])){
        $confirmPassword = htmlspecialchars($_POST['address']);
    }else{
        $formErrors['address'] = 'Veuillez renseigner votre adresse postale';
    }
}