$(function () {
  $("#summernote").summernote();

  $("#submit-post").click(function (e) {
    e.preventDefault();
    var form = $("#postForm");

    $.ajax({
      url: "add_article.php",
      data: $(form).serialize(),
      method: "POST",
    }).done(function (response) {
      var data = JSON.parse(response);
    });
  });
});
