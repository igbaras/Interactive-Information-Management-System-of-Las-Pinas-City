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

                            $query = "SELECT * FROM posts WHERE post_status = 'pending'";
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
                    <div class="small-box bg-primary">
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
                    <div class="small-box bg-primary">
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
                    <div class="small-box bg-success">
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
                    <div class="card-header bg-primary ">
                        <h1 class="card-title "><strong> PENDING POSTS</strong></h1>
                    </div>
                    <!-- /.card-header -->
                    <?php insertPost(); ?>
                    <?php deletePost(); ?>

                    <div class="card-body">

                        <table id="exampleA" class="table table-head-fixed table-bordered table-striped">

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

                                $query = "SELECT * FROM posts";
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



                                            <td><button class='btn btn-sm btn-secondary' data-toggle='modal' data-target="#viewImage<?php echo $post_id ?>"><i class='fas fa-eye'></i></button><a class='btn  btn-sm  btn-primary' href="posts.php?source=edit_post&an_edit=<?php echo $post_id; ?>"><i class='fas fa-pen'></i><small class='align-self-end'>Edit</small></a><button class="btn  btn-sm  btn-danger" data-toggle="modal" data-target="#modal<?php echo $post_id; ?>"><i class='fas fa-trash'></i><small class='align-self-end'>Delete</small></button></td>




                                            <!-- View Image Modal -->
                                            <div class="modal fade" id="viewImage<?php echo $post_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <!-- w-100 class so that header div covers 100% width of parent div -->
                                                            <h5 class="modal-title w-100" id="exampleModalLabel"><strong>Post Details
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">
                                                                    ×
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <!--Modal body with image-->
                                                        <div class="modal-body">
                                                            <div class="red"></div>
                                                            <div class="row">
                                                                <div class="col-6 align-items-around justify-content-around d-flex mb-5 mb-lg-0">
                                                                    <div class="form-group ">
                                                                        <img src="<?php echo $post_image ?>" height="450" width="400" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 align-items-around justify-content-around d-flex mb-5 mb-lg-0">
                                                                    <div class="blockabout">
                                                                        <div class="blockabout-inner text-left text-sm-start">

                                                                            <div class="">
                                                                                <span class="text-small text-muted">Title:</span>
                                                                                <h3><strong><?php echo $post_title ?></strong></h3>
                                                                                <hr>
                                                                            </div>
                                                                            <div class=" pb-1 mb-1">
                                                                                <span class="text-small text-muted">Author:</span>
                                                                                <h4><?php echo $post_author ?></h4>
                                                                                <hr>
                                                                            </div>
                                                                            <div class=" pb-1 mb-1">
                                                                                <span class="text-small text-muted">Category:</span>
                                                                                <h4><?php echo $post_category ?></h4>
                                                                                <hr>
                                                                            </div>
                                                                            <div class=" pb-1 mb-1">
                                                                                <span class="text-small text-muted">Status:</span><br>
                                                                                <span class="badge badge-success"><?php echo $post_status ?></span>
                                                                                <hr>
                                                                            </div>
                                                                            <div class=" pb-1 mb-1">
                                                                                <span class="text-small text-muted">Post Tags:</span>
                                                                                <h4><?php echo $post_tags; ?></h4>
                                                                                <hr>
                                                                            </div>

                                                                            <div class=" pb-1 mb-1">
                                                                                <span class="text-small text-muted">Comment Count:</span>
                                                                                <h4><?php echo $post_comment_count; ?></h4>
                                                                                <hr>
                                                                            </div>
                                                                            <p> <span class="text-small text-muted">Date:</span>
                                                                                <span><?php echo $post_date ?></span>
                                                                            </p>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                    Close
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                        <a href="functions.php?mem_id=<?php echo $post_id; ?>" class="btn btn-danger">Yes</a>
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
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title"><strong>PENDING LIFESTYLES</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <?php insertPost(); ?>
                    <?php deletePost(); ?>

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

                                $query = "SELECT * FROM posts";
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



                                            <td><button class='btn btn-sm btn-secondary' data-toggle='modal' data-target="#viewPost<?php echo $post_id ?>"><i class='fas fa-eye'></i></button><a class='btn  btn-sm  btn-primary' href="posts.php?source=edit_post&an_edit=<?php echo $post_id; ?>"><i class='fas fa-pen'></i><small class='align-self-end'>Edit</small></a><button class="btn  btn-sm  btn-danger" data-toggle="modal" data-target="#modal<?php echo $post_id; ?>"><i class='fas fa-trash'></i><small class='align-self-end'>Delete</small></button></td>




                                            <!-- View Image Modal -->
                                            <div class="modal fade" id="viewPost<?php echo $post_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl " role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <!-- w-100 class so that header div covers 100% width of parent div -->
                                                            <h5 class="modal-title w-100" id="exampleModalLabel"><strong>Post Details
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">
                                                                    ×
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <!--Modal body with image-->
                                                        <div class="modal-body">
                                                            <form method="post" enctype="multipart/form-data">
                                                                <div class="card-body">

                                                                    <div class="form-group">
                                                                        <label for="PostCategory">Post Status</label>
                                                                        <br>
                                                                        <select class="custom-select col-3" name="post_status" required>
                                                                            <?php
                                                                            echo "<option value = '$post_status'>{$post_status}</option>";
                                                                            if ($post_status == "published") {
                                                                                echo "<option value='draft'>Draft</option>";
                                                                                echo "<option value='resubmit for approval'>Resubmit for approval</option>";
                                                                                echo "<option value='draft'>Draft</option>";
                                                                            } else {
                                                                                echo "<option value ='published'>Publish</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputStatus">Admin Notes</label>
                                                                        <textarea name="post_note" id="post_note" class="form-control" cols="30" rows="5"></textarea>

                                                                    </div>
                                                                    <hr>
                                                                    <div class="form-group">
                                                                        <label for="postTitle">Post Title</label>
                                                                        <input type="text" id="inputName" class="form-control" name="post_title" required value="<?php echo $post_title; ?> ">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="PostCategory">Category</label>
                                                                        <br>
                                                                        <select class="custom-select col-3" name="post_category_id" required>

                                                                            <?php

                                                                            $query = "SELECT * FROM categories ";
                                                                            $select_all_cat = mysqli_query($connection, $query);
                                                                            while ($row = mysqli_fetch_assoc($select_all_cat)) {
                                                                                $cat_title = $row['cat_title'];
                                                                                $cat_id = $row['cat_id'];
                                                                                if ($cat_id == $post_category_id) {

                                                                                    echo "<option value='$cat_id' selected> {$cat_title}</option>";
                                                                                } else {

                                                                                    echo "<option value='$cat_id'> {$cat_title}</option>";
                                                                                }
                                                                            } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="inputStatus">Author</label>
                                                                        <input type="text" id="inputName" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="inputClientCompany">Image</label>
                                                                        <div id="selectedBanner"><img id="selectedBanner" src="<?php echo "../images/posts/$post_image" ?>" width='200px' height='200px' alt="post image"></div>

                                                                        <input type="file" class="form-control" id="img" name="post_image" value="<?php echo $post_image; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="PostTags">Tags</label>
                                                                        <input type="text" id="inputName" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="PostCOntent">Content</label>
                                                                        <textarea name="post_content" id="summernote" class="form-control textarea"><?php echo $post_content; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="update_post" value="UPDATE">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                        <a href="functions.php?mem_id=<?php echo $post_id; ?>" class="btn btn-danger">Yes</a>
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