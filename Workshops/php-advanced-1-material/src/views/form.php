<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding recipe</title>
</head>

<body>
    <a href="/">Home</a>
    <h1>Adding recipe</h1>

    <?php if (!empty($errors)) : ?>
        <div>
            <p>Some errors append :</p>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <div>
        <form method="POST">
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" maxlength="255" required>
            </div>
            <div>
                <label for="description">Description</label>
                <br />
                <textarea name="description" id="description" cols="30" rows="10" required></textarea>
            </div>
            <div>
                <button type="submit">Envoyer</button>
            </div>
        </form>
    </div>
</body>

</html>