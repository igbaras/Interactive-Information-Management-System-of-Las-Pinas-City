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

<style>
  /* Content of modal div is center aligned */
  .modal {
    text-align: center;
  }
</style>
<!-- CONTENT WRAPPER. CONTAINS PAGE CONTENT -->
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <!-- CATEGORY FORM -->
        <div class="card card-primary col-12">
          <div class="card-header">
            <h3 class="card-title">Manage Gallery</h3>
          </div>

          <!-- ADD ITEM BUTTON -->

          <buttton class="btn btn-lg btn-success" data-toggle="modal" data-target="#form_modal"><span class="fas fa-plus"></span> ADD</buttton>
        </div>

        <!-- ADD IMAGE MODAL -->
        <div class="modal fade" id="form_modal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                  <h3 class="modal-title">Add Image to Gallery</h3>
                </div>
                <div class="modal-body">
                  <div class="col-md-2"></div>
                  <div class="col-md-12 ">

                    <div class="form-group text-left">
                      <label>Image:</label>
                      <div id="selectedBanner"></div>
                      <input type="file" class="form-control" name="img_image" id="img_image" required="required" />
                    </div>
                    <div class="form-group text-left">
                      <label>Title</label>
                      <input type="text" class="form-control" name="img_title" required="required" />
                    </div>
                    <div class="form-group text-left">
                      <label>Status</label>
                      <input type="text" class="form-control" name="img_status" required="required" />
                    </div>
                    <div class="form-group text-left">
                      <label>Description</label>
                      <textarea name="img_desc" id="" class="form-control" cols="30" rows="3"></textarea>
                    </div>

                  </div>
                </div>
                <br style="clear:both;" />
                <div class="modal-footer">
                  <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                  <button class="btn btn-primary" name="submit_image"><span class="glyphicon glyphicon-save"></span> Submit</button>
                </div>
              </form>
            </div>
          </div>
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

                  <input type="hidden" name="img_id" id="delete_id">

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
              <h3 class="card-title">List of Images</h3>
            </div>
            <!-- /.card-header -->
            <?php insert_gallery(); ?>
            <?php updateGallery(); ?>
            <?php deleteGallery(); ?>
            <div class="card-body">
              <table id="example1" class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th></th>


                  </tr>
                </thead>
                <tbody>

                  <?php
                  $query = "SELECT * FROM gallery ORDER BY img_id DESC ";
                  $all_img_query = mysqli_query($connection, $query);
                  if (!$all_img_query) {
                    die("CONNECTION FAILED" . " " . mysqli_error($connection));
                  }
                  while ($row = mysqli_fetch_assoc($all_img_query)) {
                    $img_id = $row['img_id'];
                    $img_title = $row['img_title'];
                    $img_image = $row['img_image'];
                    $img_status = $row['img_status'];
                    $img_date = date("F j, Y, g:i a", strtotime($row["img_date"]));
                    $img_desc = $row['img_desc'];

                  ?>
                    <tr>
                      <td> <?php echo $img_id; ?> </td>
                      <td><?php echo $img_title; ?> </td>
                      <td><?php echo "<img src='../images/gallery/$img_image' alt='' width='100px'>"; ?> </td>
                      <td><?php echo $img_status; ?> </td>
                      <td><?php echo  $img_date; ?> </td>

                      <td><button class='btn btn-secondary' data-toggle='modal' data-target="#viewImage<?php echo $img_id ?>"><i class='fas fa-eye'></i></button><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $img_id ?>"><i class='fas fa-pen'></i></button><button class='btn btn-danger deletebtn' data-toggle='modal'><i class='fas fa-trash'></i></button></td>

                      <!-- View Image Modal -->
                      <div class="modal fade" id="viewImage<?php echo $img_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <!-- w-100 class so that header
                div covers 100% width of parent div -->
                              <h5 class="modal-title w-100" id="exampleModalLabel"><strong> <?php echo $img_title; ?></strong>

                              </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">
                                  ×
                                </span>
                              </button>
                            </div>
                            <!--Modal body with image-->
                            <div class="modal-body">
                              <img src="../images/gallery/<?php echo $img_image; ?>" width="50%" />
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Close
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>


                      <!-- ========EDIT MODAL=========== -->
                      <div class="modal fade" id="edit<?php echo $img_id ?>" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form method="POST" enctype="multipart/form-data" action="">
                              <div class="modal-header bg-info">
                                <h4 class="modal-title">Edit Image</h4>
                              </div>
                              <div class="modal-body">
                                <div class="col-md-2"></div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <h5 class="text-left">Current Photo</h5>
                                    <img src="<?php echo "../images/gallery/$img_image" ?>" height="120" width="150" />
                                    <input type="hidden" name="previous" value="<?php echo $img_image; ?>" />
                                    <hr>
                                    <h5 class="text-left">New Photo</h5>
                                    <input type="file" class="form-control" name="img_image" value="<?php echo $img_image; ?>" required="required" />
                                  </div>
                                  <div class="form-group text-left">
                                    <label for="editCategory">Title:</label>
                                    <div class="input-group">
                                      <input type="hidden" value="<?php echo $img_id; ?>" name="img_id" />
                                      <input type="text" class="form-control mb-3" name="img_title" id="img_title" value="<?php echo $img_title; ?>">
                                    </div>
                                    <label for="editCategory">Status:</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control mb-3" name="img_status" id="img_status" value="<?php echo $img_status; ?>">
                                    </div>

                                    <label for="editCategory">Description:</label>
                                    <div class="input-group">
                                      <textarea name="img_desc" class="form-control" id="" cols="30" rows="3"><?php echo $img_desc; ?></textarea>

                                    </div>
                                  </div>

                                </div>
                              </div>
                              <br style="clear:both;" />
                              <div class="modal-footer">
                                <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                <button type="submit" class="btn btn-primary" name="update-gallery"><span class="glyphicon glyphicon-save"></span> Update</button>
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
<script>
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
</script>

<!-- DISPLAY SELECTED IMAGE -->
<script>
  var selDiv = "";
  var storedFiles = [];
  $(document).ready(function() {
    $("#img_image").on("change", handleFileSelect);
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
  // ALERT FADE EFFECT
  $(".alert").delay(4000).slideUp(200, function() {
    $(this).alert('close');
  });
</script>
<script src="../dist/js/script.js"></script>