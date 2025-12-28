<?php
require 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM actualite ORDER BY date_publication DESC");
    $mes_articles = $stmt->fetchAll();
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Actualités | FAGE</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* PETIT CORRECTIF POUR ÊTRE SÛR QUE LE TEXTE EST LISIBLE */
        .card { background: white; border: 1px solid #eee; }
        .card h3 { color: #333; }
        .card p { color: #666; }
    </style>
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

    <main class="container" style="padding-top:100px;">
        <h1 style="text-align:center; margin-bottom:2rem; color:var(--primary-blue);">Toutes les actualités</h1>

        <?php if (count($mes_articles) == 0): ?>
            <p style="text-align:center;">Aucun article pour le moment.</p>
        <?php endif; ?>

        <div class="grid-3">
            <?php foreach($mes_articles as $art): ?>
                <article class="card">

                    <?php if(!empty($art['image_url'])): ?>
                        <img src="<?php echo htmlspecialchars($art['image_url']); ?>" style="width:100%; height:200px; object-fit:cover;">
                    <?php endif; ?>

                    <h3><?php echo htmlspecialchars($art['titre']); ?></h3>
                    <p>Publié le <?php echo date("d/m/Y", strtotime($art['date_publication'])); ?></p>

                    <a href="read.php?id=<?php echo $art['id_actu']; ?>"
                       class="btn-lire-suite"
                       style="display:inline-block; margin-top:10px; padding:8px 15px; background-color:#3b82f6; color:white; text-decoration:none; border-radius:5px;">
                       Lire la suite &rarr;
                    </a>

                </article>
            <?php endforeach; ?>
        </div>
    </main>

</body>
</html>