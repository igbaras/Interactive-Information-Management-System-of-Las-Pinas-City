<?php include "includes/db.php"; ?>

<?php

session_start();
ob_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	$loggedin = true;
	$userId = $_SESSION['userId'];
	$pusername = $_SESSION['pusername'];
} else {
	$loggedin = false;
	$userId = 0;
}


?>


<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
	<title>Home | The City of Las Piñas</title>
	<link rel="shortcut icon" type="image icon" href="./Assets/images/lplogo.png">

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="./Assets/css/mainn.css" />
	<noscript>
		<link rel="stylesheet" href="./Assets/css/noscript.css" />
	</noscript>
	<style>
		a,
		.vt {

			color: #000;
		}
	</style>
</head>

<body class="is-preload landing">
	<div id="page-wrapper">
		<?php include "public_users/_loginModal.php"; ?>
		<?php include "public_users/_signupModal.php"; ?>


		<header id="header">

			<img src="./Assets/images/lplogo.png" alt="">
			<h1 id="logo"><a href="index.html"> </a></h1>
			<?php

			if ($loggedin) {


				echo '
						
		
			<nav id="nav">
				<ul>
				<!--<li><a href="#" id="nightm">Night Mode</a></li>-->
						<li>
						<a href="#">Menu</a>
						<ul>
							<li><a href="programservice.html">Program and Services</a></li>
							<li><a href="gallery.php">Gallery</a></li>
							<li><a href="contact_us.html">Contact</a></li>
							<li>
								<a href="#">News and Lifestyle</a>
								<ul>
									<li><a href="news.php">News</a></li>
									<li><a href="lifestyles/lifestyle.php">Lifestyle</a></li>
									<li><a href="virtualtour/virtualtour.php">Virtual Tour</a></li>
								</ul>
							</li>
						</ul>
					</li>
						<li><a href="virtualtour/virtualtour.php">Virtual Tour</a></li>
						<li>
						<h4><a href="#">Welcome ' . $pusername . '!</a></h4>
						<ul>
				
							<li><a href="public_users/viewProfile.php?uid=' . $userId . '">View Profile</a></li>
							<li><a href="public_users/_logout.php">Logout</a></li>
						</ul>
					</li>
					</ul>
					</nav>
					';
			} else {
				echo '<nav id="nav">
				<ul>
				<a type="submit" class="btn btn-link" data-toggle="modal" data-target="#loginModal">Menu</a>
						
				<a type="submit" class="btn btn-link " data-toggle="modal" data-target="#loginModal">Virtual Tour</a>
	<button type="button" class="btn btn-warning mx-2"  data-toggle="modal" data-target="#loginModal">Login</button>
	<button type="button" class="btn btn-warning mx-2"  data-toggle="modal" data-target="#signupModal">SignUp</button>
	</ul>
	</nav>';
			}
			?>
			</ul>


			<?php
			if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
				echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <strong>Success!</strong> You can now login.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
			}
			if (isset($_GET['error']) && $_GET['signupsuccess'] == "false") {
				echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
              <strong>Warning!</strong> ' . $_GET['error'] . '
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
			}
			if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true") {
				echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <strong>Success!</strong> You are logged in
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
			}
			if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
				echo '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
              <strong>Warning!</strong> Invalid Credentials
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
			} ?>
		</header>
		<!-- Banner -->
		<section id="banner">

			<div class="content">
				<header>
					<h2>The City of Las Piñas</h2>
					<p>Discover what's in the Philippines</p>
					<a href="#one">
						See More
					</a>
				</header>
				<span class="image"><img src="./Assets/images/pic01.jpg" alt="" /></span>
			</div>

			<a href="#one" class="goto-next scrolly">Next</a>
			<div class="col">
				<img class="img-fluid" src="https://res.cloudinary.com/sarabgi/image/upload/v1669227960/index/cityhallgiff_eul5n6.gif" alt="" width="1920" height="1080">


			</div>

			<!--<iframe width="1920" height="500" allowfullscreen src="https://v3d.net/cfn"></iframe>-->
		</section>
		<!-- One -->
		<section id="one" class="spotlight style1 bottom">
			<span class="image fit main"><img src="./Assets/images/pic02.jpg" alt="" /></span>
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-4 col-12-medium">
							<header>
								<h2>About Las Piñas</h2>
								<p>From its days as the salt center of Manila to its bright present as a rapidly
									urbanizing residential-commercial center, Las Piñas has indeed come a long way.</p>
							</header>
						</div>
						<div class="col-4 col-12-medium">
							<p>Known nationwide for its bamboo organ, salt beds, and jeepney factories, Las Piñas is
								distinguished as one of Metro Manila’s fastest-growing communities. Continued economic
								growth, coupled with effective local governance, have earned Las Piñas the distinction
								of being Metro Manila’s cleanest and most peaceful city for three years straight.</p>
						</div>
						<div class="col-4 col-12-medium">
							<p>With the construction of the South Super Highways in the 1960s, Las Piñas became a
								first-class municipality. For urbanites wanting to escape the congestion of Greater
								Manila’s inner cities, it became a welcome alternative, whether for residence or
								business.</p>
						</div>
					</div>
				</div>
			</div>
			<a href="#two" class="goto-next scrolly">Next</a>
		</section>

		<!-- Two -->
		<section id="two" class="spotlight style2 right">
			<span class="image fit main"><img src="./Assets/images/pic03.jpg" alt="" /></span>
			<div class="content">
				<header>
					<h2>Announcements, News, Articles and Comments</h2>
					<p>In this area, anything that occurs in Las Piñas will be reported.</p>
				</header>
				<p>Here you can find recent news and articles regarding events in Las Piñas. Please feel free to check Las piñas activities, programs, developments, calamities, and incidents.</p>
				<ul class="actions">
					<?php
					if ($loggedin) {
						echo '<li><a href="news.php" class="button">Learn More</a></li>';
					} else {
						echo '<li><button class="btn btn-outline-warning" data-toggle="modal" data-target="#loginModal">Learn More</button></li>';
					}
					?>

				</ul>
			</div>
			<a href="#three" class="goto-next scrolly">Next</a>
		</section>

		<!-- Three -->
		<section id="three" class="spotlight style3 left">
			<span class="image fit main bottom"><img src="./Assets/images/pic04.jpg" alt="" /></span>
			<div class="content">
				<header>
					<h2>Lifestyle and Virtual Tour</h2>
					<p>See all lifestyle in the city of Las Piñas</p>
				</header>
				<p>
					Here you can visit well-known locations in Las Piñas. Feel free to visit and enjoy the lovely and distinctive locations that Las Piñas can provide with this fantastic 360-degree perspective..</p>
				<ul class="actions">
					<?php
					if ($loggedin) {
						echo '<li><a href="lifestyles/lifestyle.php" class="button">Learn More</a></li>';
					} else {
						echo '<li><a type="submit" class="btn btn-outline-warning text-dark" data-toggle="modal" data-target="#loginModal">Learn More</a></li>';
					}
					?>

				</ul>
			</div>
			<a href="#four" class="goto-next scrolly">Next</a>
		</section>

		<!-- Four -->
		<section id="four" class="wrapper style1 special fade-up">
			<div class="container">
				<header class="major">
					<h2>Vision, Mission, Goal</h2>
					<h3>Vision</h3>
					<p>
						Las Piñas is envisioned to be a progressive city and responsive to the needs of its residents
						but remain a caring, warm community that is ideal for raising families.

						The city is a “Home”, as exemplified by its official logo where a mother and child live safely
						inside a dwelling, in the middle of “modern progress, while still maintaining family and
						neighborly ties”.</p>

					<h3>Mission</h3>
					<p>In fulfillment of this vision, the City government sees its mission as consisting of three main
						streams:

						First, the expansion of its public services: a clean and livable community, increasing the
						access of its residents to jobs and livelihood opportunities, especially entrepreneurship and
						skills development, a people- oriented and community based-health care system, free and quality
						elementary to college education, youth development, legal services, socialized housing and urban
						renewal, safety and security, utilities development and a strong system of physical
						infrastructure to facilitate movement and circulation within and to the environs of Las Piñas to
						serve the rapidly burgeoning residential and commercial areas of the city.

						Second, conscious of its importance in the history and culture of Metro Manila, the “Las Piñas
						Historical Corridor” was launched February 28, 1997 by then Former Senator Manny Villar, as the
						centerpiece of its Tourism Master Plan. It accentuates the nationalism over time of Las Piñeros
						and complements beautifully the active annual observance of critical historical events in Las
						Piñas of the Revolution of 1896.

						Third, Las Piñas being a city, there is also a need to respond to the call of the fast changing
						times to upgrade the quality of its public service, developing its human resources and making
						its services more fast and efficient down to the barangay level.</p>

				</header>
				<footer class="major">
					<ul class="actions special">
						<li><a href="singleFAQ.html" class="button">FAQ</a></li>
						<li><a href="singlePublications.html" class="button">Publications</a></li>
					</ul>
				</footer>
			</div>
		</section>

		<!-- Five -->
		<section id="five" class="wrapper style2 special fade-up">
			<div class="container">
				<header>
					<h2>Transparency in Government</h2>
					<p>Transparency encourages accountability and informs the public about the actions of their
						government. A national asset is the information that the federal government maintains.</p>
				</header>
				<footer class="major">
					<ul class="actions special">
						<li><a href="singleTransparency.html" class="button">See More</a></li>
					</ul>
				</footer>
			</div>
		</section>

		<!-- Footer -->
		<footer id="footer">
			<ul class="icons">
				<!--<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
				<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
				<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>-->
			</ul>
			<ul class="copyright">
				<li>&copy; Untitled. All rights reserved.</li>

			</ul>
		</footer>
		<!-- Messenger Chat Plugin Code -->
		<div id="fb-root"></div>

		<!-- Your Chat Plugin code -->
		<div id="fb-customer-chat" class="fb-customerchat">
		</div>

		<script>
			var chatbox = document.getElementById('fb-customer-chat');
			chatbox.setAttribute("page_id", "548726065490815");
			chatbox.setAttribute("attribution", "biz_inbox");
		</script>

		<!-- Your SDK code -->
		<script>
			window.fbAsyncInit = function() {
				FB.init({
					xfbml: true,
					version: 'v15.0'
				});
			};

			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s);
				js.id = id;
				js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
	<!-- Scripts -->
	<script src="Assets/JS/script.js"></script>
	<script src="transition.js"></script>
	<script src="./Assets/JS/jquery.min.js"></script>
	<script src="./Assets/JS/jquery.scrolly.min.js"></script>
	<script src="./Assets/JS/jquery.dropotron.min.js"></script>
	<script src="./Assets/JS/jquery.scrollex.min.js"></script>
	<script src="./Assets/JS/browser.min.js"></script>
	<script src="./Assets/JS/breakpoints.min.js"></script>
	<script src="./Assets/JS/util.js"></script>
	<script src="./Assets/JS/mainn.js"></script>
	<script src="./Assets/JS/app.js"></script>
	<script src="./Assets/JS/particles.js"></script>
	<script>
		var nightm = document.getElementById("nightm");
		nightm.onclick = function() {
			document.body.classList.toggle("darktheme");
			//if (document.body.classList.contains("darktheme")) {
			//	nightm.src = "./Assets/images/icons/sun.png";
			//} else {
			//	nightm.src = "./Assets/images/icons/night-mode.png";
			//}
		}
	</script>

</body>

</html>