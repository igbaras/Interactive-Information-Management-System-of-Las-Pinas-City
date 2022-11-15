<?php


use Cloudinary\Api\Upload\UploadApi;


if (isset($_POST['submit'])) {



    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $image_properties = (new UploadApi())->upload($_FILES["post_image"]["tmp_name"]);
    $image_url = $image_properties['secure_url'];

    // $post_image = $_FILES['post_image']['name'];
    // $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_content = htmlentities($_POST['post_content']);
    $post_tags = $_POST['post_tags'];
    $post_status = $_POST['post_status'];

    // move_uploaded_file($post_image_temp, "../images/posts/$post_image/");

    $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags ,post_comment_count, post_status) ";
    $query .= "VALUES ({$post_category_id} ,'{$post_title}','{$post_author}',current_timestamp(), '{$image_url}','{$post_content}','{$post_tags}',2, '{$post_status}')";
    $insert_Posts_query = mysqli_query($connection, $query);
    if (!$insert_Posts_query) {

        die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    echo $image_url;
}

?>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Post</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>




                <form method="post" enctype="multipart/form-data">
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
                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="submit" value="SUBMIT">
                </form>
                <!-- /.card-body -->


            </div>
        </div>
    </section>
</div>