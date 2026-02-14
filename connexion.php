<?php
    session_start();

    if (isset($_POST["bout"])){
        $pseudo = ucfirst($_POST["pseudo"]);
        $mdp = $_POST["mdp"];
        $id = mysqli_connect("localhost", "root", "", "chatbox");

        $condition = "SELECT * FROM users WHERE pseudo = '$pseudo' AND mdp = '$mdp';";
        $res = mysqli_query($id, $condition);

        if(mysqli_num_rows($res) > 0 ){
            $_SESSION["pseudo"] = $pseudo;
            header("location: chat.php?pseudo=$pseudo");
        }
        else {
            $erreur = "<h3>Erreur de login ou de mot de passe.</h3>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbox - Connexion</title>
    <link rel="stylesheet" href="style_connexion.css">
</head>
<body>
    <div class="container">
        <div class="title-container">
            <h1>Connexion</h1>
            <h2>Veuillez vous connecter pour accéder à Chatbox <br> et parler avec vos proches.</h2>
        </div>
        <form action="" method="POST">
            <div class="pseudo-container">
                <p>Pseudo :</p>
                <input type="pseudo" name="pseudo" placeholder="Pseudo : " required>
            </div>
            <div class="mdp-container">
                <p>Mot de passe :</p>
                <input type="password" name="mdp" placeholder="Mot de passe : " required>
            </div>
            <?php if(isset($erreur)) {echo $erreur;} ?>
            <input type="submit" value="Se connecter" name="bout">
        </form>
        <div class="signin-container">
            <p>Vous n'avez pas de compte ?</p>
            <a href="inscription.php"> S'inscrire</a>
        </div>
    </div>
</body>
</html>
