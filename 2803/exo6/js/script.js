// programme pour saluer un utilisateur et afficher son année de naissance
//  -demander le nom et prénom de l'utilisateur
// - saluer en disant :bonjour prenom nom
// -demander l'age de l'utilisateur 
// -afficher l'année de naissance



// demander le nom et prénom
var firstName = prompt('quel est ton prénom');
var lastName = prompt('quel est ton nom');

//  saluer en disant bonjour
console.log('bonjour' + firstName + ' ' + lastName);

// demander l'age
var age = prompt('quel est ton age ?');
console.log(age);

// afficher l'année de naissance
var currentYear = 2017;
console.log('ton année de naissance est ' + (currentYear - age) );
