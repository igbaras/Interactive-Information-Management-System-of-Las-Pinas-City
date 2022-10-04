<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">





                <div class="card-header bg-info">
                    <h3 class="card-title">View All Lifestyles</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    <table id="example1" class="table table-head-fixed table-bordered table-striped">

                        <thead>


                            <tr>

                                <th><input type="checkbox">ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Date Created</th>
                                <th></th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM lifestyles";
                            $all_ls_query = mysqli_query($connection, $query);
                            if (!$all_ls_query) {
                                die("CONNECTION FAILED" . " " . mysqli_error($connection));
                            }
                            while ($row = mysqli_fetch_array($all_ls_query)) {
                                $ls_id = $row["ls_id"];

                                $ls_title = $row["ls_title"];

                                $ls_date = date("F j, Y, g:i a", strtotime($row["ls_date"]));
                                $ls_image = $row["ls_image"];
                                $ls_tags = $row["ls_tags"];
                                $ls_status = $row["ls_status"];


                            ?>
                                <tr>
                                    <td><?php echo $ls_id; ?></td>
                                    <td> <?php echo $ls_title; ?></td>
                                    <td><?php echo $ls_status; ?></td>
                                    <td><?php echo "<img src='../images/lifestyles/$ls_image' width='200px' alt='lss_image'>"; ?></td>
                                    <td><?php echo $ls_tags; ?></td>
                                    <td><?php echo $ls_date; ?></td>
                                    <td><a href="lifestyles.php?source=edit_lifestyle&ls_edit=<?php echo $ls_id; ?>" class='btn btn-primary edit_btn' type="submit"><i class='fas fa-edit'></i><small class=''>Edit</small></a></td>
                                    <td><button class='btn btn-danger deletebtn' data-toggle='modal'><i class='fas fa-trash'></i><small class='align-self-end'>Delete</small></button></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>

                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Date Created</th>
                                <th></th>
                                <th></th>


                            </tr>
                        </tfoot>
                    </table>
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
                <h5 class="modal-title" id="exampleModalLabel"> Delete Lifestyle Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <?php ?>
            <?php deleteLifestyle(); ?>
            <form method="POST">

                <div class="modal-body">

                    <input type="hidden" name="ls_id" id="delete_id">

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