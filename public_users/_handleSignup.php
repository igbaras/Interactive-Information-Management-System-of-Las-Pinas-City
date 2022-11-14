<?php
$showAlert = false;
$showError = false;
include '../includes/db.php';
if (isset($_POST['submit'])) {

    $username = $_POST["username"];
    $user_fname = $_POST["user_fname"];
    $user_lname = $_POST["user_lname"];
    $user_email = $_POST["user_email"];
    $user_avatar = $_FILES['user_avatar']['name'];
    $user_avatar_tmp = $_FILES['user_avatar']['tmp_name'];
    $user_password = $_POST["user_password"];
    $cuser_password = $_POST["cuser_password"];

    move_uploaded_file($user_avatar_tmp, "images/$user_avatar/");
    // Check whether this username exists
    $existSql = "SELECT * FROM `public_users` WHERE username = '$username'";
    $result = mysqli_query($connection, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showError = "Username Already Exists";
        header("Location: ../index.php?signupsuccess=false&error=$showError");
    } else {
        if (($user_password == $cuser_password)) {
            $hash = password_hash($user_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `username`, `user_fname`, `user_lname`, `user_avatar`, `user_email`,  `password`, `joinDate`) VALUES ('$username', '$user_fname', '$user_lname', '$user_avatar', '$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                $showAlert = true;
                header("Location: ../index.php?signupsuccess=true");
            }
        } else {
            $showError = "Passwords do not match";
            header("Location: ../index.php?signupsuccess=false&error=$showError");
        }
    }
}
