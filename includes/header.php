<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radu & Parteners - Real Estate</title>
    <link rel="icon" href="/proiect_imobiliare/public/img/logo.png" type="image/icon type">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #00032e;
            --secondary-color: #00032e;
            --hover-color: #03085a;
            --text-color: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: linear-gradient(to right, #e2e2e2, #3a487f);
            min-height: 100vh;
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
            color: #fff;
        }

        .btn-login, .btn-add {
            background-color: var(--secondary-color);
            color: var(--primary-color);
            padding: 8px 16px;
            border-radius: 5px;
            /*font-weight: bold;*/
        }

        .btn-login:hover, .btn-add:hover {
            background-color: var(--hover-color);
            color: var(--text-color);
        }

        /* Centrare navbar */
        .navbar-container .navbar-links {
            margin-left: auto;
        }

        .navbar-container > .logo {
            margin-right: auto;
        }
    </style>
</head>
<body>
<!-- NAVBAR -->
<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo -->
        <a href="/proiect_imobiliare/uploads/index.php" class="logo">
            <img src="/proiect_imobiliare/public/img/logo.png" alt="Logo" class="logo-img">
        </a>

        <!-- Meniu -->
        <div class="navbar-links">
            <ul>
                <li><a href="/proiect_imobiliare/uploads/about.php">Despre Noi</a></li>
                <li><a href="/proiect_imobiliare/uploads/recenzii.php">Recenzii</a></li>

                <?php if (isset($_SESSION["user"])): ?>
                    <li><a href="/proiect_imobiliare/uploads/logout.php" class="btn-add">Logout</a></li>
                    <li><a href="/proiect_imobiliare/uploads/add.php" class="btn-add">Cerere Proprietate</a></li>
                <?php else: ?>
                    <li><a href="/proiect_imobiliare/uploads/login.php" class="btn-login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
