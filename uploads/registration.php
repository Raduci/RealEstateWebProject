<?php
include('../includes/header.php');
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
require_once "../uploads/database.php";
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <title>Înregistrare</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/style.css">
    <style>
        body {
            background: linear-gradient(to right, #e2e2e2, #3a487f);
            font-family: 'Poppins', sans-serif;
        }

        .registration-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        h2 {
            color: #03085a;
            text-align: center;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-btn {
            text-align: center;
        }

        .alert {
            margin-bottom: 15px;
        }

        p {
            text-align: center;
            margin-top: 15px;
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

<div class="registration-container">
    <h2>Înregistrare</h2>
    <?php
    if (isset($_POST["submit"])) {
        $username = trim($_POST["username"]);
        $fullName = trim($_POST["fullname"]);
        $email = trim($_POST["email"]);
        $birthDate = $_POST["birth_date"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["repeat_password"];

        $errors = [];

        if (empty($username) || empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat) || empty($birthDate)) {
            $errors[] = "Toate câmpurile sunt obligatorii!";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email invalid!";
        }
        if (strlen($password) < 8) {
            $errors[] = "Parola trebuie să aibă minim 8 caractere.";
        }
        if ($password !== $passwordRepeat) {
            $errors[] = "Parolele nu se potrivesc.";
        }

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Emailul este deja înregistrat!";
        }

        if (!empty($errors)) {
            foreach ($errors as $e) {
                echo "<div class='alert alert-danger'>$e</div>";
            }
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $insert = "INSERT INTO users (username, full_name, email, birth_date, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insert);
            mysqli_stmt_bind_param($stmt, "sssss", $username, $fullName, $email, $birthDate, $passwordHash);
            if (mysqli_stmt_execute($stmt)) {
                echo "<div class='alert alert-success'>Înregistrare reușită!</div>";
            } else {
                echo "<div class='alert alert-danger'>Eroare la înregistrare. Încearcă din nou.</div>";
            }
        }
    }
    ?>

    <form method="post" action="registration.php">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="fullname" placeholder="Nume complet" required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name="birth_date" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Parolă" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="repeat_password" placeholder="Repetă parola" required>
        </div>
        <div class="form-btn">
            <button type="submit" class="btn btn-primary w-100" name="submit">Înregistrează-te</button>
        </div>
    </form>
    <p>Ai deja cont? <a href="login.php">Autentifică-te aici</a></p>
</div>

<?php include('../includes/footer.php'); ?>
</body>
</html>
