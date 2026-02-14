<?php
    session_start();
    if(!isset($_SESSION["pseudo"])){
        header("location:connexion.php");
    }

    $id = mysqli_connect("localhost","root","","chatbox");
    $pseudo_get = $_GET["pseudo"];

    if(isset($_POST["bout"])){
        $message = $_POST["message"];
        $destinataire = ucfirst($_POST["destinataire"]);
        $requete = "INSERT INTO messages (pseudo, message, date, destinataire) VALUES ('$pseudo_get', '$message', NOW(), '$destinataire')";
        mysqli_query($id, $requete);
        header("location:chat.php?pseudo=$pseudo_get");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_chat.css">
    <title>Chatbox</title>
</head>
<body>
     
    <a href="deconnexion.php">Se déconnecter</a>
    <div class="container">
        <h1>Chatbox</h1>
        <div class="messages">
            <ul>
                <?php
                    $requete = "SELECT * FROM messages WHERE pseudo = '$pseudo_get' OR destinataire = '$pseudo_get' OR destinataire = 'General' ORDER BY date DESC";
                    $resultat = mysqli_query($id, $requete);
                    while($ligne = mysqli_fetch_assoc($resultat)){
                        $destinataire = $ligne['destinataire'];
                        $pseudo = $ligne['pseudo'];
                        $message = $ligne['message'];
                        $date = $ligne['date'];
                        $id_msg = $ligne['idm'];
                 
                        if($pseudo == $pseudo_get){
                         echo "<li class='message-container sender'>
                                    <div class = 'pseudo'>$pseudo - ($destinataire)</div>
                                    <div class = 'message'>$message</div>
                                    <div class = 'date'>$date</div>
                                    <a class='delete-link' href='supprimer.php?id=$id_msg' style='color:red; font-size:0.8rem;' onclick='return confirm(\"Supprimer ce message ?\")'>Supprimer</a>
                                </li>";    
                        } else {
                         echo "<li class='message-container receiver'>
                                    <div class = 'pseudo'>$pseudo - ($destinataire)</div>
                                    <div class = 'message'>$message</div>
                                    <div class = 'date'>$date</div>
                                </li>";
                        }
                    }
                ?>
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="POST">      
                <input type="text" class="btn input-message" name="message" placeholder="Message :" required><br>
                <div class="send-receiver-container">
                    <select name="destinataire" required>
                        <option value="" selected disabled required>Choissisez un destinataire : </option>
                        <option value="general">General</option>
                        <?php
                            $requete = "SELECT pseudo FROM users WHERE pseudo != '$pseudo_get' AND pseudo != 'General';";
                            $res = mysqli_query($id, $requete);
                            while($ligne = mysqli_fetch_assoc($res)){
                                $destinataire = $ligne["pseudo"];
                                echo "<option value = $destinataire>$destinataire</option>";
                            }
                        ?>
                    </select>
                    <input type="submit" class="btn input-send" name="bout" value="Envoyer">
                </div>
            </form>
        </div>
    </div> 
</body>
</html>