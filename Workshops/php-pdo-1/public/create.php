<?php

require_once "../src/database.php";
require_once "../src/Story.php";

$httpMethod = $_SERVER["REQUEST_METHOD"];

if ($httpMethod === 'POST') {
    $pdo = createPDO();
    $story = new Story($_POST["title"], $_POST["content"], $_POST["author"]);
    $story->saveToDatabase($pdo);
}

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
    <?php if ($httpMethod === "GET") : ?>
        <form method="post">
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" required />
            </div>
            <div>
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="80" rows="20" required></textarea>
            </div>
            <div>
                <label for="author">Author</label>
                <input type="text" name="author" id="author" required />
            </div>
            <button type="submit">Send</button>
        </form>
    <?php else : ?>
        <div>
            <p>Story send.</p>
        </div>
    <?php endif ?>
</body>

</html>