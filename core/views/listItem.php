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
        <h1>Mes articles </h1>
        <div class="listItem">
            <?php if (isset($myArticle)) {
                echo $myArticle;
            } ?>
        </div>
    </main>

    <?php include_once("./core/views/includes/footer.php"); ?>
</body>
<script src="./public/js/delete.js"></script>
</html>