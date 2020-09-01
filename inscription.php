<?php
include 'header.php';
include 'models/usersAccount.php';
include 'controllers/inscriptionController.php';
?>
<div class="container">
    <div class="homeBanner">
        <p id="home"><a href="index.php">Accueil</a> / Identifiez-vous</p>
    </div>
        <p id="identify">Identifiez-vous</p>
            <div class="row" id="identifyForm">
                <div class="col-lg-6">
                    <form action="account.php" method="POST">
                    <p id="createAccount">Créer un compte</p>
                        <input type="submit" name="createAccount" value="Créer un compte" />
                    </form>
                </div>
                <div class="col-lg-6">
                    <form action="myAccount.php" method="POST">
                    <p id="accountExist">Déjà inscrit ?</p>
                    <div class="form-group">
                        <label for="yourEmail">Votre adresse mail : </label>
                        <input type="mail" id="yourEmail" name="yourEmail" placeholder="Votre adresse mail"/>
                    </div>
                    <div class="form-group">
                        <label for="yourPassword">Votre mot de passe : </label>
                        <input type="password" id="yourPassword" name="yourPassword" placeholder="Votre mot de passe"/>
                    </div>
                        <input type="submit" name="myIdentity" value="Identifiez vous" />
                    </form>
                </div>
            </div>
</div>
<?php
include 'footer.php';
?>