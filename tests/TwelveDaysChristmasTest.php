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

  public function testGiftCountByDay()
  {
    $worker = new TwelveDaysChristmas();
    $totalDays = $worker->getTotalNumberOfDays();
    for ($i = 1; $i <= $totalDays; $i++) {
      $this->assertSame($i, $worker->getGiftCountByDay($i));
    }
  }
}