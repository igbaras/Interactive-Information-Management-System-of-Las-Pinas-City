<?php include "../includes/db.php"; ?>
<?php
if (isset($_GET['ls'])) {
	$ls_id = $_GET['ls'];
	echo $ls_id;
}
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
				<li><a href="index.php">Home</a></li>

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
						<div class="bg-light mb-3" style="padding-left: 150px;padding-right: 150px; padding-bottom: 100px; ">
							<h3 class="mb-4">Leave a comment</h3>
							<form>

								<div class="form-group">
									<label for="message">Comment *</label>
									<textarea style=" background-color:white;" id="message" cols="30" rows="5" class="form-control"></textarea>
								</div>
								<div class="form-group mb-0">
									<input type="submit" value="Leave a comment" class="btn btn-primary font-weight-semi-bold py-2 px-3">
								</div>
							</form>
						</div>
						<!-- Comment Form End -->
						<!-- Comment List Start -->
						<div class="bg-light mb-3" style="padding-left: 150px;padding-right: 150px; ">
							<h3 class="mb-4">3 Comments</h3>
							<div class="media mb-4">
								<img src="./Assets/newsassets/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
								<div class="media-body">
									<h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
									<p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
										accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
										Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
										consetetur at sit.</p>

								</div>
							</div>
							<hr>
							<div class="media">
								<img src="./Assets/newsassets/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
								<div class="media-body">
									<h6><a href="">John Doe</a> <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
									<p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
										accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.
										Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor
										consetetur at sit.</p>


								</div>
							</div>
							<hr>
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