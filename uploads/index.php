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
    <title>Radu & Parteners | Home Page</title>
    <link rel="icon" href="../public/img/logo.png" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #00032e;
            --secondary-color: #00032e;
            --hover-color: #03085a;
            --text-color: #fff;
        }

        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to right, #e2e2e2, #3a487f);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: var(--primary-color);
            padding: 10px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo-img {
            width: 200px;
            height: auto;
        }

        .navbar-links ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        .navbar-links ul li {
            display: inline-block;
        }

        .navbar-links a {
            text-decoration: none;
            color: var(--text-color);
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar-links a:hover {
            background-color: var(--hover-color);
        }

        .carousel-inner img {
            height: 500px;
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- HERO -->
<section class="hero text-center text-white d-flex align-items-center justify-content-center" style="height: 450px; background: linear-gradient(to right, #e2e2e2, #3a487f);">
    <div>
        <h1 class="mb-4">Bine ați venit pe cea mai populară platformă imobiliară din România</h1>
        <p class="mb-4" style="color: #03085a;">Găsește casa visurilor tale, fie că vrei să cumperi sau să închiriezi!</p>
        <a href="/proiect_imobiliare/uploads/oferte.php" class="btn btn-primary px-4 py-2">Vezi Ofertele Noastre</a>
    </div>
</section>


<!-- INTRO -->
<section class="py-5" style="background: linear-gradient(to right, #e2e2e2, #3a487f);">
    <div class="container d-flex justify-content-center">
        <div class="bg-white p-5 rounded shadow" style="max-width: 700px; width: 100%;">
            <h2 class="mb-3 text-center" style="color: #03085a;">Ce Oferim?</h2>
            <p class="mb-4 text-center">Suntem o agenție imobiliară cu experiență, oferind cele mai bune oferte pentru a-ți găsi locuința ideală.</p>
            <div class="text-center">
                <a href="/proiect_imobiliare/uploads/about.php" class="btn btn-outline-primary">Află Mai Multe</a>
            </div>
        </div>
    </div>
</section>

<!-- OFERTE POPULARE -->
<section class="popular-offers py-5">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #03085a;">Oferte Populare</h2>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner rounded shadow">

                <div class="carousel-item active">
                    <a href="/proiect_imobiliare/uploads/oferta1.php">
                        <img src="../public/img/oferta1/img3.jpg" class="d-block w-100" alt="Oferta 1">
                    </a>
                </div>

                <div class="carousel-item">
                    <a href="/proiect_imobiliare/uploads/oferta2.php">
                        <img src="../public/img/oferta1/img2.jpg" class="d-block w-100" alt="Oferta 2">
                    </a>
                </div>

                <div class="carousel-item">
                    <a href="/proiect_imobiliare/uploads/oferta3.php">
                        <img src="../public/img/oferta1/img1.jpg" class="d-block w-100" alt="Oferta 3">
                    </a>
                </div>

            </div>

            <!-- Carousel controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Următor</span>
            </button>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include('../includes/footer.php'); ?>
</body>
</html>
