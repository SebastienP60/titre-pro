<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/darkly/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <title> Magasin Air-soft / Paintball Retz Airsoft Shop</title>
</head>
<body>
  <div class="container-fluid" id="banner">
    <div class="row">  <!--début de la rangée principale-->
      <div class="col-lg-2"> <!-- colonne pour le logo-->
        <a href="#"><img id="logo" class="img-fluid" src="assets/img/logoRASNegatif.jpg" alt="Logo du site" title="Logo du site"/></a>
      </div>
        <div class="col-lg-10"> <!--colonne pour inclure les rangées secondaires-->
          <div class="row mt-4">  <!--1ère rangée secondaire pour différents liens-->
            <div class="col-lg-4" id="search"> <!-- colonne pour la barre de recherche-->
              <form class="form-inline my-2 my-lg-0">
                <div class="form-row">
                  <div class="form-group col-10">
                    <input class="form-control " type="text" placeholder="rechercher">
                  </div>
                  <div class="form-group col-2">  
                    <button class="btn btn-secondary " type="submit"><i class="fas fa-binoculars"></i></button>
                </div>
              </div>
            </form>
            </div>
              <div class="col-lg-2">  <!-- colonne pour le logo panier-->
                <a href="panier.php"><i class="fas fa-shopping-basket fa-3x" id="shoppingCart" alt="logo panier"></i></a>
              </div>
                <div class="col-lg-4" id="gameLink">  <!--colonne pour le texte de lien vers le terrain-->
                  <p>Avant de vous lancer dans l'aventure venez nous retrouver sur notre <a href="https://retztacticalgames.com/fr"> terrain de jeu</a></p>
                </div>  
                  <div class="col-lg-2">  <!--colonne pour le lien de connection-->
                    <a class="btn btn-account text-white" href="inscription.php"><i class="far fa-user fa-2x" id="connect"></i></a>
                  </div>
          </div>
          <div class="row">  <!--2ème rangée secondaire pour la barre de navigation-->
            <div class="col-lg-12">  <!--colonne pour la barre de navigation-->
              <!--Début barre de navigation-->
              <nav class="navbar navbar-expand-md navbar-dark sticky-top">
              <!--Bouton et icone du menu pour la version mobile-->
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <i class="fas fa-shopping-basket fa-3x" id="iconCart"></i>
                  <i class="far fa-user fa-2x" id="iconAccount"></i>
                  <!--Intégration du bloc navbar-collapse-->
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!--Création de la liste non ordonnée de tous les liens et sous-menus-->
                    <ul class="navbar-nav mr-auto container-fluid">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarReplicate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Répliques
                        </a>
                          <ul class="dropdown-menu">
                            <li class="nav-item dropdown-submenu dropdown">
                                <a class="nav-link dropdown-toggle navDropdown" id="navbarGunReplicate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Répliques de poing
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarGunReplicate" id="submenuGunReplicate">
                                        <li><a class="dropdown-item" href="armes-de-poing.php">Répliques de poing</a></li>
                                        <li><a class="dropdown-item" href="#">Répliques à gaz</a></li>
                                        <li><a class="dropdown-item" href="#">Répliques CO2</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown-submenu">
                                <a class="nav-link dropdown-toggle navDropdown" id="navbarLongReplicate" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Répliques longues
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarLongReplicate" id="submenuLongReplicate">
                                    <li><a class="dropdown-item" href="armes-longues.php">Répliques longues</a></li>
                                    <li><a class="dropdown-item" href="#">Répliques à ressort</a></li>
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
                            <li class="nav-item dropdown-submenu dropdown">
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
            </div>
          </div>
        </div>
    </div>
  </div>  
  <div class="container-fluid">

  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>