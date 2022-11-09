<?php
if (isset($_POST['submit_virtual'])) {

    $vt_title = $_POST['vt_title'];
    $vt_image = $_FILES['vt_image']['name'];
    $vt_image_temp = $_FILES['vt_image']['tmp_name'];
    $vt_desc = $_POST['vt_desc'];
    $vt_virtual = htmlentities($_POST['vt_virtual']);
    $vt_tags = $_POST['vt_tags'];
    $vt_status = $_POST['vt_status'];

    move_uploaded_file($vt_image_temp, "../images/virtualtour/$vt_image/");

    $query = "INSERT INTO virtualtour ( vt_title, vt_image, vt_status, vt_date, vt_tags, vt_desc, vt_virtual) ";
    $query .= "VALUES ('{$vt_title}','{$vt_image}','{$vt_status}',now(), '{$vt_tags}','{$vt_desc}','{$vt_virtual}')";
    $insert_vt_query = mysqli_query($connection, $query);
    if (!$insert_vt_query) {
        die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Virtual tour successfully added!</strong>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
}

?>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Virtual Tour</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>




                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="virtualTitle">Title</label>
                            <input type="text" id="inputName" class="form-control" name="vt_title" required>
                        </div>

                        <div class="form-group">
                            <label for="virtualvirtual">Virtual Tour Spot</label>
                            <textarea name="vt_virtual" id="summernote" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Image</label>
                            <div id="selectedBanner"></div>
                            <input type="file" class="form-control" id="img" name="vt_image" required>
                        </div>
                        <div class="form-group">
                            <label for="virtualCategory">Status</label>
                            <select class="custom-select" name="vt_status" required>
                                <option value="draft" active>Select Status</option>
                                <option value="published">Publish</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="virtualTags">Tags</label>
                            <input type="text" id="inputName" class="form-control" name="vt_tags" required>
                        </div>
                        <div class="form-group">
                            <label for="virtualTags">Description</label>
                            <textarea name="vt_desc" class="form-control" style="height: 20%;" required></textarea>
                        </div>

                    </div>
                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="submit_virtual" value="SUBMIT">
                </form>
                <!-- /.card-body -->


            </div>
        </div>
    </section>
</div>