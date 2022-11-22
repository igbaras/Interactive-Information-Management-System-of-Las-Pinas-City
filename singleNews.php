<?php include "includes/db.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image icon" href="./Assets/images/lplogo.png">
    <title>News Room | The City of Las Piñas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image icon" href="./Assets/images/lplogo.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./Assets/newsassets/lib/owlcarousel/owl.carousel.min.js" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./Assets/newsassets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">Article</div>
                </div>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
                Monday, January 01, 2045
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="img/ads-700x70.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="news.php" class="nav-item nav-link">News Home</a>
                    <a href="index.php" class="nav-item nav-link">Home</a>


                </div>
                <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">

            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                    if (isset($_GET['an_id'])) {
                        $published_post_id = $_GET['an_id'];
                        $query = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = $published_post_id";
                        $views_query = mysqli_query($connection, $query);

                        $query = "SELECT * FROM posts WHERE post_id = $published_post_id ";
                        $all_post_query = mysqli_query($connection, $query);

                        while ($row =  mysqli_fetch_assoc($all_post_query)) {

                            $post_category_id = $row["post_category_id"];
                            $post_title = $row["post_title"];
                            $post_author = $row["post_author"];
                            $post_date = $row["post_date"];
                            $post_image = $row["post_image"];
                            $post_content = html_entity_decode($row["post_content"]);
                            $post_tags = $row["post_tags"];
                            $post_status = $row["post_status"];

                            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                            $select_cat_query = mysqli_query($connection, $query);
                            while ($row =  mysqli_fetch_assoc($select_cat_query)) {
                                $post_category_id = $row['cat_title'];
                    ?>
                                <!-- News Detail Start -->
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="<?php echo $post_image; ?>" alt="news img" style="object-fit: cover;">
                                    <div class="overlay position-relative bg-light">
                                        <div class="mb-3">
                                            <a href=""><?php echo $post_category_id; ?></a>
                                            <span class="px-1">/</span>
                                            <span><?php echo $post_date; ?></span>
                                        </div>
                                        <div>
                                            <h3 class="mb-3"><?php echo $post_title; ?></h3>
                                            <?php echo $post_content; ?>

                                        </div>
                                    </div>
                                </div>
                    <?php }
                        }
                    } else {
                        header("Location: news.php");
                    } ?>
                    <!-- News Detail End -->

                    <?php
                    if (isset($_SESSION['userId'])) {
                        $puserId = $_SESSION['userId'];

                        $query = "SELECT * FROM public_users WHERE user_id = $puserId ";
                        $all_users_query = mysqli_query($connection, $query);


                        while ($row =  mysqli_fetch_assoc($all_users_query)) {

                            $user_id = $row["user_id"];
                            $user_avatar = $row["user_avatar"];
                            $username = $row["username"];
                            $user_fname = $row["user_fname"];
                            $user_lname = $row["user_lname"];
                            $user_email = $row["user_email"];
                        }

                        if (isset($_POST['leave_comment'])) {
                            $comment_post_id = $_GET['an_id'];
                            $comment_author = $_POST['comment_author'];
                            $comment_email = $_POST['comment_email'];
                            $comment_content = $_POST['comment_content'];
                            $comment_user_image = $_POST['comment_user_image'];

                            if (!empty($comment_content)) {

                                $query = "INSERT INTO post_comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_user_image, comment_date) ";
                                $query .= "VALUES ($comment_post_id, '{$comment_author}','{$comment_email}','{$comment_content}','pending', '{$comment_user_image}', current_timestamp())";

                                $create_comment_query = mysqli_query($connection, $query);

                                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                                $query .= "WHERE post_id = {$published_post_id}";
                                $update_post_comment_count = mysqli_query($connection, $query);

                                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>Your Comment was successfully submitted! It's in the review process before it appears on the comment section.</strong>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
                            } else {
                                echo "<script>alert('Fields should not be empty')</script>";
                            }
                        }


                    ?>

                        <!-- Comment Form Start -->
                        <div class="bg-light mb-3" style="padding: 30px;">
                            <h3 class="mb-4">Leave a comment</h3>
                            <form method="post">

                                <div class="form-group">
                                    <label for="message">Comment *</label>
                                    <input type="hidden" name="comment_author" value="<?php echo $user_fname . " " . $user_lname; ?>">
                                    <input type="hidden" name="comment_email" value="<?php echo $user_email; ?>">
                                    <input type="hidden" name="comment_user_image" value="<?php echo $user_avatar; ?>">
                                    <textarea id="message" cols="30" rows="5" name="comment_content" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave a comment" name="leave_comment" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        </div>
                        <!-- Comment Form End -->




                    <?php
                    } else {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Please login first! in order to leave a comment.</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
                    }
                    ?>




                    <!-- Comment List Start -->

                    <?php $query = "SELECT * FROM post_comments WHERE comment_post_id = {$published_post_id} ";
                    $query .= "AND comment_status = 'approved' ";
                    $query .= "ORDER BY comment_id DESC";
                    $select_comment_query = mysqli_query($connection, $query);
                    $comment_num = mysqli_num_rows($select_comment_query); ?>
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h3 class="mb-4"><?php echo $comment_num; ?> Comments</h3>
                        <?php

                        $query = "SELECT * FROM post_comments WHERE comment_post_id = {$published_post_id} ";
                        $query .= "AND comment_status = 'approved' ";
                        $query .= "ORDER BY comment_id DESC";
                        $select_comment_query = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_comment_query)) {
                            $comment_author = $row['comment_author'];
                            $comment_date = date("F j, Y, g:i a", strtotime($row['comment_date']));

                            $comment_content = $row['comment_content'];
                            $comment_user_image = $row['comment_user_image'];

                        ?>
                            <div class="media mb-4">
                                <img src="<?php echo $comment_user_image; ?>" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><strong><?php echo $comment_author; ?></strong>&nbsp;&nbsp;<small><i><?php echo $comment_date; ?></i></small></h6>
                                    <p><?php echo $comment_content; ?></p>

                                </div>
                            </div>
                            <hr>
                        <?php } ?>

                    </div>

                    <!-- Comment List End -->


                </div>
            </div>
        </div>
    </div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./Assets/newsassets/lib/easing/easing.min.js"></script>
    <script src="./Assets/newsassets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="./Assets/newsassets/mail/jqBootstrapValidation.min.js"></script>
    <script src="./Assets/newsassets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="./Assets/newsassets/js/main.js"></script>
</body>

</html>