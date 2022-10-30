<?php include "includes/db.php"; ?>

<?php

$num_per_page = 05;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>NEWSROOM - Free Bootstrap Magazine Template</title>
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
    <link href="./Assets/newsassets/lib/owlcarousel/assets/owl.carousel.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./Assets/newsassets/css/style.css" rel="stylesheet">
</head>

<body>



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
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="category.html" class="nav-item nav-link active">Categories</a>
                    <a href="single.html" class="nav-item nav-link">Single News</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Menu item 1</a>
                            <a href="#" class="dropdown-item">Menu item 2</a>
                            <a href="#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
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
                <a class="breadcrumb-item" href="#">Home</a>
                <a class="breadcrumb-item" href="#">Category</a>
                <span class="breadcrumb-item active">Technology</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">All Featured</h3>

                            </div>
                        </div>


                        <?php

                        $query = "SELECT * FROM posts ORDER BY post_id DESC";
                        $select_all_post_query = mysqli_query($connection, $query);
                        if (!$select_all_post_query) {
                            die("CONNECTION FAILED" . " " . mysqli_error($connection));
                        }
                        while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                            $post_id = $row['post_id'];
                            $post_category_id = $row['post_category_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_date = strtotime($post_date);

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
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <img class="img-fluid w-100" src="img/news-500x280-1.jpg" style="object-fit: cover;">
                                        <div class="overlay position-relative bg-light">
                                            <div class="mb-2" style="font-size: 14px;">
                                                <a href="">Technology</a>
                                                <span class="px-1">/</span>
                                                <span>January 01, 2045</span>
                                            </div>
                                            <a class="h4" href="">Est stet amet ipsum stet clita rebum duo</a>
                                            <p class="m-0">Rebum dolore duo et vero ipsum clita, est ea sed duo diam ipsum, clita at justo, lorem amet vero eos sed sit...</p>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span class="fa fa-angle-double-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>



                <!-- Footer Start -->
                <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-5">
                            <a href="index.html" class="navbar-brand">
                                <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                            </a>
                            <p>Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et</p>
                            <div class="d-flex justify-content-start mt-4">
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5">
                            <h4 class="font-weight-bold mb-4">Categories</h4>
                            <div class="d-flex flex-wrap m-n1">
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Sports</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Technology</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Entertainment</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Lifestyle</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5">
                            <h4 class="font-weight-bold mb-4">Tags</h4>
                            <div class="d-flex flex-wrap m-n1">
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Politics</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Business</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Corporate</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Sports</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Health</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Education</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Science</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Technology</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Foods</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Entertainment</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Travel</a>
                                <a href="" class="btn btn-sm btn-outline-secondary m-1">Lifestyle</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-5">
                            <h4 class="font-weight-bold mb-4">Quick Links</h4>
                            <div class="d-flex flex-column justify-content-start">
                                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>About</a>
                                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Advertise</a>
                                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Privacy & policy</a>
                                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Terms & conditions</a>
                                <a class="text-secondary" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid py-4 px-sm-3 px-md-5">
                    <p class="m-0 text-center">
                        &copy; <a class="font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved.


                        Designed by <a class="font-weight-bold" href="https://freewebsitecode.com">Free Website Code</a>
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