<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">

                            <?php

                            $query = "SELECT * FROM posts ";
                            $select_all_posts = mysqli_query($connection, $query);
                            $posts_count = mysqli_num_rows($select_all_posts);
                            echo "<h3 class = 'huge'>{$posts_count}</h3>";
                            ?>
                            <p>Total Posts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-clipboard"></i>
                        </div>
                        <a href=" #" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">

                            <?php

                            $query = "SELECT * FROM posts ";
                            $select_all_posts = mysqli_query($connection, $query);
                            $posts_count = mysqli_num_rows($select_all_posts);
                            echo "<h3 class = 'huge'>{$posts_count}</h3>";
                            ?>
                            <p>Total Lifestyles</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-filing"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php

                            $query = "SELECT * FROM categories ";
                            $select_all_cat = mysqli_query($connection, $query);
                            $posts_count = mysqli_num_rows($select_all_cat);
                            echo "<h3 class = 'huge'>{$posts_count}</h3>";
                            ?>

                            <p>Total Gallery</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-list"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php

                            $query = "SELECT * FROM virtualtour ";
                            $select_all_vt = mysqli_query($connection, $query);
                            $posts_count = mysqli_num_rows($select_all_vt);
                            echo "<h3 class = 'huge'>{$posts_count}</h3>";
                            ?>

                            <p>Total Virtual Tours</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-vr-cardboard"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title"><strong>REQUESTS FOR POST APPROVAL</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <?php insertPost(); ?>


                    <div class="card-body">

                        <table id="exampleB" class="table table-head-fixed table-bordered table-striped">

                            <thead>


                                <tr>

                                    <th><input type="checkbox">ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>


                                    <th></th>



                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $query = "SELECT * FROM posts WHERE post_status = 'pending'";
                                $all_post_query = mysqli_query($connection, $query);
                                if (!$all_post_query) {
                                    die("CONNECTION FAILED" . " " . mysqli_error($connection));
                                }
                                while ($row = mysqli_fetch_array($all_post_query)) {
                                    $post_id = $row["post_id"];
                                    $post_category_id = $row["post_category_id"];
                                    $post_title = $row["post_title"];
                                    $post_author = $row["post_author"];
                                    $post_date = date("F j, Y, g:i a", strtotime($row["post_date"]));
                                    $post_image = $row["post_image"];
                                    $post_tags = $row["post_tags"];
                                    $post_status = $row["post_status"];
                                    $post_content = html_entity_decode($row["post_content"]);
                                    $post_comment_count = $row["post_comment_count"];

                                    $query = "SELECT * FROM categories WHERE cat_id =  $post_category_id";
                                    $all_cat_query = mysqli_query($connection, $query);
                                    if (!$all_cat_query) {
                                        die("CONNECTION FAILED" . " " . mysqli_error($connection));
                                    }
                                    while ($row = mysqli_fetch_array($all_cat_query)) {
                                        $post_category = $row["cat_title"];

                                ?>
                                        <tr>
                                            <td><?php echo $post_id; ?></td>
                                            <td><?php echo "<img src='$post_image' height='100px'width='100px' alt='posts_image'>"; ?></td>
                                            <td><a href='../../singleNews.php?an_id=<?php echo $post_id; ?>' target="_blank"><?php echo $post_title ?></td>
                                            <td><?php echo $post_category; ?></td>
                                            <td><?php echo $post_status; ?></td>



                                            <td><a class='btn  btn-sm  btn-primary' href="posts.php?source=update_stat&an_edit=<?php echo $post_id; ?>"><small class='align-self-end'><i class='fas fa-eye'></i></small></a><button class="btn  btn-sm  btn-danger" data-toggle="modal" data-target="#modal<?php echo $post_id; ?>"><i class='fas fa-trash'></i></button></td>

                                        </tr>


                                        <div class="modal fade" id="modal<?php echo $post_id; ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">System Information</h3>
                                                    </div>
                                                    <div class="modal-body">

                                                        <h3 class="text-danger text-center">Are you sure you want to delete this Post?</h3>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="functions.php?port_id=<?php echo $post_id; ?>" class="btn btn-danger">Yes</a>
                                                        <button class="btn btn-primary" type="button" data-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                <?php }
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>

                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>

                                    <th></th>



                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
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
                    '<img src="' +
                    e.target.result +
                    "\" data-file='" +
                    f.name +
                    "alt='Category Image'  width='20%'>";
                selDiv.html(html);
            };
            reader.readAsDataURL(f);
        });
    }
</script>