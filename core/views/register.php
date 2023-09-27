<?php if ($_SESSION) {
    header("location: ./index.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("./core/views/includes/head.php"); ?>
</head>

<body>
    <?php include_once("./core/views/includes/header.php"); ?>

    <main>
        <h1>Inscription</h1>
        <form action="./core/controllers/CreateUtilisateurController.php" method="post">
            <div>
                <label for="mail">E-mail&nbsp;:</label>
                <input type="email" name="mail" placeholder="E-mail" required>
            </div>
            <div>
                <label for="userName">Nom d\'utilisateur&nbsp;:</label>
                <input type="text" name="username" placeholder="Nom d\'utilisateur" required>
            </div>
            <div>
                <label for="mdp">Mot de passe&nbsp;:</label>
                <input type="password" name="mdp" placeholder="Mot de passe" required>
            </div>
            <input type="submit">
            <!-- vérifier que l\'email existe pas déjà et améliorer la vérification -->
        </form>
    </main>

    <?php include_once("./core/views/includes/footer.php"); ?>
</body>

</html>