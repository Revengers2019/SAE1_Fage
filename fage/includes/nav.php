<?php
session_start();
require 'includes/roleverif.php';
$liens = [
    ['text' => 'Accueil', 'link' => ''],
    ['text' => 'La FAGE', 'link' => 'fage'],
    ['text' => 'Actualités', 'link' => 'actualites'],
    ['text' => 'Missions', 'link' => 'missions'],
    ['text' => 'Nos droits', 'link' => 'droit'],
    ['text' => 'Formation', 'link' => 'formationFage'],
    ['text' => 'Le Guide', 'link' => 'guideElu'],
    ['text' => 'Scolarité', 'link' => 'scolarite'],
    ['text' => 'Civique', 'link' => 'civique']
];
?>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="nav-logo">
            <img src="https://www.fage.org/ressources/images/60/1972,210x,Logo_FAGE_Blanc---Typo-Transparente.png" alt="Logo FAGE">
        </a>

        <button id="menu-btn" class="hamburger"><span></span><span></span><span></span></button>

        <ul class="nav-links">
            <?php
            foreach ($liens as $l) {
                ?>
                <li>
                    <a href='?/=/<?= $l['link'] ?>'><?= $l['text'] ?></a>
                </li>
            <?php }
            if (!isset($_SESSION['user_id']))
                echo '<li><a href="?/=/login" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem;">Se connecter</a></li>';
            else if (isadmin())
                echo '<a href="?/=/admin" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem;">Votre compte</a>';
            else
                echo '<a href="?/=/logout" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem;">Déconnexion</a>';
            ?>
        </ul>
    </div>

    <ul id="mobile-menu" class="mobile-menu">
        <?php
        foreach ($liens as $l) {
            ?>
            <li>
                <a href='?/=/<?= $l['link'] ?>'><?= $l['text'] ?></a>
            </li>
        <?php }
        if (!isset($_SESSION['user_id']))
            echo '<li><a href="?/=/login" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem; color: #2563eb;">Se connecter</a></li>';
        else if (isadmin())
            echo '<li><a href="?/=/admin" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem; color: #2563eb;">Votre compte</a></li>';
        else
            echo '<li><a href="?/=/logout" class="btn btn-white" style="padding:0.5rem 1rem; font-size:0.9rem; color: #2563eb;">Déconnexion</a></li>';
        ?>
    </ul>


</nav>
