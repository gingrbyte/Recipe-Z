<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Z - Home</title>

    <link rel="stylesheet" href="home.css">
</head>
<body>


<header>
    <svg class="header-bg" viewBox="0 0 1512 193" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.5 191.714
            C0.739403 191.603 1.03838 191.465 1.39844 191.303
            C2.47553 190.817 4.09421 190.106 6.26465 189.202
            C10.6055 187.394 17.154 184.813 25.9912 181.716
            C43.6656 175.522 70.4964 167.267 107.14 159.013
            C180.427 142.504 292.965 126 450 126
            C787.46 126 1160.03 119.285 1341.02 126.001
            C1439.06 129.639 1488.15 113.868 1511 92.4941
            V0.5 L0.5 0.5 L0.5 191.714Z"
              fill="#58355E" stroke-width="4"/>
    </svg>

    <div class="header-content">
        <a href="home.php">
            <img src="images/logo.svg" alt="Recipe Z" class="logo">
        </a>
        <nav>
            <a href="search.php"><img src="images/search.svg" alt="Zoeken"></a>
            <a href="#"><img src="images/group.svg" alt="Groep"></a>
            <a href="profile.php"><img src="images/profile.svg" alt="Profiel"></a>
        </nav>
    </div>
</header>


<main>

    <section class="main-search-container">
        <input type="text" placeholder="What are we craving...?" class="main-search-input">
        <img src="images/search.svg" alt="Zoeken" class="main-search-icon">
    </section>


    <section class="recipe-grid">

        <article class="recipe-container">
            <h3 class="recipe-title">Pasta Carbonara</h3>
            <div class="recipe-card">
                <img src="images/carbonara.jpg" alt="Pasta Carbonara" class="recipe-image">
                <div class="recipe-footer">
                    <span class="recipe-author">@SennaBytes</span>
                    <div class="recipe-icons">
                        <img src="images/icon-pot.svg" alt="Pot">
                        <img src="images/icon-people.svg" alt="Personen">
                        <span>4</span>
                    </div>
                </div>
            </div>
        </article>

        <article class="recipe-container">
            <h3 class="recipe-title">Pasta Bolognese</h3>
            <div class="recipe-card">
                <img src="images/bolognese.jpg" alt="Pasta Bolognese" class="recipe-image">
                <div class="recipe-footer">
                    <span class="recipe-author">@BaasGLR</span>
                    <div class="recipe-icons">
                        <img src="images/icon-timer.svg" alt="Tijd">
                        <img src="images/icon-pot.svg" alt="Pot">
                        <img src="images/icon-people.svg" alt="Personen">
                        <span>4</span>
                    </div>
                </div>
            </div>
        </article>

        <article class="recipe-container">
            <h3 class="recipe-title">Pasta Pesto</h3>
            <div class="recipe-card">
                <img src="images/pesto.jpg" alt="Pasta Pesto" class="recipe-image">
                <div class="recipe-footer">
                    <span class="recipe-author">@SennaBytes</span>
                    <div class="recipe-icons">
                        <img src="images/icon-pot.svg" alt="Pot">
                        <img src="images/icon-people.svg" alt="Personen">
                        <span>4</span>
                    </div>
                </div>
            </div>
        </article>

        <article class="recipe-container">
            <h3 class="recipe-title">Pasta Carbonara</h3>
            <div class="recipe-card">
                <img src="images/carbonara2.jpg" alt="Pasta Carbonara" class="recipe-image">
                <div class="recipe-footer">
                    <span class="recipe-author">@SennaBytes</span>
                    <div class="recipe-icons">
                        <img src="images/icon-pot.svg" alt="Pot">
                        <img src="images/icon-people.svg" alt="Personen">
                        <span>4</span>
                    </div>
                </div>
            </div>
        </article>

    </section>
</main>


<footer>

    <p>&copy; <?php echo date("Y"); ?> Recipe Z. Alle rechten voorbehouden.</p>
</footer>

</body>
</html>