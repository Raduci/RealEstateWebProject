<?php
session_start();
include('../includes/header.php');
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Oferte Apartamente - Radu & Parteners</title>
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
    </style>

</head>
<body>

<main class="main-content py-5" style="background: linear-gradient(to right, #e2e2e2, #3a487f);">
    <div class="container">
        <h2 class="text-center mb-5 text-white">Apartamente în regim hotelier</h2>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            <!-- OFERTA 1 -->
            <div class="col">
                <div class="card shadow-sm h-100">
                    <img src="../public/img/oferte/apartament1.jpg" class="card-img-top" alt="Apartament 1">
                    <div class="card-body">
                        <h5 class="card-title">Studio Central București</h5>
                        <p class="card-text">Modern și complet utilat, situat în inima capitalei. Ideal pentru city breaks.</p>
                        <a href="oferta1.php" class="btn btn-primary me-2">Vezi Detalii</a>
                        <a href="rezervare.php?oferta=1" class="btn btn-warning">Fă o rezervare</a>
                    </div>
                </div>
            </div>

            <!-- OFERTA 2 -->
            <div class="col">
                <div class="card shadow-sm h-100">
                    <img src="../public/img/oferte/apartament2.jpg" class="card-img-top" alt="Apartament 2">
                    <div class="card-body">
                        <h5 class="card-title">Apartament 2 Camere Cluj</h5>
                        <p class="card-text">Locuință spațioasă, aproape de centrul vechi și atracțiile turistice.</p>
                        <a href="oferta2.php" class="btn btn-primary me-2">Vezi Detalii</a>
                        <a href="rezervare.php?oferta=2" class="btn btn-warning">Fă o rezervare</a>
                    </div>
                </div>
            </div>

            <!-- OFERTA 3 -->
            <div class="col">
                <div class="card shadow-sm h-100">
                    <img src="../public/img/oferte/apartament3.jpg" class="card-img-top" alt="Apartament 3">
                    <div class="card-body">
                        <h5 class="card-title">Garsonieră Mamaia Nord</h5>
                        <p class="card-text">Perfectă pentru vacanțele de vară, la doar 3 minute de plajă.</p>
                        <a href="oferta3.php" class="btn btn-primary me-2">Vezi Detalii</a>
                        <a href="rezervare.php?oferta=3" class="btn btn-warning">Fă o rezervare</a>
                    </div>
                </div>
            </div>

            <!-- OFERTA 4 -->
            <div class="col">
                <div class="card shadow-sm h-100">
                    <img src="../public/img/oferte/apartament4.jpg" class="card-img-top" alt="Apartament 4">
                    <div class="card-body">
                        <h5 class="card-title">Apartament Business Iași</h5>
                        <p class="card-text">Ideal pentru călătorii de afaceri, cu acces rapid la centrele comerciale.</p>
                        <a href="oferta4.php" class="btn btn-primary me-2">Vezi Detalii</a>
                        <a href="rezervare.php?oferta=4" class="btn btn-warning">Fă o rezervare</a>
                    </div>
                </div>
            </div>

            <!-- OFERTA 5 -->
            <div class="col">
                <div class="card shadow-sm h-100">
                    <img src="../public/img/oferte/apartament5.jpg" class="card-img-top" alt="Apartament 5">
                    <div class="card-body">
                        <h5 class="card-title">Luxury Loft Brașov</h5>
                        <p class="card-text">Loft cu vedere panoramică spre munți, design premium și intimitate totală.</p>
                        <a href="oferta5.php" class="btn btn-primary me-2">Vezi Detalii</a>
                        <a href="rezervare.php?oferta=5" class="btn btn-warning">Fă o rezervare</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include('../includes/footer.php'); ?>
