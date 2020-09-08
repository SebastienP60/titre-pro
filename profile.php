<?php
//On démarre une nouvelle session
session_start();
include 'models/usersAccount.php';
include 'controllers/profileController.php';
include 'header.php';
?>
<h1 id="myAccount">Mon compte</h1>
    <!-- On crée une ternaire pour afficher le message d'erreur si il existe -->
    <p><?= isset($addUserAccountMessage) ? $addUserAccountMessage : '' ?></p>
    <div id="myAccountForm" class="container text-center">
    <table>
        <tr>
            <th>Nom : </th>
            <th>Prénom : </th>
            <th>Adresse : </th>
            <th>Téléphone : </th>
            <th>Mail : </th>
        </tr>
        <tr>
            <td><?= $userProfil->lastname ?></td>
            <td><?= $userProfil->firstname ?></td>
            <td><?= $userProfil->address ?></td>
            <td><?= $userProfil->phoneNumber ?></td>
            <td><?= $userProfil->mail ?></td>
        </tr>
    </table>
    </div>
<?php
include 'footer.php';
?>