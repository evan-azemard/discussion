<?php
session_start();
include('user.php');
include('message.php');
if (!isset($_SESSION["id"])) {
	header('Location: connexion.php');
}
if (isset($_POST["envoyer"])) {
	header("refresh: 0");
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
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600&display=swap" rel="stylesheet">
	<meta name="description" content="Tchater avec Dreamblabla" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="utf-8">
</head>

<body>
	<section id="section_index">
		<header>
			<div id="boxe1">
				<div id="boxe1_container1">
					<div id="boxe1_container1_logo">
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
							<a href="index.php">Accueil</a>
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
								<a href="discussion.php"><span class="active">Discussion</span></a>
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
						echo 'profil';
						echo '</a>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
					?>
				</div>
				<div id="boxe4_bas">
					<?php
					if (!isset($_SESSION["id"])) {
						echo "";
					} else {
						echo '<div id="boutton_deconnexion">';
						echo '<form method="post">';
						echo '<input id="deconnexion" type="submit" name="deconnexion" value="Déconnexion">';
						echo '</form>';
						echo '</div>';
					}
					if (isset($_POST["deconnexion"])) {
						session_unset();
						header('location: index.php');
					}
					?>
					<div id="boxe4_bas">
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
						<p id="titre">Discussion</p>
					</div>
				</div>
			</div>
			<section id="section_commentaire_overflow"> 
				<?php
				$db = mysqli_connect('localhost', 'root', '', 'discussion');
				$com = "SELECT message, login, date FROM messages INNER JOIN utilisateurs ON utilisateurs.id = messages.id_utilisateur ORDER BY date DESC ";
				if (isset($_SESSION["id"])) {
					$result = mysqli_query($db, $com);
					while ($rows = mysqli_fetch_assoc($result)) :
						echo '<div class="discussion_container2">';
						echo '<div class="commentaire_container1">';
						echo '<div class="commentaire_container2">';
						echo  '<div class="pseudo_commentaire">';
						echo '<p>';
						echo $rows['login'];
						echo '</p>';
						echo '</div>';
						echo '<div class="date_commentaire">';
						echo '<p>';
						echo substr($rows['date'], 8, 2);
						echo '-';
						echo substr($rows['date'], 5, 2);
						echo '-';
						echo substr($rows['date'], 0, 4);
						echo '</p>';
						echo '</div>';
						echo '</div>';
						echo '<div class="commentaire_container3_text">';
						echo '<p>';
						echo $rows['message'];
						echo '</p>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					endwhile;
				}
				?>
			</section>
			<form method="post">
				<div id="discussion_container3">
					<div id="ajustement">
						<textarea rows="7" cols="130" name="textarea" id="textarea" placeholder="Envoyer votre commentaire:" required="required"></textarea>
					</div>
					<div id="button_commentaire">
						<div id="button_commentaire_submit">
							<input id="button_ajouter" type="submit" name="envoyer" value="Envoyer">
						</div>
					</div>
				</div>
			</form>
		</main>
	</section>
</body>
</html>