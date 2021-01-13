<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="fr">

<head>
	<script src="https://use.fontawesome.com/d3028f0b61.js"></script>
	<link rel="stylesheet" type="text/css" href="../CSS/discussion.css">
	<link rel="shortcut icon" href="https://www.clker.com/cliparts/s/3/C/b/z/w/speech-bubble-hi.png" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;1,600&family=Xanh+Mono&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
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
								echo '<div id="titre_box1">';
								echo '<p>BlaBlaTchat</p>';
								echo '</div>';
							} else {
								echo '<div id="user_name">';
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
						<a href="index.php"><span class="active">Accueil</span></a>
					</div>
				</div>
			</div>
			<div id="boxe3">
				<?php
				if (!isset($_SESSION["id"])) {
					echo '<div class="boxe3_container">';
					echo '<div class="boxe3_container_logo">';
					echo '<a href="inscription.php">';
					echo '<i class="fa fa-address-card-o fa-2x" aria-hidden="true">';
					echo '</i>';
					echo '</a>';
					echo '</div>';
					echo '<div class="boxe3_container_text">';
					echo '<div class="boxe3_container_text_message">';
					echo '<a href="inscription.php">';
					echo 'Inscription';
					echo '</a>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				} else {
					echo '';
				}
				?>
				<?php
				if (!isset($_SESSION["id"])) {
					echo '<div class="boxe3_container">';
					echo '<div class="boxe3_container_logo">';
					echo '<a href="connexion.php">';
					echo '<i class="fa fa-user fa-2x" aria-hidden="true">';
					echo '</i>';
					echo '</a>';
					echo '</div>';
					echo '<div class="boxe3_container_text">';
					echo '<div class="boxe3_container_text_message">';
					echo '<a href="connexion.php">';
					echo 'connexion';
					echo '</a>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				} else {
					echo '';
				}
				?>
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
				<?php
				if (!isset($_SESSION["id"])) {
					echo "";
				} else {
					echo '<div id="boutton_deconnexion">';
					echo '<form method="post">';
					echo '<input id="deconnexion" type="submit" name="deconnexion" value="Déconnexion">';
					echo '</form>';
					echo '</div>';
					if (isset($_POST["deconnexion"])) {
						session_unset();
						header('location: index.php');
					}
				}
				?>
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
						<p id="titre">Accueil</p>
					</div>
				</div>
			</div>
			<div id="container2">
				<?php 
					if (isset($_SESSION['id'])){

						echo '<p><center> <span id="rouge">Pourquoi vous voyez certaines annonces</span></center><br> Lorsque vous utilisez BlaBlaTchat pour suivre, BlaBlaTchat, rechercher, afficher ou interagir avec des BlaBlaTchat ou des comptes Twitter, nous pouvons utiliser ces actions pour personnaliser les annonces BlaBlaTchat pour vous. Par exemple, si vous recherchez un terme spécifique, nous pouvons vous montrer que vous avez fait la promotion du contenu lié à ce sujet. Nous pouvons également personnaliser les annonces en utilisant d’autres informations vous concernant, telles que vos informations de profil; l’emplacement de votre appareil mobile (si les fonctionnalités de localisation sont activées); votre adresse IP; ou les applications installées sur votre appareil. Cela nous aide à vous diffuser des annonces locales et d’autres annonces que vous préférerez peut-être.</p>';
					} else {
						echo '<p>Conditions générales d’utilisation:<br><br>“Pour le contenu protégé par les droits de propriété intellectuelle, comme les photos ou vidéos (contenu de propriété intellectuelle), vous nous donnez spécifiquement la permission suivante (…) vous nous accordez une licence non-exclusive, transférable, sous-licenciable, sans redevance et mondiale pour l’utilisation des contenus de propriété intellectuelle que vous publiez sur BlaBlaTchat ou en relation avec BlaBlaTchat (licence de propriété intellectuelle). Cette licence de propriété intellectuelle se termine lorsque vous supprimez vos contenus de propriété intellectuelle ou votre compte, sauf si votre contenu a été partagé avec d’autres personnes qui ne l’ont pas supprimé.</p>';
					}

				?>
			</div>
			<div id="container3">
				<?php 
					if (isset($_SESSION['id'])){
						echo "<p>";
						echo '<span id="container3_blablat">';
						echo "BlaBlaTchat travaille également avec des partenaires publicitaires tiers, y compris Google, pour commercialiser les propres services";
						echo "</span>";
						echo "</p>";
					} else {
						echo "<p> N'attendez plus ! Inscrivez-vous maintenant </p>";
					}

				?>
	
			</div>
			<div id="container4">
				<div id="container4_button">
					<?php 
					if (isset($_SESSION['id'])){
						echo "";
					} else {
						echo '<a href="inscription.php"><button id="button_inscription">Inscription</button></a>';
					}

				?>
				</div>
			</div>
		</main>
	</section>
</body>

</html>