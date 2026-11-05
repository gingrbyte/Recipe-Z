<?php

require_once __DIR__ . "/../config.php";

if (!isset($_GET['id'])) {
    echo "Geen recept gekozen";
    exit;
}

$id = $_GET['id'];

$sql = "
SELECT
    r.*,
    u.username,
    (
        SELECT GROUP_CONCAT(i.name, ', ')
        FROM ingredients i
        WHERE i.recipe_id = r.recipe_id
    ) AS ingredient_names
FROM recipes r
LEFT JOIN users u ON r.user_id = u.user_id
WHERE r.recipe_id = ?
";

$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$recipe = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$recipe) {
    echo "Recept niet gevonden";
    exit;
}

$ingredients = explode(", ", $recipe['ingredient_names']);
$steps = [];
if (isset($recipe['instructions'])) {
    $steps = explode("\n", $recipe['instructions']);
}

$image = "";
if (!empty($recipe['images'])) {
    $image = base64_encode($recipe['images']);
}

$sql = "SELECT recipe_id, title, images FROM recipes WHERE recipe_id != ? LIMIT 6";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$others = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $recipe['title']; ?></title>
    <link rel="stylesheet" href="detail.css">
</head>
<body>

<div class="top">
    <a href="/Recipe-Z/Senna/search.php" class="button"></a>
    <a href="home.php" class="button"></a>
    <a href="/Recipe-Z/Raman/overzicht.php" class="button"></a>
    <a href="/Recipe-Z/Senna/admin.php" class="button"></a>

</div>

<div class="main">

    <div class="left">
        <h2>INGREDIENTS</h2>
        <ul>
            <?php foreach ($ingredients as $ingredient) { ?>
                <li><?php echo $ingredient; ?></li>
            <?php } ?>
        </ul>
    </div>

    <div class="middle">
        <h1><?php echo $recipe['title']; ?></h1>
        <p>
            <?php echo $recipe['meal_type']; ?> |
            <?php echo $recipe['servings']; ?> personen |
            door <?php echo $recipe['username']; ?>
        </p>

        <div class="picture-box">
            <?php if ($image != "") { ?>
                <img src="data:image/jpeg;base64,<?php echo $image; ?>">
            <?php } ?>
        </div>
    </div>

    <div class="right">
        <h2>INSTRUCTIONS</h2>
        <ul>
            <?php foreach ($steps as $step) { ?>
                <li><?php echo $step; ?></li>
            <?php } ?>
        </ul>
    </div>

</div>

<hr>

<div class="bottom">
    <?php foreach ($others as $other) { ?>
        <?php
        $otherImage = "";
        if (!empty($other['images'])) {
            $otherImage = base64_encode($other['images']);
        }
        ?>
        <a class="small-box" href="detail.php?id=<?php echo $other['recipe_id']; ?>">
            <?php if ($otherImage != "") { ?>
                <img src="data:image/jpeg;base64,<?php echo $otherImage; ?>">
            <?php } ?>
            <p><?php echo $other['title']; ?></p>
        </a>
    <?php } ?>
</div>
</body>
</html>

