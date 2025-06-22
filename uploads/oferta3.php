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
    <title>Garsonieră Mamaia Nord</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background: linear-gradient(to right, #e2e2e2, #3a487f); font-family: 'Poppins', sans-serif; margin: 0; }
        .oferta-container { background-color: #fff; max-width: 1100px; margin: 40px auto; padding: 30px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); }
        .oferta-container h2 { color: #03085a; }
        .oferta-images { display: flex; gap: 20px; margin-top: 20px; flex-wrap: wrap; }
        .oferta-images img { border-radius: 10px; width: 100%; max-width: 300px; height: 200px; object-fit: cover; }
        .map-container { margin-top: 30px; }
        iframe { border: 0; width: 100%; height: 400px; border-radius: 12px; }
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
    <h2>Garsonieră Mamaia Nord</h2>
    <p class="text-muted">Perfectă pentru vacanțele de vară, la doar 3 minute de plajă.</p>

    <div class="oferta-images">
        <img src="../public/img/oferta3/img1.jpg" alt="Garsonieră plajă">
        <img src="../public/img/oferta3/img2.jpg" alt="Pat confortabil">
        <img src="../public/img/oferta3/img3.jpg" alt="Balcon cu vedere">
    </div>

    <div class="map-container">
        <iframe src="https://www.google.com/maps?q=Mamaia%20Nord&output=embed" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
</body>
</html>
