<?php

spl_autoload_register(function (string $className) {
  include getcwd() . '/classes/class.' . $className . '.php';
});

$worker = new TwelveDaysChristmas();

echo($worker->getNumberOfGifts(12));

