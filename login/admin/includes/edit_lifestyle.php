<?php

use Cloudinary\Api\Upload\UploadApi;

if (isset($_GET['an_edit'])) {
    $the_lifestyle_id = $_GET['an_edit'];
}

$query = "SELECT * FROM lifestyles WHERE ls_id =  $the_lifestyle_id";
$select_edit_posts = mysqli_query($connection, $query);
while ($row  = mysqli_fetch_assoc($select_edit_posts)) {


    $ls_title = $row['ls_title'];

    $ls_status = $row['ls_status'];
    $ls_image = $row['ls_image'];

    $ls_content = html_entity_decode($row['ls_content']);
    $ls_tags = $row['ls_tags'];
    $ls_description = $row['ls_description'];
    $ls_comment_count = $row['ls_comment_count'];
    $ls_date = $row['ls_date'];
}

if (isset($_POST['update_ls'])) {
    $ls_title = $_POST['ls_title'];

    $ls_status = $_POST['ls_status'];


    $ls_image = (new UploadApi())->upload($_FILES["ls_image"]["tmp_name"]);
    $image_url = $ls_image['secure_url'];

    $ls_tags = $_POST['ls_tags'];
    $ls_description = $_POST['ls_description'];
    $ls_content = htmlentities($_POST['ls_content']);



    if (empty($ls_image)) {
        $query = "SELECT * FROM lifestyles WHERE ls_id = $the_lifestyle_id";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $ls_image = $row['ls_image'];
        }
    }

    $query = "UPDATE lifestyles SET ";
    $query .= "ls_title = '{$ls_title}', ";
    $query .= "ls_status = '{$ls_status}', ";
    $query .= "ls_image = '{$image_url}', ";
    $query .= "ls_tags = '{$ls_tags}', ";
    $query .= "ls_description = '{$ls_description}', ";
    $query .= "ls_content = '{$ls_content}' ";
    $query .= "WHERE ls_id = {$the_lifestyle_id}";

    $update_ls = mysqli_query($connection, $query);

    if (!$update_ls) {
        die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    echo "
    <div class=' alert alert-success alert-dismissible fade show'>
    <h3 class=' text-right'><strong>{$ls_title}</strong> Lifestyle successfully updated! <a class='btn btn-success' href='../lifestyles.php?an_id={$the_lifestyle_id}'>View Lifestyle</a> or <a class='btn btn-primary' href='./lifestyles.php'>Edit other lifestyles</a></h3> <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
}
?>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><a class="btn btn-sm btn-warning" href="./lifestyles.php"><i class="fas fa-arrow-left"></i> BACK</a> Edit Lifestyle</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="lifestyleTitle">Title</label>
                            <input type="text" id="inputName" class="form-control" name="ls_title" value="<?php echo $ls_title; ?>" required>
                        </div>


                        <div class="form-group">
                            <label for="lifestyleCategory">Status</label>
                            <select class="custom-select" name="ls_status" required>

                                <option value="<?php echo $ls_status; ?>" active><?php echo $ls_status; ?></option>
                                <?php
                                if ($ls_status == "published") {
                                    echo "<option value='draft'>Draft</option>";
                                } else {
                                    echo "<option value ='published'>Publish</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputClientCompany">Image</label>
                            <div id="selectedBanner"><img id="selectedBanner" src="<?php echo $ls_image; ?>" width="20%" alt="lifestyle image"></div>

                            <input type="file" class="form-control" id="img" name="ls_image" value="<?php echo $ls_image; ?>">
                        </div>
                        <div class="form-group">
                            <label for="lifestyleTags">Tags</label>
                            <input type="text" id="inputName" class="form-control" name="ls_tags" value="<?php echo $ls_tags; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lifestyleTags">Description</label>
                            <textarea name="ls_description" class="form-control" style="height: 20%;" required><?php echo $ls_description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lifestyleCOntent">Content</label>
                            <textarea name="ls_content" id="summernote" class="form-control" required><?php echo $ls_content; ?></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="update_ls" value="SUBMIT">
                </form>
                <!-- /.card-body -->


            </div>
        </div>
    </section>
</div>