<?php

class TwelveDaysChristmas {

  private $gifts = [];

  function __construct() {
    $this->buildGiftList();
  }

  private function addGift(string $gift) {
    $previousGift = end($this->gifts) ?: [];
    array_unshift($previousGift, $gift);
    array_push($this->gifts, $previousGift);
  }

  private function buildGiftList() {
    $this->addGift("A partridge in a pear tree");
    $this->addGift("Two turtle doves");
    $this->addGift("Three French hens");
    $this->addGift("Four calling birds");
    $this->addGift("Five golden rings");
    $this->addGift("Six geese a-laying");
    $this->addGift("Seven swans a-swimming");
    $this->addGift("Eight maids a-milking");
    $this->addGift("Nine ladies dancing");
    $this->addGift("Ten lords a-leaping");
    $this->addGift("Eleven pipers piping");
    $this->addGift("Twelve drummers drumming");
  }
}

$worker = new TwelveDaysChristmas();
