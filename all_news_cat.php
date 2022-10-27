<?php include "includes/db.php"; ?>
<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>News Categories</title>
	<link rel="shortcut icon" type="image icon" href="./Assets/images/lplogo.png">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="./Assets/programservicesassets/css/main.css" />
	<noscript>
		<link rel="stylesheet" href="./Assets/programservicesassets/css/noscript.css" />
	</noscript>
</head>

<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Header -->
		<header id="header">
			<div class="inner">

				<!-- Logo -->

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
				<li><a href="index.html">Home</a></li>
				<li><a href="generic.html">Gallery</a></li>
				<li><a href="generic.html">Contacts</a></li>

			</ul>
		</nav>

		<!-- Main -->
		<div id="main">
			<div class="inner">
				<header>
					<h1>Categories<br />

				</header>
				<section class="tiles">
					<?php $query = "SELECT * FROM categories ";
					$select_all_cat_query = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($select_all_cat_query)) {

						$cat_title = $row['cat_title'];
						$cat_image = $row['cat_image'];
					?>
						<article class="style1">
							<span class="image">
								<img src="login/images/categories/<?php echo $cat_image; ?>" height="300px" alt="" />
							</span>
							<a href="generic.html">
								<h2><?php echo $cat_title; ?></h2>
								<div class="content">
									<p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
								</div>
							</a>
						</article>
					<?php } ?>
				</section>
			</div>
		</div>

		<!-- Footer -->


	</div>

	<!-- Scripts -->
	<script src="./Assets/programservicesassets/js/jquery.min.js"></script>
	<script src="./Assets/programservicesassets/js/browser.min.js"></script>
	<script src="./Assets/programservicesassets/js/breakpoints.min.js"></script>
	<script src="./Assets/programservicesassets/js/util.js"></script>
	<script src="./Assets/programservicesassets/js/main.js"></script>

</body>

</html>