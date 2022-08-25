function increaseValue(_this) {
  value = parseInt($(_this).siblings("input#number").val());
  //   value = isNaN(value) ? 0 : value;
  
  var sno = $(_this).data("sno");
  value++;
  if (value > 3) {
    $(_this).addClass("not-allowed");
    $(".decrease_").removeClass("not-allowed");
  } else {
    $(_this).removeClass("not-allowed");
    $(".decrease_").removeClass("not-allowed");
    updateCartQty(_this,value,sno);
  }

  // alert(value);
  // $(_this).siblings("input#number").val(value);
}

function decreaseValue(_this) {
  value = parseInt($(_this).siblings("input#number").val());
  var sno = $(_this).data("sno");
  value--;

  if (value < 1) {
    $(_this).addClass("not-allowed");
    $(".increase_").removeClass("not-allowed");
  } else {
    $(_this).removeClass("not-allowed");
    $(".increase_").removeClass("not-allowed");
    updateCartQty(_this,value,sno);
  }

  //   value < 1 ? (value = 1) : "";
}


function updateCartQty(_thiss,_thisCartQty,_thisCartSno){
  // var quantity =  $(this).data('sno');
  // alert(_thisCartSno);
          // console.log(_thiss);
  $.ajax({
      url: './Asset/Action/product/cart.php',
      type: 'POST',
      data: {
        cart:_thisCartQty,
        sno:_thisCartSno,
        action:"upadate Cart qrtyAndPrice"
      },
      beforeSend: function () {
          // alert();
          // console.log(_this);
          $(_thiss).html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");
      },
      success: function (data) {
        var res = jQuery.parseJSON(data);
        console.log(res);
          setTimeout(() => {
            $(_thiss).siblings("input#number").val(res.qty);
            $(".CartTableprice"+res.psno).html("$ "+(parseInt(res.qty))*(parseInt(res.price)));
            $(_thiss).html("+");
          }, 1000);
        // console.log(data);
      }
  });
}

function productSelect(_this){
  var sno = $(_this).data("sno");
  $.ajax({
    url: './Asset/Action/product/cart.php',
    type: 'POST',
    data: {
      sno:sno,
      action:"upadate Cart checkOutPartData"
    },
    beforeSend: function () {
        // alert();
        // console.log(_this);
        // $(_thiss).html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");
    },
    success: function (data) {
      var res = jQuery.parseJSON(data);
        if(_this.checked) {
          
          var qty =parseInt($(".totalProductInCheckout").text());
          qty = qty+parseInt(res.qty);
          $(".totalProductInCheckout").html(qty);

          var price =parseInt($(".totalPriceInCheckout").text());
          price = price+(parseInt(res.qty)*parseInt(res.price));
          $(".totalPriceInCheckout").html(price);
        }else{
          
          var qty =parseInt($(".totalProductInCheckout").text());
          qty = qty-parseInt(res.qty);
          $(".totalProductInCheckout").html(qty);

          var price =parseInt($(".totalPriceInCheckout").text());
          price = price-(parseInt(res.qty)*parseInt(res.price));
          $(".totalPriceInCheckout").html(price);
        }


    }
  });
}



$(function () {
  var value = 0;
  $(".decrease_").click(function () {
    decreaseValue(this);
  });
  $(".increase_").click(function () {
    increaseValue(this);
  });

  $(".selectColor").on("click", function () {
    var color = $(this).text().toLowerCase();
    $(".colorToggleButton").css({
      "background-color": color,
      color: "white",
    });
  });

  $(".selectSize").on("click", function () {
    var size = $(this).text();
    $(".sizeToggleButton").text(size);
  });

  $(".locationToggleBrn").on("click", function (){
    // var check = $(this).data("test");
    var check = $(this).data("test");
    if($(this).hasClass('active')){
      $(".locationToggleBrn").removeClass('active');
        $(".gif").css({ display: "none" });
        $(".contentLoactionShow").text("");
        $(".collapse").slideToggle();
    }else{
      $(".locationToggleBrn").addClass('active');    
          $.ajax({
            url: "./Asset/Action/checkSession.php",
            type: "POST",
            beforeSend: function () {
              $(".contentLoactionShow").text("");
              $(".gif").css({ display: "block" });
              $(".collapse").slideToggle();
            },
            success: function (data) {
              setTimeout(() => {
                $(".gif").css({ display: "none" });
                $(".contentLoactionShow").text(data);
              }, 2000);
            }
          });
    }
  });


});
