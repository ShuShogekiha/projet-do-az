<?php if (!$_SESSION) {
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
        <h1>Nouvelle article</h1>
        <form action="/request/CreateArticle.php" method="POST">
            <div>
                <label for="desi">Nom de l'article&nbsp;:</label>
                <input type="text" name="desi" placeholder="nom de l'article">
            </div>
            <div>
                <label for="price">Prix de l'article&nbsp;:</label>
                <input type="number" step="0.01" min=0 max=99999 name="price" placeholder="prix de l'article">
            </div>
            <div>
                <label for="link">Lien d'image de l'article&nbsp;:</label>
                <input type="url" name="link" placeholder="lien d'image de l'article">
            </div>
            <input type="submit">
        </form>
    </main>

    <?php include_once("./core/views/includes/footer.php"); ?>
</body>

</html>