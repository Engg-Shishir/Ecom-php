$(document).ready(function(){

  load_data(1,"",5);

  function load_data(page, query,limit)
  {
    $.ajax({
      url:"./action/productFetch.php",
      method:"POST",
      data:{page:page, query:query,limit:limit},
      beforeSend: function(){	
          $("#searchSpiner").css("opacity","1");
          // $("#insert_btn_product").prop('disabled', true);
      },
      success:function(data)
      {
        setTimeout(() => {
          $("#searchSpiner").css("opacity","0");
          $('#dynamic_content').html(data);
        }, 300);
      }
    });
  }

  $(document).on('click', '.page-link', function(){
    var page = $(this).data('page_number');
    var query = $('#search_box').val();
    load_data(page, query,5);
  });

  $('#search_box').keyup(function(){
    // $('#product_show_by_limit').val(false).trigger( "change" );
    $('#product_show_by_limit option:first').prop('selected',true).trigger( "change" );
    var query = $('#search_box').val();
    load_data(1, query,5);
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
                        
                        load_data(1);
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




//    $('a').click(function(){
     
//     // var id = $(this).attr("id");
//     // alert(id);
// alert();
//    });
   
  function dleteProdact(id){
    alert(id);
  }

});

