<?php
if (isset($_GET['an_edit']) && isset($_GET['virt'])) {
    $the_vs_id = $_GET['an_edit'];
    $vs_vt_id = $_GET['virt'];
}

$query = "SELECT * FROM virtualspots WHERE vs_id =  $the_vs_id";
$select_edit_vs = mysqli_query($connection, $query);
while ($row  = mysqli_fetch_assoc($select_edit_vs)) {


    $vt_title = $row['vt_title'];

    $vt_status = $row['vt_status'];
    $vt_image = $row['vt_image'];


    $vt_tags = $row['vt_tags'];
    $vt_desc = $row['vt_desc'];
    $vt_date = $row['vt_date'];
}

if (isset($_POST['submit_virtual'])) {
    $vt_title = $_POST['vt_title'];

    $vt_status = $_POST['vt_status'];
    $vt_image = $_FILES['vt_image']['name'];
    $vt_image_temp = $_FILES['vt_image']['tmp_name'];
    $vt_tags = $_POST['vt_tags'];
    $vt_desc = $_POST['vt_desc'];


    move_uploaded_file($vt_image_temp, "../images/virtualtour/$vt_image/");

    if (empty($vt_image)) {
        $query = "SELECT * FROM virtualtour WHERE vt_id = $the_vs_id";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $vt_image = $row['vt_image'];
        }
    }

    $query = "UPDATE virtualtour SET ";
    $query .= "vt_title = '{$vt_title}', ";
    $query .= "vt_status = '{$vt_status}', ";
    $query .= "vt_image = '{$vt_image}', ";
    $query .= "vt_tags = '{$vt_tags}', ";
    $query .= "vt_desc = '{$vt_desc}', ";

    $query .= "WHERE vt_id  = {$the_vs_id}";

    $update_ls = mysqli_query($connection, $query);

    if (!$update_ls) {
        die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    echo "
    <div class=' alert alert-success alert-dismissible fade show'>
    <h3 class=' text-right'><strong>{$vt_title}</strong> Virtualtour successfully updated! <a class='btn btn-success' href='../virtualtour.php?an_id={$the_vs_id}'>View Virtualtour</a> or <a class='btn btn-primary' href='./virtualtour.php'>Edit other virtualtour</a></h3> <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
}
?>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><a class="btn btn-warning" href="./virtualTour.php?source=add_vt&virt=<?php echo $vs_vt_id; ?>"><i class="fas fa-arrow-left"></i> BACK</a> Edit VirtualSpot <?php echo "ID: " . $the_vs_id; ?></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="virtualvirtual">Virtual Spot: </label>
                            <input type="hidden" name="vs_vt_id" value="<?php echo $the_vs_id; ?>">
                            <textarea name="vs_spot" id="summernote" class="form-control" required><?php echo $the_vs_id; ?> </textarea>
                        </div>

                        <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="submit_vs" value="SUBMIT">
                </form>

                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="VirtualtourTitle">Title</label>
                            <input type="text" id="inputName" class="form-control" name="vt_title" value="<?php echo $vt_title; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="inputClientCompany">Image</label>
                            <div id="selectedBanner"><img id="selectedBanner" src="<?php echo "../images/virtualtour/$vt_image" ?>" width="20%" alt="Virtualtour image"></div>

                            <input type="file" class="form-control" id="img" name="vt_image" value="<?php echo $vt_image; ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="VirtualtourCategory">Status</label>
                                <select class="custom-select" name="vt_status" required>

                                    <option value="<?php echo $vt_status; ?>" active><?php echo $vt_status; ?></option>
                                    <?php
                                    if ($vt_status == "published") {
                                        echo "<option value='draft'>Draft</option>";
                                    } else {
                                        echo "<option value ='published'>Publish</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="VirtualtourTags">Tags</label>
                                <input type="text" id="inputName" class="form-control" name="vt_tags" value="<?php echo $vt_tags; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="VirtualtourTags">Description</label>
                                <textarea name="vt_desc" class="form-control" style="height: 20%;" required><?php echo $vt_desc; ?></textarea>
                            </div>

                        </div>
                        <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="submit_virtual" value="SUBMIT">
                </form>



                <!-- /.card-body -->


            </div>
        </div>
    </section>
</div>