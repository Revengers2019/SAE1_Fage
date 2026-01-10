<nav class="navbar">
    <div class="nav-container">
        <span style="color:white; font-weight:bold;"><?php echo $nom ?></span>
        <?php var_dump($_SESSION['user_id']); ?>
        <div class="nav-links">
            <a href="?/=/admin" style="color:white; margin-right:15px; text-decoration:none;">Retour</a>
            <a href="?/=/logout" class="btn btn-white">Déconnexion</a>
        </div>
    </div>
</nav>