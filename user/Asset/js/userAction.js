$(function () {
  getdata();

  $("#userRegistrationBtn").on("click", function (e) {
    e.preventDefault();

    var data = new FormData();
    let userName = $("#userName").val();
    let userEmail = $("#userEmail").val();
    let userPhone = $("#userPhone").val();
    var userPassword = $("#userPassword").val();
    var userConfirmPassword = $("#userConfirmPassword").val();
    if ((userName && userEmail && userPassword && userConfirmPassword) != "") {
      data.append("userName", userName);

      if (isValidEmailAddress(userEmail)) {
        data.append("userEmail", userEmail);
        if (isPasswordMatch(userPassword, userConfirmPassword)) {
          data.append("userPassword", userPassword);
          data.append("userPhone", userPhone);
          storeUserRegistrationData();
        } else {
          $("#userConfirmPassword").addClass("is-invalid");
        }
      } else {
        $("#userEmail").addClass("is-invalid");
      }

      function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(
          /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
        );
        return pattern.test(emailAddress);
      }

      function isPasswordMatch(password, cpassword) {
        if (password == cpassword) return true;
      }

      function storeUserRegistrationData() {
        $.ajax({
          type: "POST",
          url: "user/Action/userRegistration.php",
          data: data,
          contentType: false,
          processData: false,
          beforeSend: function () {
            $(".signUpSpinner").css({ opacity: "1" });
            $("#userRegistrationBtn").prop("disabled", true);
          },
          success: function (response) {
            if (response.includes("success")) {
              setTimeout(() => {
                toastr.success("Success! Verify mail");
                $("#userRegistrationBtn").prop("disabled", false);
                $(".signUpSpinner").css({ opacity: "0" });
                $("#userRegistrationForm").trigger("reset");
                // window.location.href = "user/dashboard.php";
              }, 2000);
            } else {
              setTimeout(() => {
                toastr.error("Something going wrong", "Be carefull.Try again");
                $(".signUpSpinner").css({ opacity: "0" });
                $("#userRegistrationBtn").prop("disabled", false);
              }, 500);
            }
          },
        });
      }
    } else {
      toastr.error("Fill out your field");
    }
  });

  $("#userLoginBtn").on("click", function (e) {
    $(".user-login").toggleClass("active");
  });

  $("#userLoginBtns").on("click", function (e) {
    e.preventDefault();
    var email = $("#userLogin_Email").val();
    var password = $("#userLogin_Password").val();

    if (email == "" || password == "") {
      toastr.error("Your field is required");
    } else {
      $.ajax({
        type: "POST",
        url: "user/Action/userLogin.php",
        data: {
          email: email,
          password: password,
        },
        beforeSend: function () {
          $(".loginSpinner").css({ opacity: "1" });
          $(this).prop("disabled", true);
        },
        success: function (response) {
          if (response.includes("success")) {
            setTimeout(() => {
              $(".loginSpinner").css({ opacity: "0" });
              toastr.options.timeOut = 0;
              $(".user-login").toggleClass("active");
              toastr.success("You are loged in");
            }, 2000);

            setTimeout(() => {
              $(this).prop("disabled", false);
              window.location.href = "index.php";
            }, 5000);
          } else {
            $(".loginSpinner").css({ opacity: "0" });
            $(this).prop("disabled", false);
            toastr.error("Something going wrong");
          }
        },
      });
    }
  });

  function getdata() {
    $.ajax({
      type: "POST",
      url: "user/Action/fetchUser.php",
      data: {
        action: "load",
      },
      dataType: "json",
      beforeSend: function () {
        // alert("Do you want");
      },
      success: function (response) {
        // $('.usernameShow').text(response.name);
        var data = "<i class='ti-user usernameShow'></i>&nbsp;" + response.user.name;
        $(".cartCountSpan").text(response.cart);
        $("#userLoginBtn").html(data);
      },
    });
  }
});
