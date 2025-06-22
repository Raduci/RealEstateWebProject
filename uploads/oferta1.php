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
    <title>Studio Central București</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #e2e2e2, #3a487f);
            font-family: 'Poppins', sans-serif;
            margin: 0;
        }

        .oferta-container {
            background-color: #fff;
            max-width: 1100px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .oferta-container h2 {
            color: #03085a;
        }

        .oferta-images {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .oferta-images img {
            border-radius: 10px;
            width: 100%;
            max-width: 300px;
            height: 200px;
            object-fit: cover;
        }

        .map-container {
            margin-top: 30px;
        }

        iframe {
            border: 0;
            width: 100%;
            height: 400px;
            border-radius: 12px;
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

<div class="oferta-container">
    <h2>Studio Central București</h2>
    <p class="text-muted">Modern și complet utilat, situat în inima capitalei. Ideal pentru city breaks.</p>

    <div class="oferta-images">
        <img src="../public/img/oferta1/img1.jpg" alt="Bucătărie modernă">
        <img src="../public/img/oferta1/img2.jpg" alt="Living confortabil">
        <img src="../public/img/oferta1/img3.jpg" alt="Dormitor luminos">
    </div>

    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2848.176449437051!2d26.09105841553292!3d44.44376987910274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b1ff4699c9c5f9%3A0xe62b1c9c21f4b1d3!2sCalea%20Victoriei%2C%20Bucure%C8%99ti!5e0!3m2!1sro!2sro!4v1716900000000!5m2!1sro!2sro" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<?php include('../includes/footer.php'); ?>

</body>
</html>
