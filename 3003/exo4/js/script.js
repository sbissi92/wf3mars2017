// ajouter une class à une balise
var myTitle = document.querySelector('h1');

// ajouter une class à la balise h1
myTitle .classList.add('error');
// selectionner la derniére balise p
var myLastP = document.querySelector('p:last-of-type');
// supprimer la class hidden
myLastP.classList.remove('hidden');


// selectionner la balise button
 var myButton = document.querySelector('button');

//  selectionner la premiére balise h2
var myFirstH2 = document.querySelector('h2');

//  capter le clique sur le bouton
myButton.onclick = function(){

//    ajouter ou supprimer la class move sur la premiére balise h2
myFirstH2.classList.toggle('move');
};