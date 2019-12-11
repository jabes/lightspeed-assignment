<?php

declare(strict_types=1);
require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Lightspeed\TwelveDaysChristmas;

final class TwelveDaysChristmasTest extends TestCase
{
  public function testTotalNumberOfDays()
  {
    $worker = new TwelveDaysChristmas();
    $this->assertSame(12, $worker->getTotalNumberOfDays());
  }

  public function testDailyGiftCount()
  {
    $worker = new TwelveDaysChristmas();
    $totalDays = $worker->getTotalNumberOfDays();
    for ($i = 1; $i <= $totalDays; $i++) {
      $this->assertSame($i, $worker->getDailyGiftCount($i));
    }
  }

  public function testCumulativeGiftCount()
  {
    $worker = new TwelveDaysChristmas();
    $totalDays = $worker->getTotalNumberOfDays();
    $cumulativeTotal = 0;
    for ($i = 1; $i <= $totalDays; $i++) {
      $cumulativeTotal += $i;
      $this->assertSame($cumulativeTotal, $worker->getCumulativeGiftCount($i));
    }
  }
}
