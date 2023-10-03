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
        <h1>Article <?php echo $donnees['id'] ?? "undefined"; ?></h1>
        <form action="EditArticle" method="POST">
            <div>
                <label for="desi">Nom a modifier&nbsp;:</label>
                <input type="text" name="desi" placeholder="nom a modifier" value="<?php echo $donnees['designation'] ?? ""; ?>">
            </div>
            <div>
                <label for="price">Prix a modifier&nbsp;:</label>
                <input type="nmber" step="0.01" min=0 max=99999 name="price" placeholder="prix a modifier" value="<?php echo $donnees['prix'] ?? ""; ?>">
            </div>
            <div>
                <label for="link">Lien d\'image a modifier&nbsp;:</label>
                <input type="url" name="link" placeholder="lien d\'image a modifier" value="<?php echo $donnees['img'] ?? ""; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>">
            <input type="submit" value="Modifier">
        </form>
    </main>

    <?php include_once("./core/views/includes/footer.php"); ?>
</body>

</html>