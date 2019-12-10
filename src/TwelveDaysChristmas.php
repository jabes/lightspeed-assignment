<?php

declare(strict_types=1);
namespace Lightspeed;
use ReflectionClass;
use Composer\Autoload\ClassLoader;

class TwelveDaysChristmas
{
  private $gifts = [];
  private $lyrics = "";

  function __construct()
  {
    $this->buildGiftList();
    $this->lyrics = $this->getLyricsFromFile();
  }

  public function getTotalNumberOfDays(): int
  {
    return count($this->gifts);
  }

  public function getGiftCountByDay(int $day): int
  {
    return count($this->gifts[$day]);
  }

  private function addGift(int $day, string $item): void
  {
    $newGift = end($this->gifts) ?: [];
    array_unshift($newGift, $item);
    $this->gifts[$day] = $newGift;
  }

  private function buildGiftList(): void
  {
    $this->addGift(1, "A partridge in a pear tree");
    $this->addGift(2, "Two turtle doves");
    $this->addGift(3, "Three French hens");
    $this->addGift(4, "Four calling birds");
    $this->addGift(5, "Five golden rings");
    $this->addGift(6, "Six geese a-laying");
    $this->addGift(7, "Seven swans a-swimming");
    $this->addGift(8, "Eight maids a-milking");
    $this->addGift(9, "Nine ladies dancing");
    $this->addGift(10, "Ten lords a-leaping");
    $this->addGift(11, "Eleven pipers piping");
    $this->addGift(12, "Twelve drummers drumming");
  }

  private function getLyricsFromFile(string $filename = "lyrics.txt"): string
  {
    $reflection = new ReflectionClass(ClassLoader::class);
    $projectDirectory = dirname($reflection->getFileName(), 3);
    return file_get_contents($projectDirectory . "/" . $filename);
  }
}
