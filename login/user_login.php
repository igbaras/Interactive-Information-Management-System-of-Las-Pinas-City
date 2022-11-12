<?php include "../includes/db.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php
if (isset($_POST["submit"])) {
    if (!isset($_POST['remember'])) {
        $_POST['remember'] = "off";
    }
    $username = $_POST["username"];
    $password = $_POST["user_password"];
    $rememberMe = $_POST['remember'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $user_login_query = mysqli_query($connection, $query);

    if (!$user_login_query) {
        die("CONNECTION FAILED!" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($user_login_query)) {
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_user_id = $row['user_id'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_image = $row['user_image'];
        $db_user_email = $row['user_email'];
        $db_user_role = $row['user_role'];
    }
    // $password = crypt($password, $db_user_password);


    if (password_verify($password, $db_user_password) && $rememberMe === "on") {
        $_SESSION['user_id'] = $db_user_user_id;
        $_SESSION['user_firstname'] = $db_user_firstname;
        $_SESSION['user_lastname'] = $db_user_lastname;
        $_SESSION['user_image'] = $db_user_image;

        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['username'] = $db_username;
        $_SESSION['cryptedpass'] = $password;
        header("Location:user_access_level.php");
    } else {
        if ($username === $db_username && password_verify($password, $db_user_password) && 'admin' === $db_user_role) {
            $_SESSION['user_id'] = $db_user_user_id;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname'] = $db_user_lastname;
            $_SESSION['user_image'] = $db_user_image;
            $_SESSION['user_role'] = $db_user_role;
            header("Location:admin/portal.php");
        } else if ($username === $db_username && password_verify($password, $db_user_password) && 'writer' === $db_user_role) {
            $_SESSION['user_id'] = $db_user_user_id;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname'] = $db_user_lastname;
            $_SESSION['user_image'] = $db_user_image;
            $_SESSION['user_role'] = $db_user_role;
            header("Location:user_access_level.php");
        } else if ($username === $db_username && password_verify($password, $db_user_password) && 'customer service' === $db_user_role) {
            $_SESSION['user_id'] = $db_user_user_id;
            $_SESSION['user_firstname'] = $db_user_firstname;
            $_SESSION['user_lastname'] = $db_user_lastname;
            $_SESSION['user_image'] = $db_user_image;
            $_SESSION['user_role'] = $db_user_role;
            header("Location:user_access_level.php");
        } else {
            header("Location:index.php");
        }
    }
}

?>