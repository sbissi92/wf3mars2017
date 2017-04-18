// Attendre le chargement du DOM
$(document).ready(function(){

    // Créer une fonction pour l'animation d'une compétences
    function mySkills( paramEq, paramWidth){

        console.log( $('h3 + ul') );

        // animation des balises p des mySkills
        $('h3 + ul').children('li').eq(paramEq).find('p').animate({
            width: paramWidth
        });

    };


    // Charger le contenu de home.html dans le main
    $('main').load( 'views/home.html' );
            


    /*
    BurgerMenu
    */
        // Burger menu : ouverture
        $('h1 + a').click(function(evt){

            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();

            // Appliquer la fonction slideToggle sur la nav
            $('nav').slideToggle();

        });

        // Burger menu : navigation
        $('nav a').click(function(evt){

            // Bloquer le comportement naturel de la balise A
            evt.preventDefault();

            // Masquer le main
            $('main').fadeOut();

            var viewToLoad = $(this).attr('href');

            // Fermer le burger menu
            $('nav').slideUp(function(){

                // Charger la bonne vue puis afficher le main (callBack)
                $('main').load( 'views/' + viewToLoad, function(){

                    $('main').fadeIn(function(){

                        // Vérifier si l'utilisateur veut voir la page about.html
                        if( viewToLoad == 'about.html' ){

                            // Appler le fonction mySkills
                            mySkills( 0, '84%' );
                             mySkills( 1, '25%' );
                              mySkills( 2, '50%' );
                            
                        };

                    });

                });

            });

        });



     



}); // Fin de la fonction d'attente de chargement du DOM