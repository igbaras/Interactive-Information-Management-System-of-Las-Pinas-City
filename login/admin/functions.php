<?php
// ===========CATEGORY FUNCTIONS=========
function insert_category()
{
  global $connection;
  if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];



    if ($cat_title = "" || empty($cat_title)) {
      echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <strong>Fields should not be empty!</strong>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    } else {
      $cat_title = $_POST['cat_title'];
      $cat_image = $_FILES['cat_image']['name'];
      $cat_image_temp = $_FILES['cat_image']['tmp_name'];

      move_uploaded_file($cat_image_temp, "../images/categories/$cat_image/");
      $query = "INSERT INTO  categories (cat_title , cat_image, cat_date)";
      $query .= " VALUE ('{$cat_title}', '{$cat_image}', now())";
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
    $cat_image = $_FILES['cat_image']['name'];
    $cat_image_temp = $_FILES['cat_image']['tmp_name'];

    move_uploaded_file($cat_image_temp, "../images/categories/$cat_image/");
    $query = "UPDATE categories SET cat_title = '{$cat_title}', cat_image='{$cat_image}' WHERE cat_id={$cat_id}; ";
    $update_category_query = mysqli_query($connection, $query);

    if (!$update_category_query) {
      echo "QUERY FAILED " . mysqli_error($connection);
    }
    if ($update_category_query) {
      echo "<div class='alert border border-success alert-dismissible fade show' role='alert'>
      <strong class='text-success'>Category successfully Updated!</strong>
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
    header("Location: categories.php");
    if (!$delete_category_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
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


// ===========ARTICLE FUNCTIONS=========


function deleteArticle()
{
  global $connection;
  if (isset($_POST['delete_data'])) {
    $art_id = $_POST['art_id'];

    $query = "DELETE FROM articles WHERE art_id = {$art_id}";
    $delete_article_query = mysqli_query($connection, $query);
    header("Location: articles.php");
    if (!$delete_article_query) {
      die("QUERY CONNECTION FAILED " . mysqli_error($connection));
    }
  }
}
