<?php

require_once "../src/database.php";
require_once "../src/Story.php";

$pdo = createPDO();
$stories = Story::fetchFromDatabase($pdo);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Stories</h1>

    <?php foreach ($stories as $story) : ?>
        <div>
            <h2><?= $story->getTitle() ?></h2>
            <h3><?= $story->getAuthor() ?></h3>
            <pre><?= $story->getContent() ?></pre>
            <hr />
        </div>
    <?php endforeach ?>
</body>

</html>