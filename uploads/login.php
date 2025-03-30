<?php
session_start();
require_once "database.php";

if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

$error = "";
if (isset($_POST["login"])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($email) || empty($password)) {
        $error = "<div class='alert alert-danger'>Toate câmpurile sunt obligatorii!</div>";
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user["id"];
            header("Location: index.php");
            exit();
        } else {
            $error = "<div class='alert alert-danger'>Email sau parolă incorectă!</div>";
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
                <input type="email" class="form-control" name="email" placeholder="Email:" required>
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
