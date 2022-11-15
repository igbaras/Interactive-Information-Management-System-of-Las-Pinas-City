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
                        <h3 class="card-title"><strong> VIEW POST COMMENTS </strong></h3>
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

                                        <input type="hidden" name="comment_id" id="delete_id">

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
                                <h3 class="card-title">List of Pending Post Comments</h3>
                            </div>
                            <!-- /.card-header -->

                            <?php deletePostComment(); ?>
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
                                        $query = "SELECT * FROM post_comments WHERE comment_status = 'pending' ORDER BY comment_id DESC";
                                        $select_all_comments = mysqli_query($connection, $query);
                                        while ($row  = mysqli_fetch_assoc($select_all_comments)) {
                                            $comment_id = $row['comment_id'];
                                            $comment_post_id = $row['comment_post_id'];
                                            $comment_author = $row['comment_author'];
                                            $comment_email = $row['comment_email'];
                                            $comment_content = substr($row['comment_content'], 0, 50);
                                            $comment_content_f = $row['comment_content'];

                                            $comment_status = $row['comment_status'];
                                            $comment_user_image = $row['comment_user_image'];
                                            $comment_date = date("F j, Y, g:i a", strtotime($row["comment_date"]));

                                        ?>
                                            <tr>
                                                <td> <?php echo $comment_id; ?> </td>

                                                <td> <?php echo $comment_author; ?> </td>
                                                <td> <?php echo $comment_content . "..."; ?> </td>
                                                <?php $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
                                                $select_postid_query = mysqli_query($connection, $query);
                                                while ($row = mysqli_fetch_assoc($select_postid_query)) {
                                                    $post_id = $row['post_id'];
                                                    $post_title = $row['post_title'];

                                                ?>
                                                    <td><a href='../../singleNews.php?an_id=<?php echo $post_id ?>' target="_blank"><?php echo $post_title ?></td>
                                                <?php   } ?>

                                                <td>
                                                    <button class='btn btn-sm btn-secondary' data-toggle='modal' data-target="#viewImage<?php echo $comment_id ?>"><i class='fas fa-eye'></i></button>
                                                    <a class='btn btn-sm btn-success' href='./posts.php?source=post_com&approved=<?php echo $comment_id; ?>'>Approve</a>
                                                    <button class='btn btn-sm btn-warning deletebtn' data-toggle='modal'>Reject</button>

                                                </td>
                                                <!-- View Image Modal -->
                                                <div class="modal fade" id="viewImage<?php echo $comment_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                                                                                    <img src="<?php echo $comment_user_image ?>" height="120" width="150" />
                                                                                    <hr>

                                                                                </div>
                                                                                <div class="">
                                                                                    <span class="text-small text-muted">Author:</span>
                                                                                    <h4><?php echo $comment_author ?></h4>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Email:</span>
                                                                                    <h4><?php echo $comment_email ?></h6>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Status:</span>
                                                                                    <span class="badge badge-info"><?php echo $comment_status ?></span>
                                                                                    <h4>
                                                                                        </h6>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Date:</span>
                                                                                    <span><?php echo $comment_date ?></span>
                                                                                    <h4>
                                                                                        </h6>
                                                                                </div>
                                                                                <span class="text-small text-muted">Comment:</span>
                                                                                <p class="description-p pe-0 pe-lg-0">
                                                                                    <?php echo $comment_content_f ?>
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
                                        $query = "SELECT * FROM post_comments WHERE comment_status = 'approved' ORDER BY comment_id DESC";
                                        $apprv_comments = mysqli_query($connection, $query);
                                        while ($row  = mysqli_fetch_assoc($apprv_comments)) {
                                            $comment_id = $row['comment_id'];
                                            $comment_post_id = $row['comment_post_id'];
                                            $comment_author = $row['comment_author'];
                                            $comment_email = $row['comment_email'];
                                            $comment_content = substr($row['comment_content'], 0, 50);
                                            $comment_content_f = $row['comment_content'];

                                            $comment_status = $row['comment_status'];
                                            $comment_user_image = $row['comment_user_image'];
                                            $comment_date = date("F j, Y, g:i a", strtotime($row["comment_date"]));

                                        ?>
                                            <tr>
                                                <td> <?php echo $comment_id; ?> </td>
                                                <td> <?php echo $comment_author; ?> </td>
                                                <td> <?php echo $comment_content . "..."; ?> </td>
                                                <?php $query = "SELECT * FROM posts WHERE post_id = {$comment_post_id}";
                                                $select_postid_query = mysqli_query($connection, $query);
                                                while ($row = mysqli_fetch_assoc($select_postid_query)) {
                                                    $post_id = $row['post_id'];
                                                    $post_title = $row['post_title'];

                                                ?>
                                                    <td><a href='../../singleNews.php?an_id=<?php echo $post_id ?>' target="_blank"><?php echo $post_title ?></td>
                                                <?php   } ?>


                                                <td>
                                                    <button class='btn btn-sm btn-secondary' data-toggle='modal' data-target="#viewImage<?php echo $comment_id ?>"><i class='fas fa-eye'></i></button>
                                                    <a class='btn btn-sm btn-info' href='./posts.php?source=post_com&unapproved=<?php echo $comment_id; ?>'>Unapprove</a>
                                                    <button class='btn btn-sm btn-warning deletebtn' data-toggle='modal'>Reject</button>


                                                </td>
                                                <!-- View Image Modal -->
                                                <div class="modal fade" id="viewImage<?php echo $comment_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


                                                                                    <img src="<?php echo $comment_user_image ?>" height="120" width="150" />
                                                                                    <hr>

                                                                                </div>
                                                                                <div class="">
                                                                                    <span class="text-small text-muted">Author:</span>
                                                                                    <h4><?php echo $comment_author ?></h4>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Email:</span>
                                                                                    <h4><?php echo $comment_email ?></h6>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Status:</span>
                                                                                    <span class="badge badge-success"><?php echo $comment_status ?></span>
                                                                                    <h4>
                                                                                        </h6>
                                                                                </div>
                                                                                <div class=" pb-1 mb-1">
                                                                                    <span class="text-small text-muted">Date:</span>
                                                                                    <span><?php echo $comment_date ?></span>
                                                                                    <h4>
                                                                                        </h6>
                                                                                </div>
                                                                                <span class="text-small text-muted">Comment:</span>
                                                                                <p class="description-p pe-0 pe-lg-0">
                                                                                    <?php echo $comment_content_f ?>
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

    $approved_comment_id = $_GET['approved'];
    $query = "UPDATE post_comments SET comment_status='approved' WHERE comment_id = {$approved_comment_id}";
    $approved_comment_query = mysqli_query($connection, $query);
    header("Location: posts.php?source=post_com");
    verifyQry($approved_comment_query);
}
if (isset($_GET['unapproved'])) {

    $approved_comment_id = $_GET['unapproved'];
    $query = "UPDATE post_comments SET comment_status='pending' WHERE comment_id = {$approved_comment_id}";
    $approved_comment_query = mysqli_query($connection, $query);
    header("Location: posts.php?source=post_com");
    verifyQry($approved_comment_query);
}

?>