<?php
session_start();
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nume = trim($_POST["nume"]);
    $titlu = trim($_POST["titlu"]);
    $continut = trim($_POST["continut"]);
    $rating = floatval($_POST["rating"]);
    $tip_client = $_POST["tip_client"];

    // Verificare conexiune + query
    $sql = "INSERT INTO recenzii (nume, titlu, continut, rating, tip_client) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssds", $nume, $titlu, $continut, $rating, $tip_client);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION["recenzie_adaugata"] = "Recenzia ta a fost adăugată cu succes!";
        } else {
            $_SESSION["recenzie_adaugata"] = "Eroare la salvare: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        $_SESSION["recenzie_adaugata"] = "Eroare la pregătirea interogării: " . mysqli_error($conn);
    }

    header("Location: recenzii.php");
    exit();
}
?>
