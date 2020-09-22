//  $(document).ready(function(){
//      $('.dropdown-submenu a.navDropdown').on("click", function(e){
//       /*$('.dropdown-menu').toggle();*/
//       $(this).next('ul').toggle();
//       e.stopPropagation();
//        e.preventDefault();
//      });
//   });


//jquery pour affichage menus déroulants à plusieurs niveaux
/*   $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
      }
      var $subMenu = $(this).next('.dropdown-menu');
      $subMenu.toggleClass('show');
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
          $('.dropdown-submenu .show').removeClass('show');
      });
      return false;
  }); */
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

$('#deleteProduct').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Bouton qui déclenche la fenêtre modal
    var recipient = button.data('delete') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-footer input').val(recipient)
  })

  tinymce.init({
      selector: '#descriptionMCE'
  })