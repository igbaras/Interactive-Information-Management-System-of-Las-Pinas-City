<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">





                <div class="card-header bg-info">
                    <h3 class="card-title">View All Articles</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    <table id="example1" class="table table-head-fixed table-bordered table-striped">

                        <thead>


                            <tr>

                                <th><input type="checkbox">ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th></th>
                                <th></th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $query = "SELECT * FROM articles";
                            $all_art_query = mysqli_query($connection, $query);
                            if (!$all_art_query) {
                                die("CONNECTION FAILED" . " " . mysqli_error($connection));
                            }
                            while ($row = mysqli_fetch_array($all_art_query)) {
                                $art_id = $row["art_id"];
                                $art_category_id = $row["art_category_id"];
                                $art_title = $row["art_title"];
                                $art_author = $row["art_author"];
                                $art_date = $row["art_date"];
                                $art_image = $row["art_image"];
                                $art_tags = $row["art_tags"];
                                $art_status = $row["art_status"];

                                $query = "SELECT * FROM categories WHERE cat_id =  $art_category_id";
                                $all_cat_query = mysqli_query($connection, $query);
                                if (!$all_cat_query) {
                                    die("CONNECTION FAILED" . " " . mysqli_error($connection));
                                }
                                while ($row = mysqli_fetch_array($all_cat_query)) {
                                    $art_category = $row["cat_title"];

                            ?>
                                    <tr>
                                        <td><?php echo $art_id; ?></td>
                                        <td><?php echo $art_author; ?></td>
                                        <td> <?php echo $art_title; ?></td>
                                        <td><?php echo $art_category; ?></td>
                                        <td><?php echo $art_status; ?></td>
                                        <td><?php echo "<img src='../images/articles/$art_image' width='90%' alt='article_image'>"; ?></td>
                                        <td><?php echo $art_tags; ?></td>
                                        <td> 'comments'</td>
                                        <td><?php echo $art_date; ?></td>
                                        <td><a href="articles.php?source=edit_article&an_edit=<?php echo $art_id; ?>" class='btn btn-primary edit_btn' type="submit"><i class='fas fa-edit'></i><small class='align-self-end'>Edit</small></a></td>
                                        <td><button class='btn btn-danger deletebtn' data-toggle='modal'><i class='fas fa-trash'></i><small class='align-self-end'>Delete</small></button></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>

                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
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
                <h5 class="modal-title" id="exampleModalLabel"> Delete Category Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <?php ?>
            <?php deletePost(); ?>
            <form method="POST">

                <div class="modal-body">

                    <input type="hidden" name="art_id" id="delete_id">

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