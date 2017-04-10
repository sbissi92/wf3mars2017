$(document).ready( function(){

// fermer la modal
$('.fa-times').click(function(){
    $('div').fadeOut();
});
// supprimer les class error
 $('input,select, textarea').focus(function(){
     $(this).removeClass('error');
 });
    // capter la soumission du formulaire
 $('form').submit(function(event){
    //  bloquer le comportement naturel du formulaire
    event.preventDefault();

    // définir les variables globales
    var userName= $('[type="text"]');
    var userEmail= $('[type="email"]');
    var userSubject= $('select');
    var userMessage= $('textarea');
    var formScore = 0;

    // vérifier que l'utilisateur a bien saisi son nom

    if ($('[type="text"]').val().length < 4){
        // ajouter la class error dans l'input
        userName.addClass('error');
        
    }else {
        
        // incrémenter la valeur de la variable formScore
        formScore++;
    };



    if ($('[type="email"]').val().length < 9){
         // ajouter la class error dans l'input
        userName.addClass('error');
        
    }else {
       
        // incrémenter la valeur de la variable formScore
        formScore++;
    };



    if ($('select').val()=="null"){
        // ajouter la class error dans l'input
        userName.addClass('error');
        
    }else{
        
        // incrémenter la valeur de la variable formScore
        formScore++;

    };
        


    if ($('textarea').val().length < 15){
         // ajouter la class error dans l'input
        userName.addClass('error');
        
    }else if ($('textarea').val().length > 70){
        
    }else{
       
        // incrémenter la valeur de la variable formScore
        formScore++;
    };
    
    // validation finale du formulaire
    if(formScore == 4){
        console.log('le formulaire est validé !');
    };

    // envoi des données dans le fichier de traitement PHP
    // PHP répond true==> continuer le traitement du formulaire


    // afficher les données du formulaire dans une modal

    $('div span').text(userName.val() );
    $('div b').text(userSubject.val() );
    $('div p:last').text(userMessage.val() );

    // afficher la modal
    $('div').fadeIn();

    // vider les champs du formulaire
    $('form')[0].reset();

    userEmail.val('');



});























    });






























