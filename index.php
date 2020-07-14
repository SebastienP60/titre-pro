<?php
include('tables.php')
?>
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
    <header>
        <div class="container-fluid" id="banner">
            <div class="row">
                <div class="col-md-2 ml-auto mr-auto my-auto" id="identity">
                    <img id="logo" class="img-fluid" src="assets/img/logoRAS.jpg" alt="Logo du site" title="Logo du site"/>
                </div>
                <!--<div class="col-md-1 mr-auto ml-auto my-auto" id="nameSite">
                        <p><strong>Retz</strong><br/>
                        <strong>Airsoft</strong><br/>
                       <strong>Shop</strong></p>
                </div>-->
                <div class="col-md-3 mr-auto ml-auto my-auto" id="search">
                    <input id="searchProducts" class="searchProducts" type="text" name="searchProducts" placeholder="Rechercher" value="" autocomplete="off" />
                    <button class="btn border-none" type="submit" name="submitSearch" ><img src="assets/img/jumelles.png" id="searchBtn" alt="Bouton rechercher" title="Bouton rechercher"/></button>
                </div>
                <div id="shoppingCart" class="col-md-1 mr-auto ml-auto my-auto">
                    <a href="panier.php"><i class="fas fa-shopping-basket fa-5x" alt="logo panier"></i></a>
                </div>
                <div class="col-md-2 mr-auto ml-auto my-auto" id="connect">
                    <a class="btn btn-account text-white" href="indexForm.php">Mon compte</a>
                </div>
            </div>
        </div>
        <!--Début barre de navigation-->
        <div id="menu">
            <nav class="navbar navbar-expand-md navbar-dark">
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
                                    <ul class="dropdown-menu" aria-labelledby="navbarGunReplicate">
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
                                    <ul class="dropdown-menu" aria-labelledby="navbarLongReplicate">
                                        <li><a class="dropdown-item" href="armes_longues.php">Répliques longues</a></li>
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

                                        <!--<li><a class="dropdown-item" href="#">Accessoires</a></li>
                                        <li><a class="dropdown-item" href="#">Crosses</a></li>
                                        <li><a class="dropdown-item" href="#">Garde main / kit Ris</a></li>
                                        <li><a class="dropdown-item" href="#">Poignées Moteur / Pistol grip</a></li>
                                        <li><a class="dropdown-item" href="#">Montage sangle</a></li>
                                        <li><a class="dropdown-item" href="#">Grip Ris / Poignée Ris</a></li>
                                        <li><a class="dropdown-item" href="#">Corps</a></li>
                                        <li><a class="dropdown-item" href="#">Front set</a></li>
                                        <li><a class="dropdown-item" href="#">Organes de visée</a></li>
                                        <li><a class="dropdown-item" href="#">Cache rails / Covers</a></li>
                                        <li><a class="dropdown-item" href="#">Accessoires pistolets</a></li>-->
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
        </div>
    </header>
    <div class="container" id="principalPage">
    <h1 class="text-center">Nos produits du moment</h1>                
        <div class="row no-gutters" id="actualsProducts">
            <figure class="col-lg-4">
                <img class="img-fluid" id="firstActualProduct" src="assets/img/A69987-2.jpg" alt="Bas de masque" title="Bas de masque" />
                <figcaption>Bas de masque grillage v1 - olive</figcaption>
                <figcaption>21€ TTC</figcaption>
            </figure>
            <figure class="col-lg-4">
                <img class="img-fluid" id="secondActualProduct" src="assets/img/PR2004.jpg" alt="Pistolet à ressort" title="Pistolet à ressort" />
                <figcaption>Réplique pistolet à ressort H&K VP9 HME</figcaption>
                <figcaption>Culasse métal 0,5J</figcaption>
                <figcaption>44€ TTC</figcaption>
            </figure>
            <figure class="col-lg-4">
                <img class="img-fluid" id="thirdActualProduct" src="assets/img/BB3313.jpg" alt="Bouteille de billes" title="Bouteille de billes" />
                <figcaption>Billes BIO 0.30g x 5100 en bouteille</figcaption>
                <figcaption>22,20€ TTC</figcaption>
            </figure>
        </div>
    </div>
    <div class="container">
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>
    <footer>
        <div class="container-fluid" id="footPage">
            <div class="row">
                <!-- <div class="col-md-2 ml-auto mr-auto my-auto" id="identity">
                    <img id="logo" class="img-fluid" src="assets/img/logoRAS.jpg" alt="Logo du site" title="Logo du site"/>
                </div> -->
                <div class="col-md-4 ml-auto mr-auto my-auto" id="contact">
                    <ul>
                        <li>Contact</li>
                        <li>Retz Airsoft Shop</li>
                        <li>14 Rue Léveillé 02600 Villers-Cotterêts</li>
                        <li>info@retztacticalgames.com</li>
                        <li>06.73.47.28.06</li>
                        <li>09.88.66.27.55</li>
                    </ul>
                </div>
                <div class="col-md-4 ml-auto mr-auto my-auto" id="timetables">
                    <ul>
                        <li>Horaires</li>
                        <li>Mardi au Samedi</li>
                        <li>11H00 à 19H00</li>
                    </ul>
                </div>
                <div class="col-md-2 ml-auto mr-auto my-auto">
                    <img class="img-fluid" alt="icone Facebook" title="Facebook" src="assets/img/facebook.png" id="facebook"/>
                    <img class="img-fluid" alt="icone Instagram" title="Instagram" src="assets/img/insta.png" id="instagram" />
                </div>                    
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>