<?php
session_start();
if(!isset($_SESSION["pseudo"])){
    header("location:connexion.php");
    exit;
}

$id = mysqli_connect("localhost", "root", "", "chatbox");
$id_message = $_GET['id'];
$pseudo_session = $_SESSION['pseudo'];

// On ne supprime que si l'ID existe ET que l'auteur est l'utilisateur connecté
$requete = "DELETE FROM messages WHERE idm = '$id_message' AND pseudo = '$pseudo_session'";
mysqli_query($id, $requete);

// Retour au chat
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>