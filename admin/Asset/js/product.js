
  function displayImg(input) {
    var filesAmount = input.files.length;
    var preview = document.querySelector('#preview');
    for (i = 0; i < filesAmount; i++) {
      
        var reader = new FileReader();
        var file = input.files[i];
        reader.addEventListener("load", function() {
          var image = new Image();
          image.height = 100;
          image.title  = file.name;
          image.size  = file.size;
          image.src    = this.result;
          preview.append(image);
        });
        
        reader.readAsDataURL(file);
    }
  }

   

$(document).ready(function(){

  
 $('.inserProductModalCloseBtn').on("click",()=>{
  resetProductForm("");
 });

 function resetProductForm(whoCallme){
  $('#product').trigger("reset");

  //  Reset or clear select2 field
    jQuery('.select2').select2({
      placeholder: "Select an option",
      allowClear: true
    });

   $('#preview').html("");
   $('#summernote').summernote('code', '');
   if(whoCallme=="update") $('#exampleModal').modal('toggle');
  //  $('#exampleModalLabel').html("Insert Product");
  //  $('#insert_btn_product').html("Insert");
 }

  $(document).on('click', '#oks', function(){
    loadProduct(1,"",5);
  });

  loadProduct(1,"",5);
  function loadProduct(page, query,limit)
  {
    // alert(page);
    $.ajax({
      url:"../Action/product.php",
      method:"POST",
      data:{page:page, query:query,limit:limit,action:"load"},
      dataType: "json",
      beforeSend: function(){	
          $("#searchSpiner").css("opacity","1");
          // $("#insert_btn_product").prop('disabled', true);
      },
      success:function(response)
      {
        $("#searchSpiner").css("opacity","0");
        
        var data = ""
        var total = response.length;
        if(total > 0){
          $('tbody').remove();
          $("thead").after("<tbody></tbody>");
          $('tbody').html();

          $('#link').html(response[total-1]);
          $.each(response, function(key,value){
            var perseImage = JSON.parse(value.image); 

            if(key < total-1){
              $('<tr class="text-center">').html(
                "<td ><img height='50pxpx' width='50px' src='../Asset/image/product/"+perseImage[0]+"' /> </td>"+
                "<td>"+value.name+"</td>"+
                "<td>"+value.price+"</td>"+
                "<td>"+value.category+"</td>"+
                "<td>"+value.quantity+"</td>"+
                "<td>"+value.discount+"</td>"+
                "<td>"+value.scharge+"</td>"+
                "<td class='shadow'> <a href='#' class='editProduct' data-sno='"+value.id+"'><i class='fas fa-pen'></i></a> <a href='#' class='deleteProduct' data-id='"+value.id+"'><i class='fas fa-trash text-danger'></i></a> <a href='./productDetails.php?id="+value.id+"' class='viewProduct' data-id='"+value.id+"'><i class='fas fa-eye'></i></a></td>").appendTo('tbody');
            }
          });
        }else{
          $('#link').html("");
          var images = "../Asset/image/Fixed/noRecordFound.svg";
          data = data + "<tr><td colspan='8'> <img height='300px' src='"+images+"' /> </td></tr>"
          $('tbody').html(data);
        }
        setTimeout(() => {
          $("#searchSpiner").css("opacity","0");
        }, 300);
      }
    });
  }



  $(document).on('click', '.page-link', function(){
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
    loadProduct(page, query,5);
    // $('#product_show_by_limit option:first').prop('selected',true).trigger( "change" );
  });

  $(document).on('click', '.deleteProduct', function(){
       var id = $(this).data("id");
        Swal.fire({
            title: 'Are you sure?',
            text: "delete this product",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "../Action/product.php",
              type: "POST",
              cache: false,
              data:{
                id: id,
                action:"delete"
              },
              success: function(response){
                if(response.includes("done")){ 
                  loadProduct(1,"",5);
                     Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                }
              }
            });
          }
        });
  });

  $(document).on('click', '.editProduct', function(){
    $('#exampleModalLabel').html("Update Product");
    $('#insert_btn_product').html("Update");
    $('#exampleModal').modal('show');
    var sno = $(this).data("sno");
    $.ajax({
      url: "../Action/product.php",
      type: "POST",
      data:{
        sno: sno,
        action:"edit"
      },
      dataType: "json",
      success: function(data){
        var perseImage = JSON.parse(data.image); 
        $('#sno').val(data.sno);
        $("#productName").val(data.name);
        $("#productPrice").val(data.price);
        // $("#productCategory").val(data.category); // This is work for general select dropdown
        $("#productCategory").select2("val",data.category);    // If select element are Select2 plugin asociated, then you shold try this
        // $("#summernote").val(data.details);
        $('#summernote').summernote('code', data.details);
        $("#productQuantity").val(data.quantity);
        $("#productDiscount").val(data.discount);
        // $("#shipingCharge").val(data.scharge);  // This is work for general select dropdown
        $("#shipingCharge").select2("val",data.scharge); 
        // preview.append(image);

        var append_image="";
        perseImage.forEach(e => {
          var image = "../Asset/image/product/"+e;
          append_image+="<img src='"+image+"' style='height:100px;width:100px; margin-right:3px;' />";
        });
        $('#preview').html(append_image);
        
        // $("#productInsertImagePreview").css("display", "block").attr("src", image);
        // $("#productInsertImagePreview").attr("data-name", perseImage[0]);
        
      }
    });
});

  $('#search_box').keyup(function(){
    $('#product_show_by_limit option:first').prop('selected',true).trigger("change");
    var query = $('#search_box').val();
    if(query != "") loadProduct(1, query,5);
  });


  $('#show_insert_modal_btn').click(function(){
    $("#productInsertImagePreview").css("display", "none").attr("src", "");
  });

 
  //  $('#product_photo_choser').change(function(){
  //   var file = $(this).get(0).files[0];

  //   if(file){
  //     var extension = $(this).val().split('.').pop().toLowerCase();
  //     var validFileExtensions = ['jpeg', 'jpg', 'png'];
  //     if ($.inArray(extension, validFileExtensions) == -1) {
  //       toastr.error('Should be jpg,png,jpeg',"Wrong file selected");
  
  //     }else{
  //       var MB = Math.floor(file.size/1024000);   // in MB
  //       if( MB> 1){
  //         toastr.error('Should less then 3MB',"Large selected");
  //       }else{
  //         var reader = new FileReader();
  //         reader.onload = function(e){
  //             $("#productInsertImagePreview").css("display", "block");
  //             $("#productInsertImagePreview").attr("src", e.target.result);
  //             // $('#productInsert').css('background', 'transparent url('+e.target.result +')');
  //         }
  //         reader.readAsDataURL(file);
  //       }
  //     }
  //   }
  //  });

   $('#product_show_by_limit').change(function(){
      var limit = $(this).val();
      var query = $('#search_box').val();
      loadProduct(1, query,limit);
   });

   $('#insert_btn_products').click(function(e){
    e.preventDefault();	
    var data = new FormData();
    let pname = $("#pname").val();
    let pprice = $("#pprice").val();
    let pcategory = $("#pcategory").val();
    let pdetails = $("#summernote").val();
    let pquantity = $("#pquantity").val();
    let pdiscount = $("#pdiscount").val();
    let pscharge = $("#shipingCharge").val();
    let actions="";
    data.append('pname',pname);
    data.append('pprice',pprice);
    data.append('pcategory',pcategory);
    data.append('pdetails',pdetails);
    data.append('pquantity',pquantity);
    data.append('pdiscount',pdiscount);
    data.append('pscharge',pscharge);
    var images = $('#customFile')[0].files[0];


     
 

    if($(this).text() == "Update"){
      data.append('action',"update");
      var alreadyUploadedImageName = $("#productInsertImagePreview").data("name");
      var product_sno_from_image_name = alreadyUploadedImageName.split('.')[0];
      data.append('sno', product_sno_from_image_name);

      if(images) {data.append('image', images);}
    }
    else{
      data.append('image', images);
      actions = "insert";
      data.append('action',"insert");
    }

    $.ajax({				
      type : 'POST',
      url  :  '../Action/product.php',
      enctype: 'multipart/form-data',
      data:data,
      contentType: false,
      processData: false,
      beforeSend: function(){	
          $(".loader").css({'display':'block','opacity':'1'});
          $("#insert_btn_product").prop('disabled', true);
      },
      success : function(response){	
                  
          if(response.includes("success")){	
              setTimeout(() => {
                $('#exampleModal').modal('hide');
                loadProduct(1,"",5);
                  
                  $(".loader").css({'display':'none','opacity':'0'});
                  
                  const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 2000,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                  })
                    
                  Toast.fire({
                      icon: 'success',
                      title: 'Successfully Done!'
                  })





                  $('#product').trigger("reset");
                  $("#insert_btn_product").prop('disabled', false);
                  $("#productInsertImagePreview").css("display", "none");
                  $("#productInsertImagePreview").attr("src", "");
                  location.reload(true);
                  if(actions != "insert") window.location.href = "product.php";
                  
              }, 2000);
              
          }else{
              setTimeout(() => {

                $('#product').trigger("reset");
                  toastr.error('Something going wrong');
                  $(".loader").css({'display':'none','opacity':'0'});
                  $("#insert_btn_product").prop('disabled', false);
              }, 500);
          }
      }
  });
  });



   $('#product').submit(function(e){
          e.preventDefault();

          var sno = $('#sno').val();
          var data = new FormData(this);
          if(sno =="") data.append('actions',"insert"); else data.append('actions',"update");

          $.ajax({				
              type : 'POST',
              url  :  '../Action/insertUpdateProduct.php',
              enctype: 'multipart/form-data',
              data:data,
              contentType: false,
              processData: false,
              beforeSend: function(){	
                  // alert();
              },
              success : function(response){	
                  if(response.includes("success")){
                    toastr.success('Successfull !');
                  }else{
                    toastr.error('Something wemt wrong !');
                  }
                  loadProduct(1,"",5);
                  resetProductForm("update");
              }
          });
  });



});

// Display chosen image name inside file choser field





// data = data + "<tr class='text-center' id='pid"+value.id+" '>"
    
// if(value.image !=""){
//     data = data + "<td><img height='50pxpx' width='50px' src='./image/product/"+value.image+"' /> </td>"
// }
// data = data + "<td>"+value.name+"</td>"
// data = data + "<td>"+value.price+"</td>"
// data = data + "<td>"+value.category+"</td>"
// data = data + "<td>"+value.quantity+"</td>"
// data = data + "<td>"+value.discount+"</td>"
// data = data + "<td>"+value.scharge+"</td>"
// data = data +
// "<td> <a href='#' class='editProduct' data-sno='"+value.id+"'><i class='fas fa-pen'></i></a><a data-id='"+value.id+"' type='button' class='ml-1'><i class='fas fa-eye'></i></a> <a href='#' class='deleteProduct' data-id='"+value.id+"'><i class='fas fa-trash text-danger'></i></a></td>"

// data = data + "</tr>"

// $('<tr class="text-center">').html(
//   "<td><img height='50pxpx' width='50px' src='./image/product/"+value.image+"' /> </td>"+
//   "<td>"+value.name+"</td>"+
//   "<td>"+value.price+"</td>"+
//   "<td>"+value.category+"</td>"+
//   "<td>"+value.quantity+"</td>"+
//   "<td>"+value.discount+"</td>"+
//   "<td>"+value.scharge+"</td>"+
//   "<td> <a href='#' class='editProduct' data-sno='"+value.id+"'><i class='fas fa-pen'></i></a><a data-id='"+value.id+"' type='button' class='ml-1'><i class='fas fa-eye'></i></a> <a href='#' class='deleteProduct' data-id='"+value.id+"'><i class='fas fa-trash text-danger'></i></a></td>").appendTo('tbody');

