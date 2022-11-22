<?php
$showAlert = false;
$showError = false;

if (isset($_POST['submit_sign'])) {
    global $connection;
    $username = $_POST["username"];
    $user_fname = $_POST["user_fname"];
    $user_lname = $_POST["user_lname"];
    $user_email = $_POST["user_email"];

    $user_password = $_POST["user_password"];
    $cuser_password = $_POST["cuser_password"];


    // Check whether this username exists
    $existSql = "SELECT * FROM public_users WHERE username = '$username'";
    $result = mysqli_query($connection, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showError = "Username Already Exists";
        header("Location: ../index.php?signupsuccess=false&error=$showError");
    } else {
        if (($user_password == $cuser_password)) {
            $hash = password_hash($user_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO public_users (username, user_fname, user_lname, user_avatar,user_email, user_password, joinDate) VALUES ('$username', '$user_fname', '$user_fname','$user_lname', '$user_email', '$hash', current_timestamp())";
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
