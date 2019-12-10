<?php

use Lightspeed\TwelveDaysChristmas;

error_reporting(E_ALL);
spl_autoload_register(function (string $className) {
  include getcwd() . '/' . str_replace('\\', '/', $className) . '.php';
});

$worker = new TwelveDaysChristmas();
echo($worker->getNumberOfGifts(12));
