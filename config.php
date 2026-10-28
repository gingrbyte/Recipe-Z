<?php
$pdo = new PDO('sqlite:' . __DIR__ . '/assets/databases/recipe-z.sqlite');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);