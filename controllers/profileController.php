<?php
$user = new user();
$user->id = $_SESSION['profil']['id'];
$userProfil = $user->getInfoUserAccountById();
