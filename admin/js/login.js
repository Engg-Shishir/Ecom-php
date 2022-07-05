$('document').ready(function() { 
	
	$("#login_button").click(function(e){
		e.preventDefault();	
		

		let email = $("#user_email").val();
		let password = $("#password").val();



		if(email==" "  || password==""){
			toastr.error('Your field is required',"Be carefull !");

		}else{
			$.ajax({				
				type : 'POST',
				url  : 'action/login.php',
				data : {
				  email: $("#user_email").val(),
				  password: $("#password").val()
				},
				beforeSend: function(){	
					$(".loader").css("opacity", "1");
					$("#login_button").prop('disabled', true);
				},
				success : function(response){						
					if(response=="ok"){	
	
						  //   setTimeout(' window.location.href = "welcome.php"; ',4000);
						  setTimeout(() => {
							$(".loader").css("opacity", "0");
							toastr.options.timeOut = 0;
							toastr.success('You are redirected to home page',"Please wait..........");
						  }, 2000);



	
	
						//   setTimeout(' window.location.href = "welcome.php"; ',4000);
						setTimeout(() => {
							$("#login_button").prop('disabled', false);
							window.location.href = "dashboard.php";
						}, 5000);
					} else {
						$(".loader").css("opacity", "0");
						$("#login_button").prop('disabled', false);
						toastr.error('Something going wrong',"Try again !");
					}
				}
			});
		}


	
	}); 
});

