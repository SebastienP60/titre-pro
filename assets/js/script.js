$(document).ready(function(){
    $('.dropdown-submenu a.navDropdown').on("click", function(e){
      /*$('.dropdown-menu').toggle();*/
      $(this).next('ul').toggle();
      e.stopPropagation();
      e.preventDefault();
    });
  });
  
  /*$(function() {
    $('#"navbarLongReplicate').change(function(){
        $('navbarGunReplicate').hide(); 
           });
});*/
  /*$(document).on('click', '.dropdown-menu', function (e) {
    e.stopPropagation();
  });*/
