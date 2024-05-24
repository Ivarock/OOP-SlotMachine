<?php

require_once 'Symbol.php';
require_once 'Player.php';
require_once 'Board.php';
require_once 'SlotMachine.php';

$initialCoins = (int)readline("Enter the amount of coins: ");
while ($initialCoins <= 0) {
    $initialCoins = (int)readline("Invalid input. Enter the amount of coins: ");
}

$player = new Player($initialCoins);
$symbols = [
    new Symbol('♦', 1),
    new Symbol('♦', 1),
    new Symbol('♥', 2),
    new Symbol('♪', 3),
    new Symbol('£', 5),
    new Symbol('$', 10)
];
$board = new Board(3, 3, $symbols);
$slotMachine = new SlotMachine($player, $board);

$initialBet = (int)readline("Enter your bet per turn: ");
while (!$player->setBet($initialBet)) {
    $initialBet = (int)readline("Invalid input or insufficient coins. Enter your bet per turn: ");
}

$slotMachine->start();
