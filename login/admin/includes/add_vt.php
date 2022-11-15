<?php if (isset($_GET['virt'])) {
    $vs_vt_id = $_GET['virt'];

    $query = "SELECT * FROM virtualtour WHERE vt_id = $vs_vt_id";
    $all_vt_query = mysqli_query($connection, $query);
    if (!$all_vt_query) {
        die("CONNECTION FAILED" . " " . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_array($all_vt_query)) {
        $vt_id = $row["vt_id"];

        $vt_title = $row["vt_title"];

        $vt_date = date("F j, Y, g:i a", strtotime($row["vt_date"]));
        $vt_image = $row["vt_image"];
        $vt_tags = $row["vt_tags"];
        $vt_status = $row["vt_status"];
    }
}


?>

<style>
    td iframe {
        width: 100% !important;
        height: 50% !important;
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header bg-info">
                    <h2 class="card-title"> <a class="btn btn-sm btn-warning" href="./virtualTour.php"><i class="fas fa-arrow-left"></i> BACK</a> Add Virtual Spots to <strong><?php echo $vt_title; ?></strong></h2>
                </div>
                <!-- /.card-header -->
                <!-- ADD ITEM BUTTON -->
                <buttton class="btn btn-lg btn-success" data-toggle="modal" data-target="#form_modal"><span class="fas fa-plus"></span> ADD Virtual Spot</buttton>

                <!-- ADD CATEGORY MODAL -->
                <div class="modal fade" id="form_modal" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Add Virtual Spot</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>

                            <form method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="virtualvirtual">Virtual Spot: </label>
                                        <input type="hidden" name="vs_vt_id" value="<?php echo $vs_vt_id; ?>">
                                        <textarea name="vs_spot" id="summernote" class="form-control" required></textarea>
                                    </div>

                                    <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="submit_vs" value="SUBMIT">
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Virtual Spots of <?php echo $vt_title; ?> </h3>


                </div>
                <?php insert_vs(); ?>
                <?php delete_vs(); ?>
                <div class="card-body">

                    <table id="example1" class="table table-head-fixed table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox">ID</th>
                                <th>Virtual tour</th>
                                <th>Date Created</th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM virtualspots WHERE vs_vt_id = {$vt_id}";
                            $all_vt_query = mysqli_query($connection, $query);
                            if (!$all_vt_query) {
                                die("CONNECTION FAILED" . " " . mysqli_error($connection));
                            }
                            while ($row = mysqli_fetch_array($all_vt_query)) {
                                $vs_id = $row["vs_id"];
                                $vs_spot = html_entity_decode($row["vs_spot"]);
                                $vs_date = date("F j, Y, g:i a", strtotime($row["vs_date"]));

                            ?>

                                <tr>
                                    <td><?php echo $vs_id; ?></td>
                                    <td class=""> <?php echo $vs_spot; ?></td>
                                    <td><?php echo $vs_date; ?></td>
                                    <td>

                                        <a class='btn btn-primary ' href="./virtualtour.php?source=edit_vs&an_edit=<?php echo $vs_id ?>&virt=<?php echo $vs_vt_id ?>"><i class='fas fa-edit'></i></a><button class='btn btn-danger deletebtn' data-toggle='modal'><i class='fas fa-trash'></i></button>
                                    </td>


                                </tr>
                            <?php }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>

                                <th>ID</th>
                                <th>Virtual tour</th>
                                <th>Date Created</th>
                                <th></th>



                            </tr>
                        </tfoot>
                    </table>
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
                <h5 class="modal-title" id="exampleModalLabel"> Delete virtualtour Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <?php ?>

            <form method="POST">

                <div class="modal-body">

                    <input type="hidden" name="vs_id" id="delete_id">

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