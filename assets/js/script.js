//  $(document).ready(function(){
//      $('.dropdown-submenu a.navDropdown').on("click", function(e){
//       /*$('.dropdown-menu').toggle();*/
//       $(this).next('ul').toggle();
//       e.stopPropagation();
//        e.preventDefault();
//      });
//   });


//jquery pour affichage menus déroulants à plusieurs niveaux
  $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
      }
      var $subMenu = $(this).next('.dropdown-menu');
      $subMenu.toggleClass('show');
      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
          $('.dropdown-submenu .show').removeClass('show');
      });
      return false;
  });

  //On crée une fonction qui sera appelée au changement du select (quand on clique sur une option)
  function choiceCategory(firstSelectElement, secondSelectId){
    //Instanciation de l'objet XMLHttpRequest permettant de faire de l'AJAX
    var request = new XMLHttpRequest();
    //Les données sont envoyés en POST et c'est le controlleur qui va les traiter
    request.open('POST', '../../controllers/productsController.php', true);
    //Au changement d'état de la demande d'AJAX
    request.onreadystatechange = function () {
        //Si on a bien fini de recevoir la réponse de PHP (4) et que le code retour HTTP est ok (200)
        if (request.readyState == 4 && request.status == 200) {
            let response = JSON.parse(request.responseText);
            //ici 
            let filledSelect = document.getElementById(secondSelectId);
            for(let element of response){
                let option = document.createElement('option');
                option.text = element.name;
                option.value = element.id;
                filledSelect.add(option);
            }
        };        
    }
    // Pour dire au serveur qu'il y a des données en POST à lire dans le corps
    request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    //Les données envoyées en POST. Elles sont séparées par un &
    request.send('idFirstSelect=' + firstSelectElement.value + '&secondSelect=' + secondSelectId);
}