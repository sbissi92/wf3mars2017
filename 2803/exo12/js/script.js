// creer une variable de type objet
var user = {
    firstName: 'mariem',
    lastName: 'sbissi',
    // ajouter une fonction pour afficher le nom complet
    fullName: function(){
        console.log( this.firstName + ' ' + this.lastName );
    }
} ;
// afficher l'objet
console.log(user);
// afficher une propriété de l'objet
console.log( user.firstName);
// modifier la valeur d'une propriété de l'objet
user.lastName = 'Marley';
console.log(user);
// appeler la fonction de l'objet
user.fullName();

