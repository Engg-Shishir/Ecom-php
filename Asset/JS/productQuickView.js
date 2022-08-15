
function hello(id){
  // $("#exampleModalLabel").html("Update Product");
  // $("#insert_btn_product").html("Update");
  // $("#exampleModal").modal("show");
  // var sno = $(this).data("sno");
  $.ajax({
    url: "./Asset/Action/productDetails.php",
    type: "POST",
    data: {
      id:id,
      action: "edit",
    },
    dataType: "json",
    success: function (data) {
      // var perseImage = JSON.parse(data.image);
      // $("#sno").val(data.sno);
      // $("#productName").val(data.name);
      // $("#productPrice").val(data.price);
      // // $("#productCategory").val(data.category); // This is work for general select dropdown
      // $("#productCategory").select2("val", data.category); // If select element are Select2 plugin asociated, then you shold try this
      // // $("#summernote").val(data.details);
      // $("#summernote").summernote("code", data.details);
      // $("#productQuantity").val(data.quantity);
      // $("#productDiscount").val(data.discount);
      // // $("#shipingCharge").val(data.scharge);  // This is work for general select dropdown
      // $("#shipingCharge").select2("val", data.scharge);
      // // preview.append(image);

      // var append_image = "";
      // perseImage.forEach((e) => {
      //   var image = "../Asset/image/product/"+data.sno+"/"+ e; 
      //   append_image +=
      //     "<img src='" +
      //     image +
      //     "' style='height:100px;width:100px; margin-right:3px;' />";
      // });
      // $("#preview").html(append_image);
    },
  });
}




$(function(){
    // $('.prductView').on("click",function(){
    //   var id = $(this).attr("productId");
    //   hello(id);
    // });
});