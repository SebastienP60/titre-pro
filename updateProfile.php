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
    <div id="registrationForm" class="container text-center mb-5">
        <form class="w-75 mx-auto" method="POST" action="updateProfile.php">
            <fieldset>
                <div class="row mt-4">
                    <div class="form-group col-6">
                        <label for="lastname">Votre nom : </label>
                        <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Nom" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : $userProfil->lastname ?>" />
                        <p class="text-danger"><?= isset($formErrors['lastname']) ? $formErrors['lastname'] : '' ?></p>
                    </div>        
                    <div class="form-group col-6">
                        <label for="firstname">Votre prénom : </label>
                        <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Prénom" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : $userProfil->firstname ?>" />
                        <p class="text-danger"><?= isset($formErrors['firstname']) ? $formErrors['firstname'] : '' ?></p>
                    </div>
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
                <div>
                    <button class="btn btn-success mb-3" type="submit" name="updateMyAccount">Modifier</button>
                </div>
            </fieldset>
        </form>
        <form class="w-75 mx-auto" method="POST" action="updateProfile.php">
            <fieldset>
                <div class="form-group">
                    <label for="oldPassword">Ancien mot de passe :</label>
                    <input class="form-control" type="password" name="oldPassword" id="oldPassword" placeholder="Ancien mot de passe"  value="<?= isset($_POST['oldPassword']) ? $_POST['oldPassword'] : '' ?>"/>
                    <!--message erreur-->
                    <p class="text-danger"><?= isset($formErrors['oldPassword']) ? $formErrors['oldPassword'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="password">Nouveau mot de passe :</label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>"/>
                    <!--message erreur-->
                    <p class="text-danger"><?= isset($formErrors['password']) ? $formErrors['password'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="verifyPassword">Confirmer nouveau mot de passe :</label>
                    <input type="password" name="verifyPassword" id="verifyPassword" placeholder="Saisir à nouveau" class="form-control" value="<?= isset($_POST['verifyPassword']) ? $_POST['verifyPassword'] : '' ?>" />
                    <p class="text-danger"><?= isset($formErrors['verifyPassword']) ? $formErrors['verifyPassword'] : '' ?></p>
                </div>
                <button type="submit" name="updatePassword" class="btn btn-success mb-3">Modifier mot de passe</button>
            </fieldset>
        </form>
    </div>
<?php
include 'footer.php';
?>