<?php
require 'includes/db.php';

$route = $_GET['/'] ?? '/';
$id = null;

$equalPos = strrpos($route, '=');
if ($equalPos !== false) {
    // tout ce qui est après le dernier '='
    $possibleId = substr($route, $equalPos + 1);

    // Vérifier que ce sont bien des chiffres
    if (ctype_digit($possibleId)) {
        $id = (int)$possibleId;
        $route = substr($route, 0, $equalPos - 3); // enlève le '?id'
        $route = '/read';
    }
}

// Vérifie la validité de la route (bien read ou présence d'un id)
if ($route !== '/read' || $id === null) {
    header('Location: ?/=/actualites');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM actualite WHERE id_actu = ?");
$stmt->execute([$id]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$article) die("Oups ! Cet article n'existe pas.");

?>

<!DOCTYPE html>
<html lang="fr">

<?php
$title = htmlspecialchars($article['titre']) . " | FAGE";
require "includes/head.php";
?>

<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="?/=/" class="nav-logo">FAGE</a>
            <ul class="nav-links">
                <li><a href="?/=/">Accueil</a></li>
                <li><a href="?/=/actualites" class="active">Actualités</a></li>
            </ul>
        </div>
    </nav>

    <main class="container" style="padding-top:100px; max-width: 800px; margin: 0 auto;">

        <a href="?/=/actualites"
            style="text-decoration: none; color: gray; margin-bottom: 20px; display: inline-block;">
            &larr; Retour aux actualités
        </a>

        <h1 style="color:var(--primary-blue); margin-bottom: 10px;">
            <?php echo htmlspecialchars($article['titre']); ?>
        </h1>

        <p style="color: gray; font-size: 0.9rem; margin-bottom: 20px;">
            Publié le <?php echo date("d/m/Y", strtotime($article['date_publication'])); ?>
        </p>

        <?php if (!empty($article['image_url'])): ?>
            <img src="<?php echo htmlspecialchars($article['image_url']); ?>"
                style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
        <?php endif; ?>

        <div class="article-content" style="font-size: 1.1rem; line-height: 1.6; color: #333;">
            <?php echo nl2br(htmlspecialchars($article['contenu'])); ?>
        </div>

    </main>

</body>

</html>