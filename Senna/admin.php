
<?php
require_once __DIR__ . '/../config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['delete_recipe'])
    && isset($_POST['recipe_id'])) {

    $recipeId = filter_var(
        $_POST['recipe_id'],
        FILTER_VALIDATE_INT
    );

    if ($recipeId !== false && $recipeId > 0) {
        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare(
                'DELETE FROM ingredients WHERE recipe_id = :recipe_id'
            );
            $stmt->execute(array('recipe_id' => $recipeId));

            $stmt = $pdo->prepare(
                'DELETE FROM instructions WHERE recipe_id = :recipe_id'
            );
            $stmt->execute(array('recipe_id' => $recipeId));

            $stmt = $pdo->prepare(
                'DELETE FROM recipes WHERE recipe_id = :recipe_id'
            );
            $stmt->execute(array('recipe_id' => $recipeId));

            $pdo->commit();

            header('Location: admin.php?deleted=1');
            exit;
        } catch (Exception $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }

            $message = 'The recipe could not be deleted.';
        }
    } else {
        $message = 'Invalid recipe ID.';
    }
}

if (isset($_GET['deleted']) && $_GET['deleted'] === '1') {
    $message = 'Recipe deleted successfully.';
}

$sql = "
    SELECT
        r.recipe_id,
        r.title,
        r.meal_type,
        r.servings,
        u.username,
        (
            SELECT GROUP_CONCAT(i.name, ', ')
            FROM ingredients i
            WHERE i.recipe_id = r.recipe_id
        ) AS ingredient_names
    FROM recipes r
    LEFT JOIN users u ON r.user_id = u.user_id
    ORDER BY r.recipe_id DESC
";

$stmt = $pdo->query($sql);
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

require __DIR__ . '/views/admin_view.php';
