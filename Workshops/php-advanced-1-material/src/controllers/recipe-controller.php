<?php

require __DIR__ . '/../models/recipe-model.php';

function browseRecipes(): void
{
    $recipes = getAllRecipes();

    require __DIR__ . '/../views/index.php';
}

function showRecipe(int $id): void
{
    $recipe = getRecipeById($id);

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
