<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit(); // Oprește execuția codului pentru a preveni redirecționarea dublă
}
?>


<?php include('../includes/header.php'); ?>

<!-- Secțiunea Hero (introducere) -->
<link rel="icon" href="public/img/logo.png" type="image/icon type">
<title>Radu & Parteners | Home Page</title>
<link rel="stylesheet" href="../public/style.css">
<section class="hero">
    <div class="hero-content">
        <h1>Bine ați venit pe cea mai populara platformă imobiliară din România</h1>
        <p>Găsește casa visurilor tale, fie că vrei să cumperi sau să închiriezi!</p>
        <a href="/proiect_imobiliare/oferte.php" class="cta-button">Vezi Ofertele Noastre</a>
    </div>
</section>

<!-- Secțiunea cu informații generale despre platformă -->
<section class="intro">
    <div class="container">
        <h2>Ce Oferim?</h2>
        <p>Suntem o agenție imobiliară cu experiență, oferind cele mai bune oferte pentru a-ți găsi locuința ideală.</p>
        <a href="/proiect_imobiliare/despre_noi.php" class="cta-button">Află Mai Multe</a>
    </div>
</section>

<section class="popular-offers">
    <h2>Oferte Populare</h2>

    <div class="carousel-container">
        <div class="carousel" id="carousel1">
            <div class="carousel-item">
                <img src="/proiect_imobiliare/public/img/oferta1/img1.webp" alt="Offer 1 Image 1">
            </div>
            <div class="carousel-item">
                <img src="/proiect_imobiliare/public/img/oferta1/img2.webp" alt="Offer 1 Image 2">
            </div>
            <div class="carousel-item">
                <img src="/proiect_imobiliare/public/img/oferta1/img3.webp" alt="Offer 1 Image 3">
            </div>
            <div class="carousel-item">
                <img src="/proiect_imobiliare/public/img/oferta1/img4.webp" alt="Offer 1 Image 4">
            </div>
            <div class="carousel-item">
                <img src="/proiect_imobiliare/public/img/oferta1/img5.webp" alt="Offer 1 Image 5">
            </div>
            <div class="carousel-item">
                <img src="/proiect_imobiliare/public/img/oferta1/img6.webp" alt="Offer 1 Image 6">
            </div>
            <div class="carousel-item">
                <img src="/proiect_imobiliare/public/img/oferta1/img7.webp" alt="Offer 1 Image 7">
            </div>
        </div>
        <button class="prev" onclick="moveSlide(-1, 'carousel1')">&#10094;</button>
        <button class="next" onclick="moveSlide(1, 'carousel1')">&#10095;</button>
    </div>

    <!-- Carusel pentru Oferta 2 -->
    <div class="carousel-container">
        <div class="carousel" id="carousel2">
            <div class="carousel-item">
                <img src="/path/to/your-image2a.jpg" alt="Offer 2 Image 1">
            </div>
            <div class="carousel-item">
                <img src="/path/to/your-image2b.jpg" alt="Offer 2 Image 2">
            </div>
            <div class="carousel-item">
                <img src="/path/to/your-image2c.jpg" alt="Offer 2 Image 3">
            </div>
        </div>
        <button class="prev" onclick="moveSlide(-1, 'carousel2')">&#10094;</button>
        <button class="next" onclick="moveSlide(1, 'carousel2')">&#10095;</button>
    </div>

    <!-- Carusel pentru Oferta 3 -->
    <div class="carousel-container">
        <div class="carousel" id="carousel3">
            <div class="carousel-item">
                <img src="/path/to/your-image3a.jpg" alt="Offer 3 Image 1">
            </div>
            <div class="carousel-item">
                <img src="/path/to/your-image3b.jpg" alt="Offer 3 Image 2">
            </div>
            <div class="carousel-item">
                <img src="/path/to/your-image3c.jpg" alt="Offer 3 Image 3">
            </div>
        </div>
        <button class="prev" onclick="moveSlide(-1, 'carousel3')">&#10094;</button>
        <button class="next" onclick="moveSlide(1, 'carousel3')">&#10095;</button>
    </div>

</section>

<?php include('../includes/footer.php'); ?>
