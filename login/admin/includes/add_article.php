<?php
if (isset($_POST['submit'])) {



    $art_category_id = $_POST['art_category_id'];
    $art_title = $_POST['art_title'];
    $art_author = $_POST['art_author'];

    $art_image = $_FILES['art_image']['name'];
    $art_image_temp = $_FILES['art_image']['tmp_name'];
    $art_content = htmlentities($_POST['art_content']);
    $art_tags = $_POST['art_tags'];
    $art_status = $_POST['art_status'];

    move_uploaded_file($art_image_temp, "../images/articles/$art_image/");

    $query = "INSERT INTO articles (art_category_id, art_title, art_author, art_date, art_image, art_content, art_tags ,art_comment_count, art_status) ";
    $query .= "VALUES ({$art_category_id} ,'{$art_title}','{$art_author}',now(), '{$art_image}','{$art_content}','{$art_tags}',2, '{$art_status}')";
    $insert_articles_query = mysqli_query($connection, $query);
    if (!$insert_articles_query) {

        die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
}

?>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Article</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>




                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="articleTitle">Article Title</label>
                            <input type="text" id="inputName" class="form-control" name="art_title" required>
                        </div>

                        <div class="form-group">
                            <label for="articleCategory">Article Category</label>
                            <select class="custom-select" name="art_category_id" required>
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
                            <label for="inputStatus">Article Author</label>
                            <input type="text" id="inputName" class="form-control" name="art_author" required>
                        </div>
                        <div class="form-group">
                            <label for="articleCategory">Article Status</label>
                            <select class="custom-select" name="art_status" required>
                                <option value="draft" active>Select Status</option>
                                <option value="published">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Article Image</label>
                            <div id="selectedBanner"></div>

                            <input type="file" class="form-control" id="img" name="art_image" required>



                        </div>
                        <div class="form-group">
                            <label for="articleTags">Article Tags</label>
                            <input type="text" id="inputName" class="form-control" name="art_tags" required>
                        </div>
                        <div class="form-group">
                            <label for="ArticleCOntent">Article Content</label>
                            <textarea name="art_content" id="summernote" class="form-control" required></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="submit" value="SUBMIT">
                </form>
                <!-- /.card-body -->


            </div>
        </div>
    </section>
</div>