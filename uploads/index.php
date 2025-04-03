<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<?php include('../includes/header.php'); ?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../public/img/logo.png" type="image/icon type">
    <title>Radu & Parteners | Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../public/style.css">
    <script defer src="../public/carousel.js"></script>
</head>
<body>

<section class="hero">
    <div class="hero-content">
        <h1>Bine ați venit pe cea mai populară platformă imobiliară din România</h1>
        <p style="color: #03085a;">Găsește casa visurilor tale, fie că vrei să cumperi sau să închiriezi!</p>
        <a href="/proiect_imobiliare/uploads/oferte.php" class="cta-button">Vezi Ofertele Noastre</a>
    </div>
</section>

<section class="intro">
    <div class="container">
        <h2>Ce Oferim?</h2>
        <p>Suntem o agenție imobiliară cu experiență, oferind cele mai bune oferte pentru a-ți găsi locuința ideală.</p>
        <a href="/proiect_imobiliare/despre_noi.php" class="cta-button">Află Mai Multe</a>
    </div>
</section>

<section class="popular-offers">
    <h2 class="text-center my-4">Oferte Populare</h2>

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../public/img/oferta1/img3.jpeg" class="d-block w-100" alt="prima imagine">
            </div>
            <div class="carousel-item">
                <img src="../public/img/oferta1/img2.jpg" class="d-block w-100" alt="a doua">
            </div>
            <div class="carousel-item">
                <img src="../public/img/oferta1/img1.jpg" class="d-block w-100" alt="a treia">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- ✅ Bootstrap JS Bundle (with Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php include('../includes/footer.php'); ?>
