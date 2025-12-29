<?php
session_start();
session_destroy(); // On supprime toutes les traces de la connexion
header("Location: index.php"); // On renvoie vers l'accueil public
exit();
?>