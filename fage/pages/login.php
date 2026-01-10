<?php
session_start(); // On démarre la session pour mémoriser l'utilisateur connecté
require 'includes/db.php';
// Si le formulaire est envoyé (méthode POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // On cherche l'utilisateur dans la base de données
    $stmt = $pdo->prepare("SELECT * FROM benevoles WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // On vérifie le mot de passe (admin / admin)
    if ($user && $password == $user['mot_de_passe']) {
        // C'est bon ! On enregistre les infos de l'admin
        $_SESSION['user_id'] = $user['id_benevole'];
        $_SESSION['prenom'] = $user['prenom'];

        // On redirige vers le tableau de bord (qu'on fera juste après)
        header("Location: ?/=/admin");
        exit();
    } else {
        $error = "Email ou mot de passe incorrect !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php
$title = "Connexion Admin FAGE";
require "includes/head.php";
?>

<body style="display:flex; justify-content:center; align-items:center; height:100vh; background:#f3f4f6;">

    <div class="card" style="width: 400px; padding: 2rem;">
        <h2 style="text-align:center; color:#3b82f6; margin-bottom:1.5rem;">Espace Admin</h2>

        <?php if (isset($error)) {
            echo "<p style='color:red; text-align:center; margin-bottom:1rem;'>$error</p>";
        } ?>

        <form method="POST">
            <div style="margin-bottom:1rem;">
                <label for="email" style="font-weight:bold;">Email</label>
                <input type="email" id="email" name="email" required
                    style="width:100%; padding:0.8rem; border:1px solid #ccc; border-radius:5px; margin-top:5px;">
            </div>

            <div style="margin-bottom:1.5rem;">
                <label for="password" style="font-weight:bold;">Mot de passe</label>
                <input type="password" id="password" name="password" required
                    style="width:100%; padding:0.8rem; border:1px solid #ccc; border-radius:5px; margin-top:5px;">
            </div>

            <button type="submit" class="btn btn-blue" style="width:100%;">Se connecter</button>
        </form>

        <p style="text-align:center; margin-top:1.5rem;">
            <a href="?/=/" style="text-decoration:underline;">Retour au site</a>
        </p>
    </div>

</body>

</html>