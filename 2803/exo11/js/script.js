// creer une application pour calculer une moyenne
//  l'utilisateur a la possibilité d'ajouter autant de notes qu'il le souhaite
// lorsqu'il le souhaite il peut calculer la moyenne des notes



// variavbles globales
 var notesArray = []; 
 var noteAmount = 0;

//  fonctions
function addNote(){
    // demander à lutilisateur d'ajouter une note 
    var newNote = prompt('ajouter une note de o à 20');
    // convertir newNote en variable de type number
    // ajouter le note dans le tableau
    notesArray.push( +newNote );
    
    console.log(notesArray);
    // additionner notesamount et newNote
    noteAmount += +newNote;
    console.log( noteAmount )
};
// fonction pour calculer une moyenne
function average(){
    // la somme de toutes les notes divisée par le nombre de note
    var averageNote = noteAmount / notesArray.length

    // arrondir le résultat
    var roundAverage = Math.round( averageNote );
    console.log('la moyenne est de' + roundAverage + '/20' );
    };

