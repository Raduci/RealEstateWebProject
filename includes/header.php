<?php
// Poți adăuga aici orice logică PHP necesară (de exemplu, sesiuni sau variabile globale)
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/img/logo.png" type="image/icon type">
    <!-- Calea corectă către fișierul CSS -->
    <link rel="stylesheet" href="../public/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<!-- Navigation Bar -->
<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo -->
        <a href="/proiect_imobiliare/uploads/index.php" class="logo">
            <img src="/proiect_imobiliare/public/img/logo.png" alt="Logo" class="logo-img">
        </a>

        <!-- Meniul de navigare -->
        <div class="navbar-links">
            <ul>
                <li><a href="/proiect_imobiliare/uploads/about.php">Despre Noi</a></li>
                <li><a href="/proiect_imobiliare/uploads/recenzii.php">Recenzii</a></li>
                <li><a href="/proiect_imobiliare/uploads/login.php" class="btn-login">Login/Register</a></li>
                <li><a href="/proiect_imobiliare/uploads/oferte.php" class="btn-add">Adaugă Ofertă</a></li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
