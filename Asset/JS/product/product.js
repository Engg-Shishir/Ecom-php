$(function(){
  $('.wishlistBtn').on('click',function(){
        var sno =  $('.wishlistBtn').attr('sno');
        $.ajax({
            url: './Asset/Action/checkSession.php',
            type: 'POST',
            data: {
              sno:sno
            },
            beforeSend: function () {
                // alert();
            },
            success: function (data) {
                if(! data.includes("success")){
                    // alert(data);
                    toastr.error(data);
                }
            }
        });
  });
});