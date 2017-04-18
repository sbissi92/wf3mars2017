// les conditions 

// demander à l'utilisateur de choisir une couleur entre rouge vert et bleu

var userChoice = prompt('choisir une couleur entre rouge, vert et bleu');
console.log( userChoice );

// si userChoice est égale à 'rouge'
if ( userChoice == 'rouge' ){
    console.log('rouge ce dit red en anglais');
} else if ( userChoice== 'bleu' ){
    //  si userchoice est égale à bleu 
    console.log('bleu ce dit blue en anglais');

} else if ( userChoice== 'vert' ){
    //  si userchoice est égale à vert 
    console.log('vert ce dit green en anglais');
} else {
    // dans tous les autres cas
    console.log('je ne connais pas cette couleur...');
}


