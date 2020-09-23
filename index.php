<?php
session_start();
include 'config.php';
include 'controllers/headerController.php';
include 'header.php';
?>
    <div class="container text-center mt-5">
        <h1>Notre histoire</h1>
        <p id="history">Notre boutique se situe dans le département de l'Aisne(02), et plus particulièrement dans la commune de Villers-Cotterêts. Toute notre équipe est à votre écoute et saura vous renseigner afin de vous équiper des meilleurs produits pour la pratique du Airsoft ou du Paintball en toute sécurité. Pour vous satisfaire nous vous mettons à disposition une salle pour tester vos armes avant un achat. Vous trouverez dans notre magasin un grand choix de répliques en tout genre ainsi que de l'équipement et de nombreux consommables. Nous espérons vous voir prochainement dans notre boutique ou sur notre terrain afin de pratiquer ensemble ce sport.</p>
    </div>
    <div class="container" id="cardContainer">
        <h2 class="text-center mt-5 mb-5" id="indexProduct">Nos produits du moment</h2>                
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="assets/img/A69987-2.jpg" alt="Bas de masque" title="Bas de masque" />
                    <div class="card-body">
                        <h5 class="card-title">Bas de masque</h5>
                            <p class="card-text">Bas de masque grillage v1 - olive 21€</p>
                            <p class="card-text">21€ TTC</p>
                            <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="assets/img/PR2004.jpg" alt="Pistolet à ressort" title="Pistolet à ressort" />
                    <div class="card-body">
                        <h5 class="card-title">Pistolet à ressort H&K</h5>
                            <p class="card-text">Réplique pistolet à ressort H&K VP9 HME Culasse métal 0,5J</p>
                            <p class="card-text">44€ TTC</p>
                            <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="assets/img/BB3313.jpg" alt="Bouteille de billes" title="Bouteille de billes" />
                    <div class="card-body">
                        <h5 class="card-title">Billes BIO</h5>
                            <p class="card-text">Billes BIO 0.30g x 5100 en bouteille</p>
                            <p class="card-text">22,20€ TTC</p>
                            <a href="#" class="btn btn-success">En savoir plus</a>
                    </div>
                </div> 
            </div>   
    </div>
<?php
include 'footer.php';
?>
