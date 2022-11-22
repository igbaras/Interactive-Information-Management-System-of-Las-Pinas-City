<?php

use Cloudinary\Api\Upload\UploadApi;

function insertPost()
{
    global $connection;
    if (isset($_POST['submit_post'])) {

        $post_category_id = $_POST['post_category_id'];
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $image_properties = (new UploadApi())->upload($_FILES["post_image"]["tmp_name"]);
        $image_url = $image_properties['secure_url'];

        // $post_image = $_FILES['post_image']['name'];
        // $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_content = htmlentities($_POST['post_content']);
        $post_tags = $_POST['post_tags'];
        $post_desc = $_POST['post_desc'];


        // move_uploaded_file($post_image_temp, "../images/posts/$post_image/");

        $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_desc , post_status) ";
        $query .= "VALUES ({$post_category_id} ,'{$post_title}','{$post_author}',current_timestamp(), '{$image_url}','{$post_content}','{$post_tags}', '{$post_desc}', 'pending')";
        $insert_Posts_query = mysqli_query($connection, $query);
        if (!$insert_Posts_query) {

            die("QUERY CONNECTION FAILED " . mysqli_error($connection));
        }
        if ($insert_Posts_query) {
            echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>Post successfully added!<i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }
    }
}
function updatePost()
{
    global $connection;

    if (isset($_POST['update_post'])) {

        $post_id = $_POST['post_id'];
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        if (!empty($_FILES["post_image"]["tmp_name"])) {
            $image_properties = (new UploadApi())->upload($_FILES["post_image"]["tmp_name"]);
            $image_url = $image_properties['secure_url'];
        }

        $post_tags = $_POST['post_tags'];
        $post_desc = $_POST['post_desc'];

        $post_content = htmlentities($_POST['post_content']);



        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_date = now(), ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_status = '{$post_status}', ";
        if (!empty($image_url)) {
            $query .= "post_image = '{$image_url}', ";
        }
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_desc = '{$post_desc}' ";
        $query .= "WHERE post_id = {$post_id}";
        $update_post = mysqli_query($connection, $query);

        if (!$update_post) {
            die("QUERY CONNECTION FAILED " . mysqli_error($connection));
        }
        echo "
        <div class=' alert alert-success alert-dismissible fade show'>
        <h3 class=' text-right'><strong>{$post_title}</strong> status successfully updated! <a class='btn btn-warning' href='../posts.php?an_id={$post_id}'>View Post</a> or <a class='btn btn-primary' href='./portal.php'>Review other posts</a></h3> <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div>";
    }

    if (isset($_POST['update_image'])) {


        $image_properties = (new UploadApi())->upload($_FILES["post_image"]["tmp_name"]);
        $image_url = $image_properties['secure_url'];
        $query = "UPDATE posts SET ";
        $query .= "post_image = '{$image_url}'";
        $query .= "WHERE post_id = {$post_id}";

        $update_post = mysqli_query($connection, $query);

        if (!$update_post) {
            die("QUERY CONNECTION FAILED " . mysqli_error($connection));
        }
        echo "
        <div class=' alert alert-success alert-dismissible fade show'>
        <h3 class=' text-right'><strong>{$post_title}</strong> status successfully updated! <a class='btn btn-warning' href='../posts.php?an_id={$post_id}'>View Post</a> or <a class='btn btn-primary' href='./portal.php'>Review other posts</a></h3> <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div>";
    }
}
