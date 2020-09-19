<?php
//On démarre une nouvelle session
session_start();
include 'config.php';
include 'models/usersAccount.php';
include 'controllers/connectionController.php';
include 'header.php';
?>
<div class="container">
    <div class="homeBanner mt-5">
        <p><a href="index.php">Accueil</a> / Identifiez-vous</p>
    </div>
        <p id="identify" class="mt-5">Identifiez-vous</p>
            <div id="pageAccount" class="row mt-5 mb-5">
                <div id="createAccount" class="text-center col-lg-6 mt-5">
                    <p>Créer un compte</p>
                    <a href="account.php" class="btn btn-dark">Créer un compte</a>
                </div>
                <div id="formAccountExist" class="text-center col-lg-6 mt-3 mb-5">
                    <form action="connection.php" method="POST">
                        <p id="accountExist">Déjà inscrit ?</p>
                        <div class="form-group">
                            <label for="mail">Votre adresse mail : </label>
                            <input class="form-control" type="mail" id="mail" name="mail" placeholder="Votre adresse mail"/>
                            <p class="text-danger"><?= isset($formErrors['mail']) ? $formErrors['mail'] : '' ?></p>
                        </div>
                        <div class="form-group">
                            <label for="password">Votre mot de passe : </label>
                            <input class="form-control" type="password" id="password" name="password" placeholder="Votre mot de passe"/>
                            <p class="text-danger"><?= isset($formErrors['password']) ? $formErrors['password'] : '' ?></p>
                        </div>
                            <input class="btn btn-dark" type="submit" name="myIdentity" value="Identifiez vous" />
                    </form>
                </div>
            </div>
</div>
<?php
include 'footer.php';
?>