
<?php
require_once __DIR__ . '/../config.php';

$searchTerm = '';

if (isset($_GET['q'])) {
    $searchTerm = trim($_GET['q']);
}

$sql = "
    SELECT
        r.recipe_id,
        r.title,
        r.meal_type,
        r.servings,
        r.images,
        u.username,
        (
            SELECT GROUP_CONCAT(i.name, ', ')
            FROM ingredients i
            WHERE i.recipe_id = r.recipe_id
        ) AS ingredient_names
    FROM recipes r
    LEFT JOIN users u ON r.user_id = u.user_id
";

if ($searchTerm !== '') {
    $sql .= "
        WHERE r.title LIKE :search
        OR r.meal_type LIKE :search
        OR EXISTS (
            SELECT 1
            FROM ingredients i
            WHERE i.recipe_id = r.recipe_id
            AND i.name LIKE :search
        )
    ";
}

$sql .= " ORDER BY r.title ASC";

$stmt = $pdo->prepare($sql);

if ($searchTerm !== '') {
    $stmt->bindValue(':search', '%' . $searchTerm . '%', PDO::PARAM_STR);
}

$stmt->execute();
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/views/search_view.php';
