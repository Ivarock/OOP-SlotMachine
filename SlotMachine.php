<?php

class SlotMachine {
    private $player;
    private $board;

    public function __construct($player, $board) {
        $this->player = $player;
        $this->board = $board;
    }

    public function start() {
        while (true) {
            echo "- Your balance: " . $this->player->getCoins() . " coins\n";
            echo "- Cost of bet: " . $this->player->getBet() . " coins\n";
            echo "- Press 'enter' to spin\n";
            echo "- 1. Add coins\n";
            echo "- 2. Change bet\n";
            echo "- 3. Cash out\n";
            $choice = readline("- Your choice: ");

            switch ($choice) {
                case '1':
                    $addCoins = (int)readline("Enter the amount of coins: ");
                    if (!$this->player->addCoins($addCoins)) {
                        echo "Invalid input\n";
                    }
                    break;
                case '2':
                    $newBet = (int)readline("Enter your bet per turn: ");
                    if (!$this->player->setBet($newBet)) {
                        echo "Invalid input or insufficient coins\n";
                    }
                    break;
                case '3':
                    echo "Cashing out " . $this->player->getCoins() . " coins. Thank you for playing\n";
                    exit;
                case '':
                    if (!$this->player->deductBet()) {
                        echo "You don't have enough coins\n";
                        break;
                    }
                    $this->board->generateBoard();
                    $this->board->displayBoard();
                    $winAmount = $this->board->checkWinningLines($this->player->getBet());
                    $this->player->addCoins($winAmount);
                    break;
                default:
                    echo "Invalid choice\n";
            }
        }
    }
}