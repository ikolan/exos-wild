<?php
$isPostMethod = $_SERVER["REQUEST_METHOD"] === "POST";

if ($isPostMethod) {
    $uploadDir = __DIR__ . "/uploads/";
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $uploadFile = (new DateTime())->format("U") . "." . $extension;
    $uploadPath = $uploadDir . $uploadFile;
    $authorizedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $maxFileSize = 1000000;

    if ((!in_array($extension, $authorizedExtensions))) {
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png ou Gif ou Webp !';
    }

    if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
        $errors[] = "Votre fichier doit faire moins de 1M !";
    }

    if (empty($errors)) {
        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadPath);
        header("Location: /card.php?pic=" . $uploadFile);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php if (!empty($errors)): ?>
		<?php foreach ($errors as $error): ?>
		<pre><?= $error ?></pre>
		<?php endforeach ?>
		<?php endif ?>

		<form action="" method="POST" enctype="multipart/form-data">
			<div>
				<label for="imageUpload">Upload a profile picture</label>
				<input type="file" name="avatar" id="imageUpload"/>
			</div>
			<button type="submit">Send</button>
		</form>
	</body>
</html>

