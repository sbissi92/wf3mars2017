// attendre le chargement du DOM
$(document).ready(function(){


    // code à exécuter sur la page une fois chargé

    // le deathSelector

    var deathSelector = $('h3')
    console.log('balise selectionnée :')


    // les selecteurs jquery"classiques"



    // selection dune balise pour son nom(tag)
    var myHtmlTag = $('header');
    console.log( myHtmlTag);

    // selectionner une balise par sa class
    var myClass = $('.myClass');
    console.log( myClass );

    // selectionner une des balise par son id
    var myId = $('#myId');
    console.log( myId );

    // selecteur imbriqué  
    var myItalic = $('h2 i');
    console.log( myItalic );

    // selecteur css3
    var myFooter = $('body> main + footer');
    console.log( myFooter );



    //  les sélecteurs jquery spécifiques
    //  selecteur d'enfants
    var myChildren = $('header').children('button');
    console.log( myChildren );

    // sélecteur de parent 
    var myParent = $('h2').parent();
    console.log( myParent );

    // rechercher une balise 
    var myH2 = $('main').find('h2');
    console.log( myH2 );

    //  selectionner le premier
    var firstBtn = $('button:first');
    console.log( firstBtn );

    // selectioner le dernier
    var lastBtn = $('button:last');
    console.log( lastBtn );

    // selectionner la nth balise
    var secondLi = $('li').eq(1);
    console.log( secondLi );
    
    // selectionner la balise suivante
    var afterMain = $('main').next();
    console.log( afterMain );

    // selectionner la balise précédente

    var beforeMain = $('main').prev();
    console.log( )




});