$(document).ready(function(){
   $('#userRegistrationBtn').click(function(e){
      e.preventDefault();
      
      var data = new FormData();
      let userName = $("#userName").val();
      let userEmail = $("#userEmail").val();
      let userPassword = $("#userPassword").val();
      let userConfirmPassword= $("#userConfirmPassword").val();
      if((userName&& userEmail&& userPassword&& userConfirmPassword)!=""){
         data.append('userName',userName);


         //###################### Check email is active or not by Api ######################
         // $.ajax({				
         //    type : 'GET',
         //    url  :  "https://isitarealemail.com/api/email/validate?email=" +
         //    userEmail,
         //    success : function(data){
         //       if (data.status === 'valid') {
         //          data.append('userEmail',userEmail);
         //          check="1";
         //       } else{
         //          $('#userEmail').addClass('is-invalid');
         //       }
         //    }
         // });

         if(isValidEmailAddress(userEmail)){
            data.append('userEmail',userEmail);
            if(userPassword == userConfirmPassword){
               data.append('userPassword',userPassword);
               storeUserRegistrationData();
            }else{
               $('#userConfirmPassword').addClass('is-invalid');
            }
         }else{
            $('#userEmail').addClass('is-invalid');
         }

         function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }


         function storeUserRegistrationData(){
               $.ajax({				
                  type : 'POST',
                  url  :  'user/Action/userRegistration.php',
                  data:data,
                  contentType: false,
                  processData: false,
                  beforeSend: function(){	
                     // $(".loader").css({'display':'block','opacity':'1'});
                  },
                  success : function(response){	
                     alert(response);
                     //  if(response.includes("success")){	
                     //      setTimeout(() => {
                     //          $(".loader").css({'display':'none','opacity':'0'});
                     //          $('#product').trigger("reset");
                     //          window.location.href = "product.php";
                     //      }, 2000);
                        
                     //  }else{
                     //      setTimeout(() => {
            
                     //        $('#product').trigger("reset");
                     //          toastr.error('Something going wrong',"Be carefull.Try again");
                     //          $(".loader").css({'display':'none','opacity':'0'});
                     //          $("#insert_btn_product").prop('disabled', false);
                     //      }, 500);
                     //  }
                  }
               })
         }

      }else{
         toastr.error("Fill out your field");
      }
   }); 




});    



