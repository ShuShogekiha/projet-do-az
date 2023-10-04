<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once("./core/views/includes/head.php"); ?>
</head>
<body>
    <?php include_once("./core/views/includes/header.php"); ?>
    
    <main>
        <h1>Tous les articles</h1>
            <?= $listArticle ?>
    </main>
    
    <?php include_once("./core/views/includes/footer.php"); ?>
    
    <script src="./public/js/carousel.js"></script>
</body>
</html>