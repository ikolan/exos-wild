<?php

require_once __DIR__ . "/../vendor/autoload.php";

use CowSay\Cow;

$myCow = new Cow("Hello World");
echo $myCow->say();
