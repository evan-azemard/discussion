<!-- inscription en base de donnée -->
<?php
// class Inscription
// {
//     private $id;
//     private $login;
//     private $password;
//     private $repeatpassword;

// public function getLogin()
// {
//     return $this->login;
// }
// public function setLogin($login)
// {
//     $login = $this->login;
//     return $login;
// }
// public function register($login, $password, $repeatpassword)
// {
// try {
// se connecter à mysql
// $pdo = new PDO("mysql:host=localhost;dbname=discussion", "root", "");
// return ($pdo);
// } catch (PDOException $exc) {
//     return $exc->getMessage();
// }
//         // récupérer les valeurs 
//         $login = $_POST['login'];
//         $password = $_POST['password'];
//         // vérification password
//         if ($login && $password && $repeatpassword) {
//             if ($password == $repeatpassword) {
//             } else echo "Les mots de passe doivent être identiques !";
//         } else echo "Veuillez remplir tous les champs !";
//         // Requête mysql pour insérer des données
//         $sql = "INSERT INTO `utilisateurs`(`login`, `password`) VALUES (:login,:password)";
//         $res = $pdo->prepare($sql);
//         $exec = $res->execute(array(":login" => $login, ":password" => $password));
//         // vérifier si la requête d'insertion a réussi
//         if ($exec) {
//             echo 'Vous êtes inscrit !';
//         } else {
//             echo "Échec de l'opération d'inscription";
//         }
//         return $login . $password . $repeatpassword;
//     }
// } -->
?>
<!-- -----------------------------------------------------------------------------------------------------------------------------------// -->
<?php
// class Connexion
// {

//     private $id;
//     private $login;
//     private $password;
//     private $connexion;


//je vais ecrire la connexion pour permettre à l'utilisateur de se connecter au site via la bdd 
//controler si le login et le password renseigné par l'utilisateur est identique a la bdd 
//récupérer les valeurs enregistrées sur $login et $pasword ($post)
//mettre require pour relier le fichier class au fichier connexion
//se connecter à la bdd et indiquer "bonjour ($login)"
// selectionner sur la bdd le login et password identique
// si un utilisateur ne remplit pas les paramètres indiquer"login ou password non saisis" 
// si un utilisateur remplit ces parametres mais ne correspond pas indiquer "login ou password incorrect"
// 
//     public function connect($login, $password)
//     {
//         $this->login = $login;
//         $this->password = $password;
//         try {
//             $pdo = new PDO("mysql:host = localhost;dbname = discussion", "root", "");
//         } catch (PDOException $e) {
//             echo $e->getMessage();
//         }
//         if (isset($_POST["login"]) and isset($_POST["password"])) {
//             $sql = $pdo->prepare("SELECT * FROM utilisateurs WHERE login='$login'");
//             $sql->execute();
//             echo $sql;
//         }
//     }
// }
?>
<!-- ---------------------------------------------------------Procedural---------------------------------------------------------------- -->

<<<<<<< HEAD
<!-- 

    arrondir boutton envoyer centrer texte area et arrondire aussi -->


=======
>>>>>>> 8cc0e6854e9202219c716057292f416f0f85fa87



<!-- Inscription -->
<?php
$error = array();     //la table stoke les erreurs.
$bdd = new mysqli("localhost", "root", "", "discussion");
// $bdd = new PDO('mysql:host=nomserveur; dbname=nombase', 'discussion', '');

if (!$bdd)              //Si la bdd ne s'ouvre pas on affiche les erreurs.
{
    echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
    echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
    echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
    exit;
}
if (isset($_POST["inscription"]))      //Pour le formulaire d'inscription...
{
    $pseudo = $_POST["login"];         //On place les données des input dans des variables.
    $password = $_POST["password"];
    $r_password = $_POST["r_password"];
<<<<<<< HEAD
    //HACHER LE PASSWORD /!\ 
=======


    $hpass = password_hash($password, PASSWORD_DEFAULT);



>>>>>>> 8cc0e6854e9202219c716057292f416f0f85fa87
    if ($pseudo && $password && $r_password) {
        if (strlen($pseudo) > 12) {
            array_push($error, "Le pseudo est trop long");
        }
        if (strlen($pseudo) < 4) {
            array_push($error, "Le pseudo est trop court");
        }
        if ($password !== $r_password) {
            array_push($error, "Le mot de passe répété n'est pas le même");
        }
        if ($pseudo == $password) {
            array_push($error, "Le pseudo et le mot de passe ne doivent pas être identique");
        }
        if (strLen($password) < 5) {
            array_push($error, "Le mot de passe dois faire au moins 5 caractères");
        }
    } else array_push($error, "Veuillez remplir tous les champs");
    $sql = "SELECT * FROM utilisateurs";    //On ce connecte a la base utilisateur.
    $res = mysqli_query($bdd, $sql);
    foreach ($res as $row)              //foreach va faire une boucle, parcourire mon tableaux $res et le "as" va dire de ranger les donnée de $res dans une nouvelle variable $row)
    {
        if ($row["login"] == $pseudo)    //On selectione le champs "login" de ma bdd , si c'est identique au pseudo on affiche le message.)
        {
            array_push($error, "Le pseudo est déja utilisé");
        }
    }
    foreach ($error as $erreure)    //Toutes les erreurs trouvé sont mis dans la variable $erreurs puis on les écrit.
    {
        echo "• " . $erreure . "<br>";
    }
    if (count($error) < 1)   //Si il n'y à pas d'erreurs, on inssére les données dans le table utilisateurs de la bdd.
    {
        $sql = 'INSERT INTO `utilisateurs`(`login`, `password`) VALUES ("' . $pseudo . '","' . $hpass . '")';
        $res = mysqli_query($bdd, $sql);
        header('Location: connexion.php');
    }
}
?>
<!-- Connexion -->
<?php
if (isset($_POST["connexion"])) {
  
$pseudo = $_POST["login"];
$password = $_POST["password"];

        if ($pseudo && $password) {
            $sql = 'SELECT `id`,`login`,`password` FROM `utilisateurs` WHERE `login` = "' . $pseudo . '";';
            $res = mysqli_query($bdd, $sql);

            
            foreach ($res as $row) {
            //on créer un varialbe $SESSION et on y range dedans l'id  et le login contenue dans la variable $row pour pouvroi les utilisé plus facilement plus tard.
            $_SESSION["id"] = $row["id"];
            $_SESSION["login"] = $row["login"];
            $hpass = $row["password"];
            header('Location: index.php');
            }
                if(password_verify($password, $hpass)) {    
                echo "<center>Identifiants Invalides.</center>";
                }else echo '<center> Veuillez remplir tous les champs </center>';
        }
}
?>
<!-- Modification Profil-->
<?php
if (isset($_POST["modifier"])) {

    $n_pseudo = $_POST["n_login"];
    $n_password = $_POST["n_password"];
    $hpass = password_hash($password, PASSWORD_DEFAULT);

    if ($n_pseudo && $n_password) {
        if (strlen($n_pseudo) > 12) {
            array_push($error, "Le pseudo est trop long");
        }
        if (strlen($n_pseudo) < 4) {
            array_push($error, "Le pseudo est trop court");
        }
        if ($n_pseudo == $n_password) {
            array_push($error, "Le pseudo et le mot de passe ne doivent pas être identique");
        }
        if (strLen($n_password) < 5) {
            array_push($error, "Le mot de passe dois faire au moins 5 caractères");
        }
    } else array_push($error, "Veuillez remplir tous les champs");
    foreach ($error as $erreure) {
        echo "• " . $erreure . "<br>";
    }
    if (count($error) < 1) {
        $sql  =  'UPDATE `utilisateurs` SET `login` = "' . $n_pseudo . '" , `password` = "' . $hpass . '" WHERE `id` = "' . $_SESSION["id"] . '"; ';
        $res = mysqli_query($bdd, $sql);
        session_unset();
        header('location: connexion.php');
    }
}

?>



