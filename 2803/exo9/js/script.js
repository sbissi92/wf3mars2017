var user = 'julien';

//creer une variable de type array(tableau)

var myArray = ['du texte', 19776, true, user ];
// afficher le tableau dans la console
console.log(myArray);
// afficher la taille du tableau(taille= nombre d'index);
console.log( 'la taille du tableau est : ' + myArray.length );

// afficher un des index du tableau
console.log( myArray[0] ); 
console.log( myArray[2] );
// ajouter un index dans le tableau
myArray.push('une valeur en plus');
console.log( myArray);

// supprimer et remplacer des index du tableau
myArray.splice( 2, 1);
console.log( myArray );