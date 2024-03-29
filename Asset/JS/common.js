$(document).ready(function () {
  toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-center",
    preventDuplicates: false,
    onclick: null,
    showDuration: "200",
    hideDuration: "3000",
    timeOut: "3000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "slideDown",
    hideMethod: "slideUp",
  };

  $("#summernote").summernote({
    height: 150,
    toolbar: [
      ["style", ["style"]],
      [
        "font",
        [
          "bold",
          "italic",
          "underline",
          "strikethrough",
          "superscript",
          "subscript",
          "clear",
        ],
      ],
      // [ 'fontname', [ 'fontname' ] ],
      ["fontsize", ["fontsize"]],
      ["color", ["color"]],
      ["para", ["ol", "ul", "paragraph"]],
      ["table", ["table"]],
      ["view", ["undo", "redo", "codeview", "help"]],
    ],
  });

  $(".select2").select2({
    placeholder: "Select an option",
    closeOnSelect: true,
  });

  $(".carousel").carousel({
    interval: 2500,
  });
  
});
