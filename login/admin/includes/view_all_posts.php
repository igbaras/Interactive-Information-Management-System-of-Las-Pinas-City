<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header bg-info">
                    <h3 class="card-title">View All Posts</h3>
                </div>
                <!-- /.card-header -->

                <!-- ADD ITEM BUTTON -->

                <buttton class="btn btn-lg btn-success" data-toggle="modal" data-target="#form_modal"><span class="fas fa-plus"></span> ADD POST</buttton>
            </div>

            <!-- ADD IMAGE MODAL -->
            <div class="modal fade" id="form_modal" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h3 class="modal-title">Add Image to Gallery</h3>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-2"></div>
                                <div class="col-md-12 ">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="PostTitle">Post Title</label>
                                            <input type="text" id="inputName" class="form-control" name="post_title" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="PostCategory">Post Category</label>
                                            <select class="custom-select" name="post_category_id" required>
                                                <?php
                                                $query = "SELECT * FROM categories";
                                                $select_all_cat = mysqli_query($connection, $query);
                                                while ($row = mysqli_fetch_assoc($select_all_cat)) {
                                                    $cat_title = $row['cat_title'];
                                                    $cat_id = $row['cat_id'];

                                                    echo "<option value='$cat_id'> {$cat_title}</option>";
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputStatus">Post Author</label>
                                            <input type="text" id="inputName" class="form-control" name="post_author" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="PostCategory">Post Status</label>
                                            <select class="custom-select" name="post_status" required>
                                                <option value="draft" active>Select Status</option>
                                                <option value="published">Publish</option>
                                                <option value="draft">Draft</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputClientCompany">Post Image</label>
                                            <div id="selectedBanner"></div>

                                            <input type="file" class="form-control" id="img" name="post_image" required>

                                        </div>
                                        <div class="form-group">
                                            <label for="PostTags">Post Tags</label>
                                            <input type="text" id="inputName" class="form-control" name="post_tags" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="PostCOntent">Post Content</label>
                                            <textarea name="post_content" id="summernote" class="form-control" required></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br style="clear:both;" />
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                <button class="btn btn-primary" name="submit_post"><span class="glyphicon glyphicon-save"></span> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Delete Category Data </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>




                        <form method="POST">

                            <div class="modal-body">

                                <input type="hidden" name="img_id" id="delete_id">

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

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Images</h3>
                    </div>
                    <!-- /.card-header -->
                    <?php insertPost(); ?>
                    <?php deletePost(); ?>

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
                                            <td><?php echo "<img src='$post_image' width='90%' alt='posts_image'>"; ?></td>
                                            <td><?php echo $post_tags; ?></td>
                                            <td> 'comments'</td>
                                            <td><?php echo $post_date; ?></td>

                                            <td><a class='btn btn-primary' href="posts.php?source=edit_post&an_edit=<?php echo $post_id; ?>"><i class='fas fa-pen'></i><small class='align-self-end'>Edit</small></a></td>
                                            <td><button class="btn btn-danger" data-toggle="modal" data-target="#modal<?php echo $post_id; ?>"><i class='fas fa-trash'></i><small class='align-self-end'>Delete</small></button></td>

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
                </div>
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