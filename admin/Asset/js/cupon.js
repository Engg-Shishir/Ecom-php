$(function () {
  getCupon();

  $("#cuponModalActionBtn").on("click", function () {
    var name = $("#cuponName").val();
    var discount = $("#cuponDiscount").val();

    if (name != "" && discount != "") {
      $.ajax({
        type: "POST",
        url: "../Action/cupon.php",
        data: {
          name: name,
          discount: discount,
          action: "insert",
        },
        beforeSend: function () {
          // alert();
        },
        success: function (response) {
          getSingleCupon();
        },
      });
    } else {
      alert("The field is empty !");
    }
  });

  function getCupon() {
    $.ajax({
      type: "POST",
      url: "../Action/cupon.php",
      data: {
        action: "get",
      },
      beforeSend: function () {
        // alert();
      },
      success: function (values) {
    
       var value = jQuery.parseJSON(values);
        value.forEach(value => {

             var data = "<td>"+value['sno']+"</td>"+
             "<td>"+value['name']+"</td>"+
             "<td>"+value['discount']+" %</td>"+
             "<td>"+
                 "<a href='#' class='editProduct' data-sno='"+value['id']+"'><i class='fas fa-pen'></i></a>"+
                 "<a href='#' class='deleteProduct ml-2' data-id='"+value['id']+"'><i class='fas fa-trash text-danger'></i></a>";

                 if(value['status']==1){
                      data += "<input class='ml-2 mt-2' type='checkbox' style='height:15px; width:15px;' checked /></td>";
                 }else{
                    data += "<input class='ml-2 mt-2' type='checkbox' style='height:15px; width:15px;' /></td>";
                 }
          
            $('<tr class="text-center">').html(data).appendTo('tbody');
        });
      },
    });
  }

  function getSingleCupon() {
    $.ajax({
      type: "POST",
      url: "../Action/cupon.php",
      data: {
        action: "getSingleCupon",
      },
      beforeSend: function () {
        // alert();
      },
      success: function (values) {
    
       var value = jQuery.parseJSON(values);
 
            $('<tr class="text-center">').html(
             "<td>"+value['sno']+"</td>"+
             "<td>"+value['name']+"</td>"+
             "<td>"+value['discount']+" %</td>"+
             "<td>"+
                 "<a href='#' class='editProduct' data-sno='"+value['id']+"'><i class='fas fa-pen'></i></a>"+
                 "<a href='#' class='deleteProduct ml-2' data-id='"+value['id']+"'><i class='fas fa-trash text-danger'></i></a>"+
             "</td>").appendTo('tbody');

      },
    });
  }
});
