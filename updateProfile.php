<?php
session_start();
include 'config.php';
include 'models/usersAccount.php';
include 'controllers/updateProfileController.php';
include 'header.php';
?>
<h1 id="registration">Modifier mon compte</h1>
    <!-- On crée une ternaire pour afficher le message d'erreur si il existe -->
    <p><?= isset($addUserAccountMessage) ? $addUserAccountMessage : '' ?></p>
    <div id="registrationForm" class="container text-center">
        <form class="w-75 mx-auto" method="POST" action="updateProfile.php">
            <fieldset>
                <div class="form-group">
                    <label for="lastname">Votre nom : </label>
                    <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Nom" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : $userProfil->lastname ?>" />
                    <p class="text-danger"><?= isset($formErrors['lastname']) ? $formErrors['lastname'] : '' ?></p>
                </div>        
                <div class="form-group">
                    <label for="firstname">Votre prénom : </label>
                    <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Prénom" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : $userProfil->firstname ?>" />
                    <p class="text-danger"><?= isset($formErrors['firstname']) ? $formErrors['firstname'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="address">Votre adresse postale : </label>
                    <input class="form-control" type="text" id="address" name="address" placeholder="Adresse" value="<?= isset($_POST['address']) ? $_POST['address'] : $userProfil->address ?>" />
                    <p class="text-danger"><?= isset($formErrors['address']) ? $formErrors['address'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Votre numéro de téléphone : </label>
                    <input class="form-control" type="phone" id="phoneNumber" name="phoneNumber" placeholder="Téléphone" value="<?= isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : $userProfil->phoneNumber ?>" />
                    <p class="text-danger"><?= isset($formErrors['phoneNumber']) ? $formErrors['phoneNumber'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="mail">Votre adresse mail : </label>
                    <input class="form-control" type="text" id="mail" name="mail" placeholder="adresse mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : $userProfil->mail ?>"/>
                    <p class="text-danger"><?= isset($formErrors['mail']) ? $formErrors['mail'] : '' ?></p>
                </div>    
                <div class="button">
                    <button type="submit" name="updateMyAccount">Modifier</button>
                </div>
            </fieldset>
        </form>
    </div>
<?php
include 'footer.php';
?>