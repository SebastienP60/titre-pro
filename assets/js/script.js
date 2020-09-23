  //AJAX
  //On crée une fonction qui sera appelée au changement du select (quand on clique sur une option)
  function choiceCategory(firstSelectElement, secondSelectId){
    //Instanciation de l'objet XMLHttpRequest permettant de faire de l'AJAX
    var request = new XMLHttpRequest();
    //Les données sont envoyés en POST et c'est le controlleur qui va les traiter
    request.open('POST', '../../controllers/addProductsController.php', true);
    //Au changement d'état de la demande d'AJAX
    request.onreadystatechange = function() {
        //Si on a bien fini de recevoir la réponse de PHP (4) et que le code retour HTTP est ok (200)
        if (request.readyState == 4 && request.status == 200) {
            let response = JSON.parse(request.responseText);
            let filledSelect = document.getElementById(secondSelectId);
            filledSelect.length = 1; //remise à zéro du select
            filledSelect.options[0].removeAttribute('disabled');
            filledSelect.options[0].setAttribute('selected','selected');
            for(let element of response){
                let option = document.createElement('option');
                option.text = element.name;
                option.value = element.id;
                filledSelect.add(option);
            }
            filledSelect.options[0].setAttribute('disabled','disabled');
        };        
    }
    // Pour dire au serveur qu'il y a des données en POST à lire dans le corps
    request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    //Les données envoyées en POST. Elles sont séparées par un &
    
    request.send('idFirstSelect=' + firstSelectElement.value + '&secondSelect=' + secondSelectId);
}


//Jquery pour déclenchement fenêtre modale
$('#deleteProduct').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Bouton qui déclenche la fenêtre modal
    var recipient = button.data('delete') // Extract info from data-* attributes
    //Mise à jour du contenu de la modale. 
    var modal = $(this)
    modal.find('.modal-footer input').val(recipient)
  })

//Js pour WYSIWYG (What you see is what you get)
  tinymce.init({
      selector: '#descriptionMCE'
  })

//Fonction pour afficher le champ énergie en sélectionnant la sous-catégorie réplique
function showEnergy(select){
  var value = select.value;
  var energy = document.getElementById('energy');
  var energyLabel = document.getElementById('energyLabel');
  if(value == 1){
    energyLabel.style.display = "block";
    energy.style.display = "block";
  } else {
    energyLabel.style.display = "none";
    energy.style.display = "none";
  }
}
function showElements(select, firstSelectElement, secondSelectId){
  showEnergy(select);
  choiceCategory(firstSelectElement, secondSelectId);
}