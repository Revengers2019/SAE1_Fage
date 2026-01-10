<?php
require 'includes/db.php';
// Récupération des missions futures
try {
    $sql = "SELECT * FROM missions WHERE date_mission >= CURDATE() ORDER BY date_mission ASC";
    $req = $pdo->query($sql);
    $liste_missions = $req->fetchAll();
} catch (Exception $e) {
    $liste_missions = [];
}
?>

<!DOCTYPE html>
<html lang="fr">

<?php
$title = "Missions Bénévoles | FAGE";
require "includes/head.php";
?>

<body>

    <?php include 'includes/nav.php'; ?>


    <main class="container">
        <br><br>

        <section class="hero-gradient reveal">
            <div class="hero-text">
                <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem;">Engagez-vous avec la FAGE</h1>
                <p style="font-size: 1.2rem;">Participez à nos actions solidaires sur le terrain. Devenez bénévole et
                    faites bouger les lignes !</p>
            </div>
            <div class="hero-img">
                <img src="https://img.freepik.com/photos-gratuite/personnes-mettant-leurs-mains-ensemble-comme-symbole-travail-equipe_1150-1632.jpg"
                    alt="Bénévolat" style="border-radius: 1rem; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.2);">
            </div>
        </section>

        <section class="reveal" style="margin-top: 3rem;">
            <h2 style="font-size: 2rem; color: var(--primary-blue); margin-bottom: 1rem; font-weight: 700;">Les
                prochaines missions</h2>
            <p style="margin-bottom: 1rem; color: #666;">Inscrivez-vous directement en cliquant sur "Je participe".</p>

            <?php if (empty($liste_missions)): ?>
                <div class="card" style="text-align: center; padding: 3rem;">
                    <h3 style="color: #6b7280;">Aucune mission n'est prévue pour le moment.</h3>
                    <p>Revenez un peu plus tard !</p>
                </div>
            <?php else: ?>

                <div class="missions-grid">
                    <?php foreach ($liste_missions as $m): ?>
                        <?php
                        $ts = strtotime($m['date_mission']);
                        $jour = date('d', $ts);
                        $mois = date('M', $ts);
                        $heure = date('H:i', $ts);
                        ?>

                        <div class="mission-card reveal">
                            <div class="mission-header">
                                <div style="font-size: 0.9rem; text-transform: uppercase; opacity: 0.9;"><?php echo $mois; ?>
                                </div>
                                <div style="font-size: 2rem; font-weight: 800; line-height: 1;"><?php echo $jour; ?></div>
                                <div
                                    style="font-size: 0.85rem; background: rgba(0,0,0,0.2); padding: 2px 10px; border-radius: 10px; margin-top: 5px; display:inline-block;">
                                    ⏰ <?php echo $heure; ?>
                                </div>
                            </div>

                            <div class="mission-body">
                                <span class="mission-tag">Besoin : <?php echo htmlspecialchars($m['nb_benevoles_requis']); ?>
                                    pers.</span>
                                <h3 style="font-size: 1.25rem; font-weight: 700; color: #1f2937; margin: 0.5rem 0;">
                                    <?php echo htmlspecialchars($m['titre']); ?>
                                </h3>
                                <div style="color: #4b5563; font-weight: 500; margin-bottom: 1rem;">
                                    📍 <?php echo htmlspecialchars($m['lieu']); ?>
                                </div>
                                <p style="color: #666; font-size: 0.95rem; line-height: 1.5;">
                                    <?php echo htmlspecialchars($m['description']); ?>
                                </p>
                            </div>

                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ethanmkp@gmail.com&su=Candidature Mission : <?php echo htmlspecialchars($m['titre']); ?>&body=Bonjour, je souhaite participer."
                                target="_blank" class="btn-participer">
                                ✋ Je participe (via Gmail)
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>
        </section>

    </main>
    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/script.js"></script>

    <style>
        /* PETIT CSS SUPPLÉMENTAIRE JUSTE POUR LA GRILLE DES MISSIONS */
        .missions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
            margin-bottom: 3rem;
        }

        /* On réutilise le style .card de ton site, mais on l'adapte pour les missions */
        .mission-card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .mission-card:hover {
            transform: translateY(-5px);
        }

        .mission-header {
            background-color: var(--primary-blue, #2563eb);
            /* Utilise ta couleur bleue */
            color: white;
            padding: 1rem;
            text-align: center;
        }

        .mission-body {
            padding: 1.5rem;
            flex-grow: 1;
        }

        .mission-tag {
            background: #fef3c7;
            color: #d97706;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 0.5rem;
        }

        .btn-participer {
            display: block;
            text-align: center;
            background-color: #1f2937;
            color: white;
            padding: 0.75rem;
            text-decoration: none;
            font-weight: bold;
            margin: 1.5rem;
            border-radius: 0.5rem;
            transition: background 0.2s;
        }

        .btn-participer:hover {
            background-color: #374151;
        }
    </style>
</body>

</html>