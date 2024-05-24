<?php

class Board {
    private $rows;
    private $columns;
    private $elements;
    private $board;
    private $winningLines;

    public function __construct($rows, $columns, $elements) {
        $this->rows = $rows;
        $this->columns = $columns;
        $this->elements = $elements;
        $this->winningLines = [
            [[0, 0], [0, 1], [0, 2]],
            [[1, 0], [1, 1], [1, 2]],
            [[2, 0], [2, 1], [2, 2]],
            [[0, 0], [1, 1], [2, 2]],
            [[2, 0], [1, 1], [0, 2]],
        ];
        $this->board = [];
    }

    public function generateBoard() {
        for ($row = 0; $row < $this->rows; $row++) {
            for ($column = 0; $column < $this->columns; $column++) {
                $this->board[$row][$column] = $this->elements[array_rand($this->elements)];
            }
        }
    }

    public function displayBoard() {
        foreach ($this->board as $row) {
            foreach ($row as $element) {
                echo $element->getSymbol();
            }
            echo PHP_EOL;
        }
    }

    public function checkWinningLines($bet) {
        $totalWin = 0;
        foreach ($this->winningLines as $line) {
            $symbols = [];
            foreach ($line as $coordinates) {
                $symbols[] = $this->board[$coordinates[0]][$coordinates[1]];
            }
            if (count(array_unique(array_map(fn($symbol) => $symbol->getSymbol(), $symbols))) === 1) {
                $winningSymbol = $symbols[0];
                $winAmount = $bet * $winningSymbol->getValue();
                echo "You won $winAmount\n";
                $totalWin += $winAmount;
            }
        }
        return $totalWin;
    }
}