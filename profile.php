<?php
//On démarre une nouvelle session
session_start();
include 'models/usersAccount.php';
include 'controllers/profileController.php';
include 'header.php';
?>
<h1 id="myAccount">Mon compte</h1>
    <div id="myAccountForm" class="container text-center">
            <ul>
                <li> Nom : <?= $userProfil->lastname ?></li>
                <li> Prénom : <?= $userProfil->firstname ?></li>
                <li> Adresse : <?= $userProfil->address ?></li>
                <li> Téléphone : <?= $userProfil->phoneNumber ?></li>
                <li> Mail : <?= $userProfil->mail ?></li>
            </ul>
        <div class="button" id="divButton">
                <button type="submit" name="updateMyAccount"><a href="updateProfile.php"> Modifier mon compte</a></button>
                <button type="submit" data-toggle="modal" data-target="#deleteProfile">Supprimer mon compte</button>
        </div>
    </div>
<?php
include 'footer.php';
?>