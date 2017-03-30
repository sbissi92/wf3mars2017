// creer un tableau contenant 4 titres
var myArray = [ 'acceuil', 'about', 'portfolio', 'contacts' ]

// faire boucle sur le tableau
for( var i = 0; i< myArray.length; i++ ){
    
}










// selectionner la balise dans laquelle on ajoute une autre balise
var myMain = document.querySelector('main');

// creer une variable pour générer une balise  html
var myNewTag = document.createElement('h2');

// ajouter du contenu dans la balise générée
myNewTag.innerHTML = 'je suis un <i>titre</i>';
// ajouter un enfant dans myMain
myMain.appendChild( myNewTag );