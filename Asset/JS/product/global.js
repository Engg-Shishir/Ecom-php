function increaseValue(_this) {
  value = parseInt($(_this).siblings("input#number").val());
  //   value = isNaN(value) ? 0 : value;
  value++;
  if (value > 3) {
    $(".increase_").addClass("not-allowed");
    $(".decrease_").removeClass("not-allowed");
  } else {
    $(".increase_").removeClass("not-allowed");
    $(".decrease_").removeClass("not-allowed");
    $(_this).siblings("input#number").val(value);
  }
  //   $(_this).siblings("input#number").val(value);
}

function decreaseValue(_this) {
  value = parseInt($(_this).siblings("input#number").val());
  //   value = isNaN(value) ? 0 : value;
  value--;

  if (value < 1) {
    $(".decrease_").addClass("not-allowed");
    $(".increase_").removeClass("not-allowed");
  } else {
    $(".decrease_").removeClass("not-allowed");
    $(".increase_").removeClass("not-allowed");
    $(_this).siblings("input#number").val(value);
  }

  //   value < 1 ? (value = 1) : "";
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
