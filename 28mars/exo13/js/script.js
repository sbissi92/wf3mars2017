// Créer un type d'objet pour en faire des déclinaisons
function CarType( paramDoors, paramColor, paramBrand, paramGear ){

    // des portes, une couleur, marque, boite de vitesses
    this.doors = paramDoors;
    this.color = paramColor;
    this.brand = paramBrand;
    this.gear = paramGear;

};

// Ajouter une fonction au type d'objet CarType
CarType.prototype.welcome = function(){

    console.log( 'Boujour, je suis une ' + this.brand + ', je possède ' + this.doors + ' portes et ' + this.gear + ' vitesses et je suis de couleur ' + this.color );

};




// Créer une déclinaison de CarType
var fiat = new CarType( 3, 'Rouge', 'Fiat', 4 );
console.log( fiat );
// Appeler la fonction
fiat.welcome();

var hummer = new CarType( 5, 'Noir', 'American Dream', 8 );
console.log( hummer );
// Appeler la fonction
hummer.welcome();