$(function(){
  $('.wishlistBtn').on('click',function(){
    var sno =  $(this).data('sno');
        $.ajax({
            url: './Asset/Action/product/cart.php',
            type: 'POST',
            data: {
              sno:sno,
              action:"addToWish"
            },
            beforeSend: function () {
                // alert();
            },
            success: function (data) {
                if(data.includes("danger")){
                    toastr.error("You should login first");
                }else if(data.includes("warning")){
                    toastr.warning("Already exist in the wishList");
                }
                else{
                    toastr.success("Wishlist successfully updated!");
                    $('.wishListCountSpan').text(data);
                }
            }
        });
  });


  $('.cartBtn').on('click',function(){
    var sno =  $(this).data('sno');
    // $('#test').data('id', 'Next');
    $.ajax({
        url: './Asset/Action/product/cart.php',
        type: 'POST',
        data: {
          sno:sno,
          action:"addToCart"
        },
        beforeSend: function () {
            // alert();
        },
        success: function (data) {
            if(data.includes("danger")){
                // alert(data);
                toastr.error("You should login first");
            }else if(data.includes("warning")){
                toastr.warning("Already exist in the cart");
            }
            else{
                toastr.success("wishList successfully updated !");
                $('.cartCountSpan').text(data);
            }
        }
    });
  });

  $('.cartLi').on("click",function(){
    var sno =  $(this).data('sno');
      $.ajax({
          url: './Asset/Action/product/cart.php',
          type: 'POST',
          data: {
            sno:sno,
            action:"show Cart Data"
          },
          beforeSend: function () {
              // alert();
          },
          success: function (data) {
            var res = $.parseJSON(data);

            res.forEach(element => {
                var perseImage = JSON.parse(element.image);
                var image = "./admin/Asset/image/product/"+element.psno+"/"+perseImage[0];
                var data = '<tr>'+
                '<td class="text-center image" data-title="No">'+
                    '<img src="'+image+'" height="60px" width="60px">'+
                '</td>'+
                '<td class="text-center product-des" data-title="Description">'+
                    '<p class="product-name"><a href="#">'+element.name+'</a></p>'+
                '</td>'+
                '<td class="text-center price" data-title="Price">'+
                    '<span>$'+element.price+' </span>'+
                '</td>'+
                '<td class="text-center _p-qty">'+
                    '<div class="value-button decrease_" onClick="decreaseValue(this);">-</div>'+
                    '<input type="text" name="qty" id="number" value="1" disabled />'+
                    '<div class="value-button increase_" onClick="increaseValue(this);">+</div>'+
                '</td>'+
                '<td class="text-center total-amount" data-title="Total">'+
                    '<span>$'+element.price*element.qty+'</span>'+
                '</td>'+
                '<td class="text-center action" data-title="Remove">'+
                    '<a href="#"><i class="ti-trash remove-icon"></i></a>'+
                '</td>'+
            '</tr>';

              $('#cartShowTable').append(data);
            });

          }
      });
  });




});
