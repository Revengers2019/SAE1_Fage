<!DOCTYPE html>
<html lang="fr">

<?php
$title = "FAGE | Fédération des Associations Générales Étudiantes";
require "includes/head.php";
?>

<body>
    <?php include 'includes/nav.php'; ?>


    <main>

        <section class="hero-section">
            <img src="https://f.hellowork.com/edito/sites/5/2024/01/FAGE-visuels-768x432.jpeg" alt="FAGE Étudiants"
                class="hero-bg-img">

            <div class="hero-overlay">
                <div class="hero-content">
                    <h1>FAGE — Fédération des Associations Générales Étudiantes</h1>
                    <p>Informer, défendre, innover — pour une vie étudiante plus juste.</p>
                    <div class="hero-buttons">
                        <a href="https://www.helloasso.com/associations/federation-des-associations-generales-etudiantes-fage/formulaires/1" class="btn btn-don">Faire un don</a>
                        <a href="?/=/actualites" class="btn btn-outline">Actualités</a>
                    </div>
                </div>
            </div>
        </section>
        <br><br>


        <section id="actions" class="container grid-3">
            <article class="card reveal">
                <div class="card-icon">🎓</div>
                <h3>S'informer</h3>
                <p>Parcoursup, Master, bourses, logements et santé : la FAGE accompagne les étudiant·e·s toute l'année.
                </p>
            </article>
            <article class="card reveal">
                <div class="card-icon">🤝</div>
                <h3>S'entraider</h3>
                <p>Réseau d'AGORAé (épiceries solidaires), Kiosque solidaire, et actions de lutte contre la précarité.
                </p>
            </article>
            <article class="card reveal">
                <div class="card-icon">📢</div>
                <h3>Agir</h3>
                <p>Représentation étudiante, campagnes nationales, et mobilisation pour les droits des jeunes.</p>
            </article>
        </section>
        <section class="container">
            <div class="sos-container">

                <a href="https://sos-parcoursup.fr/" class="sos-card-link reveal">
                    <h3>SOS-Parcoursup</h3>
                    <p>Plateforme d'aide pour les problèmes Parcoursup : informations, recours, accompagnement.</p>
                </a>

                <a href="https://sos-monmaster.fr/" class="sos-card-link reveal">
                    <h3>SOS-MonMaster</h3>
                    <p>Assistance pour choisir et défendre ton Master, avec guides et contacts dédiés.</p>
                </a>

            </div>
        </section>
        <section class="container"
            style="background-color: #f9fafb; padding: 40px; border-radius: 10px; margin-bottom: 40px;">
            <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 2rem; text-align:center;">La FAGE en chiffres
            </h2>

            <div class="grid-3" style="text-align:center;">

                <div class="reveal">
                    <h3 style="font-size: 3rem; color: var(--primary-blue); margin-bottom: 0;">2 000</h3>
                    <p style="font-weight: bold; font-size: 1.2rem;">Associations étudiantes</p>
                    <p style="color: gray;">Un réseau unique présent sur tout le territoire.</p>
                </div>

                <div class="reveal">
                    <h3 style="font-size: 3rem; color: var(--primary-blue); margin-bottom: 0;">300 000</h3>
                    <p style="font-weight: bold; font-size: 1.2rem;">Étudiants représentés</p>
                    <p style="color: gray;">La première organisation étudiante de France.</p>
                </div>

                <div class="reveal">
                    <h3 style="font-size: 3rem; color: var(--primary-blue); margin-bottom: 0;">35</h3>
                    <p style="font-weight: bold; font-size: 1.2rem;">Ans d'engagement</p>
                    <p style="color: gray;">Au service de la jeunesse depuis 1989.</p>
                </div>

            </div>
        </section>
        <section class="container" style="margin-top: 60px; margin-bottom: 60px; text-align: center;">

            <h2 style="font-size: 2rem; font-weight: bold; color: #1f2937; margin-bottom: 10px;">
                📍 Nous trouver
            </h2>

            <p style="font-size: 1.1rem; color: #666; margin-bottom: 30px;">
                Passez nous voir au siège de la fédération !<br>
                <strong>79 Rue Périer, 92120 Montrouge</strong>
            </p>

            <div class="reveal"
                style="width: 100%; max-width: 1000px; margin: 0 auto; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
                <iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                    src="https://maps.google.com/maps?q=79%20Rue%20P%C3%A9rier%2C%2092120%20Montrouge&t=&z=15&ie=UTF8&iwloc=&output=embed">
                </iframe>
            </div>

        </section>

    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="assets/js/script.js"></script>
</body>

</html>