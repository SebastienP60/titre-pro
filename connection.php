<?php
//On démarre une nouvelle session
session_start();
include 'models/usersAccount.php';
include 'controllers/connectionController.php';
include 'header.php';
?>
<div class="container">
    <div class="homeBanner">
        <p id="home"><a href="index.php">Accueil</a> / Identifiez-vous</p>
    </div>
        <p id="identify">Identifiez-vous</p>
            <div class="row">
                <div class="text-center col-lg-6">
                    <form id="formCreateAccount" action="myAccount.php" method="POST">
                    <p id="createAccount">Créer un compte</p>
                        <input type="submit" name="createAccount" value="Créer un compte" />
                    </form>
                </div>
                <div class="text-center col-lg-6">
                    <form id="formAccountExist" action="connection.php" method="POST">
                    <p id="accountExist">Déjà inscrit ?</p>
                    <div class="form-group">
                        <label for="mail">Votre adresse mail : </label>
                        <input class="form-control" type="mail" id="mail" name="mail" placeholder="Votre adresse mail"/>
                    </div>
                    <div class="form-group">
                        <label for="password">Votre mot de passe : </label>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Votre mot de passe"/>
                    </div>
                        <input type="submit" name="myIdentity" value="Identifiez vous" />
                    </form>
                </div>
            </div>
</div>
<?php
include 'footer.php';
?>