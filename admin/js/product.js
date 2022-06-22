$(document).ready(function(){
  
    load_data();  
    function load_data(page)  
    {  
         $.ajax({  
              url:"pagination.php",  
              method:"POST",  
              data:{page:page},  
              success:function(data){  
                   $('#card-body').html(data);  
              }  
         })  
    }  

    
    $(document).on('click', '.page-item ', function(){  
         var page = $(this).attr("id");
         load_data(page);  
        $(this).each(function(i,item){  
           item.addClass('active');
        }); 
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
                        
                        load_data();  
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
                    
                } else {
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
    var file = $("input[type=file]").get(0).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(e){
            $("#productInsertImagePreview").css("display", "block");
            $("#productInsertImagePreview").attr("src", e.target.result);
            // $('#productInsert').css('background', 'transparent url('+e.target.result +')');
        }

        reader.readAsDataURL(file);
    }
   });


   $("#table-search").keyup(function(){
        let pname = $(this).val();
        if(pname !=""){
        $.ajax({				
            type : 'POST',
            url  : 'action/search.php',
            data:{data:pname},
            dataType: 'json',
            beforeSend: function(){	
                $('#searchSpiner').css("display","block");
            },
            success: function(response)
            {
                //  alert(response);
                // searchSpiner
                if(response.length > 0){
                    $('#searchSpiner').css("display","none");
                    var count = 0;
                    var data = ""
                    $.each(response, function(key,value){
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
                        data = data + "<td> <button  class='btn btn-danger'onclick='deleteData("+value.id+")'>Delete</button> </td>"
                        data = data + "</tr>"
                        
                        count++;
        
                    });
                    $('tbody').html(data);
                    
                }else{
                    $('#searchSpiner').css("display","none");
                    var data = "<td colspan='8'><img src='./image/Fixed/noRecordFound.svg'></td>"
                    $("tbody").empty();
                    $(".page-item").remove();
                    $('tbody').html(data);
                }
        
            }
        });
            
    }else{
        load_data();
    }
   });

















//    const list = document.querySelectorAll('.pagination_link');

//    function tabActiveLink(){
//        list.forEach((item,i) =>{
//           item.classList.remove('tab-li-active');
//           this.classList.add('tab-li-active');
//       });
//    }

//    list.forEach((item,i) =>{
//        var index=0;
//           $(".tab-li-active > .fa-spin").css({color:`black`});

//       item.addEventListener('click',tabActiveLink);

//       item.addEventListener('click', () => {
//           index = i;
//           var t = document.querySelector(".indicator");
//           $(".indicator").css({top:`${(50*index)+8}px`});
          
//           $(".fa-spin").css({color:`#ff9e1b`});
//           $(".tab-li-active > .fa-spin").css({color:`black`});
//       });
      
//    });



});


   const list = document.querySelectorAll('.pagination_link');

   function tabActiveLink(){
       list.forEach((item,i) =>{
        item.css({background_color:`black`});
        this.css({background_color:`blue`});
      });
   }

   list.forEach((item,i) =>{
      item.addEventListener('click',tabActiveLink);  
   });