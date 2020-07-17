<?php
include('header.php')
?>
<?php
include ('controllerForm.php')
?>
<body>
    <form method="POST" action="account.php"> 
        <fieldset>
            <legend>Formulaire d'inscription</legend>
                <label for="civiliy">Civilité : </label>
                <select name="civility">
                    <option value=""></option>
                    <!-- Avec la boucle on parcours tout le tableau-->
                    <?php foreach($civilityList as $civilityName => $civilityValue){ ?>
                        <!--On crée une ternaire pour vérivier la présence de la civilité et on la compare à la valeur sélectionnée-->
                        <option <?= (isset($_POST['civility']) && $_POST['civility'] == $civilityValue) ? 'selected' : '' ?> value="<?= $civilityValue ?>"><?= $civilityName ?></option>
                        <?php } ?>
                </select>
                <!--On crée une ternaire pour vérifier si l'erreur existe pour soit l'afficher ou non selon la saisie de l'utilisateur-->
                    <p><?= isset($formErrors['civility']) ? $formErrors['civility'] : '' ?></p>
                <label for="lastName">Votre nom de famille : </label><input type="text" id="lastName" name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" />
                    <p><?= isset($formErrors['lastName']) ? $formErrors['lastName'] : '' ?></p>
                <label for="firstName">Votre prénom : </label><input type="text" id="firstName" name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" />
                    <p><?= isset($formErrors['firstName']) ? $formErrors['firstName'] : '' ?></p>
                <label for="mailAddress">Votre adresse mail : </label><input type="text" id="mailAddress" name="mailAddress" value="<?= isset($_POST['mailAddress']) ? $_POST['mailAddress'] : '' ?>"/>
                    <p><?= isset($formErrors['mailAddress']) ? $formErrors['mailAddress'] : '' ?></p>
                <label for="password">Votre mot de passe : </label><input type="password" id="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" />
                    <p><?= isset($formErrors['password']) ? $formErrors['password'] : '' ?></p>
                <label for="confirmPassword">Confirmer votre mot de passe : </label><input type="password" id="confirmPassword" name="confirmPassword" value="<?= isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '' ?>" />
                    <p><?= isset($formErrors['confirmPassword']) ? $formErrors['confirmPassword'] : '' ?></p>
                <input type="submit" value="Valider" name="send" />
        </fieldset>
    </form>
</body>
<?php
include('footer.php')
?>