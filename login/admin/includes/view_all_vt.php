<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header bg-info">
                    <h3 class="card-title">View All Virtualtour</h3>
                </div>
                <!-- /.card-header -->
                <!-- ADD ITEM BUTTON -->
                <buttton class="btn btn-lg btn-success" data-toggle="modal" data-target="#form_modal"><span class="fas fa-plus"></span> ADD virtualtour</buttton>

                <!-- ADD CATEGORY MODAL -->
                <div class="modal fade" id="form_modal" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Add Image to Gallery</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>

                            <form method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="virtualTitle">Title</label>
                                        <input type="text" id="inputName" class="form-control" name="vt_title" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="virtualvirtual">Virtual Tour </label>
                                        <textarea name="vt_tour" id="summernote" class="form-control" required></textarea>
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
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Images</h3>


                    </div>
                    <?php insert_vt(); ?>
                    <?php delete_vt(); ?>
                    <div class="card-body">

                        <table id="example1" class="table table-head-fixed table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox">ID</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Image</th>

                                    <th>Date Created</th>
                                    <th></th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $query = "SELECT * FROM virtualtour";
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
                                ?>

                                    <tr>
                                        <td><?php echo $vt_id; ?></td>
                                        <td> <?php echo $vt_title; ?></td>
                                        <td><?php echo $vt_status; ?></td>
                                        <td><?php echo "<img src='../images/virtualtour/$vt_image' width='150px' alt='lss_image'>"; ?></td>

                                        <td><?php echo $vt_date; ?></td>
                                        <td><a class='btn btn-primary ' href="./virtualtour.php?source=edit_vt&an_edit=<?php echo $vt_id ?>"><i class='fas fa-edit'></i></a><button class='btn btn-danger deletebtn' data-toggle='modal'><i class='fas fa-trash'></i></button></td>

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

                    <input type="hidden" name="vt_id" id="delete_id">

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