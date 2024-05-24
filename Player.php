<?php

class Player {
    private $coins;
    private $bet;

    public function __construct($coins) {
        $this->coins = $coins;
        $this->bet = 0;
    }

    public function getCoins() {
        return $this->coins;
    }

    public function setCoins($coins) {
        $this->coins = $coins;
    }

    public function getBet() {
        return $this->bet;
    }

    public function setBet($bet) {
        if ($bet > 0 && $bet <= $this->coins) {
            $this->bet = $bet;
            return true;
        }
        return false;
    }

    public function addCoins($coins) {
        if ($coins > 0) {
            $this->coins += $coins;
            return true;
        }
        return false;
    }

    public function deductBet() {
        if ($this->bet <= $this->coins) {
            $this->coins -= $this->bet;
            return true;
        }
        return false;
    }
}