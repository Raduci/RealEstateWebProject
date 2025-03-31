<?php
require_once "database.php";
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

$error = "";
$success = "";  // Inițializare mesaj de succes
if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        $error = "<div class='alert alert-danger'>Toate câmpurile sunt obligatorii!</div>";
    } else {
        // Căutăm utilizatorul în baza de date pe baza username-ului
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user["id"];
            $success = "<div class='alert alert-success'>Autentificare reușită!</div>"; // Mesaj de succes

            // Așteaptă 1 secundă înainte de redirecționare
            sleep(1);

            // Redirecționează la index.php după autentificare
            header("Location: index.php");
            exit();
        } else {
            $error = "<div class='alert alert-danger'>Username sau parolă incorectă!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

<?php include('../includes/header.php'); ?>

<div class="container">
    <div class="login-box">
        <h2>Autentificare</h2>
        <?php echo $error; ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <!-- Am schimbat de la email la username -->
                <input type="text" class="form-control" name="username" placeholder="Username:" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Parolă:" required>
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Login" name="login">
            </div>
        </form>
        <div>
            <p>Nu ai cont? <a href="registration.php">Înregistrează-te aici</a></p>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>

</body>
</html>
