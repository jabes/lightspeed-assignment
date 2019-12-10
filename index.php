<?php 

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
use Lightspeed\TwelveDaysChristmas;

$worker = new TwelveDaysChristmas();
echo $worker->getNumberOfGifts(12);
echo PHP_EOL;
