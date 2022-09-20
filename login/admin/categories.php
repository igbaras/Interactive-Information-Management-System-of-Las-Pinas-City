<!-- Admin Header -->
<?php include "includes/admin_header.php"; ?>


<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div> -->

<!-- Navbar -->
<?php include "includes/admin_navbar.php"; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include "includes/admin_sidebar_menu.php"; ?>


<!-- CONTENT WRAPPER. CONTAINS PAGE CONTENT -->
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- CATEGORY FORM -->
        <div class="card card-primary col">
          <div class="card-header">
            <h3 class="card-title">Manage Category</h3>
          </div>
          <!-- /.card-header -->
          <!-- category form start -->

          <form action="" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <?php insert_category(); ?>
              <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="cat_title">
                  <div class="input-group-apprend">
                    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                  </div>
                </div>

                <div class="form-group mt-3">
                  <label for="inputClientCompany">Category Image</label>
                  <div id="selectedBanner"></div>

                  <input type="file" class="form-control" name="cat_image" id="img">


                </div>
              </div>
              <!-- /.card-body -->
          </form>
        </div>

        <?php updateCategory(); ?>

        <!-- Edit Category Modal -->
        <form action="" method="post">

          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header  bg-info">
                  <h5 class="modal-title" id="editCatedory">Edit Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="editCategory">Category:</label>
                    <div class="input-group">
                      <input type="hidden" name="cat_id" id="cat_id">
                      <input type="text" class="form-control mb-3" name="cat_title" id="cat_title">

                    </div>
                    <label for="editCategory">Created:</label>
                    <div class="input-group">
                      <input type="text" id="cat_date" class="col-4 form-control" readonly>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="update-categories" value="Update Category">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

        <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Delete Category Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <?php deleteCategory(); ?>

              <form method="POST">

                <div class="modal-body">

                  <input type="hidden" name="cat_id" id="delete_id">

                  <h4> Do you want to Delete this Data ??</h4>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                  <button type="submit" name="delete_data" class="btn btn-primary"> Yes </butron>
                </div>
              </form>

            </div>
          </div>
        </div>

        <!-- List  of Category Table -->


        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of Categories</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body table-responsive p-0" style="height: 330px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Category Title</th>

                  </tr>
                </thead>
                <tbody>

                  <?php

                  $query = "SELECT * FROM categories";
                  $all_categories_query = mysqli_query($connection, $query);
                  if (!$all_categories_query) {
                    die("CONNECTION FAILED" . " " . mysqli_error($connection));
                  }
                  while ($row = mysqli_fetch_assoc($all_categories_query)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    $cat_date = $row['cat_date'];

                  ?>
                    <tr>
                      <td> <?php echo $cat_id; ?> </td>
                      <td><?php echo $cat_title; ?> </td>
                      <td><?php echo $cat_date; ?> </td>
                      <td> <button class='btn btn-primary edit_btn' data-toggle='modal'><i class='fas fa-edit'></i></button> <button class='btn btn-danger deletebtn' data-toggle='modal'><i class='fas fa-trash'></i></button></td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
    </div>

  </section>

</div>

<!-- /.content-wrapper -->




<!-- Admin Footer -->
<?php include "includes/admin_footer.php" ?>
<script>
  var selDiv = "";
  var storedFiles = [];
  $(document).ready(function() {
    $('.edit_btn').on('click', function() {

      $('#editModal').modal('show');
      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#cat_id').val(data[0]);
      $('#cat_title').val(data[1]);
      $('#cat_date').val(data[2]);

    });

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
</script>

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
          "alt='Category Image' height='200px' width='200px'>";
        selDiv.html(html);
      };
      reader.readAsDataURL(f);
    });
  }
</script>