<!DOCTYPE html>
<html lang="fr">

<?php
$title = "La FAGE | Fédération";
require "includes/head.php";
?>

<body>

    <?php include 'includes/nav.php'; ?>

    <main class="container">
        <br><br>
        <section class="hero-gradient reveal">
            <div class="hero-text">
                <h1 style="font-size: 3rem; font-weight: 800; margin-bottom: 1rem;">La FAGE</h1>
                <p style="font-size: 1.2rem;">Fédération des Associations Générales Étudiantes, au service des jeunes et
                    de leurs droits.</p>
            </div>
            <div class="hero-img">
                <img src="https://www.fage.org/ressources/_photos/9/slide,2559-GROUPE.jpeg" alt="FAGE Groupe">
            </div>
        </section>

        <section class="card reveal" style="margin-bottom: 3rem;" id="equipenationale">
         <div>
             <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 1rem; color: var(--text-color);">
                 Présentation</h2>
             <p style="margin-bottom: 1rem;">Fondée en 1989, la FAGE regroupe près de 2 000 associations et
                 syndicats, soit environ 300 000 jeunes. Elle défend les droits, innove socialement et améliore les
                 conditions de vie et d’études.</p>
             <p>Indépendante, militante et pluraliste, elle défend des valeurs humanistes et républicaines.</p>
         </div>
     </section>
 <div class="video-container">
                <iframe src="https://www.youtube.com/embed/G6Egva74tiI" title="Présentation FAGE" frameborder="0"
                    allowfullscreen></iframe>
            </div>
        <br>
         <div style="display: flex;  justify-content: center;">
                           <h3 style="font-size: 1.8rem; font-weight: 700; color: var(--primary-blue); margin-bottom: 1rem; line-height: 1.2;">
                               Fédérations et<br>équipe nationale
                           </h3>

                       </div>

       <section class="card reveal" style="margin-bottom: 3rem;" id="equipenationale">

           <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--primary-blue); margin-bottom: 1.5rem;">
               Fédérations et équipe nationale
           </h3>

           <div class="grid-2">

               <div class="info-box box-blue" style="margin: 0; height: 100%;">
                   <h4>Fédérations territoriales</h4>
                   <p>Actions locales et représentation politique dans chaque région.</p>
               </div>

               <div class="info-box box-green" style="margin: 0; height: 100%;">
                   <h4>Fédérations de filières</h4>
                   <p>Représentation nationale des disciplines (Santé, Sciences...).</p>
               </div>

               <div class="info-box box-yellow" style="margin: 0; height: 100%;">
                   <h4>Équipe nationale</h4>
                   <p>Le Bureau National coordonne les actions et porte la voix de la FAGE.</p>
               </div>

               <div class="info-box box-blue" style="margin: 0; height: 100%;">
                   <h4>Conseil d'Administration</h4>
                   <p>L'organe de décision où siègent toutes les fédérations membres.</p>
               </div>

           </div>
       </section>

        <section class="reveal" id="visuels">
            <h2 style="font-size: 2rem; font-weight: 700; margin-bottom: 2rem;">Graphiques & Visuels</h2>
            <div class="grid-3">
                <div class="card" style="padding: 0; overflow: hidden;">
                    <img src="https://www.studycdn.space/sites/default/files/inline-images/ressources-mensuelles.png"
                        style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1.5rem;">
                        <h4>Statistiques étudiantes</h4>
                        <p style="font-size: 0.9rem; color: #4b5563;">Visualisation des données clés.</p>
                    </div>
                </div>

                <div class="card" style="padding: 0; overflow: hidden;">
                    <img src="https://www.agenda-2030.fr/local/cache-vignettes/L1000xH800/visuel_initiatives_citoyennes_1_-e6e87-2f8c0.png"
                        style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1.5rem;">
                        <h4>Actions et initiatives</h4>
                        <p style="font-size: 0.9rem; color: #4b5563;">Illustration des actions de solidarité.</p>
                    </div>
                </div>

                <div class="card" style="padding: 0; overflow: hidden;">
                    <img src="https://www.fage.org/ressources/images/239/7521-560x-manif.jpeg"
                        style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 1.5rem;">
                        <h4>Événements étudiants</h4>
                        <p style="font-size: 0.9rem; color: #4b5563;">Retour en images sur les événements.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>
</body>

</html>
