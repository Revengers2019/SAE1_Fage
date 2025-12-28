<?php
require 'db.php'; // On se connecte à la base

// 1. On vérifie si un ID est présent dans l'URL (ex: read.php?id=12)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 2. On prépare la requête pour aller chercher CET article précis
    $stmt = $pdo->prepare("SELECT * FROM actualite WHERE id_actu = ?");
    $stmt->execute([$id]);
    $article = $stmt->fetch();

    // Si l'article n'existe pas (id inconnu), on arrête tout
    if (!$article) {
        die("Oups ! Cet article n'existe pas.");
    }
} else {
    // Si on arrive sur la page sans ID, on renvoie vers la liste
    header('Location: actualites.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($article['titre']); ?> | FAGE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-container">
            <a href="index.html" class="nav-logo">FAGE</a>
            <ul class="nav-links">
                <li><a href="index.html">Accueil</a></li>
                <li><a href="actualites.php" class="active">Actualités</a></li>
                </ul>
        </div>
    </nav>

    <main class="container" style="padding-top:100px; max-width: 800px; margin: 0 auto;">

        <a href="actualites.php" style="text-decoration: none; color: gray; margin-bottom: 20px; display: inline-block;">
            &larr; Retour aux actualités
        </a>

        <h1 style="color:var(--primary-blue); margin-bottom: 10px;">
            <?php echo htmlspecialchars($article['titre']); ?>
        </h1>

        <p style="color: gray; font-size: 0.9rem; margin-bottom: 20px;">
            Publié le <?php echo date("d/m/Y", strtotime($article['date_publication'])); ?>
        </p>

        <?php if(!empty($article['image_url'])): ?>
            <img src="<?php echo htmlspecialchars($article['image_url']); ?>"
                 style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 30px;">
        <?php endif; ?>

        <div class="article-content" style="font-size: 1.1rem; line-height: 1.6; color: #333;">
            <?php echo nl2br(htmlspecialchars($article['contenu'])); ?>
        </div>

    </main>

</body>
</html>