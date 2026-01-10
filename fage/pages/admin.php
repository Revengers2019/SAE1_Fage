<?php
session_start();
// Sécurité : Si l'utilisateur n'est pas connecté, on le renvoie au login
if (!isset($_SESSION['user_id'])) {
    header("Location: ?/=/login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php
$title = "Tableau de bord Admin";
require "includes/head.php";
?>

<body style="background-color: #f9fafb;"> 

    <nav class="navbar">
        <div class="nav-container">
            <span style="color:white; font-weight:bold; font-size:1.2rem;">
                Admin : <?php echo htmlspecialchars($_SESSION['prenom']); ?>
            </span>
            <div class="nav-links">
                <a href="?/=/" style="color:white; margin-right:15px; text-decoration:none;">Voir
                    le site</a>
                <a href="?/=/" class="btn btn-white"
                    style="padding:0.5rem 1rem; font-size:0.9rem;">Déconnexion</a>
            </div>
        </div>
    </nav>
<main class="container" style="padding-top: 100px;">
        <h1 style="margin-bottom: 2rem; border-bottom:1px solid #e5e7eb; padding-bottom:1rem;">Tableau de bord</h1>

        <div class="grid-2">
            <div class="card">
                <h3 style="color:var(--primary-blue); margin-bottom:0.5rem;">📰 Actualités</h3>
                <p style="margin-bottom:1.5rem; color:#6b7280;">Publier, modifier ou supprimer des articles sur le site.
                </p>
                <a href="?/=/actus_admin" class="btn btn-blue">Gérer les articles</a>
            </div>

            <div class="card">
                <h3 style="color:var(--primary-blue); margin-bottom:0.5rem;">📧 Newsletter</h3>
                <p style="margin-bottom:1.5rem; color:#6b7280;">Voir la liste des étudiants inscrits et gérer les
                    emails.</p>

                <a href="?/=/newsletter_admin" class="btn btn-blue" style="background-color: #10b981;">
                    Gérer les inscrits
                </a>
            </div>
            <div class="card">
                <h3>👥 Bénévoles</h3>
                <p style="margin-bottom:1.5rem; color:#6b7280;">Gérer les équipes et les recrutements.</p>
                <a href="?/=/benevoles_admin" class="btn btn-blue">Gérer les bénévoles</a>
            </div>
            <div class="card">
                <h3>🚩 Missions</h3>
                <p style="margin-bottom:1.5rem; color:#6b7280;">Planifier les actions et collectes.</p>
                <a href="?/=/missions_admin" class="btn btn-blue" style="background-color: #10b981;">Gérer les
                    missions</a>
            </div>
        </div>

    </main>

</body>

</html>
