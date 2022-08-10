$(function(){

    $('.cat-heading').on("click",function(e){
        $('.main-category').slideToggle("fast");
    });
    
    $('#userLoginBtn').on("click",function(e){
        $('.user-login').toggleClass('active');
    });
    $('.carousel').carousel({
        interval: 1000
    });

});