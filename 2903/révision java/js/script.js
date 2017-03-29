// creer un tableau contenant 4 index
// 1 string
// 1 Number
// 2 booleans différents
// afficher le tableau dans la console
var monTab = [ 'bonjour mimi', 1992, true, false ];
console.log(monTab);

// ajouter un string dans le tableau.
// afficher le tableau dans la console.

monTab.push('hello world');
console.log( monTab );

// afficher dans la console la taille du tableau
// afficher  le premier et le dernier index du tableau dans la console
console.log(monTab.length);
console.log( monTab[0] +' '+ monTab[4] );

// creer un objet contenant 3 propriétés
// 1 le tableau
// 1 prénom
// 1age
// afficher l'objet dans la console

var monObjet = {
    tableau : monTab,
    firstName : 'mariem',
    age : 24,
};
console.log(monObjet);

// afficher toutes les propriétés de l'objet dans la console

console.log( monObjet.tableau );
console.log( monObjet.firstName );
console.log( monObjet.age );

// modifier la propriété age de l'objet et afficher l'objet dans la console

monObjet.age = 25;
console.log( monObjet );