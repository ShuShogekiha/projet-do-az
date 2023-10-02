<header>
    <nav>
        <p class="logo"><a href="./">Do-Az</a></p>
        <div class="header-content">
            <div>
                <ul>
                    <li><a href="?query=AllItem">Tout les articles</a></li>
                    <?php
                    if ($_SESSION) {
                        ?>
                        <li><a href="?query=ListItem">Mes Articles</a></li>
                        <li><a href="?query=AddItem">Ajouter un Article</a></li>
                        <li><a href="?query=Logout">Déconnexion</a></li>
                        <?php
                    } else {
                        ?>
                        <li><a href="?query=Register">S'enregistrer</a></li>
                        <li><a href="?query=Connexion">Connexion</a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>