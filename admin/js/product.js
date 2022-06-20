$(document).ready(function(){
    getdatas();
  $('#insert_btn_product').click(function(e){

    e.preventDefault();	
    var data = new FormData();
    let pname = $("#pname").val();
    let pprice = $("#pprice").val();
    let pdetails = $("#pdetails").val();
    let pquantity = $("#pquantity").val();
    let pdiscount = $("#pdiscount").val();
    let pscharge = $("#shipingCharge").val();

    data.append('pname',pname);
    data.append('pprice',pprice);
    data.append('pdetails',pdetails);
    data.append('pquantity',pquantity);
    data.append('pdiscount',pdiscount);
    data.append('pscharge',pscharge);

    // var image = $('#file')[0].files[0];
    // data.append('image', image);

        $.ajax({				
            type : 'POST',
            url  :  'action/productInsert.php',
            enctype: 'multipart/form-data',
            data:data,
            contentType: false,
            processData: false,
            beforeSend: function(){	
                $(".loader").css("opacity", "1");
                $("#insert_btn_product").prop('disabled', true);
            },
            success : function(response){						
                if(response=="success"){	
                    setTimeout(() => {
                        $(".loader").css("opacity", "0");
                        // toastr.success('',"Successfully Inserted ");
                        
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
                    }, 2000);
                    
                } else {
                    toastr.error('Something going wrong',"Try again !");
                }
            }
        });

  });



   function getdatas(){
        $.ajax({				
            type : 'POST',
            url  : 'action/loadProduct.php',
            dataType: 'json',
            beforeSend: function(){	
                // alert("Do you want");
            },
            success: function(response)
            {
            //  var data = ""
            //  $.each(response, function(key,value){
            //    data = data + "<tr class='text-center' id='pid"+value.id+" '>"

            //     if(value.image !=""){
            //         var images = "action/images/"+value.image;
            //         data = data + "<td><img height='50pxpx' width='50px' src='"+images+"' /> </td>"
            //     }else{
            //         var images = "action/images/"+value.image;
            //         data = data + "<td><img height='50pxpx' width='50px' src='"+images+"' /> </td>"
            //     }
            //     data = data + "<td>"+value.name+"</td>"
            //     data = data + "<td>"+value.price+"</td>"
            //     data = data + "<td> Category"+value.id+"</td>"
            //     data = data + "<td>"+value.quantity+"</td>"
            //     data = data + "<td>"+value.discount+"</td>"
            //     data = data + "<td>"+value.scharge+"</td>"
            //    data = data + "<td> <button  class='btn btn-danger'onclick='deleteData("+value.id+")'>Delete</button> </td>"

            //    data = data + "</tr>"


            //  });
            //  $('tbody').html(data);
            }
        });
   }


});