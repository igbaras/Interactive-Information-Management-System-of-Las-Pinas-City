<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">





                <div class="card-header bg-info">
                    <h3 class="card-title">View All Posts</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    <table id="example1" class="table table-head-fixed table-bordered table-striped">

                        <thead>


                            <tr>

                                <th><input type="checkbox">ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th></th>
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
                                        <td><?php echo $post_author; ?></td>
                                        <td> <?php echo $post_title; ?></td>
                                        <td><?php echo $post_category; ?></td>
                                        <td><?php echo $post_status; ?></td>
                                        <td><?php echo "<img src='../images/posts/$post_image' width='90%' alt='posts_image'>"; ?></td>
                                        <td><?php echo $post_tags; ?></td>
                                        <td> 'comments'</td>
                                        <td><?php echo $post_date; ?></td>
                                        <td><a href="posts.php?source=edit_posts&an_edit=<?php echo $post_id; ?>" class='btn btn-primary edit_btn' type="submit"><i class='fas fa-edit'></i><small class='align-self-end'>Edit</small></a></td>
                                        <td><button class='btn btn-danger deletebtn' data-toggle='modal'><i class='fas fa-trash'></i><small class='align-self-end'>Delete</small></button></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>

                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th></th>
                                <th></th>


                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>
<!-- DELETE POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Delete Post Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <?php ?>
            <?php deletePost(); ?>
            <form method="POST">

                <div class="modal-body">

                    <input type="hidden" name="post_id" id="delete_id">

                    <h4> Do you want to Delete this Data ??</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                    <button type="submit" name="delete_data" class="btn btn-primary"> Yes </butron>
                </div>
            </form>

        </div>
    </div>
</div>