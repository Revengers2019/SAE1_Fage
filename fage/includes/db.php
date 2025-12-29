<?php
// db.php : Ce fichier gère la connexion à la base de données fage_bdd
$host = 'localhost';
$dbname = 'fage_bdd';
$username = 'root';
$password = ''; // Sur XAMPP Windows, le mot de passe est vide par défaut

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Cette ligne permet d'afficher les erreurs SQL s'il y en a
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si la connexion échoue, on arrête tout et on affiche pourquoi
    die("Erreur de connexion : " . $e->getMessage());
}
?>


