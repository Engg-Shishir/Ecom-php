$(document).ready(function(){

    getdata();

    function getdata(){
         $.ajax({				
             type : 'POST',
             url  : 'Action/fetchUser.php',
             data : {
                 action:"load"
             },
             dataType: 'json',
             beforeSend: function(){	
                 // alert("Do you want");
             },
             success : function(response){	
                $('#sidebar_profile_name').text(response.name);

				// $('#sidebar_profile_logo').attr("src","");
				// $('#profile_photo_show').attr("src", "");
                 $('#sidebar_profile_logo').attr("src","image/"+response.photo);
                 $('#profile_photo_show').attr("src","image/"+response.photo);

				//  $('#profile_photo_show').attr("src","image/"+response.photo);

				// $("p").html("Hello <b>world</b>!");

                 $('#name').val(response.name);
                 $('#phone').val(response.phone);
                 $('#user_email').val(response.email);
                 $('#password').val(response.pass);
                 $("#file").val("");
             }
         });
    }

    $('#show_hide_password').click(function(){

		if($('#password').attr("type")== "password"){
			$('#password').attr("type","text");
			$(this).removeClass("fa-eye-slash").addClass("fa-eye");
		}
		else{
			$('#password').attr("type","password");
			$(this).removeClass("fa-eye").addClass("fa-eye-slash");
		}    
	});

    $("#update_profile_button").click(function(e){
		e.preventDefault();	

        
		var data = new FormData();
		let name = $("#name").val();
		let email = $("#user_email").val();
		var phone = $("#phone").val();
		let password = $("#password").val();
        var image = $('#file')[0].files[0];
        
		if(image) data.append('image', image);

		
        data.append('name', name);
        data.append('email', email);
        data.append('phone', phone);
        data.append('password', password);
        data.append('action', "update");

		$.ajax({				
			type : 'POST',
			url  :  'Action/profileUpdate.php',
			enctype: 'multipart/form-data',
			data:data,
			contentType: false,
			processData: false,
			beforeSend: function(){	
				$(".loader").css("opacity", "1");
				$("#update_profile_button").prop('disabled', true);
			},
			success : function(response){				
				if(response.includes("success")){
					setTimeout(() => {
						$('#sidebar_profile_logo').attr("src","");
						$('#profile_photo_show').attr("src","");
						$(".loader").css("opacity", "0");
						getdata();
						$("#update_profile_button").prop('disabled', false);
						toastr.success("Successfully Updated");
					}, 3000);

					if(response.includes("image")){
						setTimeout(() => {
							window.location.href = "dashboard.php";
						}, 6000);
					}
					
				}else{
					$(".loader").css("opacity", "0");
					$("#update_profile_button").prop('disabled', false);
					toastr.error('Something going wrong',"Try again !");
				}
			}
		});



	
	}); 


})