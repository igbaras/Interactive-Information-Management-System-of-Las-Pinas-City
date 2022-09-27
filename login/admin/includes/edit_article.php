<?php
if (isset($_GET['an_edit'])) {
    $the_art_id = $_GET['an_edit'];
}

$query = "SELECT * FROM articles WHERE art_id =  $the_art_id";
$select_edit_articles = mysqli_query($connection, $query);
while ($row  = mysqli_fetch_assoc($select_edit_articles)) {

    $art_author = $row['art_author'];
    $art_title = $row['art_title'];
    $art_category_id = $row['art_category_id'];
    $art_status = $row['art_status'];
    $art_image = $row['art_image'];

    $art_content = html_entity_decode($row['art_content']);
    $art_tags = $row['art_tags'];
    $art_comments = $row['art_comment_count'];
    $art_date = $row['art_date'];
}

if (isset($_POST['update_article'])) {
    $art_title = $_POST['art_title'];
    $art_category_id = $_POST['art_category_id'];
    $art_author = $_POST['art_author'];
    $art_status = $_POST['art_status'];
    $art_image = $_FILES['art_image']['name'];
    $art_image_temp = $_FILES['art_image']['tmp_name'];
    $art_tags = $_POST['art_tags'];
    $art_content = htmlentities($_POST['art_content']);

    move_uploaded_file($art_image_temp, "../images/articles/$art_image/");

    if (empty($art_image)) {
        $query = "SELECT * FROM articles WHERE art_id = $the_art_id";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $art_image = $row['art_image'];
        }
    }

    $query = "UPDATE articles SET ";
    $query .= "art_title = '{$art_title}', ";
    $query .= "art_category_id = '{$art_category_id}', ";
    $query .= "art_date = now(), ";
    $query .= "art_author = '{$art_author}', ";
    $query .= "art_status = '{$art_status}', ";
    $query .= "art_image = '{$art_image}', ";
    $query .= "art_tags = '{$art_tags}', ";
    $query .= "art_content = '{$art_content}' ";
    $query .= "WHERE art_id = {$the_art_id}";

    $update_art = mysqli_query($connection, $query);

    if (!$update_art) {
        die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    echo "
    <div class=' alert alert-success alert-dismissible fade show'>
    <h3 class=' text-right'><strong>{$art_title}</strong> article successfully updated! <a class='btn btn-success' href='../articles.php?an_id={$the_art_id}'>View Post</a> or <a class='btn btn-primary' href='./articles.php'>Edit other Articles</a></h3> <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
}
?>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Article</h3>

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
                            <input type="text" id="inputName" class="form-control" name="art_title" required value="<?php echo $art_title; ?> ">
                        </div>

                        <div class="form-group">
                            <label for="articleCategory">Article Category</label>
                            <br>
                            <select class="custom-select col-3" name="art_category_id" required>

                                <?php

                                $query = "SELECT * FROM categories ";
                                $select_all_cat = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_all_cat)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    if ($cat_id == $art_category_id) {

                                        echo "<option value='$cat_id' selected> {$cat_title}</option>";
                                    } else {

                                        echo "<option value='$cat_id'> {$cat_title}</option>";
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Article Author</label>
                            <input type="text" id="inputName" class="form-control" name="art_author" value="<?php echo $art_author; ?>">
                        </div>
                        <div class="form-group">
                            <label for="articleCategory">Article Status</label>
                            <br>
                            <select class="custom-select col-3" name="art_status" required>
                                <?php
                                echo "<option value = '$art_status'>{$art_status}</option>";
                                if ($art_status == "published") {
                                    echo "<option value='draft'>Draft</option>";
                                } else {
                                    echo "<option value ='published'>Publish</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Article Image</label>
                            <div id="selectedBanner"><img id="selectedBanner" src="<?php echo "../images/articles/$art_image" ?>" width="20%" alt="post image"></div>

                            <input type="file" class="form-control" id="img" name="art_image" value="<?php echo $art_image; ?>">
                        </div>
                        <div class="form-group">
                            <label for="articleTags">Article Tags</label>
                            <input type="text" id="inputName" class="form-control" name="art_tags" value="<?php echo $art_tags; ?>">
                        </div>
                        <div class="form-group">
                            <label for="ArticleCOntent">Article Content</label>
                            <textarea name="art_content" id="summernote" class="form-control"><?php echo $art_content; ?></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="update_article" value="UPDATE">
                </form>
                <!-- /.card-body -->


            </div>
        </div>
    </section>
</div>