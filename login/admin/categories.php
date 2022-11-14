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
          <!-- ADD ITEM BUTTON -->
          <buttton class="btn btn-lg btn-success" data-toggle="modal" data-target="#form_modal"><span class="fas fa-plus"></span> ADD CATEGORY</buttton>
          <!-- ADD CATEGORY MODAL -->
          <div class="modal fade" id="form_modal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Add Image to Gallery</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                      ×
                    </span>
                  </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="card-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Title</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="cat_title" required>

                      </div>
                      <label for="exampleInputEmail1">Category Description</label>
                      <div class="input-group">
                        <textarea name="cat_desc" class="form-control" id="" cols="30" rows="3" required></textarea>
                      </div>

                      <div class="form-group mt-3">
                        <label for="inputClientCompany">Category Image</label>
                        <div id="selectedBanner"></div>

                        <input type="file" class="form-control" name="cat_image" id="cat_image" required>


                      </div>
                      <div class="input-group">
                        <input type="submit" name="submit" class="btn btn-lg btn-block btn-outline-primary" value="Add Category">
                      </div>
                    </div>
                    <!-- /.card-body -->
                </form>
              </div>
            </div>
          </div>

          <!-- category form start -->


        </div>


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


        <!-- List  of Category Table -->


        <div class="col">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List of Categories</h3>


            </div>
            <!-- /.card-header -->
            <?php insert_category(); ?>
            <?php deleteCategory(); ?>
            <?php updateCategory(); ?>
            <div class="card-body">
              <table id="exampleB" class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Category Title</th>
                    <th>Image</th>

                    <th>Date Created</th>
                    <th></th>


                  </tr>
                </thead>
                <tbody>

                  <?php
                  $query = "SELECT * FROM categories ORDER BY cat_id  DESC ";
                  $all_categories_query = mysqli_query($connection, $query);
                  if (!$all_categories_query) {
                    die("CONNECTION FAILED" . " " . mysqli_error($connection));
                  }
                  while ($row = mysqli_fetch_assoc($all_categories_query)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    $cat_image = $row['cat_image'];
                    $cat_date = date("F j, Y, g:i a", strtotime($row["cat_date"]));
                    $cat_desc = $row['cat_desc'];

                  ?>
                    <tr>
                      <td> <?php echo $cat_id; ?> </td>
                      <td><?php echo $cat_title; ?> </td>
                      <td><?php echo "<img src='../images/categories/$cat_image' alt='' width='100px'>"; ?> </td>

                      <td><?php echo  $cat_date; ?> </td>

                      <td> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $cat_id ?>"><i class='fas fa-edit'></i></button><button class='btn btn-danger deletebtn' data-toggle='modal'><i class='fas fa-trash'></i></button></td>


                      <!-- ========EDIT MODAL=========== -->
                      <div class="modal fade" id="edit<?php echo $cat_id ?>" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="POST" enctype="multipart/form-data" action="">
                              <div class="modal-header bg-info">
                                <h4 class="modal-title">Edit Category</h4>
                              </div>
                              <div class="modal-body">
                                <div class="col-md-2"></div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <h5>Current Photo</h5>
                                    <img src="<?php echo "../images/categories/$cat_image" ?>" height="120" width="150" />
                                    <input type="hidden" name="previous" value="<?php echo $cat_image; ?>" />
                                    <hr>
                                    <h5>New Photo</h5>
                                    <input type="file" class="form-control" name="cat_image" />
                                  </div>
                                  <div class="form-group">
                                    <label for="editCategory">Category:</label>
                                    <div class="input-group">
                                      <input type="hidden" value="<?php echo $cat_id; ?>" name="cat_id" />
                                      <input type="text" class="form-control mb-3" name="cat_title" id="cat_title" value="<?php echo $cat_title; ?>">
                                    </div>

                                    <label for="editCategory">Description:</label>
                                    <div class="input-group">
                                      <textarea name="cat_desc" class="form-control" id="" cols="30" rows="3"><?php echo $cat_desc; ?></textarea>

                                    </div>
                                  </div>

                                </div>
                              </div>
                              <br style="clear:both;" />
                              <div class="modal-footer">
                                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                <button type="submit" class="btn btn-primary" name="update-categories"><span class="glyphicon glyphicon-save"></span> Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </tr>

                  <?php
                  } ?>
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
      $('#cat_image').val(data[2]);
      // $('#cat_date').val(data[3]);


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

    // ALERT FADE EFFECT
    $(".alert").delay(4000).slideUp(200, function() {
      $(this).alert('close');
    });

    $("#exampleB")
      .DataTable({
        order: false,
        responsive: true,
        lengthChange: false,
        autoWidth: false,

        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
      })
      .buttons()
      .container()
      .appendTo("#exampleB_wrapper .col-md-6:eq(0)");
  });
</script>

<!-- DISPLAY SELECTED IMAGE -->
<script>
  var selDiv = "";
  var storedFiles = [];
  $(document).ready(function() {
    $("#cat_image").on("change", handleFileSelect);
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
          "alt='Category Image' width='40%'>";
        selDiv.html(html);
      };
      reader.readAsDataURL(f);
    });
  }
</script>
<script src="../dist/js/script.js"></script>