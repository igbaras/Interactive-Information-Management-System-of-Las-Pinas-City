<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<?php
if (isset($_GET['lsid'])) {
	$ls_id = $_GET['lsid'];
	echo $ls_id;
	$query = "SELECT * FROM lifestyles WHERE ls_id = $ls_id";
	$all_ls_query = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($all_ls_query)) {
		$ls_id = $row['ls_id'];
		$ls_title = $row['ls_title'];
		$ls_description = $row['ls_description'];
		$ls_date = $row['ls_date'];
		$ls_image = $row['ls_image'];
		$ls_content = html_entity_decode($row['ls_content']);
		$ls_tags = $row['ls_tags'];
		$ls_status = $row['ls_status'];
	}
} else {
	header("lifestyle.php");
}

?>
<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Generic - Phantom by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../Assets/programservicesassets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="../Assets/programservicesassets/css/noscript.css" />
	</noscript>


</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<div class="inner">

				<!-- Logo -->
				<a href="index.html" class="logo">

				</a>

				<!-- Nav -->
				<nav>
					<ul>
						<li><a href="#menu">Menu</a></li>
					</ul>
				</nav>

			</div>
		</header>

		<!-- Menu -->
		<nav id="menu">
			<h2>Menu</h2>
			<ul>
				<li><a href="lifestyle.php">Lifestyle Home</a></li>
				<li><a href="../index.php">Home</a></li>

			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<h1><?php echo $ls_title; ?></h1>
				<span class="image main"><img src="../login/images/lifestyles/<?php echo $ls_image; ?>" alt="" /></span>
				<p style="text-align: justify" class="sls-content"><?php echo $ls_content; ?></p>

			</div>
		</div>
		<!-- News With Sidebar Start -->
		<div class="container-fluid py-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">

						<!-- News Detail End -->
						<!-- Comment Form Start -->

						<?php
						if (isset($_SESSION['userId'])) {
							$puserId = $_SESSION['userId'];

							$query = "SELECT * FROM public_users WHERE user_id = $puserId ";
							$all_users_query = mysqli_query($connection, $query);


							while ($row =  mysqli_fetch_assoc($all_users_query)) {

								$user_id = $row["user_id"];
								$user_avatar = $row["user_avatar"];
								$username = $row["username"];
								$user_fname = $row["user_fname"];
								$user_lname = $row["user_lname"];
								$user_email = $row["user_email"];
							}
						} else {
							echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Please login first!.</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
						}

						if (isset($_POST['leave_comment'])) {
							$lf_comment_post_id = $ls_id;
							$lf_comment_author = $_POST['lf_comment_author'];
							$lf_comment_email = $_POST['lf_comment_email'];
							$lf_comment_content = $_POST['lf_comment_content'];
							$lf_comment_user_image = $_POST['lf_comment_user_image'];

							if (!empty($lf_comment_content)) {

								$query = "INSERT INTO lifestyle_comments (lf_comment_post_id, lf_comment_author, lf_comment_email, lf_comment_content, lf_comment_status, lf_comment_user_image, lf_comment_date) ";
								$query .= "VALUES ($lf_comment_post_id, '{$lf_comment_author}','{$lf_comment_email}','{$lf_comment_content}','pending', '{$lf_comment_user_image}', current_timestamp())";

								$create_comment_query = mysqli_query($connection, $query);

								$query = "UPDATE lifestyles SET ls_comment_count = ls_comment_count + 1 ";
								$query .= "WHERE ls_id = {$ls_id}";
								$update_post_comment_count = mysqli_query($connection, $query);

								echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>Your Comment was successfully submitted! It's in the review process before it appears on the comment section.</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
							} else {
								echo "<script>alert('Fields should not be empty')</script>";
							}
						}


						?>

						<div class="bg-light mb-3" style="padding-left: 150px;padding-right: 150px; padding-bottom: 100px; ">
							<h3 class="mb-4">Leave a comment</h3>
							<form method="post">

								<div class="form-group">
									<label for="message">Comment *</label>
									<input type="hidden" name="lf_comment_author" value="<?php echo $user_fname . " " . $user_lname; ?>">
									<input type="hidden" name="lf_comment_email" value="<?php echo $user_email; ?>">
									<input type="hidden" name="lf_comment_user_image" value="<?php echo $user_avatar; ?>">
									<textarea id="message" cols="30" rows="5" name="lf_comment_content" class="form-control"></textarea>
								</div>
								<div class="form-group mb-0">
									<input type="submit" value="Leave a comment" name="leave_comment" class="btn btn-primary font-weight-semi-bold py-2 px-3">
								</div>
							</form>
						</div>
						<!-- Comment Form End -->



						<!-- Comment List Start -->

						<?php $query = "SELECT * FROM lifestyle_comments WHERE lf_comment_post_id = {$ls_id} ";
						$query .= "AND lf_comment_status = 'approved' ";
						$query .= "ORDER BY lf_comment_id  DESC";
						$select_comment_query = mysqli_query($connection, $query);
						$comment_num = mysqli_num_rows($select_comment_query); ?>
						<div class="bg-light mb-3" style="padding-left: 150px;padding-right: 150px; ">
							<h3 class="mb-4"><?php echo $comment_num; ?> Comments</h3>
							<?php

							$query = "SELECT * FROM lifestyle_comments WHERE lf_comment_post_id = {$ls_id} ";
							$query .= "AND lf_comment_status = 'approved' ";
							$query .= "ORDER BY lf_comment_id  DESC";
							$select_comment_query = mysqli_query($connection, $query);

							while ($row = mysqli_fetch_assoc($select_comment_query)) {
								$lf_comment_author = $row['lf_comment_author'];
								$lf_comment_date = date("F j, Y, g:i a", strtotime($row['lf_comment_date']));

								$lf_comment_content = $row['lf_comment_content'];
								$lf_comment_user_image = $row['lf_comment_user_image'];

							?>
								<div class="media mb-4">
									<img src="<?php echo $lf_comment_user_image; ?>" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
									<div class="media-body">
										<h6><strong><?php echo $lf_comment_author; ?></strong>&nbsp;&nbsp;<small><i><?php echo $lf_comment_date; ?></i></small></h6>
										<p><?php echo $lf_comment_content; ?></p>

									</div>
								</div>
								<hr>
							<?php } ?>

						</div>
						<!-- Comment List End -->


					</div>
				</div>
			</div>
		</div>
		<!-- Footer -->


	</div>

	<!-- Scripts -->
	<script src="../Assets/programservicesassets/js/jquery.min.js"></script>
	<script src="../Assets/programservicesassets/js/browser.min.js"></script>
	<script src="../Assets/programservicesassets/js/breakpoints.min.js"></script>
	<script src="../Assets/programservicesassets/js/main.js"></script>
	<script src="../Assets/programservicesassets/js/util.js"></script>





</body>

</html>