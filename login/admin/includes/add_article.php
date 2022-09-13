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

                <?php
                if (isset($_POST['submit']))
                    $art_content = filter_var(htmlentities($_POST['editordata']), FILTER_SANITIZE_STRING);

                $query = "INSERT INTO articles (art_contetnt) VALUE('{$art_content}')";
                $insert_articles_query = mysqli_query($connection, $query);

                if (!$insert_articles_query) {

                    die("QUERY CONNECTION FAILED " . mysqli_error($connection));
                }

                ?>


                <form method="post" id="postForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="articleTitle">Article Title</label>
                            <input type="text" id="inputName" class="form-control" name="art_title">
                        </div>

                        <div class="form-group">
                            <label for="articleCategory">Article Category</label>
                            <select class="custom-select" name="art_category_id">
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
                            <input type="text" id="inputName" class="form-control" name="art_author">
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Article Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="art_image">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="articleTags">Article Tags</label>
                            <input type="text" id="inputName" class="form-control" name="art_tags">
                        </div>
                        <div class="form-group">
                            <label for="ArticleCOntent">Article Content</label>
                            <textarea name="editordata" id="summernote" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </form>
                <!-- /.card-body -->
                <button class="btn btn-outline-primary btn-lg" id="submit-post" name="submit">SUBMIT</button>
            </div>
        </div>
    </section>
</div>