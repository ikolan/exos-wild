<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $recipe = [
        "title" => $_POST["title"],
        "description" => $_POST["description"]
    ];

    if (empty($recipe["title"])) {
        $errors[] = "Title can't be empty";
    }

    if (strlen($recipe["title"]) >= 255) {
        $errors[] = "Title can't be more than 255 characters.";
    }

    if (empty($recipe["description"])) {
        $errors[] = "Description can't be empty";
    }

    if (strlen($recipe["description"]) >= 2000) {
        $errors[] = "Description can't be more than 2000 characters.";
    }

    if (empty($errors)) {
        saveRecipe($recipe);
        header('Location: /');
    }
}

require __DIR__ . '/src/views/form.php';
