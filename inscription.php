<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style_inscription.css">
</head>
<body>
    <div class="container">
        <div class="title-container">
            <h1>Inscription</h1>
            <h2>Inscrivez-vous et profitez de l’expérience Chatbox pour commmuniquer avec vos proches.</h2>
        </div>
        <form action="" method="post">
            <div class="pseudo-container">
                <p>Pseudo :</p>
                <input type="pseudo" name="pseudo" placeholder="Pseudo : " required>
            </div>
            <div class="mdp-container">
                <p>Mot de passe :</p>
                <input type="password" name="mdp" placeholder="Mot de passe : " required>
            </div>
                <input type="submit" value="S'inscrire" name="bout">
        </form>
        <div class="connexion-link-container">
            <p>Vous avez déjà un compte ?</p>
            <a href="connexion.php">Se connecter</a>
        </div>
    </div>
</body>
</html>

<?php
 
if (isset($_POST["bout"])) {
    $pseudo = $_POST["pseudo"];
    $mdp = $_POST["mdp"];
    $id = mysqli_connect("localhost", "root", "", "chatbox");

    $req = "SELECT * FROM users WHERE pseudo='$pseudo'";
    $res = mysqli_query($id, $req);
 
    if (mysqli_num_rows($res) == 0) {
        $req = "INSERT INTO users (pseudo, mdp) VALUES ('$pseudo', '$mdp')";
        $res = mysqli_query($id, $req);
        header("location: connexion.php");   
    } else {
        echo "<p>Le pseudo <b>$pseudo</b> est déjà utilisé.</p>";
    } 
}

?>