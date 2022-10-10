<?php

require __DIR__ . '/../models/recipe-model.php';

function browseRecipes(): void
{
    $recipes = getAllRecipes();

    require __DIR__ . '/../views/index.php';
}

function showRecipe($id): void
{
    // Input GET parameter validation (integer >0)
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
    if (false === $id || null === $id) {
        header("Location: /");
        exit("Wrong input parameter");
    }

    // Fetching a recipe from database -  assuming the database is okay
    $recipe = getRecipeById($id);

    // Database result check
    if (!isset($recipe['title']) || !isset($recipe['description'])) {
        header("Location: /");
        exit("Recipe not found");
    }

    require __DIR__ . "/../views/show.php";
}

function addRecipe(): void
{
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $recipe = [
            "title" => trim(htmlentities($_POST["title"])),
            "description" => trim(htmlentities($_POST["description"]))
        ];

        foreach ($recipe as $key => $value) {
            if (empty($value)) {
                $errors[] = "$key can't be empty";
            }

            if ($key === "title" && strlen($value) >= 255) {
                $errors[] = "Title can't be more than 255 characters.";
            }

            if ($key === "description" && strlen($value) >= 2000) {
                $errors[] = "Description can't be more than 2000 characters.";
            }
        }

        if (empty($errors)) {
            saveRecipe($recipe);
            header('Location: /');
        }
    }

    require __DIR__ . "/../views/form.php";
}
