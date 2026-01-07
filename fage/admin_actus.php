<?php
session_start();
require 'includes/db.php';
// Sécurité : Si pas connecté, redirection
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";
$message_type = "";

// --- 1. TRAITEMENT : SUPPRESSION D'UN ARTICLE ---
if (isset($_GET['supprimer'])) {
    $id_a_supprimer = $_GET['supprimer'];
    try {
        $stmt = $pdo->prepare("DELETE FROM actualite WHERE id_actu = ?");
        $stmt->execute([$id_a_supprimer]);
        $message = "🗑️ Article supprimé avec succès !";
        $message_type = "success";
    } catch (Exception $e) {
        $message = "❌ Erreur lors de la suppression.";
        $message_type = "error";
    }
}

// --- 2. TRAITEMENT : AJOUT D'UN ARTICLE ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {

        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $image = $_POST['image_url'];

        try {
            $sql = "INSERT INTO actualite (titre, contenu, image_url, date_publication) VALUES (?, ?, ?, NOW())";
            $stmt = $pdo->prepare($sql);

            if ($stmt->execute([$titre, $contenu, $image])) {
                $message = "✅ Article ajouté et visible sur le site !";
                $message_type = "success";
            } else {
                $message = "❌ Erreur SQL.";
                $message_type = "error";
            }
        } catch (Exception $e) {
            $message = "❌ Erreur technique : " . $e->getMessage();
            $message_type = "error";
        }
    } else {
        $message = "⚠️ Titre et contenu obligatoires.";
        $message_type = "error";
    }
}

// --- 3. RÉCUPÉRATION DE LA LISTE (Mise à jour après ajout/suppression) ---
try {
    $stmt = $pdo->query("SELECT * FROM actualite ORDER BY date_publication DESC");
    $mes_articles = $stmt->fetchAll();
} catch (Exception $e) {
    $mes_articles = [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Actualités</title>
<link rel="stylesheet" href="assets/css/style.css">
    <style>


    </style>
</head>
<body style="background-color: #f9fafb;">

    <nav class="navbar">
        <div class="nav-container">
            <span style="color:white; font-weight:bold; font-size:1.2rem;">
                Admin : <?php echo htmlspecialchars($_SESSION['prenom']); ?>
            </span>
            <div class="nav-links">
                <a href="admin.php" style="color:white; margin-right: 15px; text-decoration:none;">Retour</a>
                <a href="logout.php" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem;">Déconnexion</a>
            </div>
        </div>
    </nav>

    <main class="container admin-section" style="padding-top: 100px;">

        <?php if($message): ?>
            <div class="alert <?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="form-card">
            <h2 style="color:var(--primary-blue); margin-bottom: 20px; border-bottom:1px solid #eee; padding-bottom:10px;">
                ➕ Ajouter une nouvelle actualité
            </h2>

            <form method="POST" action="admin_actus.php">
                <div class="grid-2" style="gap: 20px;">
                    <div class="form-group">
                        <label>Titre de l'article</label>
                        <input type="text" name="titre" class="form-control" required placeholder="Ex: Soirée d'inté...">
                    </div>
                    <div class="form-group">
                        <label>URL de l'image (Optionnel)</label>
                        <input type="text" name="image_url" class="form-control" placeholder="https://...">
                    </div>
                </div>

                <div class="form-group">
                    <label>Contenu de l'article</label>
                    <textarea name="contenu" class="form-control" required placeholder="Écrivez le texte ici..."></textarea>
                </div>

                <button type="submit" class="btn btn-blue" style="width:100%; padding: 15px; font-size: 1rem;">
                    Publier l'article
                </button>
            </form>
        </div>

        <div class="list-header">
            <h2 style="color:#374151; margin:0;">Vos articles en ligne (<?php echo count($mes_articles); ?>)</h2>
        </div>

        <?php if(count($mes_articles) == 0): ?>
            <div style="text-align:center; padding: 40px; color: gray; background:white; border-radius:8px;">
                <p>Aucun article pour le moment. Utilisez le formulaire au-dessus !</p>
            </div>
        <?php else: ?>

            <?php foreach($mes_articles as $art): ?>
                <div class="article-item">

                    <?php if(!empty($art['image_url'])): ?>
                        <img src="<?php echo htmlspecialchars($art['image_url']); ?>" class="art-img">
                    <?php else: ?>
                        <div class="art-img" style="display:flex; align-items:center; justify-content:center; color:#ccc;">No Img</div>
                    <?php endif; ?>

                    <div class="art-info">
                        <h3 class="art-title"><?php echo htmlspecialchars($art['titre']); ?></h3>
                        <p class="art-date">Publié le <?php echo date("d/m/Y à H:i", strtotime($art['date_publication'])); ?></p>
                        <p style="font-size:0.9rem; color:#6b7280; margin-top:5px;">
                            <?php echo substr(htmlspecialchars($art['contenu']), 0, 80); ?>...
                        </p>
                    </div>

                    <div class="art-actions">
                        <a href="read.php?id=<?php echo $art['id_actu']; ?>" target="_blank" class="btn-view" title="Voir l'article">
                            👁️ Voir
                        </a>

                        <a href="admin_actus.php?supprimer=<?php echo $art['id_actu']; ?>"
                           class="btn-delete"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article définitivement ?');"
                           title="Supprimer">
                            🗑️ Suppr.
                        </a>
                    </div>

                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </main>

    <div style="height: 50px;"></div> </body>
</html>
