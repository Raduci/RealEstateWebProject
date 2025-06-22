<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('../includes/header.php');
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular cerere proprietate</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* === CULORI === */
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

        .container {
            width: 100%;
            max-width: 450px;
            margin: 50px auto;
            padding: 20px;
        }

        .login-box {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 20px 35px rgba(0, 0, 1, 0.2);
        }

        .login-box h2 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #03085a;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        label {
            font-weight: 500;
            color: #03085a;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            padding: 12px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 15px;
            background: white;
            transition: 0.2s ease;
            outline: none;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(0, 3, 46, 0.1);
        }

        .form-select {
            appearance: none;
            background-position: right 10px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 35px;
        }

        ::placeholder {
            color: #9ca3af;
            font-size: 14px;
        }

        .radio-group {
            display: flex;
            gap: 20px;
        }

        .form-check {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            border: 2px solid #d1d5db;
            border-radius: 50%;
            background: white;
            cursor: pointer;
            position: relative;
            appearance: none;
            margin: 0;
            flex-shrink: 0;
        }

        .form-check-input:checked {
            background: var(--primary-color);
            border-color: var(--primary-color);
        }

        .form-check-input:checked::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 6px;
            height: 6px;
            background: white;
            border-radius: 50%;
        }

        .form-check-label {
            font-size: 14px;
            color: var(--primary-color);
            font-weight: 500;
        }

        .btn {
            padding: 12px;
            background: #03085a;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn:hover {
            background: #02054a;
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .radio-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="login-box">
        <h2>Formular cerere proprietate</h2>
        <form action="salveaza_formular.php" method="POST">
            <div class="form-group">
                <label for="nume">Nume *</label>
                <input type="text" class="form-control" id="nume" name="nume" placeholder="Introduceți numele" required>
            </div>
            <div class="form-group">
                <label for="prenume">Prenume *</label>
                <input type="text" class="form-control" id="prenume" name="prenume" placeholder="Introduceți prenumele" required>
            </div>
            <div class="form-group">
                <label for="telefon">Număr de telefon *</label>
                <input type="tel" class="form-control" id="telefon" name="telefon" placeholder="07xxxxxxxx" pattern="[0-9]{10}" required>
            </div>
            <div class="form-group">
                <label for="cartier">Cartier dorit *</label>
                <select class="form-select" id="cartier" name="cartier" required>
                    <option value="" disabled selected>Alege un cartier</option>
                    <option value="Dorobanti">Dorobanti</option>
                    <option value="Berceni">Berceni</option>
                    <option value="Militari">Militari</option>
                    <option value="Titan">Titan</option>
                    <option value="Drumul Taberei">Drumul Taberei</option>
                </select>
            </div>
            <div class="form-group">
                <label for="distanta_metrou">Minute până la metrou *</label>
                <input type="number" class="form-control" id="distanta_metrou" name="distanta_metrou" min="1" max="60" placeholder="ex: 5" required>
            </div>
            <div class="form-group">
                <label>Loc de parcare *</label>
                <div class="radio-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="loc_parcare" id="parcare_da" value="1" required>
                        <label class="form-check-label" for="parcare_da">Da</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="loc_parcare" id="parcare_nu" value="0" required>
                        <label class="form-check-label" for="parcare_nu">Nu</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn">Trimite cererea</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('telefon').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 10) {
            value = value.substring(0, 10);
        }
        e.target.value = value;
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.style.borderColor = '#dc3545';
                isValid = false;
            } else {
                field.style.borderColor = '#ddd';
            }
        });
        if (!isValid) {
            e.preventDefault();
            alert('Vă rugăm să completați toate câmpurile obligatorii.');
        }
    });
</script>

</body>
</html>

<?php include('../includes/footer.php'); ?>
