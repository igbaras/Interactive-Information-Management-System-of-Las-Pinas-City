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
        $post_content = htmlentities($_POST['post_content']);
        $post_tags = $_POST['post_tags'];
        $post_desc = $_POST['post_desc'];



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
        $query .= "post_status = 'pending', ";
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
        <h3 class=' text-right'><strong>{$post_title}</strong> status successfully updated! <a class='btn btn-warning' href='../../singleNews.php?an_id={$post_id} ' target='_blank'>View Post</a> </h3> <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div>";
    }
    if (isset($_POST['update_pub_post'])) {

        $post_id = $_POST['post_id'];
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];

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
        $query .= "post_status = 'pending', ";
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

        $post_id = $_POST['post_id'];
        $image_properties = (new UploadApi())->upload($_FILES["post_image"]["tmp_name"]);
        $image_url = $image_properties['secure_url'];
        $query = "UPDATE posts SET ";
        $query .= "post_status = 'pending', ";
        $query .= "post_image = '{$image_url}'";
        $query .= "WHERE post_id = {$post_id}";

        $update_post = mysqli_query($connection, $query);

        if (!$update_post) {
            die("QUERY CONNECTION FAILED " . mysqli_error($connection));
        }
        echo "
        <div class=' alert alert-success alert-dismissible fade show'>
        <h3 class=' text-right'> Post image successfully updated! <a class='btn btn-warning' href='../posts.php?an_id={$post_id}'>View Post</a> or <a class='btn btn-primary' href='./portal.php'>Review other posts</a></h3> <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div>";
    }
    if (isset($_POST['update_pub_image'])) {

        $post_id = $_POST['post_id'];
        $image_properties = (new UploadApi())->upload($_FILES["post_image"]["tmp_name"]);
        $image_url = $image_properties['secure_url'];
        $query = "UPDATE posts SET ";
        $query .= "post_image = '{$image_url}', post_status = 'pending' ";
        $query .= "WHERE post_id = {$post_id}";

        $update_post = mysqli_query($connection, $query);

        if (!$update_post) {
            die("QUERY CONNECTION FAILED " . mysqli_error($connection));
        }
        echo "
        <div class=' alert alert-success alert-dismissible fade show'>
        <h3 class=' text-right'> Post image successfully updated! <a class='btn btn-warning' href='../posts.php?an_id={$post_id}'>View Post</a> or <a class='btn btn-primary' href='./portal.php'>Review other posts</a></h3> <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div>";
    }
}

// ======user profile=====
function updateUserProfile()
{
    global $connection;

    if (isset($_POST['update_image'])) {
        $user_id = $_POST['user_id'];
        $user_image = (new UploadApi())->upload($_FILES["user_image"]["tmp_name"]);
        $image_url = $user_image['secure_url'];

        $query = "UPDATE users SET user_image='{$image_url}' WHERE user_id ={$user_id}; ";
        $update_image_query = mysqli_query($connection, $query);

        if (!$update_image_query) {
            echo "QUERY FAILED " . mysqli_error($connection);
        }
        if ($update_image_query) {
            echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>Profile image successfully Updated!<i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }
    }

    if (isset($_POST['update_profile'])) {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];


        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

        $query = "UPDATE users SET username = '{$username}', user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_email='{$user_email}', user_password='{$hashed_password}', user_role='{$user_role}' WHERE user_id ={$user_id}; ";
        $update_user_query = mysqli_query($connection, $query);

        if (!$update_user_query) {
            echo "QUERY FAILED " . mysqli_error($connection);
        }
        if ($update_user_query) {
            header("location:settings.php?source=my_profile&uidd=$user_id");
            echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>User successfully Updated!<i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
        }
    }
}
