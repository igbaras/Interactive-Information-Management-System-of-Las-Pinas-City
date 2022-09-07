<?php session_start(); ?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <title></title>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php

    if (isset($_SESSION['user_role'])) {

        if ($_SESSION['user_role'] == 'admin') {
            header("Location: admin/portal.php");
        } else if ($_SESSION['user_role'] == 'writer') {
            header("Location: writer_editor/writer_portal.php");
        } else if ($_SESSION['user_role'] == 'customer service') {
            header("Location: customer_service/cs_portal.php");
        }
    }

    ?>

</body>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

</html>