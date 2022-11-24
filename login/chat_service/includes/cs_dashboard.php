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

                            $query = "SELECT * FROM posts";
                            $select_all_posts = mysqli_query($connection, $query);
                            $posts_count = mysqli_num_rows($select_all_posts);
                            echo "<h3 class = 'huge'>{$posts_count}</h3>";
                            ?>
                            <p>Total Posts</p>

                        </div>
                        <div class="icon">
                            <i class="ion ion-android-clipboard"></i>
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

                            $query = "SELECT * FROM lifestyles ";
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

                            $query = "SELECT * FROM gallery ";
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
                <!-- /.row -->
                <!-- Main row -->

                <div class="col">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><strong>RESUBMIT FOR APPROVAL</strong></h3>
                        </div>
                        <!-- /.card-header -->

                        <?php updatePost(); ?>


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

                                    $query = "SELECT * FROM posts WHERE post_status = 'resubmit for approval'";
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
                                        $post_notes = $row["post_notes"];
                                        $post_desc = $row["post_desc"];
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



                                                <td>
                                                    <button class='btn btn-sm btn-secondary' data-toggle='modal' data-target="#editPost<?php echo $post_id ?>"><i class='fas fa-eye'></i></button>
                                                    <a class='btn  btn-sm  btn-primary' href="posts.php?source=update_stat&an_edit=<?php echo $post_id; ?>"><small class='align-self-end'><i class='fas fa-eye'></i></small></a><button class="btn  btn-sm  btn-danger" data-toggle="modal" data-target="#modal<?php echo $post_id; ?>"><i class='fas fa-trash'></i></button>
                                                </td>


                                                <!-- EDIT POST Modal -->
                                                <div class="modal fade" id="editPost<?php echo $post_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- w-100 class so that header div covers 100% width of parent div -->
                                                                <h5 class="modal-title w-100" id="exampleModalLabel"><strong> <?php echo $post_title; ?></strong>

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
                                                                            <input type="hidden" name="post_id">
                                                                            <input type="hidden" name="post_status" value="pending">
                                                                        </div>
                                                                        <div class="alert alert-warning" role="alert">
                                                                            <h5 class="alert-heading">Admin Notes</h5>
                                                                            <p><?php echo $post_notes; ?></p>
                                                                            <hr>

                                                                        </div>
                                                                        <hr>
                                                                        <div class="form-group">
                                                                            <label for="inputClientCompany">Image</label>
                                                                            <div id="selectedBanner"><img id="selectedBanner" src="<?php echo $post_image; ?>" width='200px' height='200px' alt="post image"></div>
                                                                            <div class="input-group col-5   ">
                                                                                <input type="file" class="form-control" id="img" name="post_image">
                                                                                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

                                                                                <div class=" input-group-append">

                                                                                    <input type="submit" class="btn btn-outline-secondary" name="update_image" value="Update Image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
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
                                                                            <label for="PostTags">Tags</label>
                                                                            <input type="text" id="inputName" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="PostTags">Description</label>
                                                                            <textarea name="post_desc" id="" cols="30" class="form-control" rows="4"><?php echo $post_desc; ?></textarea>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="PostCOntent">Content</label>
                                                                            <textarea name="post_content" id="summernote" class="form-control textarea"><?php echo $post_content; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="update_post" value="UPDATE">
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                    Close
                                                                </button>
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