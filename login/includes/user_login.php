<?php include "../../includes/db.php"; ?>

<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["user_password"];

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $user_login_query = mysqli_query($connection, $query);

    if (!$user_login_query) {
        die("CONNECTION FAILED!" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($user_login_query)) {
        $db_username = $row["username"];
        $db_password = $row["user_password"];
    }

    if ($username === $db_username && $password === $db_password) {
        header("Location:../portal.php");
    } else {
        header("Location:../index.php");
    }
}

?>