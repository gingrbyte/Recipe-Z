
<?php

require __DIR__ . "/../config.php";

$search = trim($_GET["search"]);

// Handle recipe deletion
if ($_SERVER["REQUEST_METHOD"] === "POST"
    && isset($_POST["delete"])) {

    $recipe_id = filter_input(
        INPUT_POST,
        "recipe_id",
        FILTER_VALIDATE_INT
    );

    if ($recipe_id !== false && $recipe_id !== null
        && $recipe_id > 0) {

        $stmt = $pdo->prepare(
            "DELETE FROM recipes WHERE recipe_id = :recipe_id"
        );

        $stmt->execute([
            "recipe_id" => $recipe_id
        ]);
    }

    // Return to the current search or show all recipes
    $redirect = "admin.php";

    if ($search !== "") {
        $redirect .= "?search=" . urlencode($search);
    }

    header("Location: " . $redirect);
    exit;
}

// Fetch all recipes, or filter by keyword
if ($search !== "") {
    $sql = "SELECT * FROM recipes
            WHERE title LIKE :title
               OR ingredients LIKE :ingredients
               OR author LIKE :author
            ORDER BY recipe_id DESC";

    $stmt = $pdo->prepare($sql);
    $keyword = "%" . $search . "%";

    $stmt->execute([
        "title" => $keyword,
        "ingredients" => $keyword,
        "author" => $keyword
    ]);
} else {
    $stmt = $pdo->query(
        "SELECT * FROM recipes ORDER BY recipe_id DESC"
    );
}

$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . "/../src/php/views/admin-view.php";
