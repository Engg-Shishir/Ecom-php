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
	
						  toastr.options = {
							"timeOut": "5000",
							"progressBar": true,
						  }	
	
						  //   setTimeout(' window.location.href = "welcome.php"; ',4000);
						  setTimeout(() => {
							$(".loader").css("opacity", "0");
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


// const lists = document.querySelectorAll('.nav-item');
// lists.addEventListener('click',tabActiveLink);
// const list = document.querySelectorAll('.nav-link');

// function tabActiveLink(){
// // 	list.forEach((item,i) =>{
// // 	   item.classList.remove('active');
// // 	   this.classList.add('active');
// //    });

// alert();
// }

// list.forEach((item,i) =>{
// 	var index=0;
// 	   $(".tab-li-active > .fa-spin").css({color:`black`});
//    item.addEventListener('click',tabActiveLink);
//    item.addEventListener('click', () => {
// 	   index = i;
// 	   var t = document.querySelector(".indicator");
// 	   $(".indicator").css({top:`${(50*index)+8}px`});
	   
// 	   $(".fa-spin").css({color:`#ff9e1b`});
// 	   $(".tab-li-active > .fa-spin").css({color:`black`});
//    });
   
// });