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
    <div class="card">
        <div class="title">
            <h1>SPRINGFIELD, IL</h1>
        </div>
        <div class="infos">
            <div>
                <p>LICENCE#</p>
                <p><?= rand(10000, 99999) ?></p>
            </div>
            <div>
                <p>BIRTH DATE</p>
                <p>???</p>
            </div>
            <div>
                <p>EXPIRES</p>
                <p>???</p>
            </div>
            <div>
                <p>CLASS</p>
                <p>NONE</p>
            </div>
        </div>
        <div class="content">
            <img class="image" src="/uploads/<?= $_GET["pic"] ?>" alt="Picture">
            <div>
                <div class="subtitle">
                    <p>DRIVER LICENSE</p>
                </div>
                <div>
                    <p>HOMER SIMPSON</p>
                    <p>69 OLD PLUMTREE BLVD</p>
                    <p>SPRINGFIELD, IL</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>