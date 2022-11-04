<?php
if (isset($_POST['submit_lifestyle'])) {

    $ls_title = $_POST['ls_title'];
    $ls_image = $_FILES['ls_image']['name'];
    $ls_image_temp = $_FILES['ls_image']['tmp_name'];
    $ls_description = $_POST['ls_description'];
    $ls_content = htmlentities($_POST['ls_content']);
    $ls_tags = $_POST['ls_tags'];
    $ls_status = $_POST['ls_status'];

    move_uploaded_file($ls_image_temp, "../images/lifestyles/$ls_image/");

    $query = "INSERT INTO lifestyles ( ls_title, ls_image, ls_status, ls_date, ls_tags, ls_description, ls_content) ";
    $query .= "VALUES ('{$ls_title}','{$ls_image}','{$ls_status}',now(), '{$ls_tags}','{$ls_description}','{$ls_content}')";
    $insert_ls_query = mysqli_query($connection, $query);
    if (!$insert_ls_query) {

        die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
}

?>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add lifestyle</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>




                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="lifestyleTitle">lifestyle Title</label>
                            <input type="text" id="inputName" class="form-control" name="ls_title" required>
                        </div>


                        <div class="form-group">
                            <label for="lifestyleCategory">lifestyle Status</label>
                            <select class="custom-select" name="ls_status" required>
                                <option value="draft" active>Select Status</option>
                                <option value="published">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputClientCompany">lifestyle Image</label>
                            <div id="selectedBanner"></div>

                            <input type="file" class="form-control" id="img" name="ls_image" required>



                        </div>
                        <div class="form-group">
                            <label for="lifestyleTags">lifestyle Tags</label>
                            <input type="text" id="inputName" class="form-control" name="ls_tags" required>
                        </div>
                        <div class="form-group">
                            <label for="lifestyleTags">lifestyle Description</label>

                            <textarea name="ls_description" class="form-control" style="height: 20%;" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lifestyleCOntent">lifestyle Content</label>
                            <textarea name="ls_content" id="summernote" class="form-control" required></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="submit" value="SUBMIT">
                </form>
                <!-- /.card-body -->


            </div>
        </div>
    </section>
</div>