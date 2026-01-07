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

// --- 1. SUPPRIMER UNE MISSION ---
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    try {
        $stmt = $pdo->prepare("DELETE FROM missions WHERE id_mission = ?");
        $stmt->execute([$id]);
        $message = "🗑️ Mission supprimée avec succès !";
        $message_type = "success";
    } catch (Exception $e) {
        $message = "❌ Erreur lors de la suppression.";
        $message_type = "error";
    }
}

// --- 2. AJOUTER UNE MISSION ---
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter'])) {
    if (!empty($_POST['titre']) && !empty($_POST['date_mission'])) {

        $titre = htmlspecialchars($_POST['titre']);
        $desc = htmlspecialchars($_POST['description']);
        $lieu = htmlspecialchars($_POST['lieu']);
        $date = htmlspecialchars($_POST['date_mission']);
        $nb = htmlspecialchars($_POST['nb']);

        try {
            $stmt = $pdo->prepare("INSERT INTO missions (titre, description, lieu, date_mission, nb_benevoles_requis) VALUES (?, ?, ?, ?, ?)");
            if ($stmt->execute([$titre, $desc, $lieu, $date, $nb])) {
                $message = "✅ Mission planifiée avec succès !";
                $message_type = "success";
            } else {
                $message = "❌ Erreur SQL.";
                $message_type = "error";
            }
        } catch (Exception $e) {
            $message = "❌ Erreur technique.";
            $message_type = "error";
        }
    } else {
        $message = "⚠️ Titre et Date obligatoires.";
        $message_type = "error";
    }
}

// --- 3. RÉCUPÉRATION DE LA LISTE ---
try {
    $stmt = $pdo->query("SELECT * FROM missions ORDER BY date_mission ASC");
    $missions = $stmt->fetchAll();
} catch (Exception $e) {
    $missions = [];
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php
$title = "Gestion Missions - Admin";
require "includes/head.php";
?>

<body style="background-color: #f9fafb;">

    <nav class="navbar">
        <div class="nav-container">
            <span style="color:white; font-weight:bold; font-size:1.2rem;">
                Admin : <?php echo htmlspecialchars($_SESSION['prenom']); ?>
            </span>
            <div class="nav-links">
                <a href="admin.php" style="color:white; margin-right: 15px; text-decoration:none;">Retour</a>
                <a href="logout.php" class="btn btn-white"
                    style="padding:0.5rem 1rem; font-size:0.9rem;">Déconnexion</a>
            </div>
        </div>
    </nav>

    <main class="container admin-section" style="padding-top: 100px;">

        <?php if ($message): ?>
            <div class="alert <?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="form-card">
            <h2 style="color:#2563eb; margin-bottom: 20px; border-bottom:1px solid #eee; padding-bottom:10px;">
                ➕ Créer une nouvelle Mission
            </h2>

            <form method="POST">

                <div class="grid-2">
                    <div class="form-group">
                        <label>Titre de la mission</label>
                        <input type="text" name="titre" class="form-control" required
                            placeholder="Ex: Collecte alimentaire">
                    </div>
                    <div class="form-group">
                        <label>Lieu</label>
                        <input type="text" name="lieu" class="form-control" required placeholder="Ex: Paris 15e">
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label>Date et Heure</label>
                        <input type="datetime-local" name="date_mission" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Bénévoles requis</label>
                        <input type="number" name="nb" class="form-control" placeholder="Combien de personnes ?">
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" placeholder="Détails de la mission..."
                        required></textarea>
                </div>

                <button type="submit" name="ajouter" class="btn btn-blue"
                    style="width:100%; padding: 15px; font-size: 1rem;">
                    Ajouter la mission
                </button>
            </form>
        </div>

        <div class="list-header">
            <h2 style="color:#374151; margin:0;">Missions planifiées (<?php echo count($missions); ?>)</h2>
        </div>

        <?php if (count($missions) == 0): ?>
            <div style="text-align:center; padding: 40px; color: gray; background:white; border-radius:8px;">
                <p>Aucune mission prévue pour le moment.</p>
            </div>
        <?php else: ?>

            <?php foreach ($missions as $m): ?>
                <div class="article-item">

                    <div class="mission-icon">
                        🚩
                    </div>

                    <div class="art-info">
                        <h3 class="art-title"><?php echo htmlspecialchars($m['titre']); ?></h3>
                        <p class="art-sub"><?php echo htmlspecialchars($m['description']); ?></p>

                        <div style="margin-top:5px;">
                            <span class="badge">📅 <?php echo date('d/m/Y à H:i', strtotime($m['date_mission'])); ?></span>
                            <span class="badge">📍 <?php echo htmlspecialchars($m['lieu']); ?></span>
                            <span class="badge">👥 Besoin: <?php echo htmlspecialchars($m['nb_benevoles_requis']); ?></span>
                        </div>
                    </div>

                    <div class="art-actions">
                        <a href="admin_missions.php?delete=<?php echo $m['id_mission']; ?>" class="btn-delete"
                            onclick="return confirm('Supprimer cette mission ?');" title="Supprimer">
                            🗑️ Suppr.
                        </a>
                    </div>

                </div>
            <?php endforeach; ?>

        <?php endif; ?>

    </main>

    <div style="height: 50px;"></div>

</body>

</html>
