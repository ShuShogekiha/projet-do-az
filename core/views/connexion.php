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
    <h1>Connexion</h1>
    <form action="/core/controllers/ConnnexionUtilisateurController.php" method="post">
        <div>
            <label for="email">E-mail&nbsp;:</label>
            <input type="email" name="email" placeholder="E-mail" required>
        </div>
        <div>
            <label for="pass">Mot de passe&nbsp;:</label>
            <input type="password" name="pass" placeholder="Mot de passe" required>
        </div>
        <input type="submit" value="connexion">
        <!--<input type="submit" value="mot de passe oublié">-->
        <!--
            page mot de passe oublier qui envoie un mail automatique et créé un nouveau mot de passe temporaire
            renvoyer sur une page unique pour modifier mot de passe
        -->
    </form>
    </main>
    
    <?php include_once("./core/views/includes/footer.php"); ?>
</body>
</html>