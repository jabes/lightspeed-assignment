<?php 

declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
use Lightspeed\TwelveDaysChristmas;

$shortopts = "d:";
$longopts  = ["day:"];
$options = getopt($shortopts, $longopts);

$day = $options['day'] ?? $options['d'] ?? null;
if (!$day) die("A day must be defined.". PHP_EOL);

$worker = new TwelveDaysChristmas(true);

$day = intval($day);
$totalDays = $worker->getTotalNumberOfDays();
if ($day > $totalDays) die("The day provided exceeds the total number of days.". PHP_EOL);

$dailyTotal = $worker->getDailyGiftCount($day);
$cumulativeTotal = $worker->getCumulativeGiftCount($day);

echo "You have received " . $dailyTotal . " gifts on day " . $day . " for a total of " . $cumulativeTotal . " gifts since day 1.";
echo PHP_EOL;
