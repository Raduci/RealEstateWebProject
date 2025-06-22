<?php include('../includes/header.php'); ?>

<style>
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
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
    }

    .about-card {
        background-color: #fff;
        padding: 40px 30px;
        border-radius: 12px;
        max-width: 700px;
        width: 100%;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        text-align: left;
    }

    .about-card h1 {
        font-size: 24px;
        color: #03085a;
        margin-bottom: 20px;
        text-align: center;
    }

    .about-card p {
        color: #333;
        line-height: 1.6;
        margin-bottom: 15px;
        font-size: 16px;
    }

    .about-card h2 {
        font-size: 20px;
        color: #03085a;
        margin-top: 30px;
        margin-bottom: 15px;
    }

    .about-card ul {
        list-style: none;
        padding: 0;
    }

    .about-card li::before {
        content: "✔️ ";
        color: #03085a;
        margin-right: 5px;
    }

    .footer {
        margin-top: auto;
    }
</style>

<main class="main-content">
    <section class="about-card">
        <h1>Despre Noi</h1>
        <p>Bine ați venit pe platforma noastră imobiliară! Suntem o echipă pasionată de oameni care își propun să aducă mai aproape visul fiecărei persoane de a-și găsi locuința perfectă.</p>
        <p>Cu o experiență vastă în domeniul imobiliar, ne concentrăm pe oferirea celor mai bune soluții pentru vânzare, cumpărare și închiriere de proprietăți. Fie că ești în căutarea unei garsoniere, a unei case de familie sau a unui spațiu comercial, aici găsești opțiuni variate adaptate nevoilor tale.</p>
        <p>Platforma noastră este ușor de folosit, intuitivă și actualizată constant cu cele mai noi oferte. Punem accent pe transparență, seriozitate și satisfacția fiecărui client.</p>
        <p>Suntem aici pentru a te sprijini în fiecare pas al procesului imobiliar și pentru a transforma o simplă căutare într-o experiență plăcută și eficientă.</p>

        <h2>De ce să ne alegi?</h2>
        <ul>
            <li>Oferte actualizate în timp real</li>
            <li>Consultanță personalizată</li>
            <li>Platformă rapidă și sigură</li>
            <li>Suport dedicat clienților</li>
        </ul>

        <p>Îți mulțumim că ne-ai ales și sperăm să găsești aici locul pe care să-l numești „acasă”.</p>
    </section>
</main>

<?php include('../includes/footer.php'); ?>
