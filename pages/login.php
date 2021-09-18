<!DOCTYPE html>
<html class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Pizzaria do Luigi </title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/carousel.css" rel="stylesheet">
        <link href="../css/navbar.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital,wght@0,400;1,700&display=swap" rel="stylesheet">
    </head>
    <body class="d-flex flex-column h-100">

        <?php
            include 'loginHeader.php';
            if (isset($_POST["login"])){
                include 'loginBody.php';
            }
            else {
                include 'cadastro.php';
            }
            include '../footer.php';
        ?>

        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
    </body>
</html>