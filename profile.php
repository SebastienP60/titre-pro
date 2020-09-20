<?php
//On démarre une nouvelle session
session_start();
include 'config.php';
include 'models/usersAccount.php';
include 'controllers/profileController.php';
include 'header.php';
?>
<h1 id="myAccount">Mon compte</h1>
    <div id="myAccountForm" class="container text-center">
            <ul>
                <li class="pt-3"> Nom : <?= $userProfil->lastname ?></li>
                <li> Prénom : <?= $userProfil->firstname ?></li>
                <li> Adresse : <?= $userProfil->address ?></li>
                <li> Téléphone : <?= $userProfil->phoneNumber ?></li>
                <li> Mail : <?= $userProfil->mail ?></li>
            </ul>
        <div>
            <button class="btn btn-success mb-3 mt-3 mr-2" type="submit" name="updateMyAccount"><a href="updateProfile.php"> Modifier mon compte</a></button>
            <button class="btn btn-danger mb-3 mt-3" type="submit" data-toggle="modal" data-target="#deleteProfile">Supprimer mon compte</button>
        </div>
    </div>
<?php
include 'footer.php';
?>