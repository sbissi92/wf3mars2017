$(document).ready(function(){
    // burger menu
    $('h1 + a').click(function(evt){
            // bloquer le comportement naturel de la balise a 
            evt.preventDefault();
            // appliquer la fonction  slideToggle sur la nav
            $('nav').slideToggle();
    });

    // burger menu : navigation
    $('nav a').click(function(evt){
        // /BLOQUER LE COMPORTEMENT NATUREL DE LA BALISE A
          evt.preventDefault();
          var linkToOpen = $(this).attr('href');
        //   FERMER LE BURGER menu
        $('nav').slideUp(function(){

            // changer de page
             window.location = linkToOpen;

        });
    });

    $('.aboutPage nav a').click(function(evt){
        evt.preventDefault();
        var linkToOpen = $(this).attr('href');
        $('.aboutPage nav').animate({
            left: '-100%'
        });
    });



    
});