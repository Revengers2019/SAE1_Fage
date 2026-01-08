<!DOCTYPE html>
<html lang="fr">

<?php
$otherLinks = '<link rel="icon" href="https://img.freepik.com/vecteurs-premium/lettre-f-bleue-blanche-est-fond-bleu_462839-1528.jpg" type="image/jpeg">';
$title = "Formation Civique | FAGE";
require "includes/head.php";
?>

<body>

<?php include 'includes/nav.php'; ?>


<main class="container">
    <br><br>

    <div style="text-align: center; margin-bottom: 2rem;">
        <h1 style="font-size: 2.5rem; font-weight: 800; color: var(--primary-blue);">Formation Civique et Citoyenne</h1>
        <p style="font-size: 1.1rem; margin-top: 0.5rem;">Une formation dédiée aux volontaires engagés.</p>
    </div>

    <img src="https://www.fage.org/ressources/imageBank/cache/36/560x-9052-FCC_Nov_24-131.jpeg" alt="Formation Civique" style="width: 100%; height: 350px; object-fit: cover; border-radius: 1rem; margin-bottom: 3rem; box-shadow: var(--shadow);">

    <div class="grid-2 reveal">

        <div class="card">
            <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--primary-blue); margin-bottom: 0.5rem;">Qu'est-ce que la FCC ?</h2>
            <p>Un format sur 2 jours pour échanger, débattre et comprendre les enjeux sociétaux d’aujourd’hui.</p>
        </div>

        <div class="card">
            <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--primary-blue); margin-bottom: 0.5rem;">Quand ?</h2>
            <p>Du <b>28 au 30 Novembre 2025</b> à Paris.</p>
        </div>

        <div class="card">
            <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--primary-blue); margin-bottom: 0.5rem;">Coût</h2>
            <p>La formation est <b>gratuite</b> pour les volontaires FAGE.</p>
        </div>

        <div class="card">
            <h2 style="font-size: 1.25rem; font-weight: 700; color: var(--primary-blue); margin-bottom: 0.5rem;">Inscriptions</h2>
            <p>Ouverture des inscriptions le <b>29 Octobre 2025</b> sur l’application FAGE.</p>
        </div>

    </div>

    <div style="text-align: center; margin-top: 4rem;">
        <a href="?/=/newsletter" class="btn btn-blue">
            Je m’inscris à la Newsletter →
        </a>
    </div>

</main>

<?php include 'includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>