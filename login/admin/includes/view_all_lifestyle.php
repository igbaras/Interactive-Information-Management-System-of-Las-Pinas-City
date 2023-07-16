<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">

                <div class="card-header bg-info">
                    <h3 class="card-title">View All Lifestyles</h3>
                </div>
                <!-- /.card-header -->
                <!-- ADD ITEM BUTTON -->
                <buttton class="btn btn-lg btn-success" data-toggle="modal" data-target="#form_modal"><span class="fas fa-plus"></span> ADD LIFESTYLE</buttton>

                <!-- ADD CATEGORY MODAL -->
                <div class="modal fade" id="form_modal" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Add LIFESTYLE</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            </div>


                            <form method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="lifestyleTitle">Title</label>
                                        <input type="text" id="inputName" class="form-control" name="ls_title" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="lifestyleCategory">Status</label>
                                        <select class="custom-select" name="ls_status" required>
                                            <option value="draft" active>Select Status</option>
                                            <option value="published">Publish</option>
                                            <option value="draft">Draft</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">Image</label>
                                        <div id="selectedBanner"></div>

                                        <input type="file" class="form-control" id="img" name="ls_image" required>



                                    </div>
                                    <div class="form-group">
                                        <label for="lifestyleTags">Tags</label>
                                        <input type="text" id="inputName" class="form-control" name="ls_tags" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lifestyleTags">Description</label>

                                        <textarea name="ls_description" class="form-control" style="height: 20%;" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="lifestyleCOntent">Content</label>
                                        <textarea name="ls_content" id="summernote" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-outline-primary btn-lg btn-block " name="updateLifestyle" value="SUBMIT">
                            </form>
                        </div>
                    </div>
                </div>

                <?php insertLifestyle(); ?>
                <?php deleteLifestyle(); ?>
                <?php updateCategory(); ?>
                <div class="card-body">
                    <table id="example1" class="table table-head-fixed table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><input type="checkbox">ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Status</th>

                                <th>Tags</th>
                                <th>Date Created</th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM lifestyles ORDER BY ls_id DESC";
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
                                    <td><?php echo "<img src='$ls_image' height='100px'width='100px' alt='lss_image'>"; ?></td>
                                    <td> <?php echo $ls_title; ?></td>
                                    <td><?php echo $ls_status; ?></td>

                                    <td><?php echo $ls_tags; ?></td>
                                    <td><?php echo $ls_date; ?></td>
                                    <td><a class='btn btn-primary ' href="./lifestyles.php?source=edit_lifestyle&an_edit=<?php echo $ls_id ?>" data-target="#edit<?php echo $ls_id ?>"><i class='fas fa-edit'></i></a><button class='btn btn-danger deletebtn' data-toggle='modal'><i class='fas fa-trash'></i></button></td>


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