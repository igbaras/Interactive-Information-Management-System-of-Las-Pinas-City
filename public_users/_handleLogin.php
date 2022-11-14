<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../includes/db.php';
    $pusername = $_POST["loginusername"];
    $password = $_POST["loginpassword"];

    $sql = "Select * from public_users where username='$pusername'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($result);
        $userId = $row['user_id'];
        if (password_verify($password, $row['user_password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['pusername'] = $pusername;
            $_SESSION['userId'] = $userId;
            header("location: ../index.php?loginsuccess=true");
            exit();
        } else {
            header("location: ../index.php?loginsuccess=false");
        }
    } else {
        header("location: ../index.php?loginsuccess=false");
    }
}
