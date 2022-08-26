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
                var data = '<tr class="tbodyRow">'+
                '<td class="text-center image" data-title="No">'+
                   '<div class="d-flex align-items-center justify-content-center">'+
                        '<div class="mr-4"><input class="productCheck'+element.psno+'" data-sno="'+element.psno+'" onChange="productSelect(this);" type="checkbox" name="checkbox" id="checkbox" / style="height:20px;width:20px;"></div>'+
                        '<div><img src="'+image+'" height="60px" width="60px"></div>'+
                    '</div>'+
                '</td>'+
                '<td class="text-center product-des" data-title="Description">'+
                    '<p class="product-name"><a href="product.php?sno='+element.psno +'">'+element.name+'</a></p>'+
                '</td>'+
                '<td class="text-center" data-title="Price">'+
                    '<span>$'+element.price+' </span>'+
                '</td>'+
                '<td class="text-center _p-qty">'+
                    '<div>'+
                        '<div class="value-button decrease_" data-sno="'+element.psno+'" onClick="decreaseValue(this);">-</div>'+
                        '<input type="text" name="qty" id="number" value="'+element.qty+'" disabled />'+
                        '<div class="value-button increase_" data-sno="'+element.psno+'" onClick="increaseValue(this);">+</div>'+
                    '</div>'+
                '</td>'+
                '<td class="text-center total-amount" data-title="Total">'+
                    '<span class="CartTableprice'+element.psno+'">$'+element.price*element.qty+'</span>'+
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
