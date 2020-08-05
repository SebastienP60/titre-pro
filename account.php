<?php
include 'header.php';
include 'controllerForm.php';
?>
<h1 id="registration">Inscrivez-vous</h1>
<div id="registrationForm" class="container text-center">
    <form method="POST" action="account.php">
        <fieldset>
                <div id="civility" class="form-group">
                    <label for="civility">Civilité</label>
                        <select name="civility" class="text-center">
                            <option value=""></option>
                                <!-- Avec la boucle on parcours tout le tableau-->
                                <?php foreach($civilityList as $civilityName => $civilityValue){ ?>
                                        <!--On crée une ternaire pour vérivier la présence de la civilité et on la compare à la valeur sélectionnée-->
                            <option <?= (isset($_POST['civility']) && $_POST['civility'] == $civilityValue) ? 'selected' : '' ?> value="<?= $civilityValue ?>"><?= $civilityName ?></option>
                                <?php } ?>
                        </select>
                    <!--On crée une ternaire pour vérifier si l'erreur existe pour soit l'afficher ou non selon la saisie de l'utilisateur-->
                    <p><?= isset($formErrors['civility']) ? $formErrors['civility'] : '' ?></p>
                </div>    
                <div class="form-group">
                    <label for="lastName">Votre nom de famille : </label>
                    <input class="text-center" type="text" id="lastName" name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" />
                    <p><?= isset($formErrors['lastName']) ? $formErrors['lastName'] : '' ?></p>
                </div>        
                <div class="form-group">
                    <label for="firstName">Votre prénom : </label>
                    <input class="text-center" type="text" id="firstName" name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" />
                    <p><?= isset($formErrors['firstName']) ? $formErrors['firstName'] : '' ?></p>
                </div>
                <div class="form-group">
                    <label for="address">Votre adresse postale : </label>
                    <input class="text-center" type="text" id="address" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" />
                    <p><?= isset($formErrors['address']) ? $formErrors['address'] : '' ?></p>
                </div>        
                <div class="form-group">
                    <label for="mailAddress">Votre adresse mail : </label>
                    <input class="text-center" type="text" id="mailAddress" name="mailAddress" value="<?= isset($_POST['mailAddress']) ? $_POST['mailAddress'] : '' ?>"/>
                    <p><?= isset($formErrors['mailAddress']) ? $formErrors['mailAddress'] : '' ?></p>
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
                <input type="submit" value="Valider" name="send" />
        </fieldset>
    </form>
</div>
<?php
include 'footer.php';
?>