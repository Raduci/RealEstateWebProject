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
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user"] = $user["id"];
            $success = "<div class='alert alert-success'>Autentificare reușită!</div>"; // Mesaj de succes
            sleep(1);// Pauză de 1 secundă pentru a simula un timp de procesare
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
    <style>
        body {
            background: linear-gradient(to right, #e2e2e2, #3a487f);
            font-family: 'Poppins', sans-serif;
            /* Flexbox for sticky footer */
            display: flex;
            flex-direction: column; /* Stack children vertically */
            min-height: 100vh; /* Make body at least full viewport height */
            margin: 0; /* Remove default body margin */
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

        /* New CSS for sticky footer main content */
        .content-wrap {
            flex-grow: 1; /* This will make the content area expand and push the footer down */
            display: flex; /* Use flexbox for content to center registration-container vertically */
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally (if registration-container isn't max width) */
            padding-bottom: 20px; /* Optional: add some padding above the footer if needed */
        }

        /* Adjustments for the footer if necessary (assuming it's a direct child of body) */
        footer {
            /* Example: basic footer styling */
            background-color: #f8f9fa; /* Light grey background */
            padding: 15px 0;
            text-align: center;
            color: #6c757d;
        }
    </style>
</head>
<body>

<?php include('../includes/header.php'); ?>

<div class="content-wrap">
    <div class="container">
        <div class="registration-container">
            <h2>Autentificare</h2>
            <?php echo $error; ?>
            <form action="login.php" method="post">
                <div class="form-group">
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
</div>

<?php include('../includes/footer.php'); ?>

</body>
</html>