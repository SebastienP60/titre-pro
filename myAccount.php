<?php
include 'header.php';
include 'models/usersAccount.php';
include 'controllers/myAccountController.php';
?>
<h1 id="myAccount">Mon compte</h1>
    <!-- On crée une ternaire pour afficher le message d'erreur si il existe -->
    <p><?= isset($addUserAccountMessage) ? $addUserAccountMessage : '' ?></p>
    <div id="myAccountForm" class="container text-center">
        <form class="w-75 mx-auto" method="POST" action="myAccount.php">
            <fieldset>
                <div id="yourName" class="form-group">
                    <label for="lastname">Votre nom : </label>
                    <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Nom" value="<?= $_SESSION['lastname'] ?>" />
                    <p><?= isset($formErrors['lastname']) ? $formErrors['lastname'] : '' ?></p>
                </div>        
                <div class="form-group">
                    <label for="firstname">Votre prénom : </label>
                    <input class="form-control" type="text" id="firstname" name="firstname" placeholder="Prénom" value="<?= $_SESSION['firstname'] ?>" />
                    <p><?= isset($formErrors['firstname']) ? $formErrors['firstname'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="address">Votre adresse postale : </label>
                    <input class="form-control" type="text" id="address" name="address" placeholder="Adresse" value="<?= $_SESSION['address'] ?>" />
                    <p><?= isset($formErrors['address']) ? $formErrors['address'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Votre numéro de téléphone : </label>
                    <input class="form-control" type="phone" id="phoneNumber" name="phoneNumber" placeholder="Téléphone" value="<?= $_SESSION['phoneNumber'] ?>" />
                    <p><?= isset($formErrors['phoneNumber']) ? $formErrors['phoneNumber'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="mail">Votre adresse mail : </label>
                    <input class="form-control" type="text" id="mail" name="mail" placeholder="adresse mail" value="<?= $_SESSION['mail'] ?>"/>
                    <p><?= isset($formErrors['mail']) ? $formErrors['mail'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="password">Votre mot de passe : </label>
                    <input class="form-control" type="password" id="password" name="password" placeholder="Mot de passe" value="<?= $_SESSION['password'] ?>" />
                    <p><?= isset($formErrors['password']) ? $formErrors['password'] : '' ?></p>
                </div> 
                <div class="button">
                    <button type="submit" name="updateMyAccount">Modifier mon compte</button>
                    <button type="submit" name="deleteMyAccount">Supprimer mon compte</button>
                </div>
            </fieldset>
        </form>
    </div>
<?php
include 'footer.php';
?>