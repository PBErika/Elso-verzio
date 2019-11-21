
$( document ).ready(function() {
  $('.hir-doboz .hir-cim').click( function() {
    $( this ).toggleClass('opened');
    $( this ).siblings('.hir-szoveg-doboz').toggle('slow');
  });
});
