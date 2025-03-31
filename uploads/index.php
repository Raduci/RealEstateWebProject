<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<?php include('../includes/header.php'); ?>

<link rel="icon" href="public/img/logo.png" type="image/icon type">
<title>Radu & Parteners | Home Page</title>
<link rel="stylesheet" href="../public/style.css">
<script defer src="../public/carousel.js"></script>

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
    <h2>Oferte Populare</h2>

    <div class="carousel-container" id="carousel1">
        <div class="carousel">
            <div class="carousel-item"><img src="/proiect_imobiliare/img/oferte1/img1.jpg" alt="Offer 1-1"></div>
            <div class="carousel-item"><img src="/proiect_imobiliare/img/oferte1/img2.jpg" alt="Offer 1-2"></div>
            <div class="carousel-item"><img src="/proiect_imobiliare/img/oferte1/img3.jpg" alt="Offer 1-3"></div>
        </div>
        <button class="prev" onclick="moveSlide(-1, 'carousel1')">&#10094;</button>
        <button class="next" onclick="moveSlide(1, 'carousel1')">&#10095;</button>
    </div>

    <div class="carousel-container" id="carousel2">
        <div class="carousel">
            <div class="carousel-item"><img src="/proiect_imobiliare/img/oferte2/img1.jpg" alt="Offer 2-1"></div>
            <div class="carousel-item"><img src="/proiect_imobiliare/img/oferte2/img2.jpg" alt="Offer 2-2"></div>
            <div class="carousel-item"><img src="/proiect_imobiliare/img/oferte2/img3.jpg" alt="Offer 2-3"></div>
        </div>
        <button class="prev" onclick="moveSlide(-1, 'carousel2')">&#10094;</button>
        <button class="next" onclick="moveSlide(1, 'carousel2')">&#10095;</button>
    </div>

    <div class="carousel-container" id="carousel3">
        <div class="carousel">
            <div class="carousel-item"><img src="/proiect_imobiliare/img/oferte3/img1.jpg" alt="Offer 3-1"></div>
            <div class="carousel-item"><img src="/proiect_imobiliare/img/oferte3/img2.jpg" alt="Offer 3-2"></div>
            <div class="carousel-item"><img src="/proiect_imobiliare/img/oferte3/img3.jpg" alt="Offer 3-3"></div>
        </div>
        <button class="prev" onclick="moveSlide(-1, 'carousel3')">&#10094;</button>
        <button class="next" onclick="moveSlide(1, 'carousel3')">&#10095;</button>
    </div>
</section>

<?php include('../includes/footer.php'); ?>
