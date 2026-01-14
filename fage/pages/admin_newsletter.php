<?php
session_start();
require 'includes/db.php';

require 'includes/roleverif.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ?/=/login");
    exit();
}
if(!isadmin()){
    header("Location: ?/=/");
    exit();
}

$message = "";

// Supprime si on a clique sur la poubelle \\
$route = $_GET['/'] ?? '/';
$id_a_supprimer = null;

$supPos = strpos($route, '?supprimer=');
if ($supPos !== false) {
    $possibleId = substr($route, $supPos + strlen('?supprimer='));
    if (ctype_digit($possibleId)) {
        $id_a_supprimer = (int) $possibleId;
        $route = '/newsletter_admin';
    }
}

if ($id_a_supprimer !== null) {
    try {
        $stmt = $pdo->prepare("DELETE FROM newsletter WHERE id_inscrit = ?");
        $stmt->execute([$id_a_supprimer]);
        $message = "🗑️ L'email a été supprimé de la liste avec succès.";
        $message_type = "success";
    } catch (Exception $e) {
        $message = "❌ Erreur lors de la suppression.";
        $message_type = "error";
    }
}

// Récupére tous les inscrits (du plus récent au plus vieux) \\
$stmt = $pdo->query("SELECT * FROM newsletter ORDER BY date_inscription DESC");
$inscrits = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<?php
$title = "Gestion Newsletter";
require "includes/head.php";
?>

<body style="background-color: #f9fafb;">

    <?php
    $nom = "Newsletter";
    require "includes/navbar.admin.php";
    ?>

    <main class="container" style="padding-top: 100px; max-width: 800px;">

        <div class="card">
            <h2
                style="color:var(--primary-blue); margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom:10px;">
                📧 Liste des inscrits (<?php echo count($inscrits); ?>)
            </h2>

            <?php if ($message): ?>
                <div
                    style="background:#fee2e2; color:#991b1b; padding:10px; border-radius:5px; margin-bottom:20px; text-align:center;">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if (count($inscrits) == 0): ?>
                <p style="text-align:center; color:gray; padding: 20px;">
                    Personne n'est encore inscrit à la newsletter.
                </p>
            <?php else: ?>

                <table>
                    <thead>
                        <tr>
                            <th>Nom / Prénom</th>
                            <th>Organisation</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th style="text-align:right;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($inscrits as $i): ?>
                            <tr>
                                <td style="font-weight:bold; color:#333;">
                                    <?php echo htmlspecialchars($i['nom'] . " " . $i['prenom']); ?>
                                </td>
                                <td>
                                    <?php echo htmlspecialchars($i['organisation']); ?>
                                </td>
                                <td style="color:#2563eb;">
                                    <?php echo htmlspecialchars($i['email']); ?>
                                </td>
                                <td class="date">
                                    <?php echo date("d/m/Y", strtotime($i['date_inscription'])); ?>
                                </td>
                                <td style="text-align:right;">
                                    <a href="?/=/newsletter_admin?supprimer=<?php echo $i['id_inscrit']; ?>" class="btn-del"
                                        onclick="return confirm('Supprimer cet inscrit ?');">
                                        🗑️
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>
        </div>

    </main>
</body>

</html>