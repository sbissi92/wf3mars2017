// Créer une fonction sans paramètre
function helloWorld(){

    // Ecrire le code à exécuter à l'appel de la fonction
    console.log('Bonjour le monde');

};

// Appler la fonction
helloWorld();


// Créer une fonction avec paramètres
function fullName( firstName, lastName ){
    
    console.log('Salut ' + firstName + ' ' + lastName);

};

// Appeler la fonction en précisant les paramètres
fullName( 'Paul', 'Waters' );
fullName( 'Julien', 'Noyer' );
fullName( 'Thomas', 'Smith' );

