<?php



$showAlert = false;
$showError = false;

// if (isset($_POST['submit_sign'])) {

//   $username = $_POST["username"];
//   $user_fname = $_POST["user_fname"];
//   $user_lname = $_POST["user_lname"];
//   $user_email = $_POST["user_email"];
//   $user_password = $_POST["user_password"];
//   $cuser_password = $_POST["cuser_password"];


//   // Check whether this username exists
//   $existSql = "SELECT * FROM public_users WHERE username = '$username'";
//   $result = mysqli_query($connection, $existSql);
//   $numExistRows = mysqli_num_rows($result);
//   if ($numExistRows > 0) {
//     $showError = "Username Already Exists";
//     header("Location:/interactive-Information-Management-System-of-Las-Pinas-City/index.php?signupsuccess=false&error=$showError");
//   } else {
//     if (($user_password == $cuser_password)) {

//       $hash = password_hash($user_password, PASSWORD_DEFAULT);
//       $sql = "INSERT INTO public_users (username, user_fname, user_lname, user_email, user_password, joinDate) VALUES ('$username', '$user_fname', '$user_lname', '$user_email', '$hash', current_timestamp())";
//       $result = mysqli_query($connection, $sql);
//       if ($result) {
//         $showAlert = true;
//         header("Location:/interactive-Information-Management-System-of-Las-Pinas-City/index.php?signupsuccess=true");
//       }
//     } else {
//       $showError = "Passwords do not match";
//       header("Location:/interactive-Information-Management-System-of-Las-Pinas-City/index.php?signupsuccess=false&error=$showError");
//     }
//   }
// }



if (isset($_POST['submit_sign'])) {

  $username = $_POST["username"];
  $user_fname = $_POST["user_fname"];
  $user_lname = $_POST["user_lname"];
  $user_email = $_POST["user_email"];
  $user_password = $_POST["user_password"];
  $cuser_password = $_POST["cuser_password"];


  // Check whether this username exists
  $existSql = "SELECT * FROM public_users WHERE username = '$username'";
  $result = mysqli_query($connection, $existSql);
  while ($row = mysqli_fetch_assoc($result)) {
    $username1 = $row['username'];
  }

  if ($username1 == $username) {
    $showError = "Username Already Exists";
    header("Location:./index.php?signupsuccess=false&error=$showError");
  } else {
    if ($user_password == $cuser_password) {
      $hash = password_hash($user_password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO public_users (username, user_fname, user_lname, user_avatar, user_email, user_password, joinDate) VALUES ('$username', '$user_fname', '$user_lname', 'usersholder.png', '$user_email', '$hash', current_timestamp())";
      $result = mysqli_query($connection, $sql);
      if ($result) {
        $showAlert = true;
        header("Location:./index.php?signupsuccess=true");
      }
    } else {
      $showError = "Passwords do not match";
      header("Location:./index.php?signupsuccess=false&error=$showError");
    }
  }
}
?>

<!-- Sign up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="signupModal">SignUp Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <b><label for="username">Username</label></b>
            <input class="form-control border-secondary" id="username" name="username" placeholder="Choose a unique Username" type="text" required>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <b><label for="firstName">First Name:</label></b>
              <input type="text" class="form-control border-secondary" id="firstName" name="user_fname" placeholder="First Name" required>
            </div>
            <div class="form-group col-md-6">
              <b><label for="lastName">Last name:</label></b>
              <input type="text" class="form-control border-secondary" id="lastName" name="user_lname" placeholder="Last name" required>
            </div>
          </div>

          <div class="form-group">
            <b><label for="email">Email:</label></b>
            <input type="email" class="form-control border-secondary" id="email" name="user_email" placeholder="Enter Your Email" required>
          </div>

          <div class="text-left my-2">
            <b><label for="password">Password:</label></b>
            <input class="form-control border-secondary" id="password" name="user_password" placeholder="Enter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
          </div>
          <div class="text-left my-2">
            <b><label for="password1">Renter Password:</label></b>
            <input class="form-control border-secondary" id="cpassword" name="cuser_password" placeholder="Renter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
          </div>
          <button type="submit" name="submit_sign" class="btn btn-success">Submit</button>
        </form>
        <p class="mb-0 mt-1">Already have an account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Login here</a>.</p>
      </div>
    </div>
  </div>
</div>