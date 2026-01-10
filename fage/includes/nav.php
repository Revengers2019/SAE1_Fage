<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">
            <img src="https://ageparis.org/agepwebcontent/uploads/2013/01/fage-blanc-logo-min.png" alt="Logo FAGE">
        </a>

        <button id="menu-btn" class="hamburger"><span></span><span></span><span></span></button>

        <ul class="nav-links">
            <li><a href="?/=/">Accueil</a></li>
            <li><a href="?/=/fage">La FAGE</a></li>
            <li><a href="?/=/actualites">Actualités</a></li>
            <li><a href="?/=/missions">Missions</a></li>
            <li><a href="?/=/droit">Nos Droits</a></li>
            <li><a href="?/=/formationFage">Formation</a></li>
            <li><a href="?/=/guideElu">Le Guide</a></li>
            <li><a href="?/=/scolarite">Scolarité</a></li>
            <li><a href="?/=/civique">Civique</a></li>
            <?php
            session_start();
            if (!isset($_SESSION['user_id']))
                echo '<li><a href="?/=/login" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem;">Se connecter</a></li>';
            else
                echo '<a href="?/=/admin" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem;">Votre compte</a>';
            ?>
        </ul>
    </div>

    <ul id="mobile-menu" class="mobile-menu">
        <li><a href="?/=/">Accueil</a></li>
        <li><a href="?/=/fage">La FAGE</a></li>
        <li><a href="?/=/actualites">Actualités</a></li>
        <li><a href="?/=/missions">Missions</a></li>
        <li><a href="?/=/droit">Nos Droits</a></li>
        <li><a href="?/=/formationFage">Formation</a></li>
        <li><a href="?/=/guideElu">Le Guide</a></li>
        <li><a href="?/=/scolarite">Scolarité</a></li>
        <li><a href="?/=/civique">Civique</a></li>
        <?php
        session_start();
        if (!isset($_SESSION['user_id']))
            echo '<li><a href="?/=/login" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem;">Se connecter</a></li>';
        else
            echo '<a href="?/=/" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem;">Votre compte</a>';
        ?>
    </ul>

</nav>