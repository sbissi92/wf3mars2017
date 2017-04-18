$('document').ready(function(){
    console.log('Dom chargé');

// fonction fadeOut()
$('section').eq(0).children('button').click(function(){
        $('section').eq(0).children('article').fadeOut(500);
});

// fonction fadeIn()
$('section').eq(0).children('button').click(function(){
        $('section').eq(0).children('article').fadeIn(500);
});


});