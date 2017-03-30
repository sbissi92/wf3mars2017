// creer un tableau contenant 4 prénoms
// faire une boucle sur le tableau pour saluer dans la console chaque prénoms
// afficher un message spécial pour votre prénom (ex.salut c'et mariem)

var names = [ 'mariem', 'aline', 'robert', 'julien' ];
console.log( names );

for( var i = 0; i < names.length; i++ ){
    
    if ( names[i] == 'mariem' ){
         console.log( 'salut c\'est moi' );
        //  pour modifier une balise html
        document.querySelector('p').textContent ="salut c'est moi";
    }else{
        console.log( 'salut' + names[i] );
    }

    
    console.log( 'salut' + ' ' + names[i]);
};

