<?php include "includes/db.php"; ?>
<?php include "includes/functions.php"; ?>
<?php

$num_per_page = 6;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start_from = ($page - 1) * 6;

if (isset($_POST['submit_key'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' OR post_title LIKE '%$search%' LIMIT $start_from,$num_per_page";
    $allFeat_query = mysqli_query($connection, $query);
} else {
    $query = "SELECT * FROM posts LIMIT $start_from, $num_per_page ";
    $allFeat_query = mysqli_query($connection, $query);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image icon" href="./Assets/images/lplogo.png">
    <title>News Featured | The City of Las Piñas</title>
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
                    <a href="news.php" class="nav-item nav-link active">News Home</a>
                    <a href="all_news_cat.php" class="nav-item nav-link">Categories</a>
                    <a href="index.php" class="nav-item nav-link">Home</a>
                </div>

                <form method="post">
                    <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">

                        <input type="text" name="search" class="form-control" placeholder="Keyword">
                        <div class="input-group-append">
                            <button class="input-group-text text-secondary" type="submit" name="submit_key"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

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
                <div class="col-lg">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center  bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">All Featured</h3>
                                <?php if (!empty($search)) { ?>

                                    <div class="input-group-append ml-3">
                                        <div class="input-group-append">
                                            <h3><span class="badge bg-primary"><?php echo $search; ?> <a href="all_featured.php" class="btn btn-primary">X</a></span>
                                            </h3>
                                        </div>
                                    </div>

                                <?php
                                } ?>
                            </div>

                        </div>
                        <?php
                        while ($row = mysqli_fetch_assoc($allFeat_query)) {
                            $post_id = $row['post_id'];
                            $post_category_id = $row['post_category_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = date("F j, Y", strtotime($row['post_date']));


                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_tags = $row['post_tags'];
                            $post_status = $row['post_status'];
                            $post_desc = $row['post_desc'];


                            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                            $select_all_cat_query = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_all_cat_query)) {
                                $post_category_id1 = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                        ?>
                                <div class="col-lg-6">
                                    <div class="position-relative mb-3">
                                        <a href="singleNews.php?an_id=<?php echo $post_id ?>"><img class="img-fluid w-100" src="<?php echo $post_image; ?>" style="object-fit: cover; height:430px;"></a>
                                        <div class="overlay position-relative bg-light">
                                            <div class="mb-2" style="font-size: 14px;">
                                                <a href="" class="btn-sm btn-secondary rounded text-white"><?php echo $cat_title; ?></a>
                                                <span class="px-1">/</span>
                                                <span><?php echo $post_date; ?></span>
                                            </div>
                                            <a class="h4" href="singleNews.php?an_id=<?php echo $post_id ?>"><?php echo $post_title; ?></a>
                                            <p class="m-0"><?php echo $post_desc; ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        }
                        ?>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation" id="myDIV">
                                <ul class="pagination justify-content-center">
                                    <?php
                                    $pr_query = "SELECT * FROM posts";
                                    $pr_feature = mysqli_query($connection, $pr_query);
                                    $total_records = mysqli_num_rows($pr_feature);

                                    $total_page = ceil($total_records / $num_per_page);


                                    if ($page > 1) {
                                    ?>
                                        <li class="page-item">
                                            <?php echo " <a class='page-link' href='all_featured.php?page=" . ($page - 1) . "' aria-label='Previous'><span class='fa fa-angle-double-left'aria-hidden='true'></span><spanclass='sr-only'>Previous</spanclass=></a>"; ?>
                                        </li>

                                    <?php }
                                    for ($i = 1; $i < $total_page; $i++) {
                                    ?>
                                        <li class=""><?php echo "<a class='page-link btn ' href='all_featured.php?page=" . $i . "' >$i</a>" ?></li>

                                    <?php }
                                    if ($i > $page) {
                                    ?>

                                        <li class='page-item'>
                                            <?php
                                            echo "<a class='page-link' href='all_featured.php?page=" . ($page + 1) . "' aria-label='Next'>
                                        <span class='fa fa-angle-double-right' aria-hidden='true'></span>
                                        <span class='sr-only'>Next</span>
                                    </a>";
                                            ?>
                                        </li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>



                <!-- Footer Start -->
                <div class="container-fluid bg-light pt-2 px-sm-1 px-md-5">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-5">
                            <a href="#" class="navbar-brand">
                                <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
                            </a>

                        </div>

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