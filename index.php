<?php
include 'header.php';
include 'tables.php';
include 'models/categoriesname.php';
include 'controllers/headerController.php';
/* $types = array('Armes de poing', 'Armes longues'); */
$armesdepoing = array('Répliques à ressorts', 'Répliques à gaz');
?>
    <div class="container text-center">
        <h1>Notre histoire</h1>
        <p id="historyShop">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>
    <div class="container" id="principalPage">
        <h2 class="text-center">Nos produits du moment</h2>                
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top" src="assets/img/A69987-2.jpg" alt="Bas de masque" title="Bas de masque" />
                    <div class="card-body">
                        <h5 class="card-title">Bas de masque</h5>
                            <p class="card-text">Bas de masque grillage v1 - olive 21€</p>
                            <p class="card-text">21€ TTC</p>
                            <a href="#" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="assets/img/PR2004.jpg" alt="Pistolet à ressort" title="Pistolet à ressort" />
                    <div class="card-body">
                        <h5 class="card-title">Pistolet à ressort H&K</h5>
                            <p class="card-text">Réplique pistolet à ressort H&K VP9 HME Culasse métal 0,5J</p>
                            <p class="card-text">44€ TTC</p>
                            <a href="#" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="assets/img/BB3313.jpg" alt="Bouteille de billes" title="Bouteille de billes" />
                    <div class="card-body">
                        <h5 class="card-title">Billes BIO</h5>
                            <p class="card-text">Billes BIO 0.30g x 5100 en bouteille</p>
                            <p class="card-text">22,20€ TTC</p>
                            <a href="#" class="btn btn-primary">En savoir plus</a>
                    </div>
                </div> 
            </div>   
    </div>
<?php
include 'footer.php';
?>
