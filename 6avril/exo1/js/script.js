// Attendre le chargement du DOM
$(document).ready(function(){

    // Créer une fonction pour l'animation d'une compétence
    function mySkills( paramEq, paramWidth ){

        // Animation des balise p des skils
        $('h3 + ul').children('li').eq(paramEq).find('p').animate({
            width: paramWidth
        });
        
    };

    // Créer une fonction pour ouvrir la modal
    function openModal(){

        // Ouvrir la modal au click sur les boutons
        $('button').click(function(){

            console.log( $(this).prev().text() );

            // afficher l'image du proget
            console.log( $(this).parent().prev().attr('src') );

            $('#modal').fadeIn();
        });

        // Fermer la modal au click sur .fa-times
        $('.fa-times').click(function(){
            $('#modal').fadeOut();
        });

    };

    // creer une fonction npour la gestion du formulaire
    function contactForm(){
    //    capter les focus sur les inputs
    $('input').focus(function(){

        console.log($(this));

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

            // Créer une variable pour récupérer la valeur de l'attribut href
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

                        // Vérifier si l'utilisateur est sur la page portfolio.html
                        if( viewToLoad == 'portfolio.html' ){

                            // Appeler la fonction pouur ouvrir la modal
                            openModal();

                        };

                    });

                });

            });

        });

}); // Fin de la fonction d'attente de chargement du DOM