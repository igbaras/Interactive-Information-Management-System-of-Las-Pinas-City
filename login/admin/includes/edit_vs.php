<?php

use Cloudinary\Api\Upload\UploadApi;

if (isset($_GET['an_edit']) && isset($_GET['virt'])) {
    $the_vs_id = $_GET['an_edit'];
    $vs_vt_id = $_GET['virt'];
}

$query = "SELECT * FROM virtualtour WHERE vt_id =  $vs_vt_id";
$select_edit_vs = mysqli_query($connection, $query);
while ($row  = mysqli_fetch_assoc($select_edit_vs)) {
    $vt_title = $row['vt_title'];
}

$query = "SELECT * FROM virtualspots WHERE vs_id =  $the_vs_id";
$select_edit_vs = mysqli_query($connection, $query);
while ($row  = mysqli_fetch_assoc($select_edit_vs)) {
    $vs_spot = $row['vs_spot'];
}

if (isset($_POST['submit_vs'])) {
    $vs_spot = $_POST['vs_spot'];



    $query = "UPDATE virtualspots SET ";
    $query .= "vs_spot = '{$vs_spot}' ";

    $query .= "WHERE vs_id  = {$the_vs_id}";

    $update_ls = mysqli_query($connection, $query);

    if (!$update_ls) {
        die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    echo "
    <div class=' alert alert-success alert-dismissible fade show'>
    <h3 class=' text-right'><strong>{$vt_title}</strong> Virtualtour successfully updated! <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
}
?>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><a class="btn btn-warning" href="./vt.php?source=add_vt&virt=<?php echo $vs_vt_id; ?>"><i class="fas fa-arrow-left"></i> BACK</a> Edit VirtualSpot <?php echo "ID: " . $the_vs_id; ?></h3>

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
                            <textarea name="vs_spot" id="summernote" class="form-control" required><?php echo $vs_spot; ?> </textarea>
                        </div>

                        <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="submit_vs" value="SUBMIT">
                </form>




                <!-- /.card-body -->


            </div>
        </div>
    </section>
</div>