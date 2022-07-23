$(document).ready(function(){

    $('.cat-heading').click(function(){
        $('.main-category').slideToggle("fast");
    });
    
    $('#userLoginBtn').click(function(){
        $('.user-login').toggleClass('active');
    });

});