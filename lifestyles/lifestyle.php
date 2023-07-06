<?php include "../includes/db.php"; ?>
<?php session_start(); ?>
<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Lifestyle| The City of Las Piñas</title>
	<link rel="shortcut icon" type="image icon" href="https://res.cloudinary.com/sarabgi/image/upload/v1688669789/Assets/lplogo_bje93b.png">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="../Assets/lifestyleassets/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="../Assets/lifestyleassets/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">
		<audio id="lifestylespeech">
			<source src="lifestyle.mp3">
		</audio>


		<script>
			window.addEventListener('DOMContentLoaded', function() {
				var audio = document.getElementById("lifestylespeech");
				var playLink = document.getElementById("playLinkL");

				playLink.addEventListener('click', function(event) {
					event.preventDefault();
					audio.play();
				});
			});
		</script>

		<!-- Header -->
		<header id="header" class="alt">
			<a href="#" class="logo"><strong>Life</strong> <span>style</span></a>
			<nav>
				<a href="#menu">Menu</a>
			</nav>
		</header>

		<!-- Menu -->
		<nav id="menu">
			<ul class="links">
				<li><a href="../index.php">Home</a></li>
				<li><a href="../news.php">News and Announcements</a></li>

			</ul>

		</nav>

		<!-- Banner -->
		<section id="banner" class="major">
			<div class="inner">
				<header class="major">
					<a href="#" id="playLinkL">
						<h1>Lifestyle</h1>
					</a>
				</header>
				<div class="content">
					<p>If you want to see the virtual tour just click the button</p>
					<ul class="actions">
						<li><a href="../virtualtour/virtualtour.php" class="button next scrolly">Go to Virtual Tour</a></li>
					</ul>
				</div>
			</div>
		</section>

		<!-- Main -->
		<div id="main">

			<!-- One -->
			<section id="one" class="tiles">

				<?php

				$query = "SELECT * FROM lifestyles ";
				$select_all_ls_query = mysqli_query($connection, $query);
				if (!$select_all_ls_query) {
					die("CONNECTION FAILED" . " " . mysqli_error($connection));
				}
				while ($row = mysqli_fetch_assoc($select_all_ls_query)) {
					$ls_id = $row['ls_id'];

					$ls_title = $row['ls_title'];
					$ls_description = $row['ls_description'];
					$ls_date = $row['ls_date'];
					$ls_image = $row['ls_image'];
					$ls_content = $row['ls_content'];
					$ls_tags = $row['ls_tags'];
					$ls_status = $row['ls_status'];



				?>
					<article>
						<span class="image">
							<img src="<?php echo $ls_image; ?>" alt="lifestyle image" />
						</span>
						<header class="major">
							<h3><a href="singleLifestyles.php?lsid=<?php echo $ls_id; ?>" class="link"><?php echo $ls_title; ?></a></h3>
							<p><?php echo $ls_description; ?></p>
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

</body>

</html>