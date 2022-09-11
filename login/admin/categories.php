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

          <form action="" method="post">
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
              </div>
              <!-- /.card-body -->
          </form>
        </div>


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

                  <?php findAllCategories(); ?>
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