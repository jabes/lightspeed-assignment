<?php

declare(strict_types=1);
namespace Lightspeed;
use ReflectionClass;
use Composer\Autoload\ClassLoader;

class TwelveDaysChristmas
{
  private $gifts = [];
  private $lyrics;

  function __construct(bool $parseFromFile = true)
  {
    if ($parseFromFile) {
      $this->getLyricsFromFile();
      $this->parseLyricsIntoGifts();
    } else {
      $this->buildGiftList();
    }
  }

  /**
   * Get the total number of days that contain gifts.
   */
  public function getTotalNumberOfDays(): int
  {
    return count($this->gifts);
  }

  /**
   * Get the number of gifts on a specified day.
   */
  public function getGiftCountByDay(int $day): int
  {
    return count($this->gifts[$day]);
  }

  /**
   * Add a new item for the specified day along with all the items from the previous day.
   */
  private function addGift(int $day, string $item): void
  {
    $newGift = end($this->gifts) ?: [];
    array_unshift($newGift, $item);
    $this->gifts[$day] = $newGift;
  }

  /**
   * Builds a list of gifts for each day of Christmas.
   */
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

  /**
   * Retrieves the lyrics from file.
   */
  private function getLyricsFromFile(string $filename = "lyrics.txt"): void
  {
    $reflection = new ReflectionClass(ClassLoader::class);
    $projectDirectory = dirname($reflection->getFileName(), 3);
    $this->lyrics = file_get_contents($projectDirectory . "/" . $filename);
  }

  /**
   * Retrieves an array of line numbers that contain the beginning of a verse.
   * Ex: [1,4,8,13,19,26,34,43,53,64,76,89]
   */
  private function getVerseStartLines(): array
  {
    $matches = [];
    preg_match_all(
      '/On the .* day of Christmas my true love sent to me/',
      $this->lyrics,
      $matches,
      PREG_OFFSET_CAPTURE
    );

    $verseStartLines = [];
    foreach (current($matches) as $match) {
      $charpos = $match[1];
      if ($charpos > 0) {
        list($before) = str_split($this->lyrics, $charpos);
        $verseStartLines[] = strlen($before) - strlen(str_replace(PHP_EOL, "", $before)) + 1;
      } else {
        $verseStartLines[] = 1;
      }
    }

    return $verseStartLines;
  }

  /**
   * Retrieves the gifts that succeed each verse heading.
   */
  private function parseLyricsIntoGifts(): void
  {
    $lines = explode(PHP_EOL, $this->lyrics);
    $lineCount = count($lines);
    $verseStartLines = $this->getVerseStartLines();

    foreach ($verseStartLines as $index => $verseStartLine) {
      $nextLineNumber = $verseStartLines[$index+1] ?? $lineCount + 1;
      $diff = $nextLineNumber - $verseStartLine - 2;
      $this->gifts[$diff] = [];
      for ($i = 0; $i < $diff; $i++) {
        $giftLine = $verseStartLine + $i;
        $this->gifts[$diff][] = $lines[$giftLine];
      }
    }
  }
}
