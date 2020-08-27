<?php
include 'header.php';
include 'models/usersAccount.php';
include 'controllers/usersAccountController.php';
?>
<h1 id="registration">Inscrivez-vous</h1>
    <!-- On crée une ternaire pour afficher le message d'erreur si il existe -->
    <p><?= isset($addUserAccountMessage) ? $addUserAccountMessage : '' ?></p>
    <div id="registrationForm" class="container text-center">
        <form method="POST" action="account.php">
            <fieldset>
                <div class="form-group">
                    <label for="lastname">Votre nom de famille : </label>
                    <input class="text-center" type="text" id="lastname" name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" />
                    <p><?= isset($formErrors['lastname']) ? $formErrors['lastname'] : '' ?></p>
                </div>        
                <div class="form-group">
                    <label for="firstname">Votre prénom : </label>
                    <input class="text-center" type="text" id="firstname" name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" />
                    <p><?= isset($formErrors['firstname']) ? $formErrors['firstname'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="address">Votre adresse postale : </label>
                    <input class="text-center" type="text" id="address" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" />
                    <p><?= isset($formErrors['address']) ? $formErrors['address'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Votre numéro de téléphone : </label>
                    <input class="text-center" type="phone" id="phoneNumber" name="phoneNumber" value="<?= isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" />
                    <p><?= isset($formErrors['phoneNumber']) ? $formErrors['phoneNumber'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="mail">Votre adresse mail : </label>
                    <input class="text-center" type="text" id="mail" name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>"/>
                    <p><?= isset($formErrors['mail']) ? $formErrors['mail'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="password">Votre mot de passe : </label>
                    <input class="text-center" type="password" id="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" />
                    <p><?= isset($formErrors['password']) ? $formErrors['password'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="confirmPassword">Confirmer votre mot de passe : </label>
                    <input class="text-center" type="password" id="confirmPassword" name="confirmPassword" value="<?= isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '' ?>" />
                    <p><?= isset($formErrors['confirmPassword']) ? $formErrors['confirmPassword'] : '' ?></p>
                </div>
                <input type="submit" value="Valider" name="addUser" />
            </fieldset>
        </form>
    </div>
<?php
include 'footer.php';
?>