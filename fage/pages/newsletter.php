<?php

require 'includes/db.php';
$message_succes = false; // Par défaut, on n'a pas encore réussi
$erreur = "";

// SI LE FORMULAIRE EST ENVOYÉ
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email'])) {

    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $orga = htmlspecialchars($_POST['organisation']);

    // On vérifie l'email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $sql = "INSERT INTO newsletter (nom, prenom, email, organisation, date_inscription) VALUES (?, ?, ?, ?, NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $email, $orga]);

            // C'EST GAGNÉ ! On passe la variable à TRUE pour changer l'affichage plus bas
            $message_succes = true;

        } catch (PDOException $e) {
            $erreur = "Cet email est déjà inscrit !";
        }
    } else {
        $erreur = "Format d'email invalide.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription Newsletter | FAGE</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body style="background-color: #f3f4f6;">
    <?php include 'includes/nav.php'; ?>


    <main class="container" style="padding-top: 100px; padding-bottom: 60px;">

        <div class="newsletter-card">

            <?php if ($message_succes == true): ?>

                <div class="success-box">
                    <span class="success-icon">✅</span>
                    <h1 style="color: #065f46; margin-bottom: 15px;">Félicitations !</h1>
                    <p style="font-size: 1.1rem; color: #4b5563;">
                        Vous êtes bien inscrit(e) à la newsletter de la FAGE.<br>
                        Vous recevrez bientôt nos actualités.
                    </p>
                    <a href="?/=/" class="btn-home">Retourner à l'accueil</a>
                </div>

            <?php else: ?>

                <h1 style="color: #111827; margin-bottom: 10px;">Inscription à la newsletter</h1>
                <p style="color: #6b7280; margin-bottom: 20px;">
                    Remplissez le formulaire ci-dessous pour rejoindre notre réseau.
                </p>

                <?php if ($erreur): ?>
                    <div
                        style="background:#fee2e2; color:#991b1b; padding:10px; border-radius:5px; margin-bottom:20px; text-align:center; font-weight:bold;">
                        ⚠️ <?php echo $erreur; ?>
                    </div>
                <?php endif; ?>

                <p style="color: #dc2626; font-size: 0.9rem; margin-bottom: 25px;">* Champs obligatoires.</p>

                <form action="" method="POST">

                    <div class="form-row">
                        <div class="form-col">
                            <label>Prénom <span class="required">*</span></label>
                            <input type="text" name="prenom" required>
                        </div>
                        <div class="form-col">
                            <label>Nom <span class="required">*</span></label>
                            <input type="text" name="nom" required>
                        </div>
                    </div>

                    <div class="form-col" style="margin-bottom: 20px;">
                        <label>Email <span class="required">*</span></label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="form-col">
                        <label>Organisation</label>
                        <input type="text" name="organisation">
                    </div>

                    <button type="submit" class="btn-submit">S'inscrire</button>

                </form>

            <?php endif; ?>

        </div>

    </main>

    <?php include 'includes/footer.php'; ?>
            <script src="assets/js/script.js"></script>

</body>

</html>
