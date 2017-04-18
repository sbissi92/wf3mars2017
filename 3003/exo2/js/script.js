// // ajouterr une balise html dans le dom 
// sélectionner le document
// appliquer la fonction write
// ajouter le contenu

document.write('<p>je suis généré en java script</p>');

var names = [ 'pierre', 'paul', 'jacques' ];
for(var i = 0; i<names.length;  i++ ){
    document.write('<p>salut' + names[i] + '</p>' );
}                                                       