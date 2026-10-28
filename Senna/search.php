<?php

require __DIR__ . '/../config.php';

$search = trim($_GET['search']);

if ($search !== '') {
    $sql = 'SELECT * FROM recipes
            WHERE title LIKE :title
               OR ingredients LIKE :ingredients
               OR author LIKE :author
            ORDER BY recipe_id DESC';

    $stmt = $pdo->prepare($sql);
    $keyword = '%' . $search . '%';

    $stmt->execute([
        'title' => $keyword,
        'ingredients' => $keyword,
        'author' => $keyword
    ]);
} else {
    $stmt = $pdo->query(
        'SELECT * FROM recipes ORDER BY recipe_id DESC'
    );
}

$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/../src/php/views/search-view.php';
