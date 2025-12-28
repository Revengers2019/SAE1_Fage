<?php
session_start();
require 'db.php';

// 1. SÉCURITÉ : Vérifier si on est admin
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

// 2. SUPPRESSION : Si on clique sur la poubelle
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    try {
        $stmt = $pdo->prepare("DELETE FROM newsletter WHERE id_inscrit = ?");
        $stmt->execute([$id]);
        $message = "🗑️ L'email a été supprimé de la liste.";
    } catch (Exception $e) {
        $message = "Erreur lors de la suppression.";
    }
}

// 3. AFFICHAGE : Récupérer tous les inscrits (du plus récent au plus vieux)
$stmt = $pdo->query("SELECT * FROM newsletter ORDER BY date_inscription DESC");
$inscrits = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Newsletter</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Un peu de style pour le tableau */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th { text-align: left; background: #f3f4f6; padding: 12px; color: #555; }
        td { border-bottom: 1px solid #eee; padding: 12px; }
        tr:hover { background-color: #f9fafb; }
        .date { color: #888; font-size: 0.9rem; }
        .btn-del { color: #dc2626; text-decoration: none; font-weight: bold; font-size: 0.9rem; }
        .btn-del:hover { text-decoration: underline; }
    </style>
</head>
<body style="background-color: #f9fafb;">

    <nav class="navbar">
        <div class="nav-container">
            <span style="color:white; font-weight:bold;">Admin Zone</span>
            <div class="nav-links">
                <a href="admin.php" style="color:white; margin-right:15px; text-decoration:none;">Retour</a>
                <a href="logout.php" class="btn btn-white">Déconnexion</a>
            </div>
        </div>
    </nav>

    <main class="container" style="padding-top: 100px; max-width: 800px;">

        <div class="card">
            <h2 style="color:var(--primary-blue); margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom:10px;">
                📧 Liste des inscrits (<?php echo count($inscrits); ?>)
            </h2>

            <?php if($message): ?>
                <div style="background:#fee2e2; color:#991b1b; padding:10px; border-radius:5px; margin-bottom:20px; text-align:center;">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if(count($inscrits) == 0): ?>
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
                                       <?php foreach($inscrits as $i): ?>
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
                                                   <a href="admin_newsletter.php?supprimer=<?php echo $i['id_inscrit']; ?>"
                                                      class="btn-del"
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