<?php
session_start();
include('../includes/header.php');
require_once "database.php";

$mesaj = "";
if (isset($_SESSION["recenzie_adaugata"])) {
    $mesaj = $_SESSION["recenzie_adaugata"];
    unset($_SESSION["recenzie_adaugata"]);
}
?>

<style>
    :root {
        --primary-color: #00032e;
        --secondary-color: #00032e;
        --hover-color: #03085a;
        --text-color: #fff;
    }

    body {
        margin: 0;
        font-family: "Poppins", sans-serif;
        background: linear-gradient(to right, #e2e2e2, #3a487f);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .main-content {
        flex: 1;
        padding: 40px 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .alert {
        padding: 12px;
        border-radius: 5px;
        background-color: #d1e7dd;
        color: #0f5132;
        margin-bottom: 20px;
        text-align: center;
    }

    h2 {
        color: #03085a;
        text-align: center;
        margin-bottom: 30px;
    }

    .recenzie-card {
        background-color: #fff;
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .recenzie-card h5 {
        margin-top: 0;
        color: #03085a;
    }

    .recenzie-card .text-muted {
        font-size: 0.9em;
        color: #666;
    }

    .form-section {
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        margin: 50px auto;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        max-width: 500px;
    }

    .form-section h4 {
        margin-bottom: 20px;
        color: #03085a;
        text-align: center;
    }

    .form-section input,
    .form-section textarea,
    .form-section select {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #03085a;
        color: #fff;
        border: none;
        padding: 12px;
        font-size: 16px;
        width: 100%;
        border-radius: 6px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #02054a;
    }

    .text-warning {
        color: #edbf6d;
    }

    .fw-bold {
        font-weight: 600;
    }

    /* Stele rating */
    .star-rating {
        direction: rtl;
        display: flex;
        justify-content: flex-start;
        gap: 5px;
        margin-bottom: 15px;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        font-size: 2rem;
        color: #ccc;
        cursor: pointer;
        transition: color 0.2s;
    }

    .star-rating input:checked ~ label,
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #edbf6d;
    }

    /* Carousel */
    .carousel {
        position: relative;
        margin-bottom: 40px;
    }

    .carousel-inner {
        width: 100%;
        border-radius: 10px;
        overflow: hidden;
    }

    .carousel-item {
        display: none;
        transition: 0.5s ease-in-out;
    }

    .carousel-item.active {
        display: block;
    }

    .carousel-control-prev,
    .carousel-control-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        font-size: 2rem;
        color: #03085a;
        cursor: pointer;
        z-index: 1000;
    }

    .carousel-control-prev { left: -30px; }
    .carousel-control-next { right: -30px; }
</style>

<main class="main-content">
    <div class="container">

        <?php if ($mesaj): ?>
            <div class="alert alert-success"><?= htmlspecialchars($mesaj) ?></div>
        <?php endif; ?>

        <!-- CAROUSEL RECENZII DE TOP -->
        <?php
        $sql_top = "SELECT * FROM recenzii ORDER BY rating DESC, data_recenzie DESC";
        $top_result = mysqli_query($conn, $sql_top);
        ?>

        <?php if (mysqli_num_rows($top_result) > 0): ?>
            <div id="carouselRecenzii" class="carousel">
                <div class="carousel-inner">
                    <?php $first = true; while ($top = mysqli_fetch_assoc($top_result)): ?>
                        <div class="carousel-item <?= $first ? 'active' : '' ?>">
                            <div class="recenzie-card text-center">
                                <h5><?= htmlspecialchars($top['titlu']) ?></h5>
                                <div class="text-warning fs-5 mb-2">
                                    <?= str_repeat('⭐', floor($top['rating'])) ?>
                                </div>
                                <p class="fw-bold"><?= htmlspecialchars($top['nume']) ?></p>
                                <p class="text-muted"><?= htmlspecialchars($top['tip_client']) ?> • <?= date("F Y", strtotime($top['data_recenzie'])) ?></p>
                                <p><?= nl2br(htmlspecialchars($top['continut'])) ?></p>
                            </div>
                        </div>
                        <?php $first = false; endwhile; ?>
                </div>
                <button class="carousel-control-prev" type="button" onclick="scrollCarousel(-1)">‹</button>
                <button class="carousel-control-next" type="button" onclick="scrollCarousel(1)">›</button>
            </div>

            <script>
                let currentSlide = 0;
                const items = document.querySelectorAll('.carousel-item');

                function scrollCarousel(direction) {
                    items[currentSlide].classList.remove('active');
                    currentSlide += direction;
                    if (currentSlide < 0) currentSlide = items.length - 1;
                    if (currentSlide >= items.length) currentSlide = 0;
                    items[currentSlide].classList.add('active');
                }
            </script>
        <?php endif; ?>

        <!-- FORMULAR RECENZIE -->
        <div class="form-section">
            <h4>Lasă o recenzie</h4>
            <form action="adauga_recenzie.php" method="POST">
                <input type="text" name="nume" placeholder="Numele tău" required>
                <input type="text" name="titlu" placeholder="Titlul recenziei" required>
                <textarea name="continut" rows="4" placeholder="Scrie părerea ta..." required></textarea>

                <!-- Stele -->
                <div class="star-rating">
                    <input type="radio" name="rating" id="star5" value="5" required><label for="star5">★</label>
                    <input type="radio" name="rating" id="star4" value="4"><label for="star4">★</label>
                    <input type="radio" name="rating" id="star3" value="3"><label for="star3">★</label>
                    <input type="radio" name="rating" id="star2" value="2"><label for="star2">★</label>
                    <input type="radio" name="rating" id="star1" value="1"><label for="star1">★</label>
                </div>

                <select name="tip_client">
                    <option value="Familie">Familie</option>
                    <option value="Cupluri">Cupluri</option>
                    <option value="Individual">Individual</option>
                </select>

                <button type="submit" class="btn-primary">Trimite recenzia</button>
            </form>
        </div>

        <!-- RECENZII COMPLETE -->
        <?php
        $sql = "SELECT * FROM recenzii ORDER BY data_recenzie DESC";
        $result = mysqli_query($conn, $sql);
        $total_recenzii = mysqli_num_rows($result);
        ?>

        <h2>Recenziile clienților noștri <span class="text-primary">(<?= $total_recenzii ?>)</span></h2>

        <?php if ($total_recenzii > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="recenzie-card">
                    <p class="fw-bold"><?= htmlspecialchars($row['nume']) ?></p>
                    <div class="text-warning"><?= str_repeat('⭐', floor($row['rating'])) ?></div>
                    <h5><?= htmlspecialchars($row['titlu']) ?></h5>
                    <p class="text-muted"><?= date("F Y", strtotime($row['data_recenzie'])) ?> • <?= htmlspecialchars($row['tip_client']) ?></p>
                    <p><?= nl2br(htmlspecialchars($row['continut'])) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">Nu există recenzii momentan.</p>
        <?php endif; ?>

    </div>
</main>

<?php include('../includes/footer.php'); ?>
