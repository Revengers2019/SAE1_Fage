<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation FAGE | Catalogue</title>
    <link rel="icon" href="https://img.freepik.com/vecteurs-premium/lettre-f-bleue-blanche-est-fond-bleu_462839-1528.jpg" type="image/jpeg">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'includes/nav.php'; ?>


<main class="container">
    <br><br>

    <section class="card reveal" style="display: flex; flex-direction: column; md:flex-row; gap: 2rem; margin-bottom: 3rem;">
        <div style="flex: 2;">
            <h1 style="color: var(--primary-blue); font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem;">Catalogue de formations FAGE</h1>
            <p style="margin-bottom: 1.5rem;">Découvrez toutes les formations proposées par la FAGE pour les bénévoles et élus étudiants. Chaque formation permet d’acquérir des compétences pratiques.</p>
            <a href="https://www.fage.org/ressources/documents/source/1/8396-JNIS-2023-Catalogue-de-formations.pdf" target="_blank" class="btn btn-blue">
                Voir le catalogue PDF
            </a>
        </div>
        <div style="flex: 1; display: flex; justify-content: center; align-items: center;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWCWU-9uDO2sWxQxIPt_r8HPO37xQRuOYF-g&s" alt="Formations" style="max-height: 200px; border-radius: 1rem;">
        </div>
    </section>

    <section class="grid-2 reveal">

        <div class="card">
            <h2 style="color: var(--primary-blue); font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;">Affaires sociales</h2>
            <ul style="list-style: disc; padding-left: 1.5rem;">
                <li>Accueil des étudiants internationaux</li>
                <li>Accompagnement handicap</li>
                <li>Accueillir un service civique</li>
            </ul>
        </div>

        <div class="card">
            <h2 style="color: var(--primary-blue); font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;">Innovation sociale</h2>
            <ul style="list-style: disc; padding-left: 1.5rem;">
                <li>Éducation populaire</li>
                <li>Développement durable</li>
                <li>Formations bénévoles</li>
            </ul>
        </div>

        <div class="card">
            <h2 style="color: var(--primary-blue); font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;">Affaires académiques</h2>
            <ul style="list-style: disc; padding-left: 1.5rem;">
                <li>Actualité de l’enseignement supérieur</li>
                <li>Agir en conseil de résidence</li>
            </ul>
        </div>

        <div class="card">
            <h2 style="color: var(--primary-blue); font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem;">Gestion & Développement</h2>
            <ul style="list-style: disc; padding-left: 1.5rem;">
                <li>Assurance qualité projet</li>
                <li>Santé étudiante</li>
            </ul>
        </div>

    </section>

</main>
<?php include 'includes/footer.php'; ?>

<script src="assets/js/script.js"></script>
</body>
</html>