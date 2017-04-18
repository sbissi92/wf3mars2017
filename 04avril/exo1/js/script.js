$('document').ready(function(){
    console.log('Dom chargé');




    // fonction animate
    $('section:first button').click(function(){
            console.log('click');

            // changer la couleur de fond et la largeur de l'article
            $('section:first article').animate({
                background:'"eee',
                width:'20rem',
            });
    });


    // fonction animate() valeurs dynamiques
    $('section:nth-child(2) button').click(function(){
        $('section:nth-child(2) article').animate({
                left: '+=1rem',
                top: '-=1rem',
        });
    });

    // fonction animate(): toggle/show/HIDE
    $('section:nth-child(3) button').click(function(){
        $('section:nth-child(3) article').animate({
            width: 'toggle'
        });
    });

    // fonction animate() avec callback
    $('section:last button').click(function(){
           $('section:last article').animate({
                width: '20rem',
                height:'20rem'
           },2000,function(){
            //    supprimer la balise
            $(this).hide();
        });
    });
});