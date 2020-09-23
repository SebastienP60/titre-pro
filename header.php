<?php
include 'controllers/headerController.php';
?>
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
<?php if(isset($_SESSION['profil']['id_ahl115_roles']) && $_SESSION['profil']['id_ahl115_roles'] == 1){?>
  <div class="container-fluid sticky-top" id="bannerAdmin">
    <div class="row">
      <div class="col-lg-12">
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top"> 
        <img id="logo" class="img-fluid" src="assets/img/logoRASNegatif.jpg" alt="Logo du site" title="Logo du site"/></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarAdmin" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav mr-auto container-fluid">
              <li class="nav-item">
                <a class="nav-link" href="addProduct.php">Ajouter un produit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Liste des produits</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Liste clients</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?action=disconnect">Se déconnecter</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>  
    </div>
  </div>      
<?php } else { ?>
  <div class="container-fluid sticky-top" id="banner">
    <div class="row">  <!--début de la rangée principale-->
      <div class="col-lg-2"> <!-- colonne pour le logo-->
        <a href="index.php"><img id="logo" class="img-fluid" src="assets/img/logoRASNegatif.jpg" alt="Logo du site" title="Logo du site"/></a>
      </div>
        <div class="col-lg-10"> <!--colonne pour inclure les rangées secondaires-->
          <div class="row mt-4">  <!--1ère rangée secondaire pour différents liens-->
            <div class="col-lg-4" id="search"> <!-- colonne pour la barre de recherche-->
              <form class="form-inline my-2 my-0" method="GET" action="listProductsForUsers.php">
                <div class="input-group">
                  <input class="form-control m-0" name="find" type="text" value="" placeholder="rechercher/référence">
                  <div class="input-group-append">  
                    <button class="btn btn-secondary" type="submit"><i class="fas fa-binoculars"></i></button>
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
                  <div id="column"class="col-lg-2">  <!--colonne pour le lien de connection-->
                    <?php if(!isset($_SESSION['profil']['lastname'])){?> <!--On est pas connecté-->
                    <a class="btn btn-account text-white" href="connection.php"><i class="far fa-user fa-2x" id="connect"></i></a>                  
                    <?php }else{ ?>
                      <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,100"><i class="fas fa-user fa-2x" id="isConnect"></i></button>
                        <div class="dropdown-menu" id="dropIcone" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="profile.php">Mon Compte</a>
                          <a class="dropdown-item" href="userBasket.php">Mon panier</a>
                          <a class="dropdown-item" href="?action=disconnect">Déconnexion</a>
                        </div>
                      </div>  
                    <?php  } ?>
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
                  <a href="panier.php"> <i class="fas fa-shopping-basket fa-3x" id="iconCart"></i></a>
                  <?php if(!isset($_SESSION['profil']['lastname'])){?> <!--On est pas connecté-->
                    <a class="btn btn-account text-white" href="connection.php"><i class="far fa-user fa-2x" id="iconAccount"></i></a>                  
                    <?php }else{ ?>
                      <div class="dropdown" id="iconAccount">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,100"><i class="fas fa-user fa-2x"></i></button>
                        <div class="dropdown-menu" id="dropIcone" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="profile.php">Mon profil</a>
                          <a class="dropdown-item" href="userBasket.php">Mon panier</a>
                          <a class="dropdown-item" href="?action=disconnect">Déconnexion</a>
                        </div>
                      </div>  
                    <?php  } ?>                  
                    <!--Intégration du bloc navbar-collapse-->
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!--Création de la liste non ordonnée de tous les liens et sous-menus-->
                    <ul class="navbar-nav mr-auto container-fluid">
                      <li class=" nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicate" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Réplique
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicate">
                            <a class="dropdown-item" href="listProductsForUsers.php?t=1">Répliques de poing</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=2">Réplique longues</a>
                        </div>
                      </li>
                      <li class=" nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="accessories" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Accessoires
                        </a>
                        <div class="dropdown-menu" aria-labelledby="accessories">
                            <a class="dropdown-item" href="listProductsForUsers.php?t=3">Accessoires</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=4">Chargeurs</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=5">Cibleries</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=6">Lunettes/Optiques</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=7">Silencieux/Cache flamme</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=8">Bipieds</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=9">Lampes</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=10">Rails picatinny/ Weaver</a>
                        </div>
                      </li>
                      <li class=" nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicateConsumable" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Consommable
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicateConsumable">
                            <a class="dropdown-item" href="listProductsForUsers.php?t=11">Billes</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=13">Gaz et CO2</a>
                        </div>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicateEquipment" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Équipements
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicateEquipment">
                            <a class="dropdown-item" href="listProductsForUsers.php?t=14">Protections</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=16">Sangles</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=17">Holsters</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=18">Poches molles</a>
                            <a class="dropdown-item" href="listProductsForUsers.php?t=19">Gilets tactiques</a>
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
                      <!-- <li class=" nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="replicatePaintball" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Paintball
                        </a>
                        <div class="dropdown-menu" aria-labelledby="replicatePaintball">
                            <a class="dropdown-item" href="#">Paintball</a>
                        </div>
                      </li> -->
                    </ul>
                  </div>
              </nav>
            </div>
          </div>
        </div>
    </div>
  </div>
<?php } ?>

  <div class="container-fluid">
