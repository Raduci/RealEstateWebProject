<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nume = $_POST["nume"];
    $prenume = $_POST["prenume"];
    $telefon = $_POST["telefon"];
    $cartier = $_POST["cartier"];
    $distanta = $_POST["distanta_metrou"];
    $parcare = $_POST["loc_parcare"];

    $stmt = $conn->prepare("INSERT INTO cereri_apartamente (nume, prenume, telefon, cartier, distanta_metrou, loc_parcare)
                            VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssii", $nume, $prenume, $telefon, $cartier, $distanta, $parcare);

    if ($stmt->execute()) {
        echo "<!DOCTYPE html>
        <html lang='ro'>
        <head>
            <meta charset='UTF-8'>
            <title>Cerere înregistrată</title>
            <link rel='icon' href='/proiect_imobiliare/public/img/logo.png' type='image/icon type'>
            <style>
                body {
                    font-family: 'Poppins', sans-serif;
                    background: linear-gradient(to right, #e2e2e2, #3a487f);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .confirmation-box {
                    background: #fff;
                    padding: 30px 40px;
                    border-radius: 12px;
                    box-shadow: 0 0 15px rgba(0,0,0,0.2);
                    text-align: center;
                }
                .confirmation-box h2 {
                    color: #03085a;
                    margin-bottom: 15px;
                }
                .confirmation-box p {
                    color: #333;
                    font-size: 16px;
                }
                .confirmation-box a {
                    display: inline-block;
                    margin-top: 20px;
                    text-decoration: none;
                    color: #03085a;
                    border: 1px solid #03085a;
                    padding: 10px 20px;
                    border-radius: 5px;
                    transition: 0.3s;
                }
                .confirmation-box a:hover {
                    background-color: #03085a;
                    color: white;
                }
            </style>
        </head>
        <body>
            <div class='confirmation-box'>
                <h2>Cererea a fost înregistrată cu succes!</h2>
                <p>Vă vom contacta pe numărul de telefon furnizat atunci când o proprietate potrivită devine disponibilă.</p>
                <a href='/proiect_imobiliare/uploads/index.php'>Înapoi la pagina principală</a>
            </div>
        </body>
        </html>";
    } else {
        echo "Eroare la salvare: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
