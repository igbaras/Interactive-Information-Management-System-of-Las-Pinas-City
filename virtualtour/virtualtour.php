<?php include "includes/vt_header.php" ?>

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
						<img src="../login/images/virtualtour/<?php echo $vt_image; ?>" alt="" />
					</span>
					<header class="major">
						<h3><a href="singleVirtual.php?vt=<?php echo $vt_id; ?>" class="link"><?php echo $vt_title; ?></a></h3>
						<p><?php echo $vt_desc; ?></p>
					</header>
				</article>
			<?php } ?>
		</section>



	</div>
	<?php include "includes/vt_footer.php" ?>