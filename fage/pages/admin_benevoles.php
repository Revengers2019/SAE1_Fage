<?php
session_start();
require 'includes/db.php'; // Ton fichier de connexion rangé
// Vérification de sécurité (Admin connecté ?)
if (!isset($_SESSION['user_id'])) {
    header("Location: ?/=/login");
    exit();
}

$msg = "";

// --- 1. TRAITEMENT : AJOUTER UN BÉNÉVOLE À UNE MISSION ---
if (isset($_POST['ajouter_benevole'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);

    if (empty($_POST['email']))
        $email = null;
    else
        $email = htmlspecialchars($_POST['email']);

    $id_mission = intval($_POST['id_mission']); // L'ID est envoyé par le formulaire caché

    if (!empty($nom) && !empty($id_mission)) {
        // On insère le bénévole avec l'ID de la mission direct
        $req = $pdo->prepare("INSERT INTO benevoles (nom, prenom, email, id_mission) VALUES (?, ?, ?, ?)");
        if ($req->execute([$nom, $prenom, $email, $id_mission]))
            $msg = "✅ Bénévole ajouté à l'équipe !";
        else
            $msg = "❌ Erreur lors de l'ajout.";
    } else {
        $msg = "❌ Veuillez mettre au moins un nom.";
    }
}

// --- 2. RÉCUPÉRATION DES MISSIONS ET COMPTAGE ---
// Cette requête est "magique" : elle récupère les missions ET compte les bénévoles inscrits pour chacune
$sql = "SELECT m.*,
        (SELECT COUNT(*) FROM benevoles b WHERE b.id_mission = m.id_mission) as inscrits
        FROM missions m
        WHERE m.date_mission >= CURDATE()
        ORDER BY m.date_mission ASC";
$missions = $pdo->query($sql)->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">

<?php
$title = "Gestion Equipes - Admin";
require "includes/head.php";
?>

<body>
    <?php
    $nom = "Admin : " . htmlspecialchars($_SESSION['prenom']);
    require "includes/navbar.admin.php"
    ?>
    <div style="background: white; padding: 15px; border-bottom: 1px solid #ddd;">
        <div style="max-width: 1000px; margin: 0 auto; display: flex; justify-content: space-between;">
            <div style="font-weight: bold;">ADMINISTRATION FAGE</div>
            <div>
                <a href="index.php" style="margin-right: 15px;">Voir le site</a>
                <a href="logout.php" style="color: red;">Déconnexion</a>
            </div>
        </div>
    </div>

    <div class="container">

        <h1>Gestion des Équipes Terrain 👷</h1>
        <p>Ajoutez les bénévoles qui vous contactent par mail directement dans leur mission.</p>

        <?php if (!empty($msg)): ?>
            <div style="background: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <?php foreach ($missions as $m): ?>

            <div class="mission-admin-card">
                <div class="header-mission">
                    <div>
                        <div class="titre-mission"><?php echo htmlspecialchars($m['titre']); ?></div>
                        <div class="date-mission">📅 Le <?php echo date('d/m/Y à H:i', strtotime($m['date_mission'])); ?>
                        </div>
                    </div>

                    <div class="compteur-box">
                        <span class="chiffre-compteur">
                            <?php echo $m['inscrits']; ?> / <?php echo $m['nb_benevoles_requis']; ?>
                        </span>
                        <div class="label-compteur">Inscrits</div>
                    </div>
                </div>

                <div class="liste-inscrits">
                    <h4>👥 Bénévoles déjà validés :</h4>
                    <?php
                    // Petite requête pour récupérer les noms des gens de CETTE mission
                    $sql_b = "SELECT * FROM benevoles WHERE id_mission = ?";
                    $req_b = $pdo->prepare($sql_b);
                    $req_b->execute([$m['id_mission']]);
                    $team = $req_b->fetchAll();

                    if (count($team) == 0) {
                        echo "<span style='color:#9ca3af; font-style:italic;'>Personne pour l'instant...</span>";
                    } else {
                        foreach ($team as $b) {
                            echo '<span class="tag-benevole">👤 ' . htmlspecialchars($b['prenom']) . ' ' . htmlspecialchars($b['nom']) . '</span>';
                        }
                    }
                    ?>
                </div>

                <?php if ($m['inscrits'] < $m['nb_benevoles_requis']): ?>

                    <form method="POST" class="form-ajout-rapide">
                        <div style="width: 100%; font-weight: bold; margin-bottom: 5px; font-size: 0.9rem;">➕ Ajouter un
                            bénévole reçu par mail :</div>

                        <input type="hidden" name="id_mission" value="<?php echo $m['id_mission']; ?>">

                        <input type="text" name="nom" placeholder="Nom" required>
                        <input type="text" name="prenom" placeholder="Prénom">
                        <input type="email" name="email" placeholder="Email (facultatif)">

                        <button type="submit" name="ajouter_benevole" class="btn-mini">Ajouter</button>
                    </form>

                <?php else: ?>
                    <div
                        style="margin-top: 15px; color: #d97706; font-weight: bold; text-align: center; background: #fef3c7; padding: 10px; border-radius: 5px;">
                        🏆 Cette mission est COMPLÈTE !
                    </div>
                <?php endif; ?>

            </div>

        <?php endforeach; ?>

        <?php if (count($missions) == 0): ?>
            <p>Aucune mission programmée. Allez d'abord en créer une.</p>
        <?php endif; ?>

    </div>

</body>

</html>