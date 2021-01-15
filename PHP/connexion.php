<?php
session_start();
if (isset($_SESSION["id"])) {
	header('Location: index.php');
}
?>
<!DOCTYPE HTML>
<html lang="fr">

<head>
	<script src="https://use.fontawesome.com/d3028f0b61.js"></script>
	<link rel="stylesheet" type="text/css" href="../CSS/discussion.css">
	<link rel="shortcut icon" href="https://www.clker.com/cliparts/s/3/C/b/z/w/speech-bubble-hi.png" />
	<link rel="preconnect">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,600&family=Xanh+Mono&display=swap" rel="stylesheet">
	<meta name="description" content="Tchater avec Dreamblabla" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="utf-8">
</head>

<body>
	<section id="section_index">
		<header>
			<div id="boxe1">
				<div id="boxe1_container1">
					<?php
					if (!isset($_SESSION['id'])) {
						echo '';
					} else {
						echo '<div id="boxe1_container1_logo">';
						echo '<div id="boxe1_container1_logo_css">';
						echo '<p>.</p>';
						echo '</div>';
						echo '</div>';
					}
					?>
					<div id="boxe1_container1_text">
							<?php
							if (!isset($_SESSION['id'])) {
								echo '<div id="titre2_box1">';
								echo '<p>BlaBlaTchat</p>';
								echo '</div>';
							} else {
								echo '<div id="user_name"';
								echo '<a href="profil.php">';
								echo '<center>';
								echo $_SESSION['login'];
								echo '</center>';
								echo '</div>';
							}
							?>
						</a>
					</div>
				</div>
			</div>
			<div id="boxe2_container2">
				<div id="boxe2_container2_logo">
					<a href="index.php"><i class="fa fa-home fa-3x" aria-hidden="true"></i></a>
				</div>
				<div id="boxe2_container2_text">
					<div id="boxe2_container2_text_message">
						<a href="index.php">Accueil</a>
					</div>
				</div>
			</div>
			<div id="boxe3">
				<div class="boxe3_container">
					<div class="boxe3_container_logo">
						<a href="inscription.php"><i class="fa fa-address-card-o fa-2x" aria-hidden="true"></i></a>
					</div>
					<div class="boxe3_container_text">
						<div class="boxe3_container_text_message">
							<a href="inscription.php">Inscription</a>
						</div>
					</div>
				</div>
				<div class="boxe3_container">
					<div class="boxe3_container_logo">
						<a href="connexion.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i></a>
					</div>
					<div class="boxe3_container_text">
						<div class="boxe3_container_text_message">
							<a href="connexion.php"><span class="active">Connexion</span></a>
						</div>
					</div>
				</div>
				<div class="boxe3_container">
					<div class="boxe3_container_logo">
						<a href="discussion.php"><i class="fa fa-commenting fa-2x" aria-hidden="true"></i></a>
					</div>
					<div class="boxe3_container_text">
						<div class="boxe3_container_text_message">
							<a href="discussion.php">Discussion</a>
						</div>
					</div>
				</div>
				<?php
				if (!isset($_SESSION["id"])) {
					echo '';
				} else {
					echo '<div class="boxe3_container">';
					echo '<div class="boxe3_container_logo">';
					echo '<a href="profil.php">';
					echo '<i class="fa fa-user-circle-o fa-2x" aria-hidden="true">';
					echo '</i>';
					echo '</a>';
					echo '</div>';
					echo '<div class="boxe3_container_text">';
					echo '<div class="boxe3_container_text_message">';
					echo '<a href="profil.php">';
					echo 'Profil';
					echo '</a>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}
				?>
			</div>
			<div id="boxe4">
				<footer id="boxe4_container_text">
					<span id="footer_name">Evan-azmd/Claude/Clement</p></span>
				</footer>
			</div>
		</header>
		<main>
			<div id="container1">
				<div id="container1_titre">
					<div id="container1_titre_container1">
						<div id="container1_titre_container1_visuel">
							<p>BlaBlaTchat</p>
						</div>
					</div>
					<div id="container1_titre_container2">
						<p id="titre">Connexion</p>
					</div>
				</div>
			</div>
			<div>
					<?php
		if (isset($_GET["r"])) {	echo "<center>Inscription Terminée ! Merci de vous connecter !</center>";	}
		include('user.php'); 
		?>
			</div>
			<section id="main_connexion_section">
				<form method="post">
					<div id="ins_container1">
						<div class="connexion_container1_1">
							<div class="ins_container1_2">
								<label for="login">Login :</label>
							</div>
						</div>
						<div class="ins_container1_1">
							<div class="ins_container1_3">
								<input type="text" id="login" name="login" placeholder="Pseudo" required="required">
							</div>
						</div>
					</div>
					<div class="ins_container2">
						<div class="ins_container2_trait_invisible">
							<div class="ins_container2_trait_gray">
								<p>.</p>
							</div>
						</div>
					</div>
					<div id="ins_container1">
						<div class="ins_container1_1">
							<div class="ins_container1_2">
								<label for="password">Password :</label>
							</div>
						</div>
						<div class="ins_container1_1">
							<div class="ins_container1_3">
								<input type="password" id="password" name="password" placeholder="Mot de passe" required="required">
							</div>
						</div>
					</div>
					<div class="ins_container2">
						<div class="ins_container2_trait_invisible">
							<div class="ins_container2_trait_gray">
								<p>.</p>
							</div>
						</div>
					</div>
					<div id="ins_container1">
						<div class="ins_container1_1">
							<div class="ins_container1_2">
								<label for="connexion">Se connecter :</label>
							</div>
						</div>
						<div class="ins_container1_1">
							<div class="ins_container1_3">
								<input type="submit" id="ins_button_connexion" name="connexion" value="Connexion">
							</div>
						</div>
					</div>
				</form>
			</section>
		</main>
	</section>
</body>

</html>