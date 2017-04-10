$(document).ready(function(){
    
    $('form:first').submit(function(e){
        e.preventDefault();

        if ($('[name="userName"]').val().length < 6 ){
            console.log('name : au moins 6 caractéres');
        } else {
            console.log('validé !');
        };

        if ($('[type="password"]').val().length < 6 ){
            console.log('pass : au moins 6 caractéres');
        } else {
            console.log('validé !');
        };
       
    });

     
    
 });




