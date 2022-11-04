<?php require_once "../../includes/db.php" ?>

<?php
global $connection;
if (isset($_REQUEST['mem_id'])) {
  $post_id = $_REQUEST['mem_id'];
  echo $post_id;

  $query = "DELETE FROM posts WHERE post_id = {$post_id}";
  $delete_post_query = mysqli_query($connection, $query);
  header("Location: posts.php");
  if (!$delete_post_query) {
    die("QUERY CONNECTION FAILED " . mysqli_error($connection));
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
      $cat_image = $_FILES['cat_image']['name'];
      $cat_image_temp = $_FILES['cat_image']['tmp_name'];

      move_uploaded_file($cat_image_temp, "../images/categories/$cat_image/");
      $query = "INSERT INTO  categories (cat_title , cat_image, cat_date, cat_desc)";
      $query .= " VALUE ('{$cat_title}', '{$cat_image}', now(), '{$cat_desc}')";
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
    $cat_image = $_FILES['cat_image']['name'];
    $cat_image_temp = $_FILES['cat_image']['tmp_name'];

    move_uploaded_file($cat_image_temp, "../images/categories/$cat_image/");
    $query = "UPDATE categories SET cat_title = '{$cat_title}', cat_image='{$cat_image}', cat_desc='{$cat_desc}' WHERE cat_id={$cat_id}; ";
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


// ===========Post FUNCTIONS=========


function deletePost()
{
  global $connection;
  if (isset($_POST['delete_data'])) {
    $post_id = $_POST['post_id'];

    $query = "DELETE FROM posts WHERE post_id = {$post_id}";
    $delete_post_query = mysqli_query($connection, $query);
    header("Location: posts.php");
    if (!$delete_post_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
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
  if (isset($_POST['submit_lifestyle'])) {

    $ls_title = $_POST['ls_title'];
    $ls_image = $_FILES['ls_image']['name'];
    $ls_image_temp = $_FILES['ls_image']['tmp_name'];
    $ls_description = $_POST['ls_description'];
    $ls_content = htmlentities($_POST['ls_content']);
    $ls_tags = $_POST['ls_tags'];
    $ls_status = $_POST['ls_status'];

    move_uploaded_file($ls_image_temp, "../images/lifestyles/$ls_image/");

    $query = "INSERT INTO lifestyles ( ls_title, ls_image, ls_status, ls_date, ls_tags, ls_description, ls_content) ";
    $query .= "VALUES ('{$ls_title}','{$ls_image}','{$ls_status}',now(), '{$ls_tags}','{$ls_description}','{$ls_content}')";
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
    $img_image = $_FILES['img_image']['name'];
    $img_image_temp = $_FILES['img_image']['tmp_name'];
    $img_status = $_POST['img_status'];
    $img_desc = $_POST['img_desc'];


    move_uploaded_file($img_image_temp, "../images/gallery/$img_image/");
    $query = "INSERT INTO  gallery (img_title , img_image, img_status,img_date, img_desc)";
    $query .= " VALUE ('{$img_title}', '{$img_image}','{$img_status}', now(), '{$img_desc}')";
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
    $img_image = $_FILES['img_image']['name'];
    $img_image_temp = $_FILES['img_image']['tmp_name'];

    move_uploaded_file($img_image_temp, "../images/gallery/$img_image/");
    $query = "UPDATE gallery SET img_title = '{$img_title}', img_image='{$img_image}', img_status='{$img_status}', img_desc='{$img_desc}' WHERE img_id={$img_id}; ";
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
