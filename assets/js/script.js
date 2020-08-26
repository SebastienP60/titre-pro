//  $(document).ready(function(){
//      $('.dropdown-submenu a.navDropdown').on("click", function(e){
//       /*$('.dropdown-menu').toggle();*/
//       $(this).next('ul').toggle();
//       e.stopPropagation();
//        e.preventDefault();
//      });
//   });

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




  /* Si le sous menu réplique de poing est affiché
 quand je clique sur le sous menu réplique longues il s'affiche 
 et le sous menu réplique de poing se ferme*/

