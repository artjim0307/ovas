function start_loader() {
  $("body").append(
    '<div id="preloader"><div class="loader-holder"><div></div><div></div><div></div><div></div>'
  );
}

function clearSignupForm() {
  $("#signup-frm")[0].reset(); // Reset the form fields
}

function end_loader() {
  $("#preloader").fadeOut("fast", function () {
    $("#preloader").remove();
  });
}
// function
window.alert_toast = function ($msg = "TEST", $bg = "success", $pos = "") {
  var Toast = Swal.mixin({
    toast: true,
    position: $pos || "top",
    showConfirmButton: false,
    timer: 3500,
  });
  Toast.fire({
    icon: $bg,
    title: $msg,
  });
};

$(document).ready(function () {
  // Login
  $("#login-frm").submit(function (e) {
    e.preventDefault();
    start_loader();

    if ($(".err_msg").length > 0) $(".err_msg").remove();
    // Serialize the form data and append the 'type' field
    var formData = $(this).serializeArray();
    formData.push({ name: "type", value: 1 }); // Adjust this value as needed

    $.ajax({
      url: _base_url_ + "classes/Login.php?f=login",
      method: "POST",
      data: formData, // Use the modified form data
      error: function (xhr, status, error) {
        console.log("AJAX Error:", status, error);
      },
      success: function (resp) {
        console.log("Response from server:", resp); // Log the response
        if (resp) {
          try {
            resp = JSON.parse(resp);
            console.log("Status:", resp.status); // Log the status
            console.log("Redirect:", resp.redirect); // Log the redirect URL
            if (resp.status == "success") {
              location.replace(_base_url_ + resp.redirect);
            } else if (resp.status == "incorrect") {
              var _frm = $("#login-frm");
              var _msg =
                "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>";
              _frm.prepend(_msg);
              _frm.find("input").addClass("is-invalid");
              $('[name="username"]').focus();
            } else if (resp.status == "notverified") {
              var _frm = $("#login-frm");
              var _msg =
                "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Your Account is not yet verified.</div>";
              _frm.prepend(_msg);
              _frm.find("input").addClass("is-invalid");
              $('[name="username"]').focus();
            }
          } catch (error) {
            console.error("Error parsing JSON:", error);
          }
        }
        end_loader();
      },
    });
  });

  $("#clogin-frm").submit(function (e) {
    e.preventDefault();
    start_loader();
    if ($(".err_msg").length > 0) $(".err_msg").remove();
    $.ajax({
      url: _base_url_ + "classes/Login.php?f=clogin",
      method: "POST",
      data: $(this).serialize(),
      error: (err) => {
        console.log(err);
        alert_toast("An error occured", "danger");
        end_loader();
      },
      success: function (resp) {
        if (resp) {
          resp = JSON.parse(resp);
          if (resp.status == "success") {
            location.replace(_base_url_);
          } else if (resp.status == "incorrect") {
            var _frm = $("#clogin-frm");
            var _msg =
              "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect code or password</div>";
            _frm.prepend(_msg);
            _frm.find("input").addClass("is-invalid");
            $('[name="username"]').focus();
          }
        }
        end_loader();
      },
    });
  });

  //user login
  $("#slogin-frm").submit(function (e) {
    e.preventDefault();
    start_loader();
    if ($(".err_msg").length > 0) $(".err_msg").remove();
    $.ajax({
      url: _base_url_ + "classes/Login.php?f=slogin",
      method: "POST",
      data: $(this).serialize(),
      error: (err) => {
        console.log(err);
      },
      success: function (resp) {
        if (resp) {
          resp = JSON.parse(resp);
          if (resp.status == "success") {
            location.replace(_base_url_ + "student");
          } else if (resp.status == "incorrect") {
            var _frm = $("#slogin-frm");
            var _msg =
              "<div class='alert alert-danger text-white err_msg'><i class='fa fa-exclamation-triangle'></i> Incorrect username or password</div>";
            _frm.prepend(_msg);
            _frm.find("input").addClass("is-invalid");
            $('[name="username"]').focus();
          }
          end_loader();
        }
      },
    });
  });
  // $("#signup-frm").submit(function (e) {
  //   e.preventDefault();
  //   start_loader();
  //   console.log("FUNCTION SUBMIT ");
  //   if ($(".err_msg").length > 0) $(".err_msg").remove();
  //   $.ajax({
  //     url: _base_url_ + "classes/Login.php?f=signup",
  //     method: "POST",
  //     data: $(this).serialize(),
  //     error: function (err) {
  //       console.log(err);
  //       alert_toast("An error occurred", "danger");
  //       end_loader();
  //     },
  //     success: function (resp) {
  //       console.log("Response from server:", resp); // Log the response for debugging
  //       if (resp) {
  //         resp = JSON.parse(resp);

  //         if (resp.status == "success") {
  //           location.replace(_base_url_ + "/admin/?page=dashboard");
  //           clearSignupForm();
  //         } else {
  //           console.log("Error: ", resp.message);
  //           alert_toast("Error registering user", "error");
  //           alert(resp.message);
  //         }
  //       } else {
  //         console.log("Empty response"); // Log empty response
  //         alert_toast("Empty response from server", "error"); // Show error toast
  //       }
  //       end_loader(); // Hide loader regardless of response
  //     },
  //   });
  // });
  // Function to clear the signup form fields

  $("#system-frm").submit(function (e) {
    e.preventDefault();
    // start_loader()
    if ($(".err_msg").length > 0) $(".err_msg").remove();
    $.ajax({
      url: _base_url_ + "classes/SystemSettings.php?f=update_settings",
      data: new FormData($(this)[0]),
      cache: false,
      contentType: false,
      processData: false,
      method: "POST",
      type: "POST",
      success: function (resp) {
        if (resp == 1) {
          // alert_toast("Data successfully saved",'success')
          location.reload();
        } else {
          $("#msg").html(
            '<div class="alert alert-danger err_msg">An Error occured</div>'
          );
          end_load();
        }
      },
    });
  });
});
