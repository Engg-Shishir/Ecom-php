$(document).ready(function(){

  load_data(1,"",5);
  function load_data(page, query,limit)
  {
    // alert(page);
    $.ajax({
      url:"./action/product_load.php",
      method:"POST",
      data:{page:page, query:query,limit:limit,action:"load"},
      dataType: "json",
      beforeSend: function(){	
          $("#searchSpiner").css("opacity","1");
          // $("#insert_btn_product").prop('disabled', true);
      },
      success:function(response)
      {
        var data = ""
        var total = response.length;
        // // console.log(response[total-1]);
        
        if(total > 0){
          $('#link').html(response[total-1]);
          $.each(response, function(key,value){
            if(key < total-1){
              data = data + "<tr class='text-center' id='pid"+value.id+" '>"
    
               if(value.image !=""){
                   var images = "image/product/"+value.image;
                   data = data + "<td><img height='50pxpx' width='50px' src='"+images+"' /> </td>"
               }
               data = data + "<td>"+value.name+"</td>"
               data = data + "<td>"+value.price+"</td>"
               data = data + "<td>"+value.category+"</td>"
               data = data + "<td>"+value.quantity+"</td>"
               data = data + "<td>"+value.discount+"</td>"
               data = data + "<td>"+value.scharge+"</td>"
              data = data + "<td> <a href='#' class='deleteProduct' data-id='"+value.id+"'><i class='fas fa-trash text-danger'></i></a> </td>"
    
              data = data + "</tr>"
            }
          });
        }else{
          $('#link').html("");
          var images = "image/Fixed/noRecordFound.svg";
          data = data + "<tr><td colspan='8'> <img height='300px' src='"+images+"' /> </td></tr>"
        }

        $('tbody').html(data);

        
        setTimeout(() => {
          $("#searchSpiner").css("opacity","0");
          // $('#dynamic_content').html(data);
        }, 300);
      }
    });
  }



  $(document).on('click', '.page-link', function(){
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
    load_data(page, query,5);
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
              url: "./action/product_delete.php",
              type: "POST",
              cache: false,
              data:{
                id: id
              },
              success: function(response){
                if(response.includes("done")){ 
                  load_data(1,"",5);
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

  $('#search_box').keyup(function(){
    // $('#product_show_by_limit').val(false).trigger( "change" );
    $('#product_show_by_limit option:first').prop('selected',true).trigger( "change" );
    var query = $('#search_box').val();
    if(query != "") load_data(1, query,5);
    
  });



  $('#insert_btn_product').click(function(e){

    e.preventDefault();	
    var data = new FormData();
    let pname = $("#pname").val();
    let pprice = $("#pprice").val();
    let pcategory = $("#pcategory").val();
    let pdetails = $("#pdetails").val();
    let pquantity = $("#pquantity").val();
    let pdiscount = $("#pdiscount").val();
    let pscharge = $("#shipingCharge").val();

    


    data.append('pname',pname);
    data.append('pprice',pprice);
    data.append('pcategory',pcategory);
    data.append('pdetails',pdetails);
    data.append('pquantity',pquantity);
    data.append('pdiscount',pdiscount);
    data.append('pscharge',pscharge);

    var image = $('#product_photo_choser')[0].files[0];
    data.append('image', image);

        $.ajax({				
            type : 'POST',
            url  :  'action/productInsert.php',
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
                        
                        load_data(1,"",5);
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
                            title: 'Successfully Inserted !'
                        })





                        $('#product').trigger("reset");
                        $("#insert_btn_product").prop('disabled', false);
                        $("#productInsertImagePreview").css("display", "none");
                        $("#productInsertImagePreview").attr("src", "");

                        
                    }, 2000);
                    
                }else{
                    setTimeout(() => {
                        toastr.error('Something going wrong',"Be carefull.Try again");
                        $(".loader").css({'display':'none','opacity':'0'});
                        $("#insert_btn_product").prop('disabled', false);
                    }, 500);
                }
            }
        });

  });
 

   $('#product_photo_choser').change(function(){
    var file = $(this).get(0).files[0];

    if(file){
      var extension = $(this).val().split('.').pop().toLowerCase();
      var validFileExtensions = ['jpeg', 'jpg', 'png'];
      if ($.inArray(extension, validFileExtensions) == -1) {
        toastr.error('Should be jpg,png,jpeg',"Wrong file selected");
  
      }else{
        var MB = Math.floor(file.size/1024000);   // in MB
        if( MB> 1){
          toastr.error('Should less then 3MB',"Large selected");
        }else{
          var reader = new FileReader();
          reader.onload = function(e){
              $("#productInsertImagePreview").css("display", "block");
              $("#productInsertImagePreview").attr("src", e.target.result);
              // $('#productInsert').css('background', 'transparent url('+e.target.result +')');
          }
          reader.readAsDataURL(file);
        }
      }
    }
   });

   $('#product_show_by_limit').change(function(){
      var limit = $(this).val();
      var query = $('#search_box').val();
      load_data(1, query,limit);
   });




});

