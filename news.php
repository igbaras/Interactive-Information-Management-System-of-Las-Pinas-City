<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image icon" href="./Assets/images/lplogo.png">
    <title>News | The City of Las Piñas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./Assets/newsassets/lib/owlcarousel/assets/owl.carousel.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./Assets/newsassets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Header -->
    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "105339958124324");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v15.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">

                </div>
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary"> </span>News<span class="text-primary">Room</span></h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="./Assets/newsassets/img/ads-700x70.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary"></span>News<span class="text-primary"></span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="all_news_cat.php" class="nav-item nav-link">Categories</a>
                    <a href="all_featured.php" class="nav-item nav-link">Featured</a>

                    <a href="#popular" class="nav-item nav-link">Popular</a>
                </div>

            </div>
        </nav>
    </div>
    <!-- Navbar End -->




    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">


                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">

                        <?php
                        if (isset($_GET['c_id'])) {
                            $the_cat_id = $_GET['c_id'];
                            $query = "SELECT * FROM posts WHERE post_category_id = $the_cat_id ORDER BY post_id DESC";
                            $select_all_post_query = mysqli_query($connection, $query);
                            if (!$select_all_post_query) {
                                die("CONNECTION FAILED" . " " . mysqli_error($connection));
                            }
                        } else {
                            $query = "SELECT * FROM posts ORDER BY post_id DESC";
                            $select_all_post_query = mysqli_query($connection, $query);
                            if (!$select_all_post_query) {
                                die("CONNECTION FAILED" . " " . mysqli_error($connection));
                            }
                        }

                        while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                            $post_id = $row['post_id'];
                            $post_category_id = $row['post_category_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = date("F j, Y", strtotime($row['post_date']));
                            // $post_date = strtotime($post_date);


                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_tags = $row['post_tags'];
                            $post_status = $row['post_status'];


                            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                            $select_all_cat_query = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_all_cat_query)) {
                                $post_category_id1 = $row['cat_id'];
                                $post_category_id = $row['cat_title'];
                        ?>

                                <div class="position-relative overflow-hidden" style="height: 435px;">


                                    <img class=" img-fluid h-100" src="<?php echo $post_image; ?>" style="object-fit: cover;">

                                    <div class="overlay">
                                        <div class="mb-1">
                                            <a class="btn btn-sm btn-secondary rounded text-white" href=""><?php echo $post_category_id; ?></a>
                                            <span class="px-2 text-white">/</span>
                                            <a class="text-white" href=""><?php echo $post_date; ?></a>
                                        </div>
                                        <a class="h2 m-0 text-white font-weight-bold" href="singleNews.php?an_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
                                    </div>

                                </div>

                        <?php }
                        } ?>
                    </div>

                </div>
                <div class="col-lg-4">
                    <?php if (!empty($the_cat_id)) {
                        $query = "SELECT * FROM categories WHERE cat_id = $the_cat_id";
                        $select_all_cat_query = mysqli_query($connection, $query);
                        while ($row = mysqli_fetch_assoc($select_all_cat_query)) {
                            $post_category_id1 = $row['cat_id'];
                            $post_category_id = $row['cat_title'];
                        }
                    ?>

                        <div class="input-group">
                            <div class="input-group-append">
                                <h3><span class="badge bg-primary"><?php echo $post_category_id; ?> <a href="news.php" class="btn btn-primary">X</a></span>
                                </h3>
                            </div>
                        </div>
                    <?php
                    } ?>
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Categories</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href="all_news_cat.php">View All</a>
                    </div>
                    <?php
                    $query = "SELECT * FROM categories ORDER BY cat_id DESC LIMIT 4 ";
                    $select_all_cat = mysqli_query($connection, $query);
                    if (!$connection) {
                        die("CONNECTION FAILED" . " " . mysqli_error($connection));
                    }
                    while ($row = mysqli_fetch_assoc($select_all_cat)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        $cat_image = $row['cat_image'];


                    ?>
                        <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                            <img class="img-fluid w-100 h-100" src="<?php echo $cat_image; ?>" style="object-fit: cover;">
                            <a href="news.php?c_id=<?php echo $cat_id; ?>" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                                <?php echo $cat_title; ?>
                            </a>
                        </div>
                    <?php   } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Featured</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="all_featured.php">View All</a>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">

                <?php
                if (isset($_GET['c_id'])) {
                    $the_cat_id = $_GET['c_id'];
                    $query = "SELECT * FROM posts WHERE post_category_id = $the_cat_id ORDER BY post_id DESC";
                    $select_all_post_query = mysqli_query($connection, $query);
                    if (!$select_all_post_query) {
                        die("CONNECTION FAILED" . " " . mysqli_error($connection));
                    }
                } else {
                    $query = "SELECT * FROM posts ORDER BY post_id DESC";
                    $select_all_post_query = mysqli_query($connection, $query);
                    if (!$select_all_post_query) {
                        die("CONNECTION FAILED" . " " . mysqli_error($connection));
                    }
                }

                while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = date("F j, Y", strtotime($row['post_date']));


                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_status = $row['post_status'];


                    $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                    $select_all_cat_query = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_all_cat_query)) {
                        $post_category_id1 = $row['cat_id'];
                        $post_category_id = $row['cat_title'];
                ?>
                        <div class="position-relative overflow-hidden" style="height: 300px;">


                            <img class="img-fluid w-100 h-100" src="<?php echo $post_image; ?>" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a class="text-white" href=""><?php echo $post_category_id; ?></a>
                                    <span class="px-1 text-white">/</span>
                                    <a class="text-white" href=""><?php echo $post_date; ?></a>
                                </div>
                                <a class="h4 m-0 text-white" href="singleNews.php?an_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    </div>
    <!-- Featured News Slider End -->





    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3" div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
        <div class="container" id="popular">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">Popular</h3>

                            </div>
                        </div>
                        <?php
                        if (isset($_GET['c_id'])) {
                            $the_cat_id = $_GET['c_id'];
                            $query = "SELECT * FROM posts WHERE post_category_id = $the_cat_id ORDER BY post_id DESC";
                            $select_all_post_query = mysqli_query($connection, $query);
                            if (!$select_all_post_query) {
                                die("CONNECTION FAILED" . " " . mysqli_error($connection));
                            }
                            $num_rows = mysqli_num_rows($select_all_post_query);
                            if ($num_rows == 0) {
                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>Nothing is popular with this category.</strong>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                                </button>
                              </div>";
                            }
                        } else {
                            $query = "SELECT * FROM posts ORDER BY post_views DESC LIMIT 2";
                            $select_all_post_query = mysqli_query($connection, $query);
                            if (!$select_all_post_query) {
                                die("CONNECTION FAILED" . " " . mysqli_error($connection));
                            }
                        }


                        while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                            $post_id = $row['post_id'];
                            $post_category_id = $row['post_category_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = date("F j, Y", strtotime($row['post_date']));


                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_tags = $row['post_tags'];
                            $post_desc = $row['post_desc'];
                            $post_status = $row['post_status'];


                            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                            $select_all_cat_query = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_all_cat_query)) {

                                $post_category_id = $row['cat_title'];
                        ?>
                                <div class="col-lg-6">

                                    <div class="position-relative mb-3">
                                        <img class="img-fluid w-100" src="<?php echo $post_image; ?>" style="object-fit: cover; height: 350px;">
                                        <div class="overlay position-relative bg-light">
                                            <div class="mb-2" style="font-size: 14px;">
                                                <a href="" class="text-dark"><?php echo $post_category_id; ?></a>
                                                <span class="px-1">/</span>
                                                <span><?php echo $post_date; ?></span>
                                            </div>
                                            <a class="h4" href="singleNews.php?an_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
                                            <p class="m-0"><?php echo $post_desc; ?></p>
                                        </div>
                                    </div>

                                </div>
                        <?php }
                        } ?>
                    </div>

                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid w-100" src="./Assets/newsassets/img/ads-700x70.jpg" alt=""></a>
                    </div>


                </div>

                <div class="col-lg-4 pt-3 pt-lg-0">



                    <!-- Ads Start -->
                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid w-100" src="./Assets/programservicesassets/images/pic15.jpg" alt=""></a>
                    </div>
                    <!-- Ads End -->



                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="#" class="navbar-brand">
                    <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary"> </span>News<span class="text-primary">Room</span></h1>
                </a>


            </div>


        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy; <a class="font-weight-bold" href="#">News Room</a>. All Rights Reserved.
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./Assets/newsassets/lib/easing/easing.js"></script>
    <script src="./Assets/newsassets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="./Assets/newsassets/mail/jqBootstrapValidation.min.js"></script>
    <script src="./Assets/newsassets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="./Assets/newsassets/js/main.js"></script>
</body>

</html>