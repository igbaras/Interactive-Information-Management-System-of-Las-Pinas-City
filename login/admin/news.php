<!-- Admin Header -->
<?php include "includes/admin_header.php"; ?>


<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Navbar -->
<?php include "includes/admin_navbar.php"; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include "includes/admin_sidebar_menu.php"; ?>


<!-- CONTENT WRAPPER. CONTAINS PAGE CONTENT -->
<?php
if (isset($_GET['source'])) {
  $source = $_GET['source'];
} else {
  $source = '';
}

switch ($source) {

  case 'add_news':
    include 'includes/add_news.php';
    break;
  case 'edit_news':
    include 'includes/edit_news.php';
    break;
  default:
    include 'includes/view_all_news.php';
}


?>
<!-- /.content-wrapper -->




<!-- Admin Footer -->
<?php include "includes/admin_footer.php" ?>