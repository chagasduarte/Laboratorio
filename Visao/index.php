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
    </head>
    <body class="d-flex flex-column h-100">

    <header>
    <nav class="navbar navbar-expand-lg d-block shadow-bottom p-0">
        <div class="container-fluid justify-content-center justify-content-lg-between bg-dark-orange py-1 px-3">
            <button class="navbar-toggler p-0 btn-red" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
            <a href="../index.php">
                <img src="../Img/luigi-logo.png" height="60px"/>
            </a>
            <form method="post" action="index.php">
                    
                
            </form>
        </div>
        <div class="container-fluid bg-white navbar-light">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Cardápio</a>
                    <a class="nav-link" href="#">Minha Conta</a>
                    <a class="nav-link" href="#">Fale conosco</a>
                    <a class="nav-link" href="#">Sobre nós</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="container" id="body" name="body">

<?php
   
    include "AtendenteView.php";


?>


<script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.min.js"></script>
    </body>
</html>