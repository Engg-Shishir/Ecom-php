$(function () {
  $("#login_button").on("click", function (e) {
    e.preventDefault();

    let email = $("#user_email").val();
    let password = $("#password").val();

    if (email == " " || password == "") {
      toastr.error("All field is required");
    } else {
      $.ajax({
        type: "POST",
        url: "../Action/login.php",
        data: {
          email: $("#user_email").val(),
          password: $("#password").val(),
        },
        beforeSend: function () {
          $(".loader").css("opacity", "1");
          $("#login_button").prop("disabled", true);
        },
        success: function (response) {
          if (response == "ok") {
            toastr.success("Connecting ...");
            setTimeout(() => {
              toastr.remove();
              $(".loader").css("opacity", "0");
              toastr.options.timeOut = 0;
              toastr.success("Login successfull !");
            }, 2000);

            //   setTimeout(' window.location.href = "welcome.php"; ',4000);
            setTimeout(() => {
              $("#login_button").prop("disabled", false);
              window.location.href = "../Page/dashboard.php";
            }, 5000);
          } else {
            $(".loader").css("opacity", "0");
            $("#login_button").prop("disabled", false);
            toastr.error("Something going wrong!");
          }
        },
      });
    }
  });
});
