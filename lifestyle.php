<?php include "includes/db.php"; ?>

<!DOCTYPE HTML>
<!--
	Forty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Lifestyle</title>
	<link rel="shortcut icon" type="image icon" href="./Assets/images/lplogo.png">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="./Assets/lifestyleassets/assets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="./Assets/lifestyleassets/assets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header" class="alt">
			<a href="index.html" class="logo"><strong>Life</strong> <span>style</span></a>
			<nav>
				<a href="#menu">Menu</a>
			</nav>
		</header>

		<!-- Menu -->
		<nav id="menu">
			<ul class="links">
				<li><a href="index.html">Home</a></li>
				<li><a href="news.php">News and Announcements</a></li>

			</ul>
			<ul class="actions stacked">
				<li><a href="#" class="button primary fit">Get Started</a></li>
				<li><a href="#" class="button fit">Log In</a></li>
			</ul>
		</nav>

		<!-- Banner -->
		<section id="banner" class="major">
			<div class="inner">
				<header class="major">
					<h1>Lifestyle</h1>
				</header>
				<div class="content">
					<p>If you want to see the virtual tour just click the button</p>
					<ul class="actions">
						<li><a href="virtualtour.html" class="button next scrolly">Go to Virtual Tour</a></li>
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
							<img src="login/images/lifestyles/<?php echo $ls_image; ?>" alt="" />
						</span>
						<header class="major">
							<h3><a href="landing.html" class="link"><?php echo $ls_title; ?></a></h3>
							<p><?php echo $ls_description; ?></p>
						</header>
					</article>
				<?php } ?>
			</section>

			<!-- Two -->
			<section id="two">
				<div class="inner">
					<header class="major">
						<h2>Massa libero</h2>
					</header>
					<p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet pharetra et feugiat tempus.</p>
					<ul class="actions">
						<li><a href="landing.html" class="button next">Get Started</a></li>
					</ul>
				</div>
			</section>

		</div>

		<!-- Contact -->
		<section id="contact">
			<div class="inner">
				<section>
					<form method="post" action="#">
						<div class="fields">
							<div class="field half">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" />
							</div>
							<div class="field half">
								<label for="email">Email</label>
								<input type="text" name="email" id="email" />
							</div>
							<div class="field">
								<label for="message">Message</label>
								<textarea name="message" id="message" rows="6"></textarea>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" value="Send Message" class="primary" /></li>
							<li><input type="reset" value="Clear" /></li>
						</ul>
					</form>
				</section>
				<section class="split">
					<section>
						<div class="contact-method">
							<span class="icon solid alt fa-envelope"></span>
							<h3>Email</h3>
							<a href="#">information@untitled.tld</a>
						</div>
					</section>
					<section>
						<div class="contact-method">
							<span class="icon solid alt fa-phone"></span>
							<h3>Phone</h3>
							<span>(000) 000-0000 x12387</span>
						</div>
					</section>
					<section>
						<div class="contact-method">
							<span class="icon solid alt fa-home"></span>
							<h3>Address</h3>
							<span>1234 Somewhere Road #5432<br />
								Nashville, TN 00000<br />
								United States of America</span>
						</div>
					</section>
				</section>
			</div>
		</section>

		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<ul class="icons">
					<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; Untitled</li>
					<li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
				</ul>
			</div>
		</footer>

	</div>

	<!-- Scripts -->
	<script src="./Assets/lifestyleassets/assets/js/jquery.min.js"></script>
	<script src="./Assets/lifestyleassets/assets/js/jquery.scrolly.min.js"></script>
	<script src="./Assets/lifestyleassets/assets/js/jquery.scrollex.min.js"></script>
	<script src="./Assets/lifestyleassets/assets/js/browser.min.js"></script>
	<script src="./Assets/lifestyleassets/assets/js/breakpoints.min.js"></script>
	<script src="./Assets/lifestyleassets/assets/js/util.js"></script>
	<script src="./Assets/lifestyleassets/assets/js/main.js"></script>

</body>

</html>