<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Magasin Air-soft / Paintball Retz Airsoft Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
</head>
<body>
    <header class="sticky-top">
        <div class="container-fluid" id="banner">
            <div class="row">
                <div class="col-lg-2 ml-auto mr-auto my-auto" id="identity">
                    <a href="index.php"><img id="logo" class="img-fluid" src="assets/img/logoRASNegatif.jpg" alt="Logo du site" title="Logo du site"/></a>
                </div>
                <div class="col-lg-3 mx-auto my-auto" id="search">
                    <input id="searchProducts" class="searchProducts" type="text" name="searchProducts" placeholder="Rechercher" value="" autocomplete="off" />
                    <button class="btn border-none" type="submit" name="submitSearch" ><img src="assets/img/jumelles.png" id="searchBtn" alt="Bouton rechercher" title="Bouton rechercher"/></button>
                </div>
                <div class="col-lg-1 mr-auto ml-auto my-auto" id="shoppingCart">
                    <a href="panier.php"><i class="fas fa-shopping-basket fa-5x" alt="logo panier"></i></a>
                </div>
                <div class="col-lg-2 mx-auto my-auto" id="gameLink">
                    <p>Avant de vous lancer dans l'aventure venez nous retrouver sur notre <a href="https://retztacticalgames.com/fr"> terrain de jeu</a></p>
                </div>
                <div class="col-lg-2 mx-auto my-auto" id="connect">
                    <a class="btn btn-account text-white" href="inscription.php">Mon compte</a>
                </div>
            </div>
        </div>
        <!--Début barre de navigation-->
        <nav class="navbar navbar-expand-md navbar-dark sticky-top">
        <!--Bouton et icone du menu pour la version mobile-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Intégration du bloc navbar-collapse-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--Création de la liste non ordonnée de tous les liens et sous-menus-->
                <ul class="navbar-nav mr-auto container-fluid">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarReplicate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Répliques
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item dropdown-submenu dropdown dropright">
                                <a class="nav-link dropdown-toggle navDropdown" id="navbarGunReplicate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Répliques de poing
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarGunReplicate" id="submenuGunReplicate">
                                        <li><a class="dropdown-item" href="armes-de-poing.php">Répliques de poing</a></li>
                                        <li><a class="dropdown-item" href="#">Répliques à ressort</a></li>
                                        <li><a class="dropdown-item" href="#">Répliques à gaz</a></li>
                                        <li><a class="dropdown-item" href="#">Répliques CO2</a></li>
                                        <li><a class="dropdown-item" href="#">Répliques électriques</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown-submenu">
                                <a class="nav-link dropdown-toggle navDropdown" id="navbarLongReplicate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Répliques longues
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarLongReplicate" id="submenuLongReplicate">
                                    <li><a class="dropdown-item" href="armes-longues.php">Répliques longues</a></li>
                                    <li><a class="dropdown-item" href="#">Répliques à ressort</a></li>
                                    <li><a class="dropdown-item" href="#">Répliques à gaz</a></li>
                                    <li><a class="dropdown-item" href="#">Répliques CO2</a></li>
                                    <li><a class="dropdown-item" href="#">Répliques électriques</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarAccessory" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Accessoires
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item dropdown-submenu dropdown dropright">
                                <a class="nav-link dropdown-toggle navDropdown" id="navbarAccessories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Accessoires
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarAccessories">
                                    <?php
                                    //boucle qui récupère dans le tableau asociatif la clé et la valeur de chaque élément
                                        foreach ($accessories as $accessory => $allAccessories) { ?>
                                            <li><a class="dropdown-item" href="<?= $allAccessories ?>"><?= $accessory; ?></a></li>
                                        <?php }
                                    ?>
                                    <?php
                                        foreach ($chargers as $charger => $allChargers) { ?>
                                            <li value="<?= $charger ?>"><a class="dropdown-item" href="accessoires.php"><?= $allChargers; ?></a></li>
                                        <?php }
                                    ?>
                                </ul>
                            </li>
                            <li class="nav-item dropdown-submenu">
                                <a class="nav-link dropdown-toggle navDropdown" id="navbarAccessories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Chargeurs
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarAccessories">
                                    <li><a class="dropdown-item" href="#">Chargeurs</a></li>
                                    <li><a class="dropdown-item" href="#">Chargeurs AEP</a></li>
                                    <li><a class="dropdown-item" href="#">Chargeurs AEP Mid-cap</a></li>
                                    <li><a class="dropdown-item" href="#">BB Loaders et Accessoires</a></li>
                                    <li><a class="dropdown-item" href="#">Chargeurs AEG Low-cap</a></li>
                                    <li><a class="dropdown-item" href="#">Chargeurs pour sniper</a></li>
                                    <li><a class="dropdown-item" href="#">Chargeurs AEG Hi-cap</a></li>
                                    <li><a class="dropdown-item" href="#">Chargeurs Pistolets Gaz</a></li>
                                    <li><a class="dropdown-item" href="#">Chargeurs Pistolets CO2</a></li>
                                    <li><a class="dropdown-item" href="#">Chargeurs Fusils à pompe</a></li>
                                    <li><a class="dropdown-item" href="#">Chargeurs Revolvers</a></li>
                                    <li><a class="dropdown-item" href="#">Chargeurs GBBR</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> 
                    <li class=" nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicateConsumable" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Consommable
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicateConsumable">
                            <a class="dropdown-item" href="#">Air-soft</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicateEquipment" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Équipements
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicateEquipment">
                            <a class="dropdown-item" href="#">Air-soft</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicateHpa" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            HPA
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicateHpa">
                            <a class="dropdown-item" href="#">Air-soft</a>
                        </div>
                    </li>
                    <li class=" nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicateUpgrade" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Upgrade
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicateUpgrade">
                            <a class="dropdown-item" href="#">Air-soft</a>
                        </div>
                    </li>
                    <li class=" nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicateDefence" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Défense
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicateDefence">
                            <a class="dropdown-item" href="#">Arrive bientôt</a>
                        </div>
                    </li>   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicateArrival" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Arrivage
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicateArrival">
                            <a class="dropdown-item" href="#">Air-soft</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicatePromo" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Promo
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicatePromo">
                            <a class="dropdown-item" href="#">Air-soft</a>
                        </div>
                    </li>
                    <li class=" nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicateDestockage" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Destockage
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicateDestockage">
                            <a class="dropdown-item" href="#">Air-soft</a>
                        </div>
                    </li>
                    <li class=" nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicatePaintball" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Paintball
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicatePaintball">
                            <a class="dropdown-item" href="#">Paintball</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>        
