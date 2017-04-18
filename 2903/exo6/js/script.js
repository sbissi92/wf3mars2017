// le chifoumy: jeu: l'utilisateur doit choisir entre pierre feuille et ciseaux
// l'ordinateur doit choisir entre......
//  nous comparons le choix de lutilisateur et de lordinateur
// selon le résultat lutilisateur a gagné ou lordinateur a gagné
// une partie se joue en 3 manches gagnantes



// variable globale pour le choix de l'utilisateur 
var userBet = '';


//   l'utilisateur doit choisir entre pierre feuille et ciseaux
// creer une fonction qui prend en parametres le choix de lutilisateur
// appeler la fonction au clique sur les buttons du dom
// afficher le résultat dans la console

function userChoice( paramChoice ){

    
    // assigner à la variable userBet la valeur de paramChoice
    userBet = paramChoice;
};

// l'ordinateur doit choisir entre......
// faire une fonction pour déclencher le choix au clique sur le boutton
// creer un tableau contenant 'pierre' feuille et ciseaux 
// faire en sorte de choisir aléatoirement l'un de 3 index du tableau
// afficher le résultat dans la console

function computerChoice(){
    var computerMemory = [ 'pierre', 'feuille', 'ciseaux' ];
    console.log( userBet );
    // choisir aléatoirement l'un de 3 index du tableau
    var computerBet = computerMemory[Math.floor(Math.random() * computerMemory.length)];
    console.log( 'computer : ' + computerBet );



    // afficher  les deux choix de la balise h2 
    document.querySelector('h2').textContent = userBet + ' vs. ' + computerBet;

    // vérifier si userBet est vide
    if( userBet == ''){
       document.querySelector('h2').textContent = userBet + ' <b>vs.</b>' + computerBet;

    }

    






    // comparer les variables

    if( userBet == computerBet ){
        console.log('égalité');
        
        document.querySelector('p').textContent = 'egalité';

    } else if( userBet == 'pierre' && computerBet == 'ciseaux' ){

        document.querySelector('p').textContent = 'gagné';
       
    } else if( userBet == 'feuille' && computerBet == 'pierre' ){

        document.querySelector('p').textContent = 'gagné';

    } else if( userBet == 'ciseaux' && computerBet == 'feuille' ){

        document.querySelector('p').textContent = 'gagné';

    }else{
       document.querySelector('p').textContent = 'perdu';
    }
};

// afficher les valeurs de computerWin et userWin dans la console
