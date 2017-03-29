
// creer une fonction qui permet à l'utilisateur de choisir une couleur

function chooseColor(){
    // demander à l'utilisateur de choisir une couleur
    var userPrompt = prompt('choisir une couleur entre rouge,vert et bleu');

// assigner la valeur de userPrompt à userChoice
userChoice = userPrompt;
console.log( userChoice );

// appeler la fonction de traduction
  translateColor( 'bleu' );
};

// creer une fonction pour traduire les couleurs
function translateColor( paramColor ){

    // utilisation des switch
    switch(paramcolor){

        //  1er cas :paramColor est égale à 'rouge'
        case 'rouge': console.log('rouge = red');break;

        // 2éme cas :paramColor est égale à 'vert'
        case 'vert' : console.log('vert = green');break;

        // 3éme cas :paramColor est égale à 'bleu'
        case 'bleu' : console.log('je ne connais pas cette couleur');break;

        //  pour tous les autres cas : default est obligatoire
        default : console.log('je ne connais pas cette couleur');break;
    }

  };