<!-- writer Header -->
<?php include "includes/writer_header.php"; ?>


<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="../dist/img/writerLTELogo.png" alt="writerLTELogo" height="60" width="60">
</div> -->

<!-- Navbar -->
<?php include "includes/writer_navbar.php"; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include "includes/writer_sidebar_menu.php"; ?>


<!-- CONTENT WRAPPER. CONTAINS PAGE CONTENT -->
<?php
if (isset($_GET['source'])) {
  $source = $_GET['source'];
} else {
  $source = '';
}

switch ($source) {

  case 'update_stat':
    include 'includes/update_post_stat.php';
    break;
  case 'edit_post':
    include 'includes/edit_post.php';
    break;
  case 'post_com':
    include 'includes/post_comments.php';
    break;
  default:
    include 'includes/view_all_posts.php';
}


?>
<!-- /.content-wrapper -->




<!-- writer Footer -->
<?php include "includes/writer_footer.php" ?>


<!-- DISPLAY SELECTED IMAGE -->
<script>
  var selDiv = "";
  var storedFiles = [];
  $(document).ready(function() {
    $("#img").on("change", handleFileSelect);
    selDiv = $("#selectedBanner");
  });

  function handleFileSelect(e) {
    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    filesArr.forEach(function(f) {
      if (!f.type.match("image.*")) {
        return;
      }
      storedFiles.push(f);

      var reader = new FileReader();
      reader.onload = function(e) {
        var html =
          '<img src="' +
          e.target.result +
          "\" data-file='" +
          f.name +
          "alt='Category Image'  width='20%'>";
        selDiv.html(html);
      };
      reader.readAsDataURL(f);
    });
  }
</script>

<!-- VIEW Page specific script -->

<script src="../dist/js/script.js"></script>

<!-- =====MODAL SCRIPT========= -->
<script>
  var selDiv = "";
  var storedFiles = [];


  $(document).ready(function() {

    // DELETE FUNCTION
    $('.deletebtn').on('click', function() {

      $('#deletemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[0]);

    });

  });


  // TABLE SCRIPT
  $(document).ready(function() {

    $('#pendingTable').DataTable({
        autoWidth: false,

        order: false,
        "scrollY": "350px",
        "scrollCollapse": true,
        "paging": true,
        responsive: true,
        lengthChange: false,
        autoWidth: false,

        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      })
      .buttons()
      .container()
      .appendTo("#pendingTable_wrapper .col-md-6:eq(0)");

    $('#publishedTable').DataTable({
        autoWidth: false,

        order: false,
        "scrollY": "350px",
        "scrollCollapse": true,
        "paging": true,
        responsive: true,
        lengthChange: false,
        autoWidth: false,

        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      })
      .buttons()
      .container()
      .appendTo("#publishedTable_wrapper .col-md-6:eq(0)");


  });
</script>