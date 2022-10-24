<?php

session_start();

if (!isset($_SESSION["name"]) || is_null($_SESSION["name"])) {
    header("Location: /login.php");
}

$cart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : [];

if (isset($_GET["plus"]) && isset($_SESSION["cart"][$_GET["plus"]])) {
    $_SESSION["cart"][$_GET["plus"]]++;
    header("Location: /cart.php");
}

if (isset($_GET["minus"]) && isset($_SESSION["cart"][$_GET["minus"]])) {
    $_SESSION["cart"][$_GET["minus"]]--;

    if ($_SESSION["cart"][$_GET["minus"]] <= 0) {
        unset($_SESSION["cart"][$_GET["minus"]]);
    }

    header("Location: /cart.php");
}

if (isset($_GET["delete"]) && isset($_SESSION["cart"][$_GET["delete"]])) {
    unset($_SESSION["cart"][$_GET["delete"]]);
    header("Location: /cart.php");
}

require "inc/data/products.php";
?>

<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <ul>
            <?php foreach ($cart as $id => $quantity) : ?>
                <li><?= $quantity . " " . $catalog[$id]["name"] ?>
                    <a href="/cart.php?plus=<?= $id ?>">+</a> 
                    <a href="/cart.php?minus=<?= $id ?>">-</a> 
                    <a href="/cart.php?delete=<?= $id ?>">x</a> 
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
