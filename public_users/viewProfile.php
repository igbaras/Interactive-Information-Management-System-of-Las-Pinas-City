<?php include "../includes/db.php";
require '../cloudapi/vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;


Configuration::instance([
    'cloud' => [
        'cloud_name' => 'sarabgi',
        'api_key' => '322979874984547',
        'api_secret' => 'ZKvsTGjiBUobdPkcgjsq0Ota7hg'
    ],
    'url' => [
        'secure' => true
    ]
]);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>View Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Chivo:wght@400;700&family=Poppins:wght@400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin-top: 20px;
            background-color: #DADFD9;
            color: #00180A;
        }

        h3 {
            font-weight: 600;
        }

        .img-account-profile {
            height: 10rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
            background: #CAD2C9;
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: #CAD2C9;
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .form-control,
        .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #EFF4ED;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }

        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['uid'])) {
        $user_id = $_GET['uid'];
    }
    $sql = "SELECT * FROM public_users WHERE user_id = $user_id";
    $result = mysqli_query($connection, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $user_avatar = $row["user_avatar"];
        $username = $row["username"];
        $user_fname = $row["user_fname"];
        $user_lname = $row["user_lname"];
        $user_email = $row["user_email"];
        $user_password = $row["user_password"];
    }

    if (isset($_POST['submit_image'])) {
        $user_id = $_POST['user_id'];

        $image_properties = (new UploadApi())->upload($_FILES["user_avatar"]["tmp_name"]);
        $image_url = $image_properties['secure_url'];


        $query = "UPDATE public_users SET user_avatar='{$image_url}' WHERE user_id={$user_id}; ";
        $update_image_query = mysqli_query($connection, $query);

        if (!$update_image_query) {
            echo "QUERY FAILED " . mysqli_error($connection);
        }
        if ($update_image_query) {
            echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>Image successfully Updated!<i class='fas fa-check'></i></strong></h5>    
       
        </div>";
        }
    }

    if (isset($_POST['save_change'])) {
        $user_id = $_POST['user_id'];
        $user_fname = $_POST['user_fname'];
        $user_lname = $_POST['user_lname'];

        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $username = $_POST['username'];

        if (empty($user_avatar)) {
            $query = "SELECT * FROM public_users WHERE user_id = $user_id";
            $select_image = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($select_image)) {
                $user_avatar = $row['user_avatar'];
            }
        }
        $hash = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));



        $query = "UPDATE public_users SET username = '{$username}', user_fname = '{$user_fname}', user_lname='{$user_lname}', user_email='{$user_email}', user_password='{$hash}' WHERE user_id={$user_id}; ";
        $update_user_query = mysqli_query($connection, $query);

        if (!$update_user_query) {
            echo "QUERY FAILED " . mysqli_error($connection);
        }
        if ($update_user_query) {
            echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>Account successfully Updated!<i class='fas fa-check'></i></strong></h5>    
    
        </div>";
        }
    }

    ?>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="btn btn-outline-warning text-dark" href="../index.php"> <i class="fas fa-arrow-left"></i> Back to Home</a>

        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">
                        <h3>Profile Picture</h3> <a class="btn btn-small btn-outline-info text-dark" href="viewProfile.php?uid=<?php echo $user_id ?>"> <i class="fas fa-refresh"></i> Refresh</a>
                    </div>


                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <div id="selectedBanner" class="img-account-profile rounded-circle mb-2">
                            <img class="img-account-profile rounded-circle mb-2" id="selectedBanner" src="<?php echo $user_avatar ?>" alt="">
                        </div>
                        <form method="post" enctype="multipart/form-data">


                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                            <!-- Profile picture help block-->
                            <input type="file" id="img" name="user_avatar" class="form-control small font-italic text-muted mb-4" value="<?php echo $user_avatar; ?>" required>
                            <button class="btn btn-warning" type="submit" name="submit_image">Update image</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Account Details</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                <input class="form-control" id="inputUsername" type="text" disabled placeholder="Enter your username" value="<?php echo  $username; ?>" name="username">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo  $user_fname; ?>" name="user_fname">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo  $user_lname; ?>" name="user_lname">
                                    <input type="hidden" name="user_avatar" value="<?php echo  $user_avatar; ?>">
                                </div>
                            </div>

                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="<?php echo  $user_email; ?>" name="user_email">
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3 ">
                                <label class="small mb-1" for="inputEmailAddress">Password</label>
                                <input class="form-control " id="inputEmailAddress" type="password" onClick="this.setSelectionRange(0, this.value.length)" placeholder="Enter your email address" required data-toggle="password" name="user_password">
                            </div>

                            <!-- Save changes button-->
                            <button class="btn btn-warning" type="submit" name="save_change">Save changes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        // ALERT FADE EFFECT
        $(".alert").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });
    </script>

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
                        '<img class="img-account-profile rounded-circle mb-2" src="' +
                        e.target.result +
                        "\" data-file='" +
                        f.name +
                        "alt='Category Image'  height='10rem'>";
                    selDiv.html(html);
                };
                reader.readAsDataURL(f);
            });
        }
    </script>
</body>

</html>