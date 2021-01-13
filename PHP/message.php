<?php
if (isset($_POST["textarea"]) and isset($_POST["envoyer"])) {
    $textarea = $_POST['textarea'];
    $connect = mysqli_connect('localhost', 'root', '', 'discussion');
    $query = ("INSERT INTO `messages`(`message`,`id_utilisateur`,`date`) VALUES ('$textarea','$_SESSION[id]', now())");
    $var = mysqli_query($connect, $query);
    header('Location:discussion.php');
    exit;
}
