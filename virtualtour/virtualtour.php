<?php include "../includes/db.php"; ?>
<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Virtual Tour | The City of Las Piñas</title>
	<link rel="shortcut icon" type="image icon" href="../Assets/images/lplogo.png">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../Assets/lifestyleassets/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="../Assets/lifestyleassets/assets/css/noscript.css" />
	</noscript>

</head>
<style>
	iframe {
		width: 100%;
		height: 80vh;

	}
</style>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header" class="alt">
			<a href="index.html" class="logo"><strong>Virtual</strong> <span>Tour</span></a>
			<nav>
				<a href="#menu">Menu</a>
			</nav>
		</header>

		<!-- Menu -->
		<nav id="menu">
			<ul class="links">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../lifestyles/lifestyle.php">Lifestyles</a></li>
				<li><a href="../news.php">News and Announcments</a></li>

			</ul>

		</nav>

		<!-- Banner -->
		<section id="banner" class="major">
			<div class="inner">
				<header class="major">
					<h1>Virtual Tour</h1>
				</header>
				<div class="content">
					<p>Welcome to Virtual Tour</p>
					<ul class="actions">

					</ul>
				</div>
			</div>
		</section>
		<section id="defaultmap">
			<div class="defmap">
				<iframe src="https://www.google.com/maps/embed?pb=!4v1668581049247!6m8!1m7!1s0YJqgsJtn4YMKVKC3r3ROQ!2m2!1d14.44917259944221!2d120.9823263846363!3f63.10086383394287!4f-4.419150326086111!5f0.7820865974627469" width="600" height="350" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</section>
		<!-- Main -->
		<div id="main">
			<!-- One -->
			<section id="one" class="tiles">

				<?php

				$query = "SELECT * FROM virtualtour ";
				$select_all_vt_query = mysqli_query($connection, $query);
				if (!$select_all_vt_query) {
					die("CONNECTION FAILED" . " " . mysqli_error($connection));
				}
				while ($row = mysqli_fetch_assoc($select_all_vt_query)) {
					$vt_id = $row['vt_id'];
					$vt_title = $row['vt_title'];
					$vt_desc = $row['vt_desc'];
					$vt_date = $row['vt_date'];
					$vt_image = $row['vt_image'];
					$vt_tags = $row['vt_tags'];
					$vt_status = $row['vt_status'];



				?>
					<article>
						<span class="image">
							<img src="<?php echo $vt_image; ?>" alt="" />
						</span>
						<header class="major">
							<h3><a href="singleVirtual.php?vt=<?php echo $vt_id; ?>" class="link"><?php echo $vt_title; ?></a></h3>
							<p><?php echo $vt_desc; ?></p>
						</header>
					</article>
				<?php } ?>
			</section>



		</div>
		<!-- Scripts -->
		<script src="../Assets/lifestyleassets/assets/js/jquery.min.js"></script>
		<script src="../Assets/lifestyleassets/assets/js/jquery.scrolly.min.js"></script>
		<script src="../Assets/lifestyleassets/assets/js/jquery.scrollex.min.js"></script>
		<script src="../Assets/lifestyleassets/assets/js/browser.min.js"></script>
		<script src="../Assets/lifestyleassets/assets/js/breakpoints.min.js"></script>
		<script src="../Assets/lifestyleassets/assets/js/util.js"></script>
		<script src="../Assets/lifestyleassets/assets/js/main.js"></script>