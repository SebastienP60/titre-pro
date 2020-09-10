<?php
$user = new user();
$user->id = $_SESSION['profil']['id'];
$userProfil = $user->getInfoUserAccountById();
if(isset ($_POST['deleteMyAccount'])){
    session_destroy();
    $deleteUser = $user->deleteUserAccount();
    header('Location: index.php');
    exit;
 } ?>
<div class="modal fade" id="deleteProfile" tabindex="-1" aria-labelledby="deleteProfile" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Votre compte va être supprimé.</p>
        </div>
        <form action="profile.php" method="POST">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="deleteMyAccount">Confirmer</button>
            </div>
        </form>
    </div>
  </div>
</div>