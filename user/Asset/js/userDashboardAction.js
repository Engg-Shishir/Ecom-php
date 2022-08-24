$(function () {
  getdata();

  function getdata() {
    $.ajax({
      type: "POST",
      url: "../Action/fetchUser.php",
      data: {
        action: "load",
      },
      dataType: "json",
      beforeSend: function () {
        // alert("Do you want");
      },
      success: function (response) {
        $("#sidebar_profile_name").text(response.name);
        $("#sidebar_profile_logo").attr("src", "../Image/" + response.photo);
        $("#profile_photo_show").attr("src", "../Image/" + response.photo);
        $("#profileImageShowDiv").html("");
        var img =
          "<img class=' shadow' id='profile_photo_show' src='../image/" +
          response.photo +
          "'   height='200px' width='100%'>";
        $("#profileImageShowDiv").html(img);

        $("#name").val(response.name);
        $("#phone").val(response.phone);
        $("#user_email").val(response.email);
        $("#password").val(response.pass);
        $("#file").val("");
      },
    });
  }

  $("#show_hide_password").on("click", function (e) {
    if ($("#password").attr("type") == "password") {
      $("#password").attr("type", "text");
      $(this).removeClass("fa-eye-slash").addClass("fa-eye");
    } else {
      $("#password").attr("type", "password");
      $(this).removeClass("fa-eye").addClass("fa-eye-slash");
    }
  });

  $("#update_profile_button").on("click", function (e) {
    e.preventDefault();

    var data = new FormData();
    let name = $("#name").val();
    let email = $("#user_email").val();
    var phone = $("#phone").val();
    let password = $("#password").val();
    var image = $("#file")[0].files[0];

    if (image) data.append("image", image);

    data.append("name", name);
    data.append("email", email);
    data.append("phone", phone);
    data.append("password", password);
    data.append("action", "update");

    $.ajax({
      type: "POST",
      url: "../Action/profileUpdate.php",
      enctype: "multipart/form-data",
      data: data,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $(".loader").css("opacity", "1");
        $("#update_profile_button").prop("disabled", true);
      },
      success: function (response) {
        // alert(response);
        if (response.includes("success")) {
          setTimeout(() => {
            $(".loader").css("opacity", "0");

            $("#update_profile_button").prop("disabled", false);
            toastr.success("Successfully Updating...");
          }, 2000);

          if (response.includes("image")) {
            setTimeout(() => {
              getdata();
              window.location.href = "profile.php";
            }, 5000);
          } else {
            getdata();
          }
        } else {
          $(".loader").css("opacity", "0");
          $("#update_profile_button").prop("disabled", false);
          toastr.error("Something going wrong", "Try again !");
        }
      },
    });
  });
});
