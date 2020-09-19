<?php
session_start();
include 'config.php';
include 'models/usersAccount.php';
include 'controllers/accountController.php';
include 'modals.php';
include 'header.php';
?>
<h1 id="registration">Inscription</h1>
    <!-- On crée une ternaire pour afficher le message d'erreur si il existe -->
    <p><?= isset($addUserAccountMessage) ? $addUserAccountMessage : '' ?></p>
    <div id="registrationForm" class="container text-center">
        <form class="w-75 mx-auto" method="POST" action="account.php">
            <h2 id="accounth2">Veuillez renseigner tous les champs</h2>
            <fieldset>
                <div class="row">
                <div class="form-group col-6">
                    <label for="lastname">Votre nom : </label>
                    <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Nom" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['lastname']) ? $formErrors['lastname'] : '' ?></p>
                </div>        
                <div class="form-group col-6">
                    <label for="firstname">Votre prénom : </label>
                    <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Prénom" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['firstname']) ? $formErrors['firstname'] : '' ?></p>
                </div>
                </div>
                <div class="form-group">
                    <label for="address">Votre adresse postale : </label>
                    <input class="form-control" type="text" id="address" name="address" placeholder="Adresse" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['address']) ? $formErrors['address'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Votre numéro de téléphone : </label>
                    <input class="form-control" type="phone" id="phoneNumber" name="phoneNumber" placeholder="Téléphone" value="<?= isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['phoneNumber']) ? $formErrors['phoneNumber'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="mail">Votre adresse mail : </label>
                    <input class="form-control" type="text" id="mail" name="mail" placeholder="adresse mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>"/>
                    <p class="text-danger"><?= isset($formErrors['mail']) ? $formErrors['mail'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="password">Votre mot de passe : </label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['password']) ? $formErrors['password'] : '' ?></p>
                </div>
                <div class="button">
                    <button class="btn btn-success" type="submit" name="createMyAccount">Créer mon compte</button>
                </div>
            </fieldset>
        </form>
    </div>
<?php
include 'footer.php';
?>