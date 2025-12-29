document.addEventListener('DOMContentLoaded', () => {

    /* ---------------------------------------------
       1. MENU MOBILE (Hamburger)
    --------------------------------------------- */
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');

            // Animation simple du bouton hamburger (optionnel)
            menuBtn.classList.toggle('active');
        });
    }

    /* ---------------------------------------------
       2. ANIMATION AU SCROLL (Classe .reveal)
    --------------------------------------------- */
    const reveals = document.querySelectorAll('.reveal');

    function checkReveal() {
        const triggerBottom = window.innerHeight * 0.85; // Déclenche à 85% de la hauteur

        reveals.forEach(reveal => {
            const revealTop = reveal.getBoundingClientRect().top;

            if (revealTop < triggerBottom) {
                reveal.classList.add('show');
            }
        });
    }

    // Écouter le scroll et lancer une fois au chargement
    window.addEventListener('scroll', checkReveal);
    checkReveal();

    /* ---------------------------------------------
       3. ACCORDÉON (FAQ - Page Nos Droits)
    --------------------------------------------- */
    const faqButtons = document.querySelectorAll('.faq-btn');

    faqButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Sélectionne le contenu associé (le div juste après le bouton)
            const content = btn.nextElementSibling;

            // Toggle de la classe 'open'
            content.classList.toggle('open');

            // (Optionnel) Fermer les autres accordéons quand on en ouvre un
            faqButtons.forEach(otherBtn => {
                if (otherBtn !== btn) {
                    otherBtn.nextElementSibling.classList.remove('open');
                }
            });
        });
    });

});