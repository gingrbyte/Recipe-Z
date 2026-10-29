
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Z - Search</title>
    <link rel="stylesheet" href="../css/styling-main.css">
</head>
<body>

<header>

        <a href="search.php"> <!-- logo-->
            <img
                    src="../assets/img/logo/Recipe%20Z.png"
                    alt="Recipe Z"
                    width="100"
            >
        </a>
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
        <nav>
        <a href="/Recipe-Z/Senna/search.php">Zoeken</a>
        <a href="/Recipe-Z/Senna/admin.php">Admin</a>
        <a href="/Recipe-Z/Raman/overzicht.php">Overzicht</a>
        <a href="/Recipe-Z/Kaan/home.php">Home</a>
    </nav>
</header>

<main>
    <h1>Find a recipe</h1>

    <form action="search.php" method="GET">
        <label for="q">Search recipes or ingredients</label>

        <input
                type="text"
                id="q"
                name="q"
                placeholder="Enter a recipe or ingredient..."
                value="<?php echo htmlspecialchars($searchTerm, ENT_QUOTES, 'UTF-8'); ?>"
        >

        <button type="submit">Search</button>

        <a href="search.php">Clear search</a>
    </form>

    <h2>Recipes</h2>

    <?php if (count($recipes) === 0): ?>
        <p>No recipes found.</p>
    <?php else: ?>

        <?php foreach ($recipes as $recipe): ?>
            <article>
                <h3>
                    <?php echo htmlspecialchars($recipe['title'], ENT_QUOTES, 'UTF-8'); ?>
                </h3>

                <p>
                    Meal type:
                    <?php echo htmlspecialchars((string) $recipe['meal_type'], ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <p>
                    Servings:
                    <?php echo htmlspecialchars((string) $recipe['servings'], ENT_QUOTES, 'UTF-8'); ?>
                </p>

                <p>
                    Added by:
                    <?php
                    echo htmlspecialchars(
                            isset($recipe['username']) ? $recipe['username'] : 'Unknown',
                            ENT_QUOTES,
                            'UTF-8'
                    );
                    ?>
                </p>

                <p>
                    Ingredients:
                    <?php
                    echo htmlspecialchars(
                            isset($recipe['ingredient_names']) ? $recipe['ingredient_names'] : 'No ingredients listed',
                            ENT_QUOTES,
                            'UTF-8'
                    );
                    ?>
                </p>

                <?php if (!empty($recipe['images'])): ?>
                    <img
                            src="data:image/jpeg;base64,<?php echo base64_encode($recipe['images']); ?>"
                            alt="<?php echo htmlspecialchars($recipe['title'], ENT_QUOTES, 'UTF-8'); ?>"
                            width="200"
                    >
                <?php endif; ?>
            </article>

            <hr>
        <?php endforeach; ?>

    <?php endif; ?>
</main>

</body>
</html>
