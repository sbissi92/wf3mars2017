// Attendre le chargement du DOM
$(document).ready(function(){

    // creer un tableau vide pour enregistrer les avatarStyleBottomvar 
    myTown = [];

    // Vérifier le genre de l'avatar
        var avatarWoman = $('#avatarWoman');
        var avatarMan = $('#avatarMan');
        var avatarGender;
        
        // => avatarWoman capter le click
        avatarWoman.click(function(){

            // Désactiver avatarMan 
            avatarMan.prop('checked', false);
            
            // Modifier la valeur de avatarGender
            avatarGender = avatarWoman.val(); // => girl

            // Vider le message d'erreur
            $('.labelGender b').text('');

            // Modifier l'attribut src de #avatarBody
            $('#avatarBody').attr('src', 'img/' + avatarGender + '.png')
        });

        // => avatarMan capter le click
        avatarMan.click(function(){

            // Désactiver avatarWoman
            avatarWoman.prop('checked', false);

            // Modifier la valeur de avatarGender
            avatarGender = avatarMan.val(); // => boy

            // Vider le message d'erreur
            $('.labelGender b').text('');

            // Modifier l'attribut src de #avatarBody
            $('#avatarBody').attr('src', 'img/' + avatarGender + '.png')
        });

    
    // Supprimer les messages d'erreur
    $('input, select').focus(function(){

        // Sélectionner la balise précédent le input
        $(this).prev().children('b').text('');

    });


    // Capter l'événement change() sur les selects
    $('select').change(function(){
        // Condition if pour modifier la valeur src de avatarTop ou avatarBottom
        if( $(this).attr('id') == 'avatarStyleTop' ){

            // Modifier la valeur de l'attribut src de #avatarTop
            $('#avatarTop').attr('src', 'img/top/' + $(this).val() + '.png');

        } else{
             // Modifier la valeur de l'attribut src de #avatarBottom
            $('#avatarBottom').attr('src', 'img/bottom/' + $(this).val() + '.png');
        };

    });

    

    // Capter la soumission du formulaire
    $('form').submit(function(evt){

        // Bloquer le comportement par defaut du formulaire
            evt.preventDefault();

        // Définir une variable pour la validation finale du formulaire
        var formScore = 0;


        // Variables globales du formulaire
            var avatarName = $('#avatarName').val();
            var avatarAge = $('#avatarAge').val();
            var avatarStyleTop = $('#avatarStyleTop').val();
            var avatarStyleBottom = $('#avatarStyleBottom').val();


        // Vérifier les champs du formulaire

            // => avatarName minimum 5 caractères
            if( avatarName.length < 5 ){
                // Ajouter un message d'erreur dans le label
                $('[for="avatarName"] b').text('Minimum 5 caractères');

            } else{

                // Incrémenter la variable formScore
                formScore++;

            };

            // => avatarAge entre 1 et 100
            if( avatarAge == 0 || avatarAge > 100 || avatarAge.length == 0 ){
                // Ajouter un message d'erreur dans le label
                $('[for="avatarAge"] b').text('Entre 1 et 100 ans');

            } else{
                // Incrémenter la variable formScore
                formScore++;
            };


            // => avatarStyleTop obligatoire
            if( avatarStyleTop == 'null' ){
                // Ajouter un message d'erreur dans le label
                $('[for="avatarStyleTop"] b').text('Choix obligatoire');

            } else{
                // Incrémenter la variable formScore
                formScore++;
            };

            // => avatarStyleBottom obligatoire
            if( avatarStyleBottom == 'null' ){
                // Ajouter un message d'erreur dans le label
                $('[for="avatarStyleBottom"] b').text('Choix obligatoire');

            } else{
                // Incrémenter la variable formScore
                formScore++;
            };


            // => avatarGender vérifier la valeur
            if( avatarGender == undefined ){
                // Ajouter un message d'erreur dans .labelGender
                $('.labelGender b').text('Choix obligatoire');

            } else{
                // Incrémenter la variable formScore
                formScore++;
            };



        // Validation finale : vérifier la valeur de la variable formScore
            if( formScore == 5 ){
                console.log('Le formulaire est validé !');

                // => Envoyer les données du formulaire et attendre la réponse du server en Ajax
                // => Le server répond true

                    // Ajouter une ligne dans le tableau HTML
                    $('table').append('' + 
                        '<tr>'+
                            '<td><b>' + avatarName + '</b></td>'+
                            '<td>' + avatarAge + ' an(s)</td>'+
                            '<td>' + avatarGender + '</td>'+
                            '<td>' + avatarStyleTop + ', ' + avatarStyleBottom + '</td>'+
                        '</tr>'
                    );
                    //  ajouter l'avatar dans le tableau js
                    myTown.push({
                            name: avatarName,
                            gender: avatarGender,
                            age: avatarAge,
                            bottom: avatarStyleBottom
                    });

                    // Vider les champs du formulaire
                    $('form')[0].reset();

                    // Revenir aux valeurs 'null' pour l'avatar
                    $('#avatarBody').attr('src', 'img/null.png');
                    $('#avatarTop').attr('src', 'img/top/null.png');
                    $('#avatarBottom').attr('src', 'img/bottom/null.png');

            };

            

    });





}); // Fin de la fonction d'attente de chargement du DOM