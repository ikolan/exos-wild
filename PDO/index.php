<?php

require_once "./_connec.php";

$pdo = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME, DBUSER, DBPASS);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    $firstName = trim($_POST["first_name"]);
    $lastName = trim($_POST["last_name"]);

    if (strlen($firstName) > 45 || strlen($lastName) > 45) {
        $errors[] = "Names can't be more than 45 characters";
    }

    if (empty($firstName) || empty($lastName)) {
        $errors[] = "Names can't be empty";
    }

    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO friend(first_name, last_name) VALUE (:first_name, :last_name);");
        $statement->bindParam(':first_name', $firstName, PDO::PARAM_STR);
        $statement->bindParam(':last_name', $lastName, PDO::PARAM_STR);
        $statement->execute();
    }

    header("Location: /");
} else {
    $statement = $pdo->query("SELECT * FROM friend;");
    $friends = $statement->fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends</title>
</head>

<body>
    <h1>Friends</h1>
    <?php if (!empty($friends)) : ?>
        <ul>
            <?php foreach ($friends as $friend) : ?>
                <li><?= $friend["first_name"] . " " . $friend["last_name"] ?></li>
            <?php endforeach ?>
        </ul>
    <?php else : ?>
        <p>La liste est vide.</p>
    <?php endif ?>

    <hr />

    <h2>Add a friend</h2>

    <form method="POST">
        <div>
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" maxlength="45" required />
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" maxlength="45" required />
        </div>
        <button type="submit">Envoyer</button>
    </form>
</body>

</html>