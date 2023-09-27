<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once("./core/views/includes/head.php"); ?>
</head>
<body>
    <?php include_once("./core/views/includes/header.php"); ?>
    
    <main>
        <h1>Nos articles du moment !!</h1>
        <div class="container owl-carousel">
            <?php echo $listArticle ?>
        </div>
    </main>
    
    <?php include_once("./core/views/includes/footer.php"); ?>
    
    <script src="https://code.jquery.com/jquery-3.6.2.slim.min.js" integrity="sha256-E3P3OaTZH+HlEM7f1gdAT3lHAn4nWBZXuYe89DFg2d0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="./public/js/carousel.js"></script>
</body>
</html>