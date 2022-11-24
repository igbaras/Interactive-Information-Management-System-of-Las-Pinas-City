<?php require_once "../../includes/db.php" ?>

<?php

use Cloudinary\Api\Upload\UploadApi;

// ============DELETE POST=============
if (isset($_GET['mem_id'])) {
  $post_id = $_GET['mem_id'];

  $query = "DELETE FROM posts WHERE post_id = {$post_id}";
  $delete_post_query = mysqli_query($connection, $query);

  if (!$delete_post_query) {
    die("QUERY CONNECTION FAILED " . mysqli_error($connection));
  }
  if ($delete_post_query) {
    header("location: posts.php");
  }
}

if (isset($_GET['port_id'])) {
  $post_id = $_GET['mem_id'];

  $query = "DELETE FROM posts WHERE post_id = {$post_id}";
  $delete_post_query = mysqli_query($connection, $query);

  if (!$delete_post_query) {
    die("QUERY CONNECTION FAILED " . mysqli_error($connection));
  }
  if ($delete_post_query) {
    header("location: portal.php");
  }
}

// ===========CATEGORY FUNCTIONS=========
function insert_category()
{
  global $connection;
  if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];

    $cat_desc = $_POST['cat_desc'];

    if ($cat_title = "" || empty($cat_title)) {
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>Fields should not be empty!</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    } else {
      $cat_title = $_POST['cat_title'];
      $cat_desc = $_POST['cat_desc'];


      $cat_image = (new UploadApi())->upload($_FILES["cat_image"]["tmp_name"]);
      $image_url = $cat_image['secure_url'];

      $query = "INSERT INTO  categories (cat_title , cat_image, cat_date, cat_desc)";
      $query .= " VALUE ('{$cat_title}', '{$image_url}', now(), '{$cat_desc}')";
      $insert_category_query = mysqli_query($connection, $query);

      if (!$insert_category_query) {
        die("CONNECTION FAILED" . " " . mysqli_error($connection));
      }
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong>Category successfully added!</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }
  }
}

function findAllCategories()
{
  global $connection;

  $query = "SELECT * FROM categories";
  $all_categories_query = mysqli_query($connection, $query);
  if (!$all_categories_query) {
    die("CONNECTION FAILED" . " " . mysqli_error($connection));
  }
  while ($row = mysqli_fetch_assoc($all_categories_query)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    $cat_date = $row['cat_date'];

    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td>{$cat_date}</td>";
    echo "<td ><a class='btn btn-primary' id='edit_btn' data-toggle='modal'  href=''><i class='fas fa-edit'></i></a><a class='btn btn-danger' href=''><i class='fas fa-trash'></i></a></td>";


    echo "</tr>";
  }
}
function updateCategory()
{

  global $connection;
  if (isset($_POST['update-categories'])) {
    $cat_title = $_POST['cat_title'];
    $cat_id = $_POST['cat_id'];
    $cat_desc = $_POST['cat_desc'];
    if (!empty($_FILES["cat_image"]["tmp_name"])) {
      $cat_image = (new UploadApi())->upload($_FILES["cat_image"]["tmp_name"]);
      $image_url = $cat_image['secure_url'];
    }



    $query = "UPDATE categories SET cat_title = '{$cat_title}', cat_desc='{$cat_desc}' ";

    if (!empty($image_url)) {
      $query .= ",cat_image='{$image_url}' ";
    }


    $query .= "WHERE cat_id={$cat_id}";


    $update_category_query = mysqli_query($connection, $query);

    if (!$update_category_query) {
      echo "QUERY FAILED " . mysqli_error($connection);
    }
    if ($update_category_query) {
      echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
    <h5><strong>Category successfully Updated!<i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }
  }
}

function deleteCategory()
{
  global $connection;
  if (isset($_POST['delete_data'])) {
    $cat_id = $_POST['cat_id'];

    $query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
    $delete_category_query = mysqli_query($connection, $query);

    if (!$delete_category_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    if ($delete_category_query) {

      echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
    <h5><strong>Category Deleted successfully! <i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }
  }
}


function verifyQry($result)
{
  global $connection;
  if (!$result) {
    die("QUERY CONNECTION FAILED " . mysqli_error($connection));
  }
}





// ===========LIFESTYLE FUNCTIONS=========
function deleteLifestyle()
{
  global $connection;
  if (isset($_POST['delete_data'])) {
    $ls_id = $_POST['ls_id'];

    $query = "DELETE FROM lifestyles WHERE ls_id = {$ls_id}";
    $delete_post_query = mysqli_query($connection, $query);
    header("Location: lifestyles.php");
    if (!$delete_post_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
  }
}

function insertLifestyle()
{
  global $connection;
  if (isset($_POST['updateLifestyle'])) {
    $ls_title = $_POST['ls_title'];

    $ls_image = (new UploadApi())->upload($_FILES["ls_image"]["tmp_name"]);
    $image_url = $ls_image['secure_url'];
    $ls_description = $_POST['ls_description'];
    $ls_content = htmlentities($_POST['ls_content']);
    $ls_tags = $_POST['ls_tags'];
    $ls_status = $_POST['ls_status'];


    $query = "INSERT INTO lifestyles ( ls_title, ls_image, ls_status, ls_date, ls_tags, ls_description, ls_content) ";
    $query .= "VALUES ('{$ls_title}','{$image_url}','{$ls_status}',now(), '{$ls_tags}','{$ls_description}','{$ls_content}')";
    $insert_ls_query = mysqli_query($connection, $query);
    if (!$insert_ls_query) {

      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' >
    <h5><strong>Lifestyle successfully added!<i class='fas fa-check'></i></strong></h5>
          
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
  }
}

function updateLifestyle()
{
}
// ===========LIFESTYLE FUNCTIONS END=========








// ===========GALLERY FUNCTIONS=========
function insert_gallery()
{
  global $connection;
  if (isset($_POST['submit_image'])) {
    $img_title = $_POST['img_title'];

    $img_image = (new UploadApi())->upload($_FILES["img_image"]["tmp_name"]);
    $image_url = $img_image['secure_url'];

    $img_status = $_POST['img_status'];
    $img_desc = $_POST['img_desc'];


    $query = "INSERT INTO  gallery (img_title , img_image, img_status,img_date, img_desc)";
    $query .= " VALUE ('{$img_title}', '{$image_url}','{$img_status}', now(), '{$img_desc}')";
    $insert_gallery_query = mysqli_query($connection, $query);

    if (!$insert_gallery_query) {
      die("CONNECTION FAILED" . " " . mysqli_error($connection));
    }
    echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' >
    <h5><strong>Image successfully added to Gallery!<i class='fas fa-check'></i></strong></h5>
          
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
  }
}

function updateGallery()
{

  global $connection;
  if (isset($_POST['update-gallery'])) {
    $img_title = $_POST['img_title'];
    $img_id = $_POST['img_id'];
    $img_desc = $_POST['img_desc'];
    $img_status = $_POST['img_status'];
    if (!empty($_FILES["img_image"]["tmp_name"])) {

      $img_image = (new UploadApi())->upload($_FILES["img_image"]["tmp_name"]);
      $image_url = $img_image['secure_url'];
    }


    $query = "UPDATE gallery SET img_title = '{$img_title}', img_status='{$img_status}', img_desc='{$img_desc}'";

    if (!empty($image_url)) {
      $query .= ",img_image = '{$image_url}'";
    }
    $query .= " WHERE img_id={$img_id}";



    $update_gallery_query = mysqli_query($connection, $query);

    if (!$update_gallery_query) {
      echo "QUERY FAILED " . mysqli_error($connection);
    }
    if ($update_gallery_query) {

      echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
    <h5><strong>Image successfully Updated! <i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }
  }
}
function deleteGallery()
{

  global $connection;
  if (isset($_POST['delete_data'])) {
    $img_id = $_POST['img_id'];

    $query = "DELETE FROM gallery WHERE img_id = {$img_id}";
    $delete_gallery_query = mysqli_query($connection, $query);

    if (!$delete_gallery_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    if ($delete_gallery_query) {

      echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
    <h5><strong>Image Deleted successfully! <i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }
  }
}



// ===========VIRTUAL TOUR FUNCTIONS=========
function insert_vs()
{
  global $connection;
  if (isset($_POST['submit_vs'])) {
    $vs_vt_id = $_POST['vs_vt_id'];
    $vs_spot = htmlentities($_POST['vs_spot']);

    $query = "INSERT INTO virtualspots ( vs_vt_id, vs_spot, vs_date) ";
    $query .= "VALUES ('{$vs_vt_id}','{$vs_spot}',now())";
    $insert_vs_query = mysqli_query($connection, $query);
    if (!$insert_vs_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }

    echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto' >
  <strong>Virtual Spot successfully added!<i class='fas fa-check'></i></strong>
        
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  }
}
function delete_vs()
{

  global $connection;
  if (isset($_POST['delete_data'])) {
    $vt_id = $_POST['vt_id'];

    $query = "DELETE FROM virtualtour WHERE vt_id = {$vt_id}";
    $delete_vt_query = mysqli_query($connection, $query);

    if (!$delete_vt_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    if ($delete_vt_query) {

      echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>Image Deleted successfully! <i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        
        ";
    }
  }
}

function insert_vt()
{
  global $connection;
  if (isset($_POST['submit_virtual'])) {

    $vt_title = $_POST['vt_title'];

    $vt_image = (new UploadApi())->upload($_FILES["vt_image"]["tmp_name"]);
    $image_url = $vt_image['secure_url'];

    $vt_desc = $_POST['vt_desc'];
    $vt_tags = $_POST['vt_tags'];
    $vt_status = $_POST['vt_status'];



    $query = "INSERT INTO virtualtour ( vt_title, vt_image, vt_status, vt_date, vt_tags, vt_desc) ";
    $query .= "VALUES ('{$vt_title}','{$image_url}','{$vt_status}',now(), '{$vt_tags}','{$vt_desc}') ";
    $insert_vt_query = mysqli_query($connection, $query);
    if (!$insert_vt_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }

    echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto' >
  <h5><strong>Virtual tour successfully added!<i class='fas fa-check'></i></strong></h5>
        
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  }
}

function delete_vt()
{

  global $connection;
  if (isset($_POST['delete_data'])) {
    $vt_id = $_POST['vt_id'];

    $query = "DELETE FROM virtualtour WHERE vt_id = {$vt_id}";
    $delete_vt_query = mysqli_query($connection, $query);
    $query = "DELETE FROM virtualspots WHERE vs_vt_id = {$vt_id}";
    $delete_vs_query = mysqli_query($connection, $query);
    if (!$delete_vt_query && !$delete_vs_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    if ($delete_vt_query) {

      echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>Image Deleted successfully! <i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        
        ";
    }
  }
}

function update_vt()
{
  global $connection;
  if (isset($_POST['update-virtualtour'])) {
    $vt_id = $_POST['vt_id'];
    $vt_title = $_POST['vt_title'];


    $vt_image = (new UploadApi())->upload($_FILES["vt_image"]["tmp_name"]);
    $image_url = $vt_image['secure_url'];


    $vt_desc = $_POST['vt_desc'];
    $vt_tags = $_POST['vt_tags'];
    $vt_status = $_POST['vt_status'];


    $query = "UPDATE virtualtour SET vt_title = '{$vt_title}', vt_image='{$image_url}', vt_status='{$vt_status}', vt_tags='{$vt_tags}', vt_desc='{$vt_desc}' WHERE vt_id={$vt_id}; ";
    $update_vt_query = mysqli_query($connection, $query);

    if (!$update_vt_query) {
      echo "QUERY FAILED " . mysqli_error($connection);
    }
    if ($update_vt_query) {
      echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>Virtualtour successfully Updated!<i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }
  }
}
// ===========END OF VIRTUAL TOUR FUNCTIONS=========



// ===========USERS TOUR FUNCTIONS=========
function insertUsers()
{
  global $connection;
  if (isset($_POST['submit_user'])) {
    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

    $user_image = (new UploadApi())->upload($_FILES["user_image"]["tmp_name"]);
    $image_url = $user_image['secure_url'];
    $user_role = $_POST['user_role'];


    $query = "INSERT INTO users (username, user_firstname, user_lastname, user_email, user_password, user_image, user_role, user_date) ";
    $query .= "VALUES ('{$username}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_password}','{$image_url}','{$user_role}',now())";
    $insert_user_query = mysqli_query($connection, $query);
    if (!$insert_user_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }

    echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto' >
  <h5><strong>User successfully added!<i class='fas fa-check'></i></strong></h5>
        
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  }
}
function updateUsers()
{
  global $connection;
  if (isset($_POST['update-users'])) {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    if (!empty($_FILES["user_image"]["tmp_name"])) {
      $user_image = (new UploadApi())->upload($_FILES["user_image"]["tmp_name"]);
      $image_url = $user_image['secure_url'];
      $_SESSION['user_image'] = $image_url;
    }


    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "UPDATE users SET username = '{$username}', user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_email='{$user_email}', user_password='{$hashed_password}', user_role='{$user_role}'";

    if (!empty($image_url)) {
      $query .= ", user_image='{$image_url}'";
    }
    $query .= " WHERE user_id ={$user_id}";
    $update_user_query = mysqli_query($connection, $query);

    if (!$update_user_query) {
      echo "QUERY FAILED " . mysqli_error($connection);
    }
    if ($update_user_query) {
      echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>User successfully Updated!<i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }
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

function deleteUsers()
{
  global $connection;
  if (isset($_POST['delete_data'])) {
    $user_id  = $_POST['user_id'];


    $query = "DELETE FROM users WHERE user_id = {$user_id}";
    $delete_user_query = mysqli_query($connection, $query);

    if (!$delete_user_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    if ($delete_user_query) {

      echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>User Deleted successfully! <i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        
        ";
    }
  }
}

// ===========END OF USERS  FUNCTIONS=========
// ===========Start OF PUBLIC USERS FUNCTIONS=========

function insertUsersPub()
{
  global $connection;
  if (isset($_POST['submit_puser'])) {
    $username = $_POST['username'];
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_avatar = (new UploadApi())->upload($_FILES["user_avatar"]["tmp_name"]);
    $image_url = $user_avatar['secure_url'];

    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
    $query = "INSERT INTO public_users (username, user_fname, user_lname, user_email, user_password, user_avatar, joindate) ";
    $query .= "VALUES ('{$username}','{$user_fname}','{$user_lname}','{$user_email}','{$hashed_password}','{$image_url}',current_timestamp())";
    $insert_user_query = mysqli_query($connection, $query);
    if (!$insert_user_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }

    echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto' >
  <h5><strong>User successfully added!<i class='fas fa-check'></i></strong></h5>
        
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>";
  }
}
function updateUsersPub()
{
  global $connection;
  if (isset($_POST['update-pusers'])) {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $user_fname = $_POST['user_fname'];
    $user_lname = $_POST['user_lname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    if (!empty($_FILES["user_avatar"]["tmp_name"])) {
      $user_avatar = (new UploadApi())->upload($_FILES["user_avatar"]["tmp_name"]);
      $image_url = $user_avatar['secure_url'];
    }


    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "UPDATE public_users SET username = '{$username}', user_fname='{$user_fname}', user_lname='{$user_lname}', user_email='{$user_email}', user_password='{$hashed_password}' ";
    if (!empty($image_url)) {
      $query .= ", user_avatar='{$image_url}'";
    }
    $query .= " WHERE user_id ={$user_id}";

    $update_user_query = mysqli_query($connection, $query);
    if ($update_user_query) {
      echo "<div class='alert alert-success alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>User successfully Updated!<i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }
  }
}
function deleteUsersPub()
{
  global $connection;
  if (isset($_POST['delete_data'])) {
    $user_id  = $_POST['user_id'];


    $query = "DELETE FROM public_users WHERE user_id = {$user_id}";
    $delete_user_query = mysqli_query($connection, $query);

    if (!$delete_user_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    if ($delete_user_query) {

      echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>User Deleted successfully! <i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        
        ";
    }
  }
}


// ===========END OF PUBLIC USERS FUNCTIONS=========





// =========== START POSTS FUNCTIONS=========
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
    $post_status = $_POST['post_status'];



    $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags , post_desc , post_status) ";
    $query .= "VALUES ({$post_category_id} ,'{$post_title}','{$post_author}',current_timestamp(), '{$image_url}','{$post_content}','{$post_tags}', '{$post_desc}', '{$post_status}')";
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



function deletePost()
{
  global $connection;
  if (isset($_POST['delete_data'])) {
    $post_id = $_POST['post_id'];

    $query = "DELETE FROM posts WHERE post_id = {$post_id}";
    $delete_post_query = mysqli_query($connection, $query);

    if (!$delete_post_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    if ($delete_post_query) {

      echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>Post Deleted successfully! <i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        
        ";
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
    $image_properties = (new UploadApi())->upload($_FILES["post_image"]["tmp_name"]);
    $image_url = $image_properties['secure_url'];
    $post_tags = $_POST['post_tags'];
    $post_content = htmlentities($_POST['post_content']);



    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_image = '{$image_url}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}' ";
    $query .= "WHERE post_id = {$post_id}";

    $update_post = mysqli_query($connection, $query);

    if (!$update_post) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    echo "
    <div class=' alert alert-success alert-dismissible fade show'>
    <h3 class=' text-right'><strong>{$post_title}</strong> post successfully updated! <a class='btn btn-success' href='../posts.php?an_id={$post_id}'>View Post</a> or <a class='btn btn-primary' href='./posts.php'>Edit other posts</a></h3> <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button></div>";
  }
}


// =======Post Comments==========
function deletePostComment()
{
  global $connection;
  if (isset($_POST['delete_data'])) {
    $comment_id = $_POST['comment_id'];

    $query = "DELETE FROM post_comments WHERE comment_id = {$comment_id}";
    $delete_post_query = mysqli_query($connection, $query);
    if (!$delete_post_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    if ($delete_post_query) {

      echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>Post Comment Rejected successfully! <i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        
        ";
    }
  }
}
// =========== END POSTS FUNCTIONS=========


// =========== START Lifestyle FUNCTIONS=========
function deleteLifestyleComment()
{
  global $connection;
  if (isset($_POST['delete_data'])) {
    $lf_comment_id = $_POST['lf_comment_id'];

    $query = "DELETE FROM lifestyle_comments WHERE lf_comment_id = {$lf_comment_id}";
    $delete_post_query = mysqli_query($connection, $query);
    if (!$delete_post_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
    if ($delete_post_query) {

      echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert' id='alerto'>
    <h5><strong>Lifestyle Comment Rejected successfully! <i class='fas fa-check'></i></strong></h5>    
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        
        ";
    }
  }
}
// =========== END Lifestyle FUNCTIONS=========



// =========== START Dashboard FUNCTIONS=========




// =========== END Dashboard FUNCTIONS=========
?>


