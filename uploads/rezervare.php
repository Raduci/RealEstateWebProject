<?php
session_start();
include('../includes/header.php');
require_once "../uploads/database.php";

$apartamente = [
    1 => "Studio Central București",
    2 => "Apartament 2 Camere Cluj",
    3 => "Garsonieră Mamaia Nord",
    4 => "Apartament Business Iași",
    5 => "Luxury Loft Brașov"
];

// Preselectare apartament daca vine din query string
$apartament_selectat = isset($_GET['oferta']) && isset($apartamente[$_GET['oferta']]) ? $_GET['oferta'] : "";

// Procesare formular
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nume = trim($_POST['nume']);
    $prenume = trim($_POST['prenume']);
    $telefon = trim($_POST['telefon']);
    $apartament = (int)$_POST['apartament'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    // Verifică dacă există deja o rezervare în perioada aleasă pentru același apartament
    $check_sql = "SELECT * FROM rezervari 
              WHERE apartament_id = ? 
              AND ((checkin <= ? AND checkout >= ?) OR (checkin <= ? AND checkout >= ?))";

    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "issss", $apartament, $checkout, $checkout, $checkin, $checkin);
    mysqli_stmt_execute($check_stmt);
    $check_result = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($check_result) > 0) {
        echo '
<div style="
    display: flex;
    justify-content: center;
    margin-top: 30px;
">
    <div style="
        background-color: white;
        color: #721c24;
        border: 1px solid #f5c6cb;
        padding: 20px 30px;
        border-radius: 10px;
        max-width: 500px;
        width: 100%;
        text-align: center;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        font-family: Poppins, sans-serif;
        font-size: 16px;
    ">
        Acest apartament este deja rezervat în perioada selectată.
    </div>
</div>';

        exit();
    }


    $sql = "INSERT INTO rezervari (nume, prenume, telefon, apartament_id, checkin, checkout) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssiss", $nume, $prenume, $telefon, $apartament, $checkin, $checkout);
    mysqli_stmt_execute($stmt);

    echo "<div class='alert alert-success text-center mt-4'>Rezervarea a fost trimisă cu succes! Vă vom contacta telefonic pentru confirmare.</div>";
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Formular rezervare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e2e2e2, #3a487f);
            font-family: 'Poppins', sans-serif;
        }
        .container {
            max-width: 500px;
            background: white;
            padding: 30px;
            margin: 50px auto;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        h2 {
            color: #03085a;
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            font-weight: 500;
            color: #03085a;
        }
        .btn {
            width: 100%;
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

<div class="container">
    <h2>Formular rezervare</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nume" class="form-label">Nume *</label>
            <input type="text" class="form-control" id="nume" name="nume" required>
        </div>
        <div class="mb-3">
            <label for="prenume" class="form-label">Prenume *</label>
            <input type="text" class="form-control" id="prenume" name="prenume" required>
        </div>
        <div class="mb-3">
            <label for="telefon" class="form-label">Telefon *</label>
            <input type="tel" class="form-control" id="telefon" name="telefon" required pattern="[0-9]{10}" placeholder="07xxxxxxxx">
        </div>
        <div class="mb-3">
            <label for="apartament" class="form-label">Alege apartamentul *</label>
            <select class="form-select" id="apartament" name="apartament" required>
                <option value="" disabled <?= $apartament_selectat ? '' : 'selected' ?>>Selectează un apartament</option>
                <?php foreach ($apartamente as $id => $label): ?>
                    <option value="<?= $id ?>" <?= $apartament_selectat == $id ? 'selected' : '' ?>><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="checkin" class="form-label">Data check-in *</label>
            <input type="date" class="form-control" id="checkin" name="checkin" required>
        </div>
        <div class="mb-3">
            <label for="checkout" class="form-label">Data check-out *</label>
            <input type="date" class="form-control" id="checkout" name="checkout" required>
        </div>
        <button type="submit" class="btn btn-primary">Trimite rezervarea</button>
    </form>
</div>

<?php include('../includes/footer.php'); ?>

</body>
</html>
