$(document).ready(function(){
    console.log('dom ok');

    // capter le click sur le premier bouton
    $('button:first').click(function(){
        // charger le fichier home.html dans le main
        $('main').load('views/home.html');
    });
});