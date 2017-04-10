$(document).ready( function(){

 $('form').submit(function(event){
    event.preventDefault();

    if ($('[type="text"]').val().length < 4){
        console.log('your name : au moins 6 caractéres');
    }else {
        console.log('nom validé !');
    };



    if ($('[type="email"]').val().length < 9){
        console.log('email: au moins 9 caractéres');
    }else {
        console.log('email validé!');
    };



    if ($('select').val()==""){
        console.log('il faut choisir un pays');
    }else{
        console.log('country choisi !');
    };




    if ($('textarea').val().length < 15){
        console.log('message:au moins 15 caractéres');
    }else if ($('textarea').val().length > 70){
        console.log('message:maximum 70 caractéres');
    }else{
        console.log('message validé !');
    };
    

     if(

});























    });






























