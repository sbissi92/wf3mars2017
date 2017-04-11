// fonction d'attente du chargement du dom
$(document).ready( function(){



// changement de l'image au choix de l'utilisateur

    $("#myImage").change(function(){
        console.log($(this).val());
       $("#myChoice").attr('src',$(this).val());
    });



//  suppression de la classe error
    $('select, textarea').focus(function(){
     $(this).removeClass('error');
    });



// vérification de la soumission du formulaire
         $('form').submit(function(event){
               event.preventDefault();


        
// déclaration des variables
         var userChoice= $('select');
         var userMessage= $('textarea');
         var formScore = 0;



// vérification du formulaire
         if (userChoice.val()=="null"){
             console.log('il faut choisir un chat');
             userChoice.addClass('error');

               }else{
                   console.log('chat choisi');
                   formScore++;
               };

         if(userMessage.val().length <15){
             console.log('minimum 15 caractéres');
              userMessage.addClass('error');
         }else{
             console.log('message validé');
             formScore++;
         };
          



        //   validation finale 
         if(formScore == 2){
                console.log('le formulaire est validé !');



                // vide les champs lors de la validation du formiulaire
                $('form')[0].reset();
         };

      });





























































    
    });