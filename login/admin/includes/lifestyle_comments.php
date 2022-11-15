<style>
    table td {
        word-break: break-word;
        vertical-align: top;
        white-space: normal !important;
    }
</style>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row ">
                <div class="card card-dark col-12">
                    <div class="card-header">
                        <h3 class="card-title"><strong> VIEW LIFESTYLE COMMENTS </strong></h3>
                    </div>
                </div>

                <!-- CATEGORY FORM -->
                <div class="card col-12">


                    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
                    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Reject User Data </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST">

                                    <div class="modal-body">

                                        <input type="hidden" name="lf_comment_id" id="delete_id">

                                        <h4> Do you want to Reject this Comment ?</h4>
                                    </div>
                                    <div class=" modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                                        <button type="submit" name="delete_data" class="btn btn-danger"> Yes </butron>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- List  of Category Table -->
                    <div class="col wrap">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="card-title">List of Pending Lifestyle Comments</h3>
                            </div>
                            <!-- /.card-header -->

                            <?php deleteLifestyleComment(); ?>
                            <div class="card-body">
                                <table id="pendingTable" class="table table-head-fixed wrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Author</th>
                                            <th>Comment</th>
                                            <th>In Response to</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = "SELECT * FROM lifestyle_comments WHERE lf_comment_status = 'pending' ORDER BY lf_comment_id DESC";
                                        $select_all_comments = mysqli_query($connection, $query);
                                        while ($row  = mysqli_fetch_assoc($select_all_comments)) {
                                            $lf_comment_id = $row['lf_comment_id'];
                                            $lf_comment_post_id = $row['lf_comment_post_id'];
                                            $lf_comment_author = $row['lf_comment_author'];
                                            $lf_comment_email = $row['lf_comment_email'];
                                            $lf_comment_content = substr($row['lf_comment_content'], 0, 50);
                                            $lf_comment_content_f = $row['lf_comment_content'];

                                            $lf_comment_status = $row['lf_comment_status'];
                                            $lf_comment_user_image = $row['lf_comment_user_image'];
                                            $lf_comment_date = date("F j, Y, g:i a", strtotime($row["lf_comment_date"]));

                                        ?>
                                            <tr>
                                                <td> <?php echo $lf_comment_id; ?> </td>
                                                <td> <?php echo $lf_comment_author; ?> </td>
                                                <td> <?php echo $lf_comment_content . "..."; ?> </td>
                                                <?php $query = "SELECT * FROM lifestyles WHERE ls_id = {$lf_comment_post_id}";
                                                $select_ls_id_query = mysqli_query($connection, $query);
                                                while ($row = mysqli_fetch_assoc($select_ls_id_query)) {
                                                    $ls_id = $row['ls_id'];
                                                    $ls_title = $row['ls_title'];

                                                ?>
                                                    <td><a href='../../lifestyles/singleLifestyles.php?lsid=<?php echo $ls_id ?>' target="_blank"><?php echo $ls_title ?></td>
                                                <?php   } ?>
                                                <td>
                                                    <button class='btn btn-sm btn-secondary' data-toggle='modal' data-target="#viewImage<?php echo $lf_comment_id ?>"><i class='fas fa-eye'></i></button>
                                                    <a class='btn btn-sm btn-success' href='./lifestyles.php?source=lifestyle_com&approved=<?php echo $lf_comment_id; ?>'>Approve</a>
                                                    <button class='btn btn-sm btn-warning deletebtn' data-toggle='modal'>Reject</button>

                                                </td>
                                                <!-- View Image Modal -->
                                                <div class="modal fade" id="viewImage<?php echo $lf_comment_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog " role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- w-100 class so that header div covers 100% width of parent div -->
                                                                <h5 class="modal-title w-100" id="exampleModalLabel"><strong>Post Comment
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">
                                                                        ×
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <!--Modal body with image-->
                                                            <div class="modal-body">
                                                                <div class="red"></div>
                                                                <div class="row">
                                                                    <div class="col-12 align-items-left justify-content-left d-flex mb-5 mb-lg-0">
                                                                        <div class="blockabout">
                                                                            <div class="blockabout-inner text-left text-sm-start">
                                                                                <div class="form-group">


                                                                                    <img src="<?php echo $lf_comment_user_image ?>" height="120" width="150" />
                                                                                    <hr>

                                                                                </div>
                                                                                <div class="">
                                                                                    <span class="text-small text-muted">Author:</span>
                                                                                    <h4><?php echo $lf_comment_author ?></h4>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Email:</span>
                                                                                    <h4><?php echo $lf_comment_email ?></h6>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Status:</span>
                                                                                    <span class="badge badge-info"><?php echo $lf_comment_status ?></span>
                                                                                    <h4>
                                                                                        </h6>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Date:</span>
                                                                                    <span><?php echo $lf_comment_date ?></span>
                                                                                    <h4>
                                                                                        </h6>
                                                                                </div>
                                                                                <span class="text-small text-muted">Comment:</span>
                                                                                <p class="description-p pe-0 pe-lg-0">
                                                                                    <?php echo $lf_comment_content_f ?>
                                                                                </p>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </tr>

                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-header  bg-success">
                                <h3 class="card-title">List of Approved Comments</h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">
                                <table id="acceptedTable" class="table table-head-fixed wrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Author</th>
                                            <th>Comment</th>
                                            <th>In Response to</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = "SELECT * FROM lifestyle_comments WHERE lf_comment_status = 'approved' ORDER BY lf_comment_id DESC";
                                        $apprv_comments = mysqli_query($connection, $query);
                                        while ($row  = mysqli_fetch_assoc($apprv_comments)) {
                                            $lf_comment_id = $row['lf_comment_id'];
                                            $lf_comment_post_id = $row['lf_comment_post_id'];
                                            $lf_comment_author = $row['lf_comment_author'];
                                            $lf_comment_email = $row['lf_comment_email'];
                                            $lf_comment_content = substr($row['lf_comment_content'], 0, 50);
                                            $lf_comment_content_f = $row['lf_comment_content'];

                                            $lf_comment_status = $row['lf_comment_status'];
                                            $lf_comment_user_image = $row['lf_comment_user_image'];
                                            $lf_comment_date = date("F j, Y, g:i a", strtotime($row["lf_comment_date"]));

                                        ?>
                                            <tr>
                                                <td> <?php echo $lf_comment_id; ?> </td>
                                                <td> <?php echo $lf_comment_author; ?> </td>
                                                <td> <?php echo $lf_comment_content . "..."; ?> </td>
                                                <?php $query = "SELECT * FROM lifestyles WHERE ls_id = {$lf_comment_post_id}";
                                                $select_ls_id_query = mysqli_query($connection, $query);
                                                while ($row = mysqli_fetch_assoc($select_ls_id_query)) {
                                                    $ls_id = $row['ls_id'];
                                                    $ls_title = $row['ls_title'];

                                                ?>
                                                    <td><a href='../../lifestyles/singleLifestyles.php?lsid=<?php echo $ls_id ?>' target="_blank"><?php echo $ls_title ?></td>
                                                <?php   } ?>
                                                <td>
                                                    <button class='btn btn-sm btn-secondary' data-toggle='modal' data-target="#viewImage<?php echo $lf_comment_id ?>"><i class='fas fa-eye'></i></button>
                                                    <a class='btn btn-sm btn-info' href='./lifestyles.php?source=lifestyle_com&unapproved=<?php echo $lf_comment_id; ?>'>Unapprove</a>
                                                    <button class='btn btn-sm btn-warning deletebtn' data-toggle='modal'>Reject</button>


                                                </td>
                                                <!-- View Image Modal -->
                                                <div class="modal fade" id="viewImage<?php echo $lf_comment_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog " role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <!-- w-100 class so that header div covers 100% width of parent div -->
                                                                <h5 class="modal-title w-100" id="exampleModalLabel"><strong>Post Comment
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">
                                                                        ×
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <!--Modal body with image-->
                                                            <div class="modal-body">
                                                                <div class="red"></div>
                                                                <div class="row">
                                                                    <div class="col-12 align-items-left justify-content-left d-flex mb-5 mb-lg-0">
                                                                        <div class="blockabout">
                                                                            <div class="blockabout-inner text-left text-sm-start">
                                                                                <div class="form-group">


                                                                                    <img src="<?php echo $lf_comment_user_image ?>" height="120" width="150" />
                                                                                    <hr>

                                                                                </div>
                                                                                <div class="">
                                                                                    <span class="text-small text-muted">Author:</span>
                                                                                    <h4><?php echo $lf_comment_author ?></h4>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Email:</span>
                                                                                    <h4><?php echo $lf_comment_email ?></h6>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Status:</span>
                                                                                    <span class="badge badge-success"><?php echo $lf_comment_status ?></span>
                                                                                    <h4>
                                                                                        </h6>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Date:</span>
                                                                                    <span><?php echo $lf_comment_date ?></span>
                                                                                    <h4>
                                                                                        </h6>
                                                                                </div>
                                                                                <span class="text-small text-muted">Comment:</span>
                                                                                <p class="description-p pe-0 pe-lg-0">
                                                                                    <?php echo $lf_comment_content_f ?>
                                                                                </p>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </tr>

                                        <?php
                                        } ?>
                                    </tbody>
                                </table>
                            </div>


                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

    </section>

</div>

<?php

if (isset($_GET['approved'])) {

    $approved_lf_comment_id = $_GET['approved'];
    $query = "UPDATE lifestyle_comments SET lf_comment_status='approved' WHERE lf_comment_id = {$approved_lf_comment_id}";
    $approved_comment_query = mysqli_query($connection, $query);
    header("Location: lifestyles.php?source=lifestyle_com");
    verifyQry($approved_comment_query);
}
if (isset($_GET['unapproved'])) {

    $approved_lf_comment_id = $_GET['unapproved'];
    $query = "UPDATE lifestyle_comments SET lf_comment_status='pending' WHERE lf_comment_id = {$approved_lf_comment_id}";
    $approved_comment_query = mysqli_query($connection, $query);
    header("Location: lifestyles.php?source=lifestyle_com");
    verifyQry($approved_comment_query);
}

?>