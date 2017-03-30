// capter l'événement ready pour y ajouter une fonction de callback(attendre le chargement du DOM)
$(document).ready(function(){

// capter l'événement focus sur le textarea
$('textarea').focus(function(){
  console.log('minimum 10 caractéres');

});




});