<?php

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
            $query = "INSERT INTO  categories (cat_title , cat_date)";
            $query .= " VALUE ('{$cat_title}', now())";
            $insert_category_query = mysqli_query($connection, $query);

            if (!$connection) {
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
        echo "<td ><a class='btn btn-primary' href=''><i class='fas fa-edit'></i></a><a class='btn btn-danger' href=''><i class='fas fa-trash'></i></a></td>";


        echo "</tr>";
    }
}
