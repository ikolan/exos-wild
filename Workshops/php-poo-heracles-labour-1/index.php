<?php

require_once "./src/Fighter.php";

$heracles = new Fighter("🧔 Héraclès", 20, 6);
$lion = new Fighter("🦁 Lion de Némée", 11, 13);

function someoneIsDead(array $persons): bool
{
    foreach ($persons as $person) {
        if (!$person->isAlive()) {
            return true;
        }
    }
    return false;
}

for ($round = 1; !someoneIsDead([$heracles, $lion]); $round++) {
    echo "ROUND #$round<br>";

    $damage = $heracles->fight($lion);
    echo $heracles->getName() . " --|===> (" . $damage . ") " . $lion->getName() . " (♥ " . $lion->getLife() . " HP)<br>";

    if (someoneIsDead([$heracles, $lion])) {
        echo "<br>";
        break;
    }

    $damage = $lion->fight($heracles);
    echo $lion->getName() . " --|===> (" . $damage . ") " . $heracles->getName() . " (♥ " . $heracles->getLife() . " HP)<br>";

    echo "<br>";
}

if ($heracles->getLife() === 0 && $lion->getLife() === 0) {
    echo "DRAW";
} else {
    $winner = $heracles->getLife() > 0 ? $heracles : $lion;
    $loser = $heracles->getLife() > 0 ? $lion : $heracles;

    echo "💀 " . $loser->getName() . "<br>";
    echo "🏆 " . $winner->getName() . "<br>";
}
