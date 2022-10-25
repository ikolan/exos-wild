<?php
    $presentTime = new DateTime();
    $destinationTime = new DateTime();
    $destinationTime->setDate(2102, 1, 1);
    $destinationTime->setTime(21, 45);
?>

<?php function timeBlockDisplay(string $name, string $value, bool $isOrange) {?>
    <div class="display">
        <p class="name"><?= $name ?></p>
        <p class="led<?= $isOrange ? 'Orange' : 'Green' ?>"><?= $value ?></p>
    </div>
<?php } ?>

<?php function timeBlock(DateTime $dateTime, bool $isOrange, string $name) { ?>
    <div class="timeBlock">
        <div class="date">
            <?= timeBlockDisplay("Month", $dateTime->format("M"), $isOrange) ?>
            <?= timeBlockDisplay("Day", $dateTime->format("d"), $isOrange) ?>
            <?= timeBlockDisplay("Year", $dateTime->format("Y"), $isOrange) ?>
            <?= timeBlockDisplay("Am / Pm", $dateTime->format("A"), $isOrange) ?>
            <?= timeBlockDisplay("Hour", $dateTime->format("h"), $isOrange) ?>
            <?= timeBlockDisplay("Min", $dateTime->format("i"), $isOrange) ?>
        </div>
        <div class="name">
            <p><?= $name ?></p>
        </div>
    </div>
<?php } ?>

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
        <?php
            timeBlock($destinationTime, true, "Destination time");
            timeBlock($presentTime, false, "Present time");
        ?>
    </body>
</html>
